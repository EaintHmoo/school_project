
<?php 
        include_once 'masterlayouts/admin_header.php';
        include_once 'controller/student_photo_controller.php';
        if(empty($_SESSION['email']))
        {
            header("location:login.php");
        }
        else
        {
            $email=$_SESSION['email'];
        }
        
        $id=$_GET['id'];
        $studphoto = new StuPhotoController();
        $result = $studphoto->showPhoto($id);
    
?> 
<div id="layoutSidenav">
<?php include_once 'masterlayouts/admin_sidebar.php';?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
<h1 class="h3 my-4 font-weight-normal text-center">ကျောင်းသားဟောင်းပုံ</h1>
<form method="post" class="form-signin p-3" method="post" style="border:2px solid black;padding:5px;border-radius:5px" >
   
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="name" class="form-label">Name</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="name" value="<?php if(isset($result[0]['name'])) echo $result[0]['name'];?>" name="name" disabled>
        </div>
    </div>  
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="year" class="form-label">Year</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="year" value="<?php if(isset($result[0]['year'])) echo $result[0]['year'];?>" name="year" disabled>
        </div>       
    </div>       
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="exam_no" class="form-label">Exam_no</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="exam_no" value="<?php if(isset($result[0]['exam_no'])) echo $result[0]['exam_no'];?>" name="exam_no" disabled>
        </div>        
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="distinction" class="form-label">Distinction</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="distinction" value="<?php if(isset($result[0]['distinction'])) echo $result[0]['distinction'];?>" name="distinction" disabled>
        </div>        
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="remark" class="form-label">Remark</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="remark" value="<?php if(isset($result[0]['remark'])) echo $result[0]['remark'];?>" name="remark" disabled>
        </div>        
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="photo" class="form-label">Photo</label>
        </div>
        <div class="col-md-9">
        <img src="upload/stuphoto/<?php echo $result[0]['photo_dir'];?>" class="form-control" id="photoDisplay"/>
        </div>        
    </div>
    <div class="row mb-3">
        <div class="col-md-3"></div>
        <div class="col-md-9">
        <a name="cancel" class="btn btn-success my-3 mx-1 justify-content-center" href="adminStudIndex.php">ရှေ့စာမျက်နှာဆီသို့</a>
        </div>
    </div>

</form>
</div>
</main> 
<?php include_once 'masterlayouts/admin_footer.php';?>

            