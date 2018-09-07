<?php

require_once 'include/connection.php';


var_dump($_POST);

if ($verif->notEmpty($_POST['e'])) {
    $e = htmlspecialchars($_POST['e']);
    $req = $db->query('DELETE FROM matchs WHERE NUM_MATCH = '. $e);
    echo "Match supprimé";
    $_SESSION['flash'] = "Match supprimé";
    header('Location: http://localhost/slam_ppe/index.php?page=form/addForm.php');

}