<?php
    include_once "../sys/engine.php";
    include_once "../sys/datamanager.php";

    $datamanger = new datamanager($conn);
    if(!isset($_SESSION['username'])){
        header("location: ../index.php");
    } elseif($_SESSION['role'] != 1 && $_SESSION['role'] != 2) {
        header("location: ../index.php");
    } elseif($_SESSION['role'] == 1 || $_SESSION['role'] == 2){ 
// html started 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/backend.css">
    <link rel="stylesheet" href="../css/MyStyle.css">
    <link rel="stylesheet" href="../css/animation.css">
    <link rel="stylesheet" href="../css/logic.css">
    <link rel="shortcut icon" href="../img/logo.png">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>
    <title>Have A Class - Backend</title>
</head>
<body>
    <section class="backend-body">
        <div class="dashboard">
            <div class="dash backend-post">
                <h1>POST</h1>
                <p id="getPostList">0</p>
            </div>
            <div class="dash backend-user">
                <h1>USER</h1>
                <p id="getUserList">0</p>
            </div>
            <div class="dash backend-ticket">
                <h1>TICKET</h1>
                <p id="getTicketList">0</p>
            </div>
        </div>
        <div class="addboard">
            <div class="add add-subject">
                <p>+ Subject</p>
            </div>
            <div class="add add-tickettype">
                <p>+ Ticket Type</p>
            </div>
            <div class="add add-province">
                <p>Province</p>
            </div>
            <div class="add add-teachingtype">
                <p>Teaching Type</p>
            </div>
            <div class="add add-prefix">
                <p>Prefix</p>
            </div>
        </div>
        <div id="display">
            <div id="getPost">
                <?php
                    include "../sys/datamanager.getPost.php";
                ?>
                <button class="btn btn-danger" id="close-1">Close</button>
            </div>
            <div id="getUser">
                <div class="simp-container" style="text-align: center;">
                    <input type="number" id="edit-user-id" placeholder="User's ID">
                    <button class="btn-view btn-warning" id="btn-edit-changepwd">change password</button>
                    
                    <div class="simp-container" id="admin-changepwd">
                        <p>Changing password for User #<i id="useriddisplay"></i></p>
                        <div>
                            <label for="edit-changepwd-old">New Password</label>
                            <input type="password" id="edit-changepwd-new" placeholder="New Password">
                        </div>
                        <div>
                            <label for="edit-changepwd-old">Confirm Password</label>
                            <input type="password" id="edit-changepwd-confirm" placeholder="Confirm Password">
                        </div>
                        <div>
                            <button class="btn btn-submit" id="btn-submitedit-changepwd">submit</button>
                        </div>


                    </div>
                </div>
                <?php
                    include "../sys/datamanager.getUser.php";
                ?>
                <button class="btn btn-danger" id="close-2">Close</button>
            </div>
            <div id="getTicket">
                <div id="ticketreply">
                    <input type="hidden" id="ticletid-get">
                    <div>Reply Ticket #<i id="ticketid"></i></div>
                    <div>Ticket : <i id="ticketproblem"></i></div>
                    <div>Ticket Topic : <i id="tickettopic"></i></div>
                    <div>Ticket Detail :</div>
                    <dd id="ticketdetail"></dd>
                    <div>Ticket Reply :</div>
                    <textarea id="ticketreply-ans" rows="3"></textarea>
                    <div>
                        <button class="btn btn-submit" id="btn-submit-admin-reply">Submit</button>
                    </div>
                </div>
                <?php
                    include "../sys/datamanager.getTicket.php";
                ?>
                <button class="btn btn-danger" id="close-3">Close</button>
            </div>
            <div id="subjectlist">
                <div class="add-container">
                    <div>
                        Add Subject
                        <div>
                            <label for="add-subject">ชื่อวิชา</label>
                            <input type="text" id="add-subject">
                        </div>
                        <div>
                            <label for="add-subject-eng">Subject Name</label>
                            <input type="text" id="add-subject-eng">
                        </div>
                        <button class="btn btn-submit" id="submit-add-subject">submit</button>
                    </div>
                    <div id="edit-subject-container">
                        Edit Subject
                        <div>
                            <label for="edit-subject">ชื่อวิชา</label>
                            <input type="text" id="edit-subject">
                        </div>
                        <div>
                            <label for="edit-subject-eng">Subject Name</label>
                            <input type="text" id="edit-subject-eng">
                        </div>
                        <input type="hidden" id="edit-subject-id">
                        <button class="btn btn-submit" id="submit-edit-subject">submit</button>
                    </div>
                </div>
                <?php
                    include "../sys/datamanager.getSubject.php";
                ?>
                <button class="btn btn-danger" id="close-4">Close</button>
            </div>
            <div id="ticketlist">
                <div class="add-container">
                    <div>
                        Add Ticket Type
                        <div>
                            <label for="add-tickettype">ชื่อ</label>
                            <input type="text" id="add-tickettype">
                        </div>
                        <div>
                            <label for="add-tickettype-eng">Name</label>
                            <input type="text" id="add-tickettype-eng">
                        </div>
                        <button class="btn btn-submit" id="submit-add-tickettype">submit</button>
                    </div>
                    <div id="edit-tickettype-container">
                        Edit Ticket Type
                        <div>
                            <label for="edit-tickettype">ชื่อ</label>
                            <input type="text" id="edit-tickettype">
                        </div>
                        <div>
                            <label for="edit-tickettype-eng">Name</label>
                            <input type="text" id="edit-tickettype-eng">
                        </div>
                        <input type="hidden" id="edit-tickettype-id">
                        <button class="btn btn-submit" id="submit-edit-tickettype">submit</button>
                    </div>
                </div>
                <?php
                    include "../sys/datamanager.getTickettype.php";
                ?>
                <button class="btn btn-danger" id="close-5">Close</button>
            </div>
            <div id="provincelist">
                <?php
                    include "../sys/datamanager.getProvince.php";
                ?>
                <button class="btn btn-danger" id="close-6">Close</button>
            </div>
            <div id="teachingtypelist">
                <?php
                    include "../sys/datamanager.getTeachingtype.php";
                ?>
                <button class="btn btn-danger" id="close-7">Close</button>
            </div>
            <div id="prefixlist">
                <?php
                    include "../sys/datamanager.getPrefix.php";
                ?>
                <button class="btn btn-danger" id="close-8">Close</button>
            </div>
        </div>
    </section>

<footer>
    <div>
        Copyright &#169; All Right Reserved, Have A Class | Learning Center, Education Platform.<br>
    </div>
    <div><a href="report.php">แจ้งปัญหาการใช้งาน หรือ เพิ่มวิชาที่จะสอน</a>, <a href="#">ติดต่อผู้ให้บริการ</a></div>
    <div>
    <div><a href="../index.php">Home, </a> <a href="../logout.php">Logout</a></div>
</footer>
<!-- success -->
<div class="icon-box" id="success-box">
    <div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;">
        <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
        <span class="swal2-success-line-tip"></span>
        <span class="swal2-success-line-long"></span>
        <div class="swal2-success-ring"></div> 
        <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
        <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
    </div>
    <h3 id="success-msg" class="success-cl"></h3>
</div>

<!-- fail -->
<div class="icon-box" id="fail-box">
    <div class="swal2-icon swal2-error swal2-animate-error-icon" style="display: flex;">
        <span class="swal2-x-mark">
            <span class="swal2-x-mark-line-left"></span>
            <span class="swal2-x-mark-line-right"></span>
        </span>
    </div>
    <h3 id="fail-msg" class="fail-cl">Fail !</h3>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
<script src="assets/backend.js"></script>
<script src="assets/ajaxsys.js"></script>
</body>
</html>
<?php
// html ended
    }
?>