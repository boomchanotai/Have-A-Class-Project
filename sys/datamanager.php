<?php

    include_once "engine.php";
    
    class datamanager{

        public function __construct($conn){
            $this->conn = $conn;
        }
        // user info
        public function getName(int $userid){
            $this->userid = $userid;

            $sql = "SELECT * FROM user WHERE ID='" . $userid . "'";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_assoc();
            echo $sql['thaifirstname'] . " " . $sql['thailastname'];
        }
        public function getData(int $id){
            $this->id = $id;

            $sql = "SELECT * FROM user WHERE ID='$id'";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_assoc();
            return $sql;
        }



        // getdata
        public function reporttypedata(int $type){
            $this->type = $type;
            $sql = "SELECT Name FROM reporttype WHERE ID='" . $type . "'";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_assoc();
            echo $sql['Name'];
        }
        public function reportstatus(int $status){
            $this->status = $status;
            
            if($status == "0"){
                echo "Unsolved";
            } else {
                echo "Solved";
            }
        }
        public function prefixdata(int $prefix){
            $this->prefix = $prefix;

            $sql = "SELECT Name FROM prefix WHERE ID='" . $prefix . "'";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_assoc();
            echo $sql['Name'];
        }
        public function engprefixdata(int $prefix){
            $this->prefix = $prefix;

            $sql = "SELECT * FROM prefix WHERE ID='" . $prefix . "'";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_assoc();
            echo $sql['engName'];
        }
        public function genderdata(int $gender){
            $this->gender = $gender;

            $sql = "SELECT Name FROM gender WHERE ID='" . $gender . "'";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_assoc();
            echo $sql['Name'];
        }
        public function educationdata(int $edu){
            $this->edu = $edu;

            $sql = "SELECT Name FROM education WHERE ID='" . $edu . "'";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_assoc();
            echo $sql['Name'];
        }
        public function provincedata(int $province){
            $this->province = $province;

            $sql = "SELECT Name FROM province WHERE ID='" . $province . "'";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_assoc();
            echo $sql['Name'];
        }
        public function roledata(int $role){
            $this->role = $role;

            $sql = "SELECT Name FROM role WHERE ID='" . $role . "'";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_assoc();
            echo $sql['Name'];
        }
        public function callprefix(){
            $sql = "SELECT * FROM prefix";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_all();
            return $sql;
        }
        public function callgender(){
            $sql = "SELECT * FROM gender";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_all();
            return $sql;
        }
        public function calledu(){
            $sql = "SELECT * FROM education";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_all();
            return $sql;
        }
        public function callprovince(){
            $sql = "SELECT * FROM province";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_all();
            return $sql;
        }
        public function callrole(){
            $sql = "SELECT * FROM role WHERE ID > 2";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_all();
            return $sql;
        }
        public function callproblemtype(){
            $sql = "SELECT * FROM reporttype";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_all();
            return $sql;
        }
        public function callpublishtutor(int $start, int $per){
            $this->start = $start;
            $this->per = $per;

            $sql = "SELECT * FROM tutorpublish WHERE status>0 ORDER BY status DESC,ID DESC LIMIT {$start},{$per}";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_all();
            return $sql;
        }
        public function callpublishtutordemo(){
            $sql = "SELECT * FROM tutorpublish WHERE status>0 ORDER BY status DESC,ID DESC LIMIT 8";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_all();
            return $sql;
        }
        public function checkhaspostyet(int $userid){
            $this->$userid = $userid;
            $sql = "SELECT * FROM tutorpublish WHERE user='$userid'";
            $sql = $this->conn->query($sql);
            return $sql;
        }
        public function checkhasreportyet(int $userid){
            $this->$userid = $userid;
            $sql = "SELECT * FROM ticket WHERE userid='$userid'";
            $sql = $this->conn->query($sql);
            return $sql;
        }


        // for subject
        public function callsubject(){
            $sql = "SELECT * FROM subjects";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_all();
            return $sql;
        }
        public function subjectdata(int $subjectid){
            $this->subjectid = $subjectid;

            $sql = "SELECT Name FROM subjects WHERE ID='" . $subjectid . "'";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_assoc();
            echo $sql['Name'];
        }
        public function convertsubject(string $subject){

            $this->subject = $subject;

            $sql = "SELECT * FROM subjects WHERE Name='$subject'";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_assoc();
            return $sql['ID'];
        }
        public function studiestypedata(int $typeid){
            $this->typeid = $typeid;
            $sql = "SELECT Name FROM studiestype WHERE ID='$typeid'";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_assoc();
            echo $sql['Name'];
        }
        public function callstudiestype(){

            $sql = "SELECT * FROM studiestype";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_all();
            return $sql;
        }
        function getSubjectList(){
            $sql = "SELECT MAX(ID) FROM subjects";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_all();
            echo $sql[0][0];
        }
        public function getSubjectdata(int $subjectid){
            $this->subjectid = $subjectid;

            $sql = "SELECT * FROM subjects WHERE ID='" . $subjectid . "'";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_assoc();
            echo $sql['ID'] . "." . $sql['Name'] . "." . $sql['engName'];
        }
        function getTicketTypeList(){
            $sql = "SELECT MAX(ID) FROM reporttype";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_all();
            echo $sql[0][0];
        }
        public function getTicketTypedata(int $tickettypeid){
            $this->tickettypeid = $tickettypeid;

            $sql = "SELECT * FROM reporttype WHERE ID='" . $tickettypeid . "'";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_assoc();
            echo $sql['ID'] . "." . $sql['Name'] . "." . $sql['engName'];
        }
        public function TicketTypedata(int $tickettypeid){
            $this->tickettypeid = $tickettypeid;

            $sql = "SELECT Name FROM reporttype WHERE ID='$tickettypeid'";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_assoc();
            return $sql['Name'];
        }
        function getUserList(){
            $sql = "SELECT MAX(ID) FROM user";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_all();
            echo $sql[0][0];
        }
        function getTicketList(){
            $sql = "SELECT MAX(ID) FROM ticket";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_all();
            echo $sql[0][0];
        }
        function getTicketdata(int $ticketid){
            $this->ticketid = $ticketid;

            $sql = "SELECT * FROM ticket WHERE ID='$ticketid'";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_assoc();
            echo $sql['ID'] . "." . $this->TicketTypedata($sql['type']) . "." . $sql['subject'] . "." . $sql['information'] . "." . $sql['reply'] . "." . $sql['userid'] . "." . $sql['status'];
        }


    }
?>