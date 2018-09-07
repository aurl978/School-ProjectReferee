<?php require_once 'include/navbar.php'; ?>
<?php require_once 'include/connection.php'; ?>
    <div class="container">
        <?php
        if($verif->notEmpty($_SESSION['flash'])){
            echo $_SESSION['flash'];
        }
        ?>
        <div class="card" style="width: 1200px;">
            <a href="http://localhost/slam_ppe/index.php?page=form/addMatch.php" class="btn btn-success">Ajouter un match</a>
            <div class="card-body" >
                <!--Table-->
                <table class="table table-hover">
                    <!--Table head-->
                    <thead class="stylish-color">
                    <tr class="text-white">
                        <th>N° Match</th>
                        <th>Catégorie</th>
                        <th>Division</th>
                        <th>Type Championnat</th>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Équipe 1</th>
                        <th>Équipe 2</th>
                        <th>Adresse Salle</th>
                        <th>Arbitre P</th>
                        <th>Arbitre S</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                    </thead>
                    <!--Table head-->
                    <!--Table body-->
                    <tbody>
                    <?php
$req = $db->query('
SELECT NUM_MATCH,
DATE_MATCH,
HEURE_MATCH,
e.NOM_EQUIPE      AS eq1,
ee.NOM_EQUIPE     AS eq2,
ADRESSE_SALLE,
NOM_CHAMPIONNAT,
NOM_DIVISION,
NOM_CATEGORIE,
NOM_TYPE_CHAMPIONNAT,
a.PRENOM_ARBITRE  AS n1,
aa.PRENOM_ARBITRE AS n2
FROM matchs m
INNER JOIN salle s            ON m.NUM_SALLE                = s.NUM_SALLE
INNER JOIN equipe e           ON m.NUM_EQUIPE1              = e.NUM_EQUIPE
INNER JOIN equipe ee          ON m.NUM_EQUIPE_2             = ee.NUM_EQUIPE 
INNER JOIN championnat c      ON e.NUM_CHAMPIONNAT          = c.NUM_CHAMPIONNAT 
INNER JOIN categorie cc       ON c.NUM_CATEGORIE            = cc.NUM_CATEGORIE 
INNER JOIN division d         ON c.NUM_DIVISION             = d.NUM_DIVISION 
INNER JOIN type_championnat t ON t.NUM_TYPE_CHAMPIONNAT     = c.NUM_TYPE_CHAMPIONNAT
LEFT JOIN arbitre a           ON m.NUM_ARBITRE_P            = a.NUM_ARBITRE
LEFT JOIN arbitre aa          ON m.NUM_ARBITRE_S            = aa.NUM_ARBITRE
ORDER BY NUM_MATCH')->fetchAll();
                    foreach ($req as $item) {
                        ?>
                        <tr>
                            <th scope="row"><?= $item->NUM_MATCH ?></th>
                            <th><?= $item->NOM_CATEGORIE ?></th>
                            <th><?= $item->NOM_DIVISION ?></th>
                            <th><?= $item->NOM_CHAMPIONNAT ?></th>
                            <th><?= $item->DATE_MATCH ?></th>
                            <th><?= $item->HEURE_MATCH ?></th>
                            <th><?= $item->eq1 ?></th>
                            <th><?= $item->eq2 ?></th>
                            <th><?= $item->ADRESSE_SALLE ?></th>
                            <th><?= $item->n1 ?></th>
                            <th><?= $item->n2 ?></th>
                            <form action="http://localhost/slam_ppe/index.php?page=form/modMatch.php" method="post">
                                <input name="e" type="text" value="<?= $item->NUM_MATCH ?>" style="display: none;" />
                                <th class="text-center"><button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i></button></th>
                            </form>
                            <form action="http://localhost/slam_ppe/index.php?page=form/script.delete.match.php" method="post">
                                <input name="e" type="text" value="<?= $item->NUM_MATCH ?>" style="display: none;" />
                            <th class="text-center"><button type="submit" class="btn btn-danger"><i class="fas fa-times"></i></button></th>
                            </form>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                    <!--Table body-->
                </table>
                <!--Table-->
            </div>
        </div>
    </div>
    <br><br>
<?php require_once 'include/footer.php'; ?>

