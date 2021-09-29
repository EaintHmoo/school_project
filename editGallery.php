
<?php 
        include_once 'masterlayouts/admin_header.php';
        include_once 'controller/gallery_controller.php';
        if(empty($_SESSION['email']))
        {
            header("location:login.php");
        }
        else
        {
            $email=$_SESSION['email'];
        }
        
        $id = $_GET['id'];
        $gallery = new GalleryController();
        $result = $gallery->showGallery($id);
        $type ="";
        $caption = "";
        $description = "";
        $photo = "";
    
        if(isset($_POST["submit"]))
        {
            if(empty($_FILES['photo']['name']))
            {
                $photo = $result[0]['photo_dir'];
            }
            else{
                if(isset($_FILES['photo']) && $_FILES['photo']["error"] == 0){
                    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                    $filename = time(). '_' .$_FILES['photo']["name"];
                    $filetype = $input["type"];
                
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    if(!array_key_exists($ext, $allowed)){
                        return false;
                    }else{
                            if(move_uploaded_file($_FILES['photo']["tmp_name"], "upload/gallery/" . $filename)){
                                $photo = $filename;                          
                            }else{
                                $photo_error="ပုံမှားယွင်းနေပါသည်။";
                            }
                    }
                        
                } else{
                    $photo_error="jpg,jpeg,png file များသာလက်ခံပါသည်။";
                }
            }        
        
        $type = $_POST['type'];
        $caption = $_POST['caption'];
        $description = $_POST['description'];
        if(!empty($photo) && !empty($type))
        {
            $result = $gallery->editGallery($id,$type,$caption,$description,$photo);
            if($result)
            {
              exit(header('location:adminActivitiesIndex.php'));
            }
        }
        
        }
?> 
<div id="layoutSidenav">
<?php include_once 'masterlayouts/admin_sidebar.php';?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
<h1 class="h3 my-4 font-weight-normal text-center">Activity ပုံပြင်ဆင်ခြင်း</h1>
<form method="post" enctype="multipart/form-data" class="form-signin p-3" method="post" style="border:2px solid black;padding:5px;border-radius:5px" >
   
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="type" class="form-label">Type</label>
        </div>
        <div class="col-md-9">
        <?php

        $selection = array('Donation','Ceremony','Sport','Trip','Building','Other');
        echo '<select class="form-select" name="type" >';

        foreach ($selection as $selection) {
            $selected = ($result[0]['type'] == $selection) ? "selected" : "";
            echo '<option '.$selected.' value="'.$selection.'">'.$selection.'</option>';
        }

        echo '</select>';
        ?>
        </div>
    </div>  
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="caption" class="form-label">Caption</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="caption" value="<?php if(isset($result[0]['caption'])) echo $result[0]['caption'];?>" name="caption">
        </div>       
    </div>       
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="description" class="form-label">Description</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="description" value="<?php if(isset($result[0]['description'])) echo $result[0]['description'];?>" name="description">
        </div>        
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="photo" class="form-label">Photo</label>
        </div>
        <div class="col-md-9">
        <img src="upload/gallery/<?php echo $result[0]['photo_dir'];?>" class="form-control" id="photoDisplay"/>
        <input type="file" id="photo" onchange="displayImage3(this)" style="display: none;"  name="photo" accept="image/*">
            
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
        <a name="cancel" class="btn btn-danger my-3 mx-1 justify-content-center" href="adminActivitiesIndex.php">Cancel</a>
        </div>
    </div>

</form>
</div>
</main> 
<?php include_once 'masterlayouts/admin_footer.php';?>

            