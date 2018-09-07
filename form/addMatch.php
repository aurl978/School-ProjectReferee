<?php require_once 'include/navbar.php'; ?>
<?php require_once 'include/connection.php'; ?>
    <div class="container">
        <div class="card">

            <div class="card-body">
                <h4>Ajouter un match</h4>
                <hr>
                <form action="http://localhost/slam_ppe/index.php?page=form/script.add.match.php" method="post">
                    <div class="form-group">
                        <label for="s">Sélectionner le numéro de salle</label>
                        <select name="num_salle" class="form-control" id="s">
                            <?php
                            $req = $db->query('SELECT * FROM salle')->fetchAll();
                            foreach ($req as $item) {
                                echo '<option value="' . $item->NUM_SALLE . '">' . $item->NUM_SALLE . ' - ' . $item->ADRESSE_SALLE . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ee">Choisir la date du match</label>
                        <input name="jour" type="date" class="form-control" id="ee"
                               placeholder="Choisir la date du match">
                    </div>
                    <div class="form-group">
                        <label for="qq">Choisir l'heure du match</label>
                        <input name="heure" type="time" class="form-control" id="qq">
                    </div>
                    <div class="form-group">
                        <label for="s">Sélectionner l'équipe 1</label>
                        <select name="e1" class="form-control" id="e1">
                            <?php
                            $req = $db->query('SELECT * FROM equipe')->fetchAll();
                            foreach ($req as $item) {
                                echo '<option value="' . $item->NUM_EQUIPE . '">' . $item->NUM_EQUIPE . ' - ' . $item->NOM_EQUIPE . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="s">Sélectionner l'équipe 2</label>
                        <select name="e2" class="form-control" id="e2">
                            <?php
                            $req = $db->query('SELECT * FROM equipe')->fetchAll();
                            foreach ($req as $item) {
                                echo '<option value="' . $item->NUM_EQUIPE . '">' . $item->NUM_EQUIPE . ' - ' . $item->NOM_EQUIPE . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Ajouter un match</button>
                </form>
            </div>
        </div>
    </div>
    <br><br>
<?php require_once 'include/footer.php'; ?>