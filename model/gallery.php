<?php
include_once __DIR__.'/../includes/db.php';

class Gallery{
    //class properties
    private $type;
    private $caption;
    private $description;
    private $photo_dir;

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
                    if(move_uploaded_file($input["tmp_name"], "upload/gallery/" . $filename)){
                        return $filename;                          
                    }else{
                        return false;
                    }
            }
                
        } else{
            return false;
        }  
    }

    function createGallery($type,$caption,$description,$photo_dir){
        $photo = $this->imageViliade($photo_dir);
        if($photo){
            //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="insert into gallery(type,caption,description,photo_dir)values(:type,:cap,:des,:dir)";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        //4.bind parmeters into values
        $statement->bindParam(":type",strtolower($type));
        $statement->bindParam(":cap",$caption);
        $statement->bindParam(":des",$description);
        $statement->bindParam(":dir",$photo);
        //5.execute sql
        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
        }
        
    }

    function getGallerys()
    {
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select * from gallery";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    function getAllActivities(){
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select * from gallery where type!=:type";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        $type="building";
        $statement->bindParam(":type",$type);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    //to get photo from gallery with type
    function getActivitePhoto($type){
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select * from gallery where type=:type";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":type",$type);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    //to get other photo
    function getOtherPhoto(){
        
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select * from gallery where type not in (:donate,:ceremo,:trip,:sport,:build)";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        $donate = "donation";
        $ceremo = "ceremony";
        $trip = "trip";
        $sport = "sport";
        $build = "building";
        $statement->bindParam(":donate",$donate);
        $statement->bindParam(":ceremo",$ceremo);
        $statement->bindParam(":trip",$trip);
        $statement->bindParam(":sport",$sport);
        $statement->bindParam(":build",$build);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    function getBuildings(){
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select * from gallery where type=:type";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        $type="building";
        $statement->bindParam(":type",$type);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    function getGallery($id)
    {
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select * from gallery where id=:id";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function deletePhotoWithId($id){
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="delete from gallery where id=:id";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->execute();
    }

    function updateGallery($id,$type,$caption,$description,$photo_dir)
    {
        //1.Connection
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="update gallery set type=:type,caption=:cap,description=:des,photo_dir=:dir where id=:id";
        //3.prepare sql statement
        $statement=$this->pdo->prepare($sql);
        //4.bind parmeters into values
        $statement->bindParam(":type",strtolower($type));
        $statement->bindParam(":cap",$caption);
        $statement->bindParam(":des",$description);
        $statement->bindParam(":dir",$photo_dir);
        $statement->bindParam(":id",$id);
        return $statement->execute();
    }
}
?>