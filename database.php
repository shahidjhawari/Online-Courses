<?php
try {
    $con = new PDO("mysql:host=localhost;dbname=form_data", "root", "");
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
