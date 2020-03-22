<footer>
    <div>
        Copyright &#169; All Right Reserved, Have A Class | Learning Center, Education Platform. <br> Create By Chanotai Krajeam.
    </div>
    <div><a href="report.php">แจ้งปัญหาการใช้งาน หรือ เพิ่มวิชาที่จะสอน</a>, <a href="#">ติดต่อผู้ให้บริการ</a></div>
    <div>
    <?php 
        if(isset($_SESSION['username'])){ 
            if($_SESSION['role'] == 1 || $_SESSION['role'] == 2){ ?>
                <div>
                    <a href="backend/backend.php">Backend, </a>
        <?php    } else {} ?>
                    <a href="logout.php">Logout</a>
    <?php } else {} ?>
    </div>
</footer>

<div class="profile-thumbnail">
    <a href="profile.php">
        <?php
        if(isset($_SESSION['username'])){
            if($_SESSION['image'] == null){ ?>
                <img src="img/profile_pic.svg" alt="" height="150" class="shadow">
            <?php    } else { ?>
                <img src="img/profile/<?php echo $_SESSION['image']; ?>" alt="" height="150" class="shadow">
        <?php    }} ?>
    </a>
</div>

<!-- loading -->
<div class="icon-box" id="loading-box">
    <div class="loader"></div>
</div>

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

<script src="https://kit.fontawesome.com/46b1464b86.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/ajax.js"></script>
<script src="js/app.js"></script>
<script src="js/item.js"></script>
</body>
</html>