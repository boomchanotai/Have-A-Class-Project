<?php
    include_once "engine.php";
    if(!isset($_SESSION['id'])){
        header("location: ../index.php");
    } else {
        $sql = "SELECT MAX(ID) FROM tutorpublish";
        $sql = $conn->query($sql);
        $sql = $sql->fetch_all();

        echo $sql[0][0];
    }
   //header("location: ../index.php");
?>