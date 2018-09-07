<?php
try {
    $db = new PDO("mysql:dbname=ppe_arbitre;host=localhost", 'root', 'yamaha87');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (PDOException $e) {
    echo "<pre><code class='error'>";
    echo 'An error occurred while trying to connect to the database. Check the file : "/application/controller/class/App.php". Error code : ' . '<b>' . $e->getMessage() . '</b>';
    echo "</pre></code>";

}