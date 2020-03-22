<?php
    include_once "engine.php";
    include_once "datamanager.php";

    $datamanger = new datamanager($conn);
    if($_SESSION['role'] != 1 && $_SESSION['role'] != 2){
        header("location: ../index.php");
    } else {
        // TicketTypeList
        $TicketTypeList = "SELECT * FROM reporttype";
        $TicketTypeList = $conn->query($TicketTypeList);
        $TicketTypeList = $TicketTypeList->fetch_all();
?>

        <table class="postlist" id="be-tickettype">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ชื่อ</th>
                    <th>name</th>
                    <th>แก้ไข</th>
                </tr>
            </thead>
            <tbody>
<?php
                foreach ($TicketTypeList as $key => $value){
?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $value['1'];?></td>
                    <td><?php echo $value['2']; ?></td>
                    <td><button class="btn-view" id="btn-edit-tickettype-<?php echo $value['0']; ?>">Edit</button></td>
                </tr>
<?php
                }
?>
            </tbody>
        </table>
        
<?php
    }
?>