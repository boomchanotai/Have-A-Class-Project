<?php
    include_once "engine.php";
    if(!isset($_SESSION['id'])){
        header("location: ../index.php");
    } else {
        $userid = $_SESSION['id'];
        $sql = "SELECT MAX(ID) FROM ticket WHERE userid='$userid'";
        $sql = $conn->query($sql);
        $sql = $sql->fetch_all();

        echo $sql[0][0];
    }

?>