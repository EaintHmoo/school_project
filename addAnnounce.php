
<?php 
        include_once 'masterlayouts/admin_header.php';
        include_once 'controller/announce_controller.php';
        if(empty($_SESSION['email']))
        {
            header("location:login.php");
        }
        else
        {
            $email=$_SESSION['email'];
        }
        
        
        $title ="";
        $description = "";
        $date = "";
        $photo = "";
    
        if(isset($_POST["submit"]))
        {
            if(empty($_POST["title"]))
            {
                $title_error = "!!!ပုံဖြည့်ပါ";
            }
            else{
                $title = $_POST['title'];
            }
            if(empty($_POST["date"]))
            {
                $date_error = "!!!ပုံဖြည့်ပါ";
            }
            else{
                $date = $_POST['date'];
            }
            if(empty($_POST["description"]))
            {
                $description_error = "!!!ပုံဖြည့်ပါ";
            }
            else{
                $description = $_POST['description'];
            }
            if(isset($_FILES['announcePhoto']['name']))
            {
                if(isset($_FILES['announcePhoto']) && $_FILES['announcePhoto']["error"] == 0){
                    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                    $filename = time(). '_' .$_FILES['announcePhoto']["name"];
                    $filetype = $_FILES['announcePhoto']['type'];
                
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    if(!array_key_exists($ext, $allowed)){
                        return false;
                    }else{
                            if(move_uploaded_file($_FILES['announcePhoto']["tmp_name"], "upload/announce/" . $filename)){
                                $photo = $filename;                          
                            }else{
                                $photo_error="ပုံမှားယွင်းနေပါသည်။";
                            }
                    }
                        
                } else{
                    $photo_error="jpg,jpeg,png file များသာလက်ခံပါသည်။";
                }
            }    
        
        $title = $_POST['title'];
        $date = $_POST['date'];
        $description = $_POST['description'];
        if(!empty($title) && !empty($date) && !empty($description))
        {
            $announce = new AnnounceController();
            $result = $announce->addAnnounce($title,$description,$date,$photo);
            if($result)
            {
              exit(header('location:adminAnnounceIndex.php'));
            }
        }
        
        }
?> 
<div id="layoutSidenav">
<?php include_once 'masterlayouts/admin_sidebar.php';?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
<h1 class="h3 my-4 font-weight-normal text-center">အကြောင်းကြားလွှာအသစ်ထည့်ခြင်း</h1>
<form method="post" enctype="multipart/form-data" class="form-signin p-3" method="post" style="border:2px solid black;padding:5px;border-radius:5px" >
   
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="title" class="form-label">Title</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="title" value="<?php if(isset($title)) echo $title;?>" name="title">
        <span style="color:red">
            <?php
            if(isset($title_error)){
            echo $title_error;
            }
            ?>
            </span>
        </div>
    </div>  
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="date" class="form-label">Date</label>
        </div>
        <div class="col-md-9">
        <input type="date" class="form-control" id="date" value="<?php if(isset($date)) echo $date;?>" name="date">
        <span style="color:red">
            <?php
            if(isset($date_error)){
            echo $date_error;
            }
            ?>
            </span>
        </div>       
    </div>       
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="description" class="form-label">Description</label>
        </div>
        <div class="col-md-9">
        <textarea class="form-control" id="description" name="description"><?php if(isset($description)) echo $description;?></textarea>
        <span style="color:red">
            <?php
            if(isset($description_error)){
            echo $description_error;
            }
            ?>
            </span>
        </div>        
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="photo" class="form-label">Photo</label>
        </div>
        <div class="col-md-9">
        <img src="img/placeholder2.png" class="form-control" id="announcePhotoDisplay"/>
        <input type="file" id="announcePhoto" onchange="displayAnnunceImage(this)" style="display: none;"  name="announcePhoto" accept="image/*">
            
            <span style="color:red">
            <?php
            if(isset($photo_error)){
            echo $photo_error;
            }
            ?>
            </span>
        </div>        
    </div>
    <div class="row mb-3">
        <div class="col-md-3"></div>
        <div class="col-md-9">
        <button name="submit" class="btn btn-primary my-3 mx-1 justify-content-center" type="submit">Save</button>
        <a name="cancel" class="btn btn-danger my-3 mx-1 justify-content-center" href="adminAnnounceIndex.php">Cancel</a>
        </div>
    </div>

</form>
</div>
</main> 
<?php include_once 'masterlayouts/admin_footer.php';?>

            