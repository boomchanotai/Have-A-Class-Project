<?php

    include_once "engine.php";

    class usermanager{

        public function __construct($conn){
            $this->conn = $conn;
        }

        public function signin(string $username, string $password, string $strDT){

            $this->username = $username;
            $this->password = $password;

            $sql = "SELECT * FROM user WHERE username='$username'";
            $sql = $this->conn->query($sql);

            if($sql->num_rows == 1){

                $sql = $sql->fetch_assoc();
                $lastlogin = "UPDATE user SET lastlogin='$strDT' WHERE username='$username'";
                $this->conn->query($lastlogin);

                if($sql['password'] == $password){

                    $_SESSION['id'] = $sql['ID'];
                    $_SESSION['username'] = $sql['username'];
                    $_SESSION['realname'] = $sql['realname'];
                    $_SESSION['email'] = $sql['email'];
                    $_SESSION['prefix'] = $sql['prefix'];
                    $_SESSION['thaifirstname'] = $sql['thaifirstname'];
                    $_SESSION['thailastname'] = $sql['thailastname'];
                    $_SESSION['thainickname'] = $sql['thainickname'];
                    $_SESSION['engfirstname'] = $sql['engfirstname'];
                    $_SESSION['englastname'] = $sql['englastname'];
                    $_SESSION['engnickname'] = $sql['engnickname'];
                    $_SESSION['age'] = $sql['age'];
                    $_SESSION['sex'] = $sql['sex'];
                    $_SESSION['education'] = $sql['education'];
                    $_SESSION['district'] = $sql['district'];
                    $_SESSION['province'] = $sql['province'];
                    $_SESSION['facebook'] = $sql['facebook'];
                    $_SESSION['urlfacebook'] = $sql['urlfacebook'];
                    $_SESSION['lineid'] = $sql['lineid'];
                    $_SESSION['tel'] = $sql['tel'];
                    $_SESSION['role'] = $sql['role'];
                    $_SESSION['verification'] = $sql['verification'];
                    $_SESSION['image'] = $sql['image'];

                    echo "Success";
                } else {
                    echo "failedwrong";
                }

            } else {
                echo "failedwrong";
            }
        }

        public function signup(string $username, string $realname, string $password
        , string $email, string $prefix, string $thaifirstname, string $thailastname
        , string $thainickname, string $engfirstname, string $englastname
        , string $engnickname, string $age, string $sex, string $edu, string $district
        , string $province, string $facebook, string $urlfacebook
        , string $lineid, string $tel, string $role, string $strDT){

            $this->username = $username;
            $this->realname = $realname;
            $this->password = $password;
            $this->email = $email;
            $this->prefix = $prefix;
            $this->thaifirstname = $thaifirstname;
            $this->thailastname = $thailastname;
            $this->thainickname = $thainickname;
            $this->engfirstname = $engfirstname;
            $this->englastname = $englastname;
            $this->engnickname = $engnickname;
            $this->age = $age;
            $this->sex = $sex;
            $this->edu = $edu;
            $this->district = $district;
            $this->province = $province;
            $this->facebook = $facebook;
            $this->urlfacebook = $urlfacebook;
            $this->lineid = $lineid;
            $this->tel = $tel;
            $this->role = $role;
            $this->strDT = $strDT;
            
            $sql = "SELECT * FROM user WHERE username='$username'";
            $sql = $this->conn->query($sql);

            if($sql->num_rows > 0){
                echo "usedusername";
            } elseif($sql->num_rows == 0) {
                $sql = "SELECT * FROM user WHERE email='$email'";
                $sql = $this->conn->query($sql);
                if($sql->num_rows > 0){
                    echo "usedemail";
                } elseif($sql->num_rows == 0) {
                    $sql = "INSERT INTO user (username, realname, password, email, prefix, 
                    thaifirstname, thailastname, thainickname, engfirstname, englastname, engnickname, 
                    age, sex, education, district, province, facebook, urlfacebook, lineid, tel, role, lastlogin) VALUES ('$username', '$realname', '$password', '$email', '$prefix', '$thaifirstname', '$thailastname'
                    , '$thainickname', '$engfirstname', '$englastname', '$engnickname', '$age', '$sex', '$edu', '$district'
                    , '$province', '$facebook', '$urlfacebook', '$lineid', '$tel', '$role', '$strDT')";
                    $sql = $this->conn->query($sql);

                    $test = $username . "/" . $realname . "/" . $password . "/" . $email . "/" . $prefix
                     . "/" . $thaifirstname . "/" . $thailastname . "/" . $thainickname . "/" . $engfirstname . "/" . $englastname
                     . "/" . $engnickname . "/" . $age . "/" . $sex . "/" . $edu . "/" . $district . "/" . $province . "/" . $facebook . "/" . $urlfacebook
                     . "/" . $lineid . "/" . $tel . "/" . $role . "/" . $strDT;

                    $sql = "SELECT * FROM user WHERE username='$username'";
                    $sql = $this->conn->query($sql);
                    $sql = $sql->fetch_assoc();
    
                    $_SESSION['id'] = $sql['ID'];
                    $_SESSION['username'] = $sql['username'];
                    $_SESSION['realname'] = $sql['realname'];
                    $_SESSION['prefix'] = $sql['prefix'];
                    $_SESSION['email'] = $sql['email'];
                    $_SESSION['thaifirstname'] = $sql['thaifirstname'];
                    $_SESSION['thailastname'] = $sql['thailastname'];
                    $_SESSION['thainickname'] = $sql['thainickname'];
                    $_SESSION['engfirstname'] = $sql['engfirstname'];
                    $_SESSION['englastname'] = $sql['englastname'];
                    $_SESSION['engnickname'] = $sql['engnickname'];
                    $_SESSION['age'] = $sql['age'];
                    $_SESSION['sex'] = $sql['sex'];
                    $_SESSION['education'] = $sql['education'];
                    $_SESSION['district'] = $sql['district'];
                    $_SESSION['province'] = $sql['province'];
                    $_SESSION['facebook'] = $sql['facebook'];
                    $_SESSION['urlfacebook'] = $sql['urlfacebook'];
                    $_SESSION['lineid'] = $sql['lineid'];
                    $_SESSION['tel'] = $sql['tel'];
                    $_SESSION['role'] = $sql['role'];
                    $_SESSION['verification'] = $sql['verification'];
                    $_SESSION['image'] = null;
    
                    echo "success";
                } else {
                    echo "Failed ! sth worong";
                }
            } else {
                echo "Failed ! sth worong";
            }

        }

        public function editprofile(int $userid, string $email, string $prefix, string $thaifirstname
        , string $thailastname, string $thainickname, string $engfirstname, string $englastname
        , string $engnickname, string $age, string $sex, string $edu, string $district
        , string $province, string $facebook, string $urlfacebook
        , string $lineid, string $tel){

            $this->userid = $userid;
            $this->email = $email;
            $this->prefix = $prefix;
            $this->thaifirstname = $thaifirstname;
            $this->thailastname = $thailastname;
            $this->thainickname = $thainickname;
            $this->engfirstname = $engfirstname;
            $this->englastname = $englastname;
            $this->engnickname = $engnickname;
            $this->age = $age;
            $this->sex = $sex;
            $this->edu = $edu;
            $this->district = $district;
            $this->province = $province;
            $this->facebook = $facebook;
            $this->urlfacebook = $urlfacebook;
            $this->lineid = $lineid;
            $this->tel = $tel;

            $sql = "UPDATE user SET email='$email', prefix='$prefix', thaifirstname='$thaifirstname', thailastname='$thailastname'
            , thainickname='$thainickname', engfirstname='$engfirstname', englastname='$englastname', engnickname='$engnickname'
            , age='$age', sex='$sex', education='$edu', district='$district', province='$province', facebook='$facebook'
            , urlfacebook='$urlfacebook', lineid='$lineid', tel='$tel' WHERE ID='$userid'";
            $sql = $this->conn->query($sql);

            $_SESSION['prefix'] = $prefix;
            $_SESSION['email'] = $email;
            $_SESSION['thaifirstname'] = $thaifirstname;
            $_SESSION['thailastname'] = $thailastname;
            $_SESSION['thainickname'] = $thainickname;
            $_SESSION['engfirstname'] = $engfirstname;
            $_SESSION['englastname'] = $englastname;
            $_SESSION['engnickname'] = $engnickname;
            $_SESSION['age'] = $age;
            $_SESSION['sex'] = $sex;
            $_SESSION['education'] = $edu;
            $_SESSION['district'] = $district;
            $_SESSION['province'] = $province;
            $_SESSION['facebook'] = $facebook;
            $_SESSION['urlfacebook'] = $urlfacebook;
            $_SESSION['lineid'] = $lineid;
            $_SESSION['tel'] = $tel;

            echo "success";
        }
        public function changepassword(int $userid, string $oldpassword, string $newpassword){
            $this->userid = $userid;
            $this->oldpassword = $oldpassword;
            $this->newpassword = $newpassword;

            $sql = "SELECT password FROM user WHERE ID='$userid'";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_assoc();
            $checkpass = $sql['password'];

            if($oldpassword == $checkpass){
                $sql = "UPDATE user SET password='$newpassword' WHERE ID='$userid'";
                $sql = $this->conn->query($sql);
                echo "success";
            } else {
                echo "oldpassnotmatch";
            }
        }
        public function adminchangepassword(int $userid, string $newpass){
            $this->userid = $userid;
            $this->newpass = $newpass;

            $sql = "UPDATE user SET password='$newpass' WHERE ID='$userid'";
            $sql = $this->conn->query($sql);
            echo "success";
        }


    }
?>