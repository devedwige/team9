<?php

require('actions/database.php');

//Récupérer les questions par défaut sans recherche
$getAllQuestions = $dbd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM question ORDER BY id DESC LIMIT 0,5');

//Vérifier si une recherche a été rentrée par l'utlisateur
if(isset($_GET['search']) AND !empty($_GET['search'])){

    //La recherche
    $usersSearch = $_GET['search'];

    //Récupérer toutes les questions qui correspondent à la recherche (en fonction du titre)
    $getAllQuestions = $dbd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM question WHERE titre LIKE "%'.$usersSearch.'%" ORDER BY id DESC');
    
}