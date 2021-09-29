<?php
include_once __DIR__.'/../includes/db.php';

class Student{
    //class properties
    private $name;
    private $grade;
    private $father_name;
    private $mother_name;
    private $father_job;
    private $mother_job;
    private $phone;
    private $email;
    private $address;
    private $current_school;
    //class function
    function setName($name){
        $this->name=$name;
    }
    function setGrade($grade){
        $this->grade=$grade;
    }
    function setFatherName($father_name){
        $this->father_name=$father_name;
    }
    function setMotherName($mother_name){
        $this->mother_name=$mother_name;
    }
    function setFatherJob($father_job){
        $this->father_job=$father_job;
    }
    function setMotherJob($mother_job){
        $this->mother_job=$mother_job;
    }
    function setPhone($phone){
        $this->phone=$phone;
    }
    function setEmail($email){
        $this->email=$email;
    }
    function setAddress($address){
        $this->address=$address;
    }
    function setCurrentSchool($current_school){
        $this->current_school=$current_school;
    }
    //get Methods
    function getName(){
        return $this->name;
    }
    function getGrade(){
        return $this->grade;
    }
    function getFatherName(){
        return $this->father_name;
    }
    function getMotherName(){
        return $this->mother_name;
    }
    function getFatherJob(){
        return $this->father_job;
    }
    function getMotherJob(){
        return $this->mother_job;
    }
    function getPhone(){
        return $this->phone;
    }
    function getEmail(){
        return $this->email;
    }
    function getAddress(){
        return $this->address;
    }
    function getCurrentSchool(){
        return $this->current_school;
    }

    function createStudent($name,$grade,$father_name,$mother_name,$father_job,$mother_job,$phone,$email,$address,$current_school){
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="insert into student_info(name,grade,father_name,mother_name,father_job,mother_job,email,phone,address,current_school)values(:name,:grade,:fname,:mname,:fjob,:mjob,:email,:ph,:addr,:current_sc)";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        //4.bind parmeters into values
        $statement->bindParam(":name",$name);
        $statement->bindParam(":grade",$grade);
        $statement->bindParam(":fname",$father_name);
        $statement->bindParam(":mname",$mother_name);
        $statement->bindParam(":fjob",$father_job);
        $statement->bindParam(":mjob",$mother_job);
        $statement->bindParam(":email",$email);
        $statement->bindParam(":ph",$phone);
        $statement->bindParam(":addr",$address);
        $statement->bindParam(":current_sc",$current_school);
        //5.execute sql
        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function getStudents()
    {
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select * from student_info";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    function getStudent($sid)
    {
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select * from student_info where id=:sid";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":sid",$sid);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function deleteStudForm($sid){
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="delete from student_info where id=:sid";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":sid",$sid);
        $statement->execute();
    }

    function updateStudent($sid,$name,$grade,$father_name,$mother_name,$father_job,$mother_job,$phone,$email,$address,$current_school)
    {
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="update student_info set name=:name,grade=:grade,father_name=:fname,mother_name=:mname,father_job=:fjob,mother_job=:mjob,email=:email,phone=:ph,address=:addr,current_school=:current_sc where id=:sid";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        //4.bind parmeters into values
        $statement->bindParam(":name",$name);
        $statement->bindParam(":grade",$grade);
        $statement->bindParam(":fname",$father_name);
        $statement->bindParam(":mname",$mother_name);
        $statement->bindParam(":fjob",$father_job);
        $statement->bindParam(":mjob",$mother_job);
        $statement->bindParam(":email",$email);
        $statement->bindParam(":ph",$phone);
        $statement->bindParam(":addr",$address);
        $statement->bindParam(":current_sc",$current_school);
        $statement->bindParam(":sid",$sid);
        return $statement->execute();
    }
}
?>