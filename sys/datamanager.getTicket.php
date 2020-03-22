<?php
    include_once "engine.php";
    include_once "datamanager.php";

    $datamanger = new datamanager($conn);
    if($_SESSION['role'] != 1 && $_SESSION['role'] != 2){
        header("location: ../index.php");
    } else {
        // TicketList
        $TicketList = "SELECT * FROM ticket ORDER BY ID DESC LIMIT 20";
        $TicketList = $conn->query($TicketList);
        $TicketList = $TicketList->fetch_all();
?>

        <table class="postlist" id="be-ticket">
            <thead>
                <tr>
                    <th>#</th>
                    <th>วัน-เวลา</th>
                    <th>ปัญหา</th>
                    <th>reply</th>
                    <th>status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
<?php
                foreach ($TicketList as $key => $value){
?>
                <tr>
                    <td><?php echo $value['0']; ?></td>
                    <td><?php echo $value['1'];?></td>
                    <td><?php $datamanger->reporttypedata($value['2']); echo " : " . $value['3']; ?></td>
                    <td>
                        <?php 
                        if($value['5'] == null && $value['5'] == ""){
                            echo "No Reply";
                        } else {
                            echo "Replied"; 
                        }
                        ?>
                    </td>
                    <td><?php echo $value['7']; ?></td>
                    <td>
                        <?php 
                        if($value['5'] == null && $value['5'] == ""){ ?>
                            <button class="btn-view" id="btn-edit-ticket-<?php echo $value['0']; ?>">Reply</button>
                        <?php } else {
                            
                        }
                        ?>
                    </td>
                </tr>
<?php
                }
?>
            </tbody>
        </table>
        
<?php
    }
?>