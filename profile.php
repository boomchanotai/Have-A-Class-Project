<?php
    include_once "include/header.php";
?>
</section>
<?php
    if(!isset($_SESSION['username'])){
        include "include/404.php";
    } else {
?>
<section>
    <div class="container shadow">
        <h3><?php echo $_SESSION['realname'];?>'s Profile</h3>
        <div id="profilepic">
        <?php
            if($_SESSION['image'] == null){ ?>
                <img src="img/profile_pic.svg" alt="" height="150" class="profileimg">
            <?php    } else { ?>
                <img src="img/profile/<?php echo $_SESSION['image']; ?>" alt="" height="150" class="profileimg">
        <?php    } ?>
        </div>
        <div class="upload-btn-wrapper">
            <label for="image-profile" class="btn-files">Upload Profile</Picture></label>
            <input type="file" name="file" id="image-profile">
            <input type="hidden" id="img-profile-userid" value="<?php echo $_SESSION['id']; ?>">
        </div>
        <div class="profile" id="info">
            <div>Username : <?php echo $_SESSION['realname']; ?></div>
            <div>Email : <?php echo $_SESSION['email']; ?> </div>
            <div>ชื่อ-สกุล : <?php $datamanager->prefixdata($_SESSION['prefix']); echo " " . $_SESSION['thaifirstname'] . " " . $_SESSION['thailastname'] . " (" . $_SESSION['thainickname'] . ")"; ?> </div>
            <div>Full name : <?php $datamanager->engprefixdata($_SESSION['prefix']); echo " " . $_SESSION['engfirstname'] . " " . $_SESSION['englastname'] . " (" . $_SESSION['engnickname'] . ")"; ?> </div>
            <div>อายุ : <?php echo $_SESSION['age']; ?> ปี</div>
            <div>เพศ : <?php $datamanager->genderdata($_SESSION['sex']); ?> </div>
            <div>ระดับการศึกษา : <?php $datamanager->educationdata($_SESSION['education']); ?> </div>
            <div>ที่อยู่ : <?php echo $_SESSION['district'] . ", "; $datamanager->provincedata($_SESSION['province']); ?> </div>
            <div>Facebook : <a href="<?php echo $_SESSION['urlfacebook']; ?>" target="_blank"><?php echo $_SESSION['facebook']; ?></a> </div>
            <div>Line ID : <?php echo $_SESSION['lineid']; ?> </div>
            <div>เบอร์โทรศัพท์ : <?php echo $_SESSION['tel']; ?> </div>
            <div>ตำแหน่ง : <?php $datamanager->roledata($_SESSION['role']); ?> </div>
        </div>
        <div>
            <button class="btn btn-submit" id="btn-editprofile">Edit Profile</button>
            <button class="btn btn-warning" id="btn-changepwd">Change Password</button>
<?php   
            $checkhaspostyet = $datamanager->checkhaspostyet($_SESSION['id']);
            if($checkhaspostyet->num_rows > 0){ ?>
                <button class="btn btn-submit" id="btn-managepost">Manage your post</button>
<?php       }
            $checkhasreportyet = $datamanager->checkhasreportyet($_SESSION['id']);
            if($checkhasreportyet->num_rows > 0){ ?>
                <button class="btn btn-submit" id="btn-ticket">ticket</button>
<?php       }
?>
        </div>
        <!-- ticket list -->
        <div class="edit-profile" id="manageticket" style="text-align: center;">
            <table class="table-ticket">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $userid = $_SESSION['id'];
                        $sql = "SELECT * FROM ticket WHERE userid='$userid'";
                        $sql = $conn->query($sql);
                        $sql = $sql->fetch_all();
                        foreach ($sql as $key => $ticket){ 
                    ?>
                    <tr>
                        <th>#<?php echo $ticket['0']; ?></th>
                        <td><?php $datamanager->reporttypedata($ticket['2']); echo " : " . $ticket['3'];?></td>
                        <td>
                        <?php    
                            if($ticket['7'] == 0){
                                echo "Pending..";
                            } else {
                                echo "Solved!";
                            }
                        ?>
                        </td>
                        <td><a href="report.php?ticket=<?php echo $ticket['0']; ?>"><button class="btn-view">View</button></a></td>
                    </tr>      
                    <?php    }
                    ?>
                </tbody>
            </table>
            <button class="btn btn-danger" id="btn-closemanageticket">close</button>
        </div>
        <!-- Manage post -->
        <?php 
            $checkhaspostyet = $datamanager->checkhaspostyet($_SESSION['id']);
            if($checkhaspostyet->num_rows > 0){
            $id = $_SESSION['id'];
            $publish = "SELECT * FROM tutorpublish WHERE user='$id'";
            $publish = $conn->query($publish);
            $publish = $publish->fetch_all();
            $publish = $publish['0'];
            // this foreach you can use if you allow many post from 1 person so delete upper line and open foreach
            //foreach ($publish as $key => $publish){ ?>
        <div class="edit-profile" id="managepost" style="text-align: center;">
            <input type="hidden" value="<?php echo $publish['0']; ?>" id="manage-postid">
            <div>
                <label for="manage-subject">วิชา</label>
                <input list="manage-subject-datalist" placeholder="เลือกรายวิชาที่จะสอน.." id="manage-subject" value="<?php $datamanager->subjectdata($publish['1']); ?>">
                <datalist id="manage-subject-datalist">
                <option disabled selected value="0">เลือกรายวิชา..</option>
                <?php
                    $sql = $datamanager->callsubject();

                    foreach ($sql as $key => $value) { ?>

                    <option value="<?php echo $value[1] ; ?>"></option>
                <?php } ?>
                </datalist>
            </div>
            <div>
                <label for="manage-topic">หัวข้อ</label>
                <input type="text" id="manage-topic" placeholder="หัวข้อ" value="<?php echo $publish['2']; ?>">
            </div>
            <div>
                <label for="manage-type">ช่องทางการสอน</label>
                <select id="manage-type">
                    <option value="<?php echo $publish['4']; ?>"><?php $datamanager->studiestypedata($publish['5']); ?></option>
                    <?php
                        $sql = $datamanager->callstudiestype();

                        foreach ($sql as $key => $value){ ?>
                        <option value="<?php echo $key +1 ; ?>"><?php echo $value['1']; ?></option>
                    <?php    }
                    ?>
                </select>
            </div>
            <div>
                <label for="manage-price">ราคา</label>
                <input type="text" id="manage-price" placeholder="ราคา" value="<?php echo $publish['6']; ?>">
            </div>
            <div>
                <label for="manage-agestu">อายุผู้เรียน</label>
                <input type="text" id="manage-agestu" placeholder="อายุผู้เรียน" value="<?php echo $publish['7']; ?>">
            </div>
            <div>
                <label for="manage-place">สถานที่เรียน</label>
                <input type="text" id="manage-place" placeholder="สถานที่เรียน" value="<?php echo $publish['8']; ?>">
            </div>
            <div>
                <label for="manage-description">รายละเอียดเพิ่มเติม</label>
                <textarea type="text" rows="6" maxlength="255" id="manage-description" placeholder="รายละเอียดเพิ่มเติม (255 ตัวอักษร).. EX. เป็นการปูพื้นฐานตั้งแต่ต้นจนถึงขั้นสูง etc. (ไม่สามารถขึ้นบรรทัดใหม่ เป็นการเขียนบรรยาย)"><?php echo $publish['9']; ?></textarea>
            </div>
            <p id="manage-remaining"></p>
            <button class="btn btn-submit" id="btn-submitmanage">submit</button>
            <button class="btn btn-danger" id="btn-closemanagepost">close</button>
        </div>
        <?php   // }
        }
        ?>


        <!-- change password -->
        <div class="edit-profile" id="changepwd" style="text-align: center;">
            <input type="hidden" id="changepwd-userid" value="<?php echo $_SESSION['id']; ?>">
            <div>
                <label for="changepwd-old">Old Password</label>
                <input type="password" id="changepwd-old" placeholder="Old Password">
            </div>
            <div>
                <label for="changepwd-old">New Password</label>
                <input type="password" id="changepwd-new" placeholder="New Password">
            </div>
            <div>
                <label for="changepwd-old">Confirm Password</label>
                <input type="password" id="changepwd-confirm" placeholder="Confirm Password">
            </div>
            <div>
            <button class="btn btn-submit" id="btn-submitchangepwd">submit</button>
            <button class="btn btn-danger" id="btn-closechangepwd">close</button>
            </div>
        </div>
        <!-- edit profile -->
        <div class="edit-profile" id="edit-info">
                <input type="hidden" id="edit-userid" value="<?php echo $_SESSION['id']; ?>">
            <div>
                <label for="edit-username">Username : </label>
                <input disabled type="text" id="edit-username" value="<?php echo $_SESSION['realname']; ?>">
            </div>
            <div>
                <label for="edit-email">Email : </label>
                <input type="text" id="edit-email" value="<?php echo $_SESSION['email']; ?>">
            </div>
            <div>
                <label for="edit-prefix">คำนำหน้า : </label>
                <select id="edit-prefix">
                    <option value="<?php echo $_SESSION['prefix']; ?>"><?php $datamanager->prefixdata($_SESSION['prefix']); ?></option>
                <?php
                    $sql = $datamanager->callprefix();

                    foreach ($sql as $key => $value) { ?>

                    <option value="<?php echo $key +1 ; ?>"><?php echo $value[1]; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <label for="edit-thaifirstname">ชื่อ : </label>
                <input type="text" id="edit-thaifirstname" value="<?php echo $_SESSION['thaifirstname']; ?>">
            </div>
            <div>
                <label for="edit-thailastname">นามสกุล : </label>
                <input type="text" id="edit-thailastname" value="<?php echo $_SESSION['thailastname']; ?>">
            </div>
            <div>
                <label for="edit-thainickname">ชื่อเล่น : </label>
                <input type="text" id="edit-thainickname" value="<?php echo $_SESSION['thainickname']; ?>">
            </div>
            <div>
                <label for="edit-engfirstname">Firstname : </label>
                <input type="text" id="edit-engfirstname" value="<?php echo $_SESSION['engfirstname']; ?>">
            </div>
            <div>
                <label for="edit-englastname">Lastname : </label>
                <input type="text" id="edit-englastname" value="<?php echo $_SESSION['englastname']; ?>">
            </div>
            <div>
                <label for="edit-engnickname">Nickname : </label>
                <input type="text" id="edit-engnickname" value="<?php echo $_SESSION['engnickname']; ?>">
            </div>
            <div>
                <label for="edit-age">อายุ : </label>
                <input type="number" id="edit-age" value="<?php echo $_SESSION['age']; ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "2">
            </div>
            <div>
                <label for="edit-sex">เพศ : </label>
                <select id="edit-sex">
                <option value="<?php echo $_SESSION['sex']; ?>"><?php $datamanager->genderdata($_SESSION['sex']); ?></option>
                <?php
                    $sql = $datamanager->callgender();

                    foreach ($sql as $key => $value) { ?>

                    <option value="<?php echo $key +1 ; ?>"><?php echo $value[1]; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <label for="edit-edu">ระดับการศึกษา : </label>
                <select id="edit-edu">
                <option value="<?php echo $_SESSION['education']; ?>"><?php $datamanager->educationdata($_SESSION['education']); ?></option>
                <?php
                    $sql = $datamanager->calledu();

                    foreach ($sql as $key => $value) { ?>

                    <option value="<?php echo $key +1 ; ?>"><?php echo $value[1]; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <label for="edit-district">บริเวณที่อยู่ : </label>
                <input type="text" id="edit-district" value="<?php echo $_SESSION['district']; ?>">
            </div>
            <div>
                <label for="edit-province">จังหวัด : </label>
                <select id="edit-province">
                <option value="<?php echo $_SESSION['province']; ?>"><?php $datamanager->provincedata($_SESSION['province']); ?></option>
                <?php
                    $sql = $datamanager->callprovince();

                    foreach ($sql as $key => $value) { ?>

                    <option value="<?php echo $key +1 ; ?>"><?php echo $value[1]; ?></option>
                <?php } ?>
                </select>
            </div>
            <div>
                <label for="edit-facebook">Facebook : </label>
                <input type="text" id="edit-facebook" value="<?php echo $_SESSION['facebook']; ?>">
            </div>
            <div>
                <label for="edit-urlfacebook">URL Facebook : </label>
                <input type="text" id="edit-urlfacebook" value="<?php echo $_SESSION['urlfacebook']; ?>">
            </div>
            <div>
                <label for="edit-lineid">Line ID : </label>
                <input type="text" id="edit-lineid" value="<?php echo $_SESSION['lineid']; ?>">
            </div>
            <div>
                <label for="edit-tel">เบอร์โทรศัพท์ : </label>
                <input type="text" id="edit-tel" value="<?php echo $_SESSION['tel']; ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10">
            </div>
            <div>
                <label for="edit-role">ตำแหน่ง : </label>
                <input disabled type="text" id="edit-role" value="<?php $datamanager->roledata($_SESSION['role']); ?>">
            </div>
            <div></div>
            <div>
                <button class="btn btn-submit" id="btn-submitedit">submit</button>
                <button class="btn btn-danger" id="btn-closeedit">close</button>
            </div>
        </div>
    </div>
</section>
<?php
    }
    include_once "include/footer.php";
?>