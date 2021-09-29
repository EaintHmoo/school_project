<?php
include_once __DIR__.'/../includes/db.php';

class StuPhoto{
    //class properties
    private $name;
    private $year;
    private $exam_no;
    private $distinction;
    private $remark;
    private $photo_dir;


    function createPhoto($name,$year,$exam_no,$distinction,$remark,$photo_dir){
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="insert into student_photo(name,year,exam_no,distinction,remark,photo_dir)values(:name,:yr,:exa,:dis,:remark,:dir)";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        //4.bind parmeters into values
        $statement->bindParam(":name",$name);
        $statement->bindParam(":yr",$year);
        $statement->bindParam(":exa",$exam_no);
        $statement->bindParam(":dis",$distinction);
        $statement->bindParam(":remark",$remark);
        $statement->bindParam(":dir",$photo_dir);
         //5.execute sql
         if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function getAllPhoto(){
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select * from student_photo";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    //to get photo from gallery with type
    function getPhotoWithYr($year){
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select * from student_photo where year=:year";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":year",$year);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    //to get photo from gallery with type
    function getPhotoWithName($name){
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $passthis1 = "%".$name."%";
        //2.sql statement
        $sql="select * from student_photo where name like ? or ?";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(1,$name);
        $statement->bindParam(2,$passthis1);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    function getPhoto($sid)
    {
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select * from student_photo where id=:sid";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":sid",$sid);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getYear(){
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select distinct year from student_photo";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function deleteStudPhoto($id){
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="delete from student_photo where id=:id";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->execute();
    }

    function updatePhoto($id,$name,$year,$exam_no,$distinction,$remark,$photo_dir)
    {
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="update student_photo set name=:name,year=:yr,exam_no=:exa,distinction=:dis,remark=:remark,photo_dir=:dir where id=:id";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        //4.bind parmeters into values
        $statement->bindParam(":name",$name);
        $statement->bindParam(":yr",$year);
        $statement->bindParam(":exa",$exam_no);
        $statement->bindParam(":dis",$distinction);
        $statement->bindParam(":remark",$remark);
        $statement->bindParam(":dir",$photo_dir);
        $statement->bindParam(":id",$id);
        return $statement->execute();
    }
}
?>