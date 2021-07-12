<?php

try {
    $con = new PDO("mysql:host=localhost; dbname=tcc",'root','');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException  $e) {
    print $e->getMessage();
}

?>