<?php
include_once __DIR__.'/../includes/db.php';

class Announce{
    //class properties
    private $title;
    private $description;
    private $date;
    private $photo_dir;


    function createAnnounce($title,$description,$date,$photo_dir){
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="insert into announcement(title,description,date,photo_dir)values(:title,:des,:date,:dir)";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        //4.bind parmeters into values
        $statement->bindParam(":title",$title);
        $statement->bindParam(":des",$description);
        $statement->bindParam(":date",$date);
        $statement->bindParam(":dir",$photo_dir);
        //5.execute sql
        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function getAnnounceFiveRows($start,$count)
    {
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select * from announcement limit ".$start.",".$count;
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    function getCountOfRows()
    {
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select count(id) as id from announcement";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results[0]['id'];
    }

    function getAnnounceAllRows()
    {
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select * from announcement";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    function getAnnounceOneRow($id)
    {
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select * from announcement where id=:id";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function updateAnnounce($id,$title,$description,$date,$photo_dir)
    {
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="update announcement set title=:title,description=:des,date=:date,photo_dir=:dir where id=:id";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        //4.bind parmeters into values
        $statement->bindParam(":title",$title);
        $statement->bindParam(":des",$description);
        $statement->bindParam(":date",$date);
        $statement->bindParam(":dir",$photo_dir);
        $statement->bindParam(":id",$id);
        return $statement->execute();
    }

    function deleteAnnounceRow($id){
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="delete from announcement where id=:id";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->execute();
    }
}
?>