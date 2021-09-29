
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
        
        $id=$_GET['id'];
        $gallery = new galleryController();
        $result = $gallery->showGallery($id);
        print_r($result);
    
?> 
<div id="layoutSidenav">
<?php include_once 'masterlayouts/admin_sidebar.php';?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
<h1 class="h3 my-4 font-weight-normal text-center">Activity ပုံ</h1>
<form method="post" class="form-signin p-3" method="post" style="border:2px solid black;padding:5px;border-radius:5px" >
   
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="type" class="form-label">Type</label>
        </div>
        <div class="col-md-9">
        <?php

        $selection = array('Donation','Ceremony','Sport','Trip','Bulilding','Other');
        echo '<select class="form-select" name="type" disabled>';

        foreach ($selection as $selection) {
            $selected = (strtolower($result[0]['type']) == strtolower($selection)) ? "selected" : "";
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
        <input type="text" class="form-control" id="caption" value="<?php if(isset($result[0]['caption'])) echo $result[0]['caption'];?>" name="caption" disabled>
        </div>       
    </div>       
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="description" class="form-label">Description</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="description" value="<?php if(isset($result[0]['description'])) echo $result[0]['description'];?>" name="description" disabled>
        </div>        
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="photo" class="form-label">Photo</label>
        </div>
        <div class="col-md-9">
        <img src="upload/gallery/<?php echo $result[0]['photo_dir'];?>" class="form-control" id="photoDisplay"/>
        </div>        
    </div>
    <div class="row mb-3">
        <div class="col-md-3"></div>
        <div class="col-md-9">
        <a name="cancel" class="btn btn-success my-3 mx-1 justify-content-center" href="adminActivitiesIndex.php">ရှေ့စာမျက်နှာဆီသို့</a>
        </div>
    </div>

</form>
</div>
</main> 
<?php include_once 'masterlayouts/admin_footer.php';?>

            