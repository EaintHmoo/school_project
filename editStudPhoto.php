
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
        $stuController = new StuPhotoController();
        $result = $stuController->showPhoto($id);
        
        $name =$result[0]['name'];
        $year = $result[0]['year'];
        $exam_no = $result[0]['exam_no'];
        $distinction = $result[0]['distinction'];
        $remark = $result[0]['remark'];
        $photo = "";
    
        if(isset($_POST["submit"]))
        {
            if(empty($_POST["name"]))
            {
                $name_error = "!!!အမည်ဖြည့်ပါ";
            }
            else{
                $name = $_POST["name"];
            }
            if(empty($_POST["year"]))
            {
                $year_error = "!!!စာမေးပွဲအောင်မြင်သည့်နှစ် ဖြည့်ပါ";
            }
            else{
                $year = $_POST["year"];
            }
            if(empty($_POST["exam_no"]))
            {
                $exam_no_error = "!!!ခုံနံပါတ်ဖြည့်ပါ";
            }
            else{
                $exam_no = $_POST["name"];
            }
            if(empty($_POST["distinction"]))
            {
                $distinction_error = "!!!ဂုဏ်ထူးပါလျှင် ဖြည့်ပါ။ မပါလျှင် ရိုးရိုးဟုဖြည့်ပါ။";
            }
            else{
                $distinction = $_POST["name"];
            }
            if(empty($_FILES['photo']['name']))
            {
                $photo = $result[0]['photo_dir'];
            }
            else{
                if(isset($_FILES['photo']) && $_FILES['photo']["error"] == 0){
                    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                    $filename = time(). '_' .$_FILES['photo']["name"];
                    $filetype = $_FILES['photo']['type'];
                
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    if(!array_key_exists($ext, $allowed)){
                        return false;
                    }else{
                            if(move_uploaded_file($_FILES['photo']["tmp_name"], "upload/stuphoto/" . $filename)){
                                $photo = $filename;                          
                            }else{
                                $photo_error="ပုံမှားယွင်းနေပါသည်။";
                            }
                    }
                        
                } else{
                    $photo_error="jpg,jpeg,png file များသာလက်ခံပါသည်။";
                }
            }        
        
            $name =$_POST['name'];
            $year = $_POST['year'];
            $exam_no = $_POST['exam_no'];
            $distinction = $_POST['distinction'];
            $remark = $_POST['remark'];
        if(!empty($name) && !empty($year)&&!empty($exam_no) && !empty($distinction)&& !empty($photo))
        {
            $result = $stuController->editPhoto($id,$name,$year,$exam_no,$distinction,$remark,$photo);
            if($result)
            {
              exit(header('location:adminStudIndex.php'));
            }
        }
        
        }
?> 
<div id="layoutSidenav">
<?php include_once 'masterlayouts/admin_sidebar.php';?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
<h1 class="h3 my-4 font-weight-normal text-center">ကျောင်းသားဟောင်းပုံပြုပြင်ခြင်း</h1>
<form method="post" enctype="multipart/form-data" class="form-signin p-3" method="post" style="border:2px solid black;padding:5px;border-radius:5px" >
   
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="name" class="form-label">အမည်</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="name" value="<?php if(isset($name)) echo $name;?>" name="name">
        <span style="color:red">
            <?php
            if(isset($name_error)){
            echo $name_error;
            }
            ?>
            </span>
        </div>
    </div>  
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="year" class="form-label">စာမေးပွဲအောင်မြင်သည့်နှစ်</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="year" value="<?php if(isset($year)) echo $year;?>" name="year">
        <span style="color:red">
            <?php
            if(isset($year_error)){
            echo $year_error;
            }
            ?>
            </span>
        </div>       
    </div>       
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="exam_no" class="form-label">ခုံနံပါတ်</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="exam_no" value="<?php if(isset($exam_no)) echo $exam_no;?>" name="exam_no">
        <span style="color:red">
            <?php
            if(isset($exam_no_error)){
            echo $exam_no_error;
            }
            ?>
            </span>
        </div>       
    </div> 
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="distinction" class="form-label">ဂုဏ်ထူး <small>(မပါလျှင် "ရိုးရိုး"ဟုဖြည့်ပါ)</small></label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="distinction" value="<?php if(isset($distinction)) echo $distinction;?>" name="distinction">
        <span style="color:red">
            <?php
            if(isset($distinction_error)){
            echo $distinction_error;
            }
            ?>
            </span>
        </div>       
    </div> 
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="remark" class="form-label">Remark</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="remark" value="<?php if(isset($remark)) echo $remark;?>" name="remark">
        <div class="form-text text-danger"><small>မဖြည့်လည်းရပါသည်</small></div>
        </div>        
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="photo" class="form-label">Photo</label>
        </div>
        <div class="col-md-9">
        <img src="upload/stuphoto/<?php echo $result[0]['photo_dir'];?>" class="form-control" id="editStudPhotoDisplay"/>
        <input type="file" id="editStudPhoto" onchange="displayEditStudPhoto(this)" style="display: none;"  name="photo" accept="image/*">
            
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
        <button name="submit" class="btn btn-primary my-3 mx-1 justify-content-center" type="submit">Update</button>
        <a name="cancel" class="btn btn-danger my-3 mx-1 justify-content-center" href="adminStudIndex.php">Cancel</a>
        </div>
    </div>

</form>
</div>
</main> 
<?php include_once 'masterlayouts/admin_footer.php';?>

            