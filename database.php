<?php
try {
    $con = new PDO("mysql:host=localhost;dbname=nawab_academy_form", "root", "");
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
