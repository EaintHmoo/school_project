
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
        
        
        $type ="";
        $caption = "";
        $description = "";
        $photo = "";
    
        if(isset($_POST["submit"]))
        {
            if(empty($_FILES['photo']['name']))
            {
                $photo_error = "!!!ပုံဖြည့်ပါ";
            }
            else{
                $photo = $_FILES['photo'];
            }        
        
        $type = $_POST['type'];
        $caption = $_POST['caption'];
        $description = $_POST['description'];
        $photo = $_FILES['photo'];
        if(!empty($photo) && !empty($type))
        {
            $gallery = new GalleryController();
            $result = $gallery->addGallery($type,$caption,$description,$photo);
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
<h1 class="h3 my-4 font-weight-normal text-center">Activity ပုံအသစ်ထည့်ခြင်း</h1>
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
            $selected = ($type == $selection) ? "selected" : "";
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
        <input type="text" class="form-control" id="caption" value="<?php if(isset($caption)) echo $caption;?>" name="caption">
        </div>       
    </div>       
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="description" class="form-label">Description</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="description" value="<?php if(isset($description)) echo $description;?>" name="description">
        </div>        
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="photo" class="form-label">Photo</label>
        </div>
        <div class="col-md-9">
        <img src="img/placeholder2.png" class="form-control" id="photoDisplay"/>
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

            