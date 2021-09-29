
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
        
        $id=$_GET['id'];
        $gallery = new AnnounceController();
        $result = $gallery->showAnnounceOneRow($id);
    
?> 
<div id="layoutSidenav">
<?php include_once 'masterlayouts/admin_sidebar.php';?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
<h1 class="h3 my-4 font-weight-normal text-center">အကြောင်းကြားလွှာ</h1>
<form method="post" class="form-signin p-3" method="post" style="border:2px solid black;padding:5px;border-radius:5px" >
   
    <div class="row mb-3">
    <div class="col-md-3">
        <label for="title" class="form-label">Title</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="title" value="<?php if(isset($result[0]['title'])) echo $result[0]['title'];?>" name="title" disabled>
        </div>
    </div>  
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="caption" class="form-label">Date</label>
        </div>
        <div class="col-md-9">
        <input type="date" class="form-control" id="date" value="<?php if(isset($result[0]['date'])) echo $result[0]['date'];?>" name="caption" disabled>
        </div>       
    </div>       
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="description" class="form-label">Description</label>
        </div>
        <div class="col-md-9">
        <textarea class="form-control" id="description" name="description" disabled><?php if(isset($result[0]['description'])) echo $result[0]['description'];?></textarea>
        </div>        
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="photo" class="form-label">Photo</label>
        </div>
        <div class="col-md-9">
        <img src="upload/announce/<?php echo $result[0]['photo_dir'];?>" class="form-control" id="photoDisplay"/>
        </div>        
    </div>
    <div class="row mb-3">
        <div class="col-md-3"></div>
        <div class="col-md-9">
        <a name="cancel" class="btn btn-success my-3 mx-1 justify-content-center" href="adminAnnounceIndex.php">ရှေ့စာမျက်နှာဆီသို့</a>
        </div>
    </div>

</form>
</div>
</main> 
<?php include_once 'masterlayouts/admin_footer.php';?>

            