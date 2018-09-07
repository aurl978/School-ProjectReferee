<?php

require_once 'include/connection.php';


var_dump($_POST);

if ($_POST) {
    if ($verif->notEmpty($_POST['num_salle'], $_POST['jour'], $_POST['heure'], $_POST['e1'], $_POST['e2'])) {
        if (!$verif->isEquals($_POST['e1'], $_POST['e2'])) {

            $num_salle      = $_POST['num_salle'];
            $jour           = $_POST['jour'];
            $heure          = $_POST['heure'];
            $e1             = $_POST['e1'];
            $e2             = $_POST['e2'];

            $req = $db->query("INSERT INTO matchs(NUM_SALLE, NUM_EQUIPE1, NUM_EQUIPE_2, HEURE_MATCH, DATE_MATCH) VALUES ($num_salle, $e1, $e2, '$heure', '$jour')");

            echo "Match ajouté";
            header('Location: http://localhost/slam_ppe/index.php?page=form/addForm.php');

        } else {
            echo "Les équipes sont les mêmes";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    } else {
        echo "Champs vides ou manquant";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
} else {
    echo "Aucun formulaire envoyé";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}