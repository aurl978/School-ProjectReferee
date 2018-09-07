<?php require_once 'include/navbar.php'; ?>
<?php require_once 'include/connection.php'; ?>
<?php


var_dump($_POST);

if (!$verif->notEmpty($_POST['e'])) {
    header('Location: http://localhost/slam_ppe/index.php?page=form/addForm.php');
}

$e = htmlspecialchars($_POST['e']);

$req = $db->query('SELECT * FROM matchs WHERE NUM_MATCH = ' . $e)->fetchAll();


?>
    <div class="container">
        <div class="card">

            <div class="card-body">
                <h4>Modifier un match</h4>
                <hr>
                <form action="http://localhost/slam_ppe/index.php?page=form/script.mod.match.php" method="post">
                    <div class="form-group">
                        <input type="text" name="id" value="<?= $e ?>" style="display: none;">
                        <label for="s">Sélectionner le numéro de salle</label>
                        <select name="num_salle" class="form-control" id="s">
                            <?php
                            $reqq = $db->query('SELECT * FROM salle')->fetchAll();
                            foreach ($req as $item) {
                                echo "<option value='".$item->NUM_SALLE."' selected>".$item->NUM_SALLE."</option>";
                            }
                            ?>
                            <?php

                            foreach ($reqq as $items) {
                                echo '<option value="' . $items->NUM_SALLE . '">' . $items->NUM_SALLE . ' - ' . $items->ADRESSE_SALLE . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ee">Choisir la date du match</label>
                        <?php
                        foreach ($req as $item) {
                            echo " <input name=\"jour\" type=\"date\" class=\"form-control\" id=\"ee\" value='" . $item->DATE_MATCH . "'>";
                        }
                        ?>

                    </div>
                    <div class="form-group">
                        <label for="qq">Choisir l'heure du match</label>
                        <?php
                        foreach ($req as $item) {
                            echo " <input name=\"heure\" type=\"time\" class=\"form-control\" id=\"ee\" value='" . $item->HEURE_MATCH . "'>";
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="s">Sélectionner l'équipe 1</label>
                        <select name="e1" class="form-control" id="e1">
                            <?php
                            foreach ($req as $item) {
                                echo "<option value='".$item->NUM_EQUIPE1."' selected>".$item->NUM_EQUIPE1."</option>";
                            }
                            ?>
                            <?php
                            $reqd = $db->query('SELECT * FROM equipe')->fetchAll();
                            foreach ($reqd as $iteem) {
                                echo '<option value="' . $iteem->NUM_EQUIPE . '">' . $iteem->NUM_EQUIPE . ' - ' . $iteem->NOM_EQUIPE . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="s">Sélectionner l'équipe 2</label>
                        <select name="e2" class="form-control" id="e2">
                            <?php
                            foreach ($req as $item) {
                                echo "<option value='".$item->NUM_EQUIPE_2."' selected>".$item->NUM_EQUIPE_2."</option>";
                            }
                            ?>
                            <?php
                            $reqd = $db->query('SELECT * FROM equipe')->fetchAll();
                            foreach ($reqd as $iteem) {
                                echo '<option value="' . $iteem->NUM_EQUIPE . '">' . $iteem->NUM_EQUIPE . ' - ' . $iteem->NOM_EQUIPE . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Modifier un match</button>
                    <button onclick="mf();" type="submit" class="btn btn-danger">Annuler</button>
                    <script>
                        function mf(){
                            alert('Modification annulée')
                        }
                    </script>
                </form>
            </div>
        </div>
    </div>
    <br><br>
<?php require_once 'include/footer.php'; ?>