<?php
    include_once "engine.php";
    if($_SESSION['role'] != 1 && $_SESSION['role'] != 2){
        header("location: ../index.php");
    } else {
        // PostList
        $postList = "SELECT MAX(ID) FROM tutorpublish";
        $postList = $conn->query($postList);
        $postList = $postList->fetch_all();
        $postList = $postList[0][0];

        // UserList
        $userList = "SELECT MAX(ID) FROM user";
        $userList = $conn->query($userList);
        $userList = $userList->fetch_all();
        $userList = $userList[0][0];

        // TicketList
        $ticketList = "SELECT MAX(ID) FROM ticket";
        $ticketList = $conn->query($ticketList);
        $ticketList = $ticketList->fetch_all();
        $ticketList = $ticketList[0][0];

        echo $postList . "." . $userList . "." . $ticketList;
    }
?>