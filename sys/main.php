<?php
    
    include_once "engine.php";
    include_once "usermanager.php";
    include_once "datamanager.php";
    include_once "datamanager.item.php";

    $usermanager = new usermanager($conn);
    $datamanager = new datamanager($conn);
    $itemmanager = new itemmanager($conn);

    date_default_timezone_set("Asia/Bangkok");
    $strDate = date("Y-m-d");
    $strTime = date("h:i:sa");
    $strDT = $strDate . " " . $strTime;

    if($_POST['type'] == "login"){
        $username = strtolower($conn->real_escape_string($_POST['username']));
        $password = md5($conn->real_escape_string($_POST['password']));

        $usermanager->signin($username, $password, $strDT);

    } elseif($_POST['type'] == "register") {
        $username = strtolower($conn->real_escape_string($_POST['username']));
        $realname = $conn->real_escape_string($_POST['username']);
        $password = md5($conn->real_escape_string($_POST['password']));
        $email = $conn->real_escape_string($_POST['email']);
        $prefix = $conn->real_escape_string($_POST['prefix']);
        $thaifirstname = $conn->real_escape_string($_POST['thaifirstname']);
        $thailastname = $conn->real_escape_string($_POST['thailastname']);
        $thainickname = $conn->real_escape_string($_POST['thainickname']);
        $engfirstname = $conn->real_escape_string($_POST['engfirstname']);
        $englastname = $conn->real_escape_string($_POST['englastname']);
        $engnickname = $conn->real_escape_string($_POST['engnickname']);
        $age = $conn->real_escape_string($_POST['age']);
        $sex = $conn->real_escape_string($_POST['sex']);
        $edu = $conn->real_escape_string($_POST['edu']);
        $district = $conn->real_escape_string($_POST['district']);
        $province = $conn->real_escape_string($_POST['province']);
        $facebook = $conn->real_escape_string($_POST['facebook']);
        $urlfacebook = $conn->real_escape_string($_POST['urlfacebook']);
        $lineid = $conn->real_escape_string($_POST['lineid']);
        $tel = $conn->real_escape_string($_POST['tel']);
        $role = $conn->real_escape_string($_POST['role']);

        $usermanager->signup($username, $realname, $password, $email, $prefix
        , $thaifirstname, $thailastname, $thainickname, $engfirstname, $englastname
        , $engnickname, $age, $sex, $edu, $district, $province, $facebook, $urlfacebook
        , $lineid, $tel, $role, $strDT);

        
    } elseif($_POST['type'] == "edit"){
        $userid = $_POST['id'];
        $email = $conn->real_escape_string($_POST['email']);
        $prefix = $conn->real_escape_string($_POST['prefix']);
        $thaifirstname = $conn->real_escape_string($_POST['thaifirstname']);
        $thailastname = $conn->real_escape_string($_POST['thailastname']);
        $thainickname = $conn->real_escape_string($_POST['thainickname']);
        $engfirstname = $conn->real_escape_string($_POST['engfirstname']);
        $englastname = $conn->real_escape_string($_POST['englastname']);
        $engnickname = $conn->real_escape_string($_POST['engnickname']);
        $age = $conn->real_escape_string($_POST['age']);
        $sex = $conn->real_escape_string($_POST['sex']);
        $edu = $conn->real_escape_string($_POST['edu']);
        $district = $conn->real_escape_string($_POST['district']);
        $province = $conn->real_escape_string($_POST['province']);
        $facebook = $conn->real_escape_string($_POST['facebook']);
        $urlfacebook = $conn->real_escape_string($_POST['urlfacebook']);
        $lineid = $conn->real_escape_string($_POST['lineid']);
        $tel = $conn->real_escape_string($_POST['tel']);

        $usermanager->editprofile($userid, $email, $prefix, $thaifirstname, $thailastname
        , $thainickname, $engfirstname, $englastname, $engnickname, $age, $sex
        , $edu, $district, $province, $facebook, $urlfacebook, $lineid, $tel);

    } elseif($_POST['type'] == "publish-tutor") {
        $userid = $conn->real_escape_string($_POST['userid']);
        $subjectname = $conn->real_escape_string($_POST['subject']);
        $topic = $conn->real_escape_string($_POST['topic']);
        $teachingtype = $conn->real_escape_string($_POST['teachingtype']);
        $price = $conn->real_escape_string($_POST['price']);
        $agestu = $conn->real_escape_string($_POST['agestu']);
        $place = $conn->real_escape_string($_POST['place']);
        $description = $conn->real_escape_string($_POST['description']);
        $status = 1;

        $sql = "SELECT * FROM subjects WHERE Name='$subjectname'";
        $sql = $conn->query($sql);

        if($sql->num_rows > 0){
            $subject = $datamanager->convertsubject($subjectname);
            $itemmanager->publishtutor($userid, $subject, $topic, $strDT, $teachingtype, $price, $agestu, $place, $description, $status);
        } else {
            echo "nosubjects";
        }
    } elseif($_POST['type'] == "changepwd"){
        $userid = $conn->real_escape_string($_POST['userid']);
        $oldpassword = md5($conn->real_escape_string($_POST['oldpassword']));
        $newpassword = md5($conn->real_escape_string($_POST['newpassword']));
        $confirmpassword = md5($conn->real_escape_string($_POST['confirmpassword']));
        if($newpassword == $confirmpassword){
            $usermanager->changepassword($userid, $oldpassword, $newpassword);
        } else {
            echo "fail pass not match";
        }
    } elseif($_POST['type'] == "editpost"){
        $postid = $conn->real_escape_string($_POST['postid']);
        $managesubjectname = $conn->real_escape_string($_POST['managesubject']);
        $managetopic = $conn->real_escape_string($_POST['managetopic']);
        $managetype = $conn->real_escape_string($_POST['managetype']);
        $manageprice = $conn->real_escape_string($_POST['manageprice']);
        $manageagestu = $conn->real_escape_string($_POST['manageagestu']);
        $manageplace = $conn->real_escape_string($_POST['manageplace']);
        $managedescription = $conn->real_escape_string($_POST['managedescription']);
        $status = 1;

        $sql = "SELECT * FROM subjects WHERE Name='$managesubjectname'";
        $sql = $conn->query($sql);
        if($sql->num_rows > 0){
            $managesubject = $datamanager->convertsubject($managesubjectname);
            $itemmanager->edittutorpublish($postid, $managesubject, $managetopic, $managetype, $manageprice, $manageagestu, $manageplace, $managedescription, $status);
        } else {
            echo "nosubjects";
        }
    } elseif($_POST['type'] == "profileimg"){
        // profile img
        $userid = $_POST['userid'];
        if($_FILES["fileToUpload"]["name"] != ''){
            $target_dir = "../img/profile/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $getName = md5(rand());
            $FileName = $getName .  "." . $imageFileType;
            $path = $target_dir . $getName . "." . $imageFileType;
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "filetolarge";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "invalidfile";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $path)) {

                    $sql = "SELECT image FROM user WHERE ID='$userid'";
                    $sql = $conn->query($sql);
                    $sql = $sql->fetch_assoc();
                    $oldimg = $sql['image'];

                    if($sql['image'] != null){
                        unlink("../img/profile/" . $oldimg);
                    }
                    $sql = "UPDATE user SET image='$FileName' WHERE ID='$userid'";
                    $sql = $conn->query($sql);
                    $_SESSION['image'] = $FileName;
                    echo "success";
                    //echo "The file ". $FileName . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            echo "error";
        }
    } elseif($_POST['type'] == "ticket"){
        $userid = $conn->real_escape_string($_POST['userid']);
        $reporttype = $conn->real_escape_string($_POST['reporttype']);
        $reportsubject = $conn->real_escape_string($_POST['reportsubject']);
        $reportdetail = $conn->real_escape_string($_POST['reportdetail']);
        if($userid == 0){
            echo "loginfirst";
        } else {
            $itemmanager->ticket($strDT, $userid, $reporttype, $reportsubject, $reportdetail);
        }
    } elseif($_POST['type'] == "editsubject"){
        $subjectid = $conn->real_escape_string($_POST['editsubjectid']);
        $subjectname = $conn->real_escape_string($_POST['editsubjectname']);
        $subjectengname = $conn->real_escape_string($_POST['editsubjectengname']);
        
        $itemmanager->editsubject($subjectid, $subjectname, $subjectengname);

    } elseif($_POST['type'] == "addsubject"){
        $subjectname = $conn->real_escape_string($_POST['addsubjectname']);
        $subjectengname = $conn->real_escape_string($_POST['addsubjectengname']);

        $itemmanager->addsubject($subjectname, $subjectengname);

    } elseif($_POST['type'] == "addtickettype"){
        $tickettype = $conn->real_escape_string($_POST['addtickettype']);
        $tickettypeeng = $conn->real_escape_string($_POST['addtickettypeeng']);
        $itemmanager->addtickettype($tickettype, $tickettypeeng);
    } elseif($_POST['type'] == "edittickkettype"){
        $tickettypeid = $conn->real_escape_string($_POST['edittickettypeid']);
        $tickettype = $conn->real_escape_string($_POST['edittickettype']);
        $tickettypeeng = $conn->real_escape_string($_POST['edittickettypeeng']);

        $itemmanager->edittickkettype($tickettypeid, $tickettype, $tickettypeeng);

    } elseif($_POST['type'] == "admineditpass"){
        $userid = $conn->real_escape_string($_POST['userid']);
        $newpass = md5($conn->real_escape_string($_POST['newpass']));
        $usermanager->adminchangepassword($userid, $newpass);
    } elseif($_POST['type'] == "adminticketreply"){
        $itemmanager->adminreplyticket($_POST['ticketid'], $_POST['ticketreply-ans']);
    } else {
        header("location: ../index.php");
    }
?>