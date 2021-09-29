<?php
include_once __DIR__.'/../includes/db.php';

class Job{
    //class properties
    private $name;
    private $father_name ;
    private $mother_name ;
    private $nrc;
    private $race;
    private $religion;
    private $bdate;
    private $age;
    private $married;
    private $education;
    private $year;
    private $course;
    private $job_experience;
    private $phone;
    private $email;
    private $address;
    private $yourImg;
    private $eduImg;

    function imageViliade($input)
    {
        if(isset($input) && $input["error"] == 0){
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
            $filename = time(). '_' .$input["name"];
            $filetype = $input["type"];
        
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!array_key_exists($ext, $allowed)){
                return false;
            }else{
                    if(move_uploaded_file($input["tmp_name"], "upload/jobapply/" . $filename)){
                        return $filename;                        
                    }else{
                        return false;
                    }
            }
                
        } else{
            return false;
        }
        
    }
    
    function createJob($name,$father_name,$mother_name,$nrc,$race,$religion,$bdate,$age,$married,$education,$year,$course,$job_experience,$phone,$email,$address,$yourImg,$eduImg){
        $uimg = $this->imageViliade($yourImg);
        $eimg = $this->imageViliade($eduImg);
        if($uimg && $eimg)
        {
            //1.Connection
            $this->pdo = Database::connect();
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            //2.sql statement
            $sql="insert into job_info(name,father_name,mother_name,nrc,race,religion,birthdate,age,married,education,year,course,job_experience,phone,email,address,photo_dir,certificate_dir)values(:name,:fname,:mname,:nrc,:race,:re,:bdate,:age,:married,:edu,:yr,:course,:jexp,:ph,:email,:addr,:uimg,:eimg)";
            //3.prepare sql statement
            $statement=$this->pdo->prepare($sql);
            //4.bind parmeters into values
            $statement->bindParam(":name",$name);
            $statement->bindParam(":fname",$father_name);
            $statement->bindParam(":mname",$mother_name);
            $statement->bindParam(":nrc",$nrc);
            $statement->bindParam(":race",$race);
            $statement->bindParam(":re",$religion);
            $statement->bindParam(":bdate",$bdate);
            $statement->bindParam(":age",$age);
            $statement->bindParam(":married",$married);
            $statement->bindParam(":edu",$education);
            $statement->bindParam(":yr",$year);
            $statement->bindParam(":course",$course);
            $statement->bindParam(":jexp",$job_experience);
            $statement->bindParam(":email",$email);
            $statement->bindParam(":ph",$phone);
            $statement->bindParam(":addr",$address);
            $statement->bindParam(":uimg",$uimg);
            $statement->bindParam(":eimg",$eimg);
            //5.execute sql
            if($statement->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
        
    }

    function getJobs()
    {
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select * from job_info";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    function getJob($id)
    {
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select * from job_info where id=:id";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function deleteJobForm($id){
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="delete from job_info where id=:id";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->execute();
    }

    function updateJob($id,$name,$father_name,$mother_name,$nrc,$race,$religion,$bdate,$age,$married,$education,$year,$course,$job_experience,$phone,$email,$address,$yourImg,$eduImg){
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="update job_info set name=:name,father_name=:fname,mother_name=:mname,nrc=:nrc,race=:race,religion=:re,birthdate=:bdate,age=:age,married=:married,education=:edu,year=:yr,course=:course,job_experience=:jexp,phone=:ph,email=:email,address=:addr,photo_dir=:uimg,certificate_dir=:eimg where id=:id";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        //4.bind parmeters into values
        $statement->bindParam(":name",$name);
        $statement->bindParam(":fname",$father_name);
        $statement->bindParam(":mname",$mother_name);
        $statement->bindParam(":nrc",$nrc);
        $statement->bindParam(":race",$race);
        $statement->bindParam(":re",$religion);
        $statement->bindParam(":bdate",$bdate);
        $statement->bindParam(":age",$age);
        $statement->bindParam(":married",$married);
        $statement->bindParam(":edu",$education);
        $statement->bindParam(":yr",$year);
        $statement->bindParam(":course",$course);
        $statement->bindParam(":jexp",$job_experience);
        $statement->bindParam(":email",$email);
        $statement->bindParam(":ph",$phone);
        $statement->bindParam(":addr",$address);
        $statement->bindParam(":uimg",$yourImg);
        $statement->bindParam(":eimg",$eduImg);
        $statement->bindParam(":id",$id);
        //5.execute sql
        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
        
    }
}
?>