<?php
    include_once "include/header.php";
?>
</section>
<?php
    if(isset($_GET['ticket'])){
        $ticketid = $_GET['ticket'];
        $userid = $_SESSION['id'];
        $ticket = "SELECT * FROM ticket WHERE ID='$ticketid' AND userid='$userid'";
        $ticket = $conn->query($ticket);

        if($ticket->num_rows == 0){
            include "include/404.php";
        } else { ?>
            <div class="container shadow">
                <?php 
                    $ticket = $ticket->fetch_assoc();
                ?>
                <h3>หมายเลขใบแจ้งปัญหา : #<?php echo $ticket['ID']; ?></h3>
                <div>วัน-เวลาที่แจ้ง : <?php echo $ticket['date']; ?></div>
                <div>ประเภทปัญหา : <?php $datamanager->reporttypedata($ticket['type']); ?></div>
                <div>หัวข้อ : <?php echo $ticket['subject']; ?></div>
                <div>สถานะ : <?php $datamanager->reportstatus($ticket['status']); ?></div>
                <div>รายละเอียด : <?php echo $ticket['information']; ?></div>
                <?php
                    if($ticket['reply'] == null){

                    } else { ?>
                <div>ตอบกลับ : <?php echo $ticket['reply']; ?></div>
                <?php    }  ?>
            </div>
    <?php    }

    } else { ?>
<section>
    <div class="container shadow">
        <div id="ticketnum">
            <h1>Your Ticket ID is <a href="#" id="getTicketID"></a></h1>
        </div>
        <div id="ticket">
            <div>แจ้งปัญหาการใช้งาน</div>
            <div>
                <div>
                    <label for="report-type">ปัญหา</label>
                    <select id="report-type">
                        <option disabled selected>เลือกปัญหาในการใช้งาน..</option>
                            <?php
                                $sql = $datamanager->callproblemtype();

                                foreach ($sql as $key => $value){ ?>
                                <option value="<?php echo $value['0'] ; ?>"><?php echo $value['1']; ?></option>
                            <?php    }
                            ?>
                    </select>
                </div>
                <div>
                    <label for="report-subject">เรื่อง</label>
                    <input type="text" id="report-subject" maxlength="60">
                </div>
                <div>
                    <label for="report-detail">รายละเอียด</label>
                    <textarea type="text" rows="6" maxlength="255" id="report-detail" placeholder="รายละเอียด.."></textarea>
                </div>
                <?php
                    if(!isset($_SESSION['id'])){ ?>
                        <input type="hidden" id="report-userid" value="0">
                <?php } else { ?>
                        <input type="hidden" id="report-userid" value="<?php echo $_SESSION['id']; ?>">
                <?php    }      ?>
                <p id="report-remaining"></p>
                <div>
                    <button class="btn btn-submit" id="report-submit">submit</button>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    }
    include_once "include/footer.php";
?>