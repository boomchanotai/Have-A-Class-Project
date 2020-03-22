<?php
    include_once "engine.php";
    include_once "datamanager.php";

    $datamanger = new datamanager($conn);
    if($_SESSION['role'] != 1 && $_SESSION['role'] != 2){
        header("location: ../index.php");
    } else {
        if($_POST['getWhat'] == "SubjectList"){
            $datamanger->getSubjectList();
        } elseif($_POST['getWhat'] == "getSubjectdata"){
            $datamanger->getSubjectdata($_POST['idsubject']);
        } elseif($_POST['getWhat'] == "TicketTypeList"){
            $datamanger->getTicketTypeList();
        } elseif($_POST['getWhat'] == "getTicketTypedata"){
            $datamanger->getTicketTypedata($_POST['idtickettype']);
        } elseif($_POST['getWhat'] == "admin-changepwd"){
            $datamanger->getUserList();
        } elseif($_POST['getWhat'] == "getTicketList"){
            $datamanger->getTicketList();
        } elseif($_POST['getWhat'] == "getTicketdata"){
            $datamanger->getTicketdata($_POST['ticketid']);
        }



    }
?>