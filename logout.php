<?php

    include_once "sys/engine.php";
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['realname']);
    unset($_SESSION['prefix']);
    unset($_SESSION['thaifirstname']);
    unset($_SESSION['thailastname']);
    unset($_SESSION['thainickname']);
    unset($_SESSION['engfirstname']);
    unset($_SESSION['englastname']);
    unset($_SESSION['engnickname']);
    unset($_SESSION['age']);
    unset($_SESSION['sex']);
    unset($_SESSION['education']);
    unset($_SESSION['district']);
    unset($_SESSION['province']);
    unset($_SESSION['facebook']);
    unset($_SESSION['urlfacebook']);
    unset($_SESSION['lineid']);
    unset($_SESSION['tel']);
    unset($_SESSION['role']);
    unset($_SESSION['verification']);
    session_destroy();

	header("location: index.php");

?>