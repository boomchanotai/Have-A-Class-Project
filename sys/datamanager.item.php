<?php

    include_once "engine.php";

    class itemmanager{

        public function __construct($conn){
            $this->conn = $conn;
        }

        public function publishtutor(int $userid, int $subject, string $topic, string $strDT, int $teachingtype, int $price, string $agestu, string $place, string $description, int $status){
            $this->userid = $userid;
            $this->subject = $subject;
            $this->topic = $topic;
            $this->strDT = $strDT;
            $this->teachingtype = $teachingtype;
            $this->price = $price;
            $this->agestu = $agestu;
            $this->place = $place;
            $this->description = $description;
            $this->status = $status;

            $sql = "SELECT * FROM tutorpublish WHERE user='$userid'";
            $sql = $this->conn->query($sql);

            if($sql->num_rows > 0){
                echo "alreadypublish";
            } elseif($sql->num_rows == 0) {
                $sql = "INSERT INTO tutorpublish (subject, topic, date, user, type, price, agestu, place, description, status) 
                VALUES ('$subject', '$topic', '$strDT', '$userid', '$teachingtype', '$price', '$agestu', '$place', '$description', '$status')";
                $sql = $this->conn->query($sql);
    
                if($sql == true){
                    echo "success";
                } else {
                    echo "something went wrong";
                }
            } else {
                echo "something went wrong";
            }
        }

        public function edittutorpublish(int $postid, int $managesubject, string $managetopic, int $managetype, int $manageprice, string $manageagestu, string $manageplace, string $managedescription, int $status){
            $this->postid = $postid;
            $this->managesubject = $managesubject;
            $this->managetopic = $managetopic;
            $this->managetype = $managetype;
            $this->manageprice = $manageprice;
            $this->manageagestu = $manageagestu;
            $this->manageplace = $manageplace;
            $this->managedescription = $managedescription;
            $this->status = $status;

            $sql = "UPDATE tutorpublish SET subject='$managesubject', topic='$managetopic'
            , type='$managetype', price='$manageprice', agestu='$manageagestu', place='$manageplace', description='$managedescription' WHERE ID='$postid'";
            $sql = $this->conn->query($sql);
    
            if($sql == true){
                echo "success";
            } else {
                echo "something went wrong";
            }
        }

        public function ticket(string $strDT, int $userid, string $reporttype, string $reportsubject, string $reportdetail){
            $this->strDT =  $strDT;
            $this->userid = $userid;
            $this->reporttype = $reporttype;
            $this->reportsubject = $reportsubject;
            $this->reportdetail = $reportdetail;
            $sql = "INSERT INTO ticket (date, type, subject, information, userid) VALUES ('$strDT', '$reporttype', '$reportsubject', '$reportdetail', '$userid')";
            $this->conn->query($sql);
            echo "success";
        }

        public function editsubject(int $subjectid, string $subjectname, string $subjectengname){
            $this->subjectid = $subjectid;
            $this->subjectname = $subjectname;
            $this->subjectengname = $subjectengname;

            $sql = "UPDATE subjects SET Name='$subjectname', engName='$subjectengname' WHERE ID='$subjectid'";
            $sql = $this->conn->query($sql);
            if($sql == true){
                echo "success";
            } else {
                echo "error";
            }
        }

        public function addsubject(string $subjectname, string $subjectengname){
            $this->subjectname = $subjectname;
            $this->subjectengname = $subjectengname;

            $sql = "INSERT INTO subjects (Name, engName) VALUES ('$subjectname', '$subjectengname')";
            $sql = $this->conn->query($sql);
            if($sql == true){
                echo "success";
            } else {
                echo "error";
            }
        }

        public function edittickkettype(int $edittickettypeid, string $edittickettype, string $edittickettypeeng){
            $this->edittickettypeid = $edittickettypeid;
            $this->edittickettype = $edittickettype;
            $this->edittickettypeeng = $edittickettypeeng;

            $sql = "UPDATE reporttype SET Name='$edittickettype', engName='$edittickettypeeng' WHERE ID='$edittickettypeid'";
            $sql = $this->conn->query($sql);
            if($sql == true){
                echo "success";
            } else {
                echo "error";
            }
        }

        public function addtickettype(string $tickettype, string $tickettypeeng){
            $this->tickettype = $tickettype;
            $this->tickettypeeng = $tickettypeeng;

            $sql = "INSERT INTO reporttype (Name, engName) VALUES ('$tickettype', '$tickettypeeng')";
            $sql = $this->conn->query($sql);
            if($sql == true){
                echo "success";
            } else {
                echo "error";
            }
        }

        public function adminreplyticket(int $ticketid, string $adminreply){
            $this->adminreply = $adminreply;
            $this->ticketid = $ticketid;

            $sql = "UPDATE ticket SET reply='$adminreply', status='1' WHERE ID='$ticketid'";
            $this->conn->query($sql);
            echo "success";
        }

    }

?>