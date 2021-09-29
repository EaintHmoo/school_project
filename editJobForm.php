i
<?php 
        include_once 'masterlayouts/admin_header.php';
        include_once 'controller/job_controller.php';

        if(empty($_SESSION['email']))
        {
            header("location:login.php");
        }
        else
        {
            $email=$_SESSION['email'];
        }
        $id=$_GET['id'];
        $job = new JobController();
        $result = $job->showJob($id);

        $name =$result[0]['name'];
        $father_name = $result[0]['father_name'];
        $mother_name = $result[0]['mother_name'];
        $nrc=$result[0]['nrc'];
        $race=$result[0]['race'];
        $religion=$result[0]['religion'];
        $bdate=$result[0]['birthdate'];
        $age=$result[0]['age'];
        $married=$result[0]['married'];
        $education=$result[0]['education'];
        $year=$result[0]['year'];
        $course=$result[0]['course'];
        $job_experience=$result[0]['job_experience'];
        $phone =$result[0]['phone'];
        $email = $result[0]['email'];
        $address = $result[0]['address'];
        $yourImg = "";
        $eduImg = "";
        
        if(isset($_POST["submit"]))
        {
        if(empty($_POST['name']))
        {
            $name_error = "!!!နာမည်ဖြည့်ပါ";
        }
        else{
            $name = $_POST['name'];
        }
        if(empty($_POST['father_name']))
        {
            $father_name_error = "!!!ဖခင်နာမည်ဖြည့်ပါ";
        }
        else{
            $father_name = $_POST['father_name'];
        }
        if(empty($_POST['mother_name']))
        {
            $mother_name_error = "!!!မိခင်နာမည်ဖြည့်ပါ";
        }
        else{
            $mother_name = $_POST['mother_name'];
        }
        if(empty($_POST['nrc']))
        {
            $nrc_error = "!!!မှတ်ပုံတင်နံပါတ်ဖြည့်ပါ";
        }
        else{
            $nrc = $_POST['nrc'];
        }
        if(empty($_POST['race']))
        {
            $race_error = "!!!လူမျိုး ဖြည့်ပါ";
        }
        else{
            $race = $_POST['race'];
        }
        if(empty($_POST['religion']))
        {
            $religion_error = "!!!ကိုးကွယ်သည့်ဘာသာ ဖြည့်ပါ";
        }
        else{
            $religion = $_POST['religion'];
        }
        if(empty($_POST['bdate']))
        {
            $bdate_error = "!!!မွေးနေ့ ဖြည့်ပါ";
        }
        else{
            $bdate = $_POST['bdate'];
        }
        if(empty($_POST['age']))
        {
            $age_error = "!!!မိမိအသက်ကို ဖြည့်ပါ";
        }
        else{
            $age = $_POST['age'];
        }
        if(empty($_POST['education']))
        {
            $education_error = "!!!မိမိရရှိခဲ့သောဘွဲ့ကို ဖြည့်ပါ";
        }
        else{
            $education = $_POST['education'];
        }
        if(empty($_POST['year']))
        {
            $year_error = "!!!တက္ကသိုလ်၀င်တန်းစာမေးပွဲအောင်နှစ် ဖြည့်ပါ eg.(2013-2014)";
        }
        else{
            $year = $_POST['year'];
        }
        if(empty($_POST['phone']))
        {
            $phone_error = "!!!ဖုန်းနံပါတ်ဖြည့်ပါ";
        }
        else{
            $phone = $_POST['phone'];
        }
        if(empty($_POST['address']))
        {
            $address_error = "!!!လိပ်စာဖြည့်ပါ";
        }
        else{
            $address = $_POST['address'];
        }
        if(empty($_FILES['yourImg']['name']))
    {
        $yourImg = $result[0]['photo_dir'];
    }
    else{
        if(isset($_FILES['yourImg']) && $_FILES['yourImg']["error"] == 0){
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
            $filename = time(). '_' .$_FILES['yourImg']["name"];
            $filetype = $input["type"];
        
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!array_key_exists($ext, $allowed)){
                return false;
            }else{
                    if(move_uploaded_file($_FILES['yourImg']["tmp_name"], "upload/jobapply/" . $filename)){
                        $yourImg = $filename;                          
                    }else{
                        $yourImg_error="ပုံမှားယွင်းနေပါသည်။";
                    }
            }
                
        } else{
            $yourImg_error="jpg,jpeg,png file များသာလက်ခံပါသည်။";
        }
    }
    if(empty($_FILES['eduImg']['name']))
    {
        $eduImg = $result[0]['certificate_dir'];
    }
    else{
        if(isset($_FILES['eduImg']) && $_FILES['eduImg']["error"] == 0){
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
            $filename = time(). '_' .$_FILES['eduImg']["name"];
            $filetype = $input["type"];
        
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!array_key_exists($ext, $allowed)){
                return false;
            }else{
                    if(move_uploaded_file($_FILES['eduImg']["tmp_name"], "upload/jobapply/" . $filename)){
                        $eduImg = $filename;                          
                    }else{
                        $eduImg_error="ပုံမှားယွင်းနေပါသည်။";
                    }
            }
                
        } else{
            $eduImg_error="jpg,jpeg,png file များသာလက်ခံပါသည်။";
        }
    }

        $name =$_POST['name'];
        $father_name = $_POST['father_name'];
        $mother_name = $_POST['mother_name'];
        $nrc=$_POST['nrc'];
        $race=$_POST['race'];
        $religion=$_POST['religion'];
        $bdate=$_POST['bdate'];
        $age=$_POST['age'];
        $married=$_POST['married'];
        $education=$_POST['education'];
        $year=$_POST['year'];
        $course=$_POST['course'];
        $job_experience=$_POST['job_experience'];
        $phone =$_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        
        if(!empty($name) && !empty($father_name) && !empty($mother_name) && !empty($nrc) && !empty($race) && !empty($religion)&& !empty($bdate) && !empty($age) && !empty($married) && !empty($education)  && !empty($year)&& !empty($phone) && !empty($address) && !empty($yourImg) && !empty($eduImg) )
        {
        $job = new JobController;
        $result = $job->editJob($id,$name,$father_name,$mother_name,$nrc,$race,$religion,$bdate,$age,$married,$education,$year,$course,$job_experience,$phone,$email,$address,$yourImg,$eduImg);
            if($result)
            {
                exit(header('location:adminJobFormIndex.php'));
            }else{
                $msg="Database Error: Failed to Update user ";
                $css_class="alert-danger";
            }
        }
        
        }
?> 
<div id="layoutSidenav">
<?php include_once 'masterlayouts/admin_sidebar.php';?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
<h1 class="h3 my-3 font-weight-normal text-center">အလုပ်လျှောက်လွှာဖောင်ပြုပြင်ခြင်း</h1>
<form method="post" enctype="multipart/form-data" class="form-signin p-3" method="post" style="border:2px solid black;padding:5px;border-radius:5px" >
                                   
<div class="row mb-3">
        <div class="col-md-3">
        <label for="name" class="form-label">အမည်</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="stu_name" value="<?php if(isset($name)) echo $name;?>" name="name">
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
        <label for="nrc" class="form-label">မှတ်ပုံတင်</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="nrc" value="<?php if(isset($nrc)) echo $nrc;?>" name="nrc" >
        <span style="color:red"> 
            <?php
            if(isset($nrc_error)){
            echo $nrc_error;
            }
            ?>
            </span>
        </div>
    </div>         
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="father_name" class="form-label">ဖခင်အမည်</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="father_name" value="<?php if(isset($father_name)) echo $father_name;?>" name="father_name" >
        <span style="color:red">
            <?php
            if(isset($father_name_error)){
            echo $father_name_error;
            }
            ?>
            </span>
        </div>        
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="mother_name" class="form-label">မိခင်အမည်</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="mother_name" value="<?php if(isset($mother_name)) echo $mother_name;?>" name="mother_name" >
        <span style="color:red">
            <?php
            if(isset($mother_name_error)){
            echo $mother_name_error;
            }
            ?>
            </span>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="race" class="form-label">လူမျိုး</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="race" value="<?php if(isset($race)) echo $race;?>" name="race" >
        <span style="color:red">
            <?php
            if(isset($race_error)){
            echo $race_error;
            }
            ?>
            </span>
        </div>       
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="religion" class="form-label">ကိုးကွယ်သည့်ဘာသာ</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="religion" value="<?php if(isset($religion)) echo $religion;?>" name="religion" >
        <span style="color:red">
            <?php
            if(isset($religion_error)){
            echo $religion_error;
            }
            ?>
        </span>
    </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="bdate" class="form-label">မွေးနေ့</label>
        </div>
        <div class="col-md-9">
        <input type="date" class="form-control" id="bdate" value="<?php if(isset($bdate)) echo $bdate;?>" name="bdate">
        <span style="color:red">
            <?php
            if(isset($bdate_error)){
            echo $bdate_error;
            }
            ?>
        </span>
    </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="‌age" class="form-label">အသက်</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="age" value="<?php if(isset($age)) echo $age;?>" name="age" >
        <span style="color:red">
            <?php
            if(isset($age_error)){
            echo $age_error;
            }
            ?>
        </span>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="married" class="form-label">အိမ်ထောင်ရှိ/မရှိ</label>
        </div>
        <div class="col-md-9">
        <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="married" id="yes" value="yes" <?php echo ($married== 'yes') ?  "checked" : "" ;  ?>>
                <label class="form-check-label" for="yes">ရှိ</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="married" id="no" value="no" <?php echo ($married== 'no') ?  "checked" : "" ;  ?>>
            <label class="form-check-label" for="no">မရှိ</label>
        </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="education" class="form-label">ပညာအရေအချင်း</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="education" value="<?php if(isset($education)) echo $education;?>" name="education" >
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="year" class="form-label">ဆယ်တန်းအောင်သည့်ခုနှစ်</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="year" value="<?php if(isset($education)) echo $education;?>" name="year" >
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="course" class="form-label">တက်ခဲ့ဖူးသည့်သင်တန်း</label>
        </div>
        <div class="col-md-9">
        <textarea class="form-control" id="course" name="course" rows="3"><?php if(isset($course)) echo $course;?></textarea>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="job_experience" class="form-label">လုပ်ငန်းအတွေ့အကြုံ</label>
        </div>
        <div class="col-md-9">
        <textarea class="form-control" id="job_experience" name="job_experience" rows="3" ><?php if(isset($job_experience)) echo $job_experience;?></textarea>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="phone" class="form-label">ဆက်သွယ်ရန်ဖုန်းနံပါတ်</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="phone" value="<?php if(isset($phone)) echo $phone;?>" name="phone" >
        </div>       
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="email" class="form-label">Email address</label>
        </div>
        <div class="col-md-9">
        <input type="email" class="form-control" id="email" value="<?php if(isset($email)) echo $email;?>" name="email" >
        </div>        
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="address" class="form-label">နေရပ်လိပ်စာ <small>(ရပ်ကွက်/မြို့/ပြည်နယ်)</small></label>
        </div>
        <div class="col-md-9">
        <textarea class="form-control" id="address" name="address" rows="3" ><?php if(isset($address)) echo $address;?></textarea>
        <span style="color:red">
            <?php
            if(isset($address_error)){
            echo $address_error;
            }
            ?>
            </span>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="yourImg" class="form-label">ဓာတ်ပုံဖြည့်ရန်</label>
        </div>
        <div class="col-md-9">
        <img src="upload/jobapply/<?php echo $result[0]['photo_dir'];?>" class="form-control" id="yourImgDisplay"/>
        <input type="file" name="yourImg" onchange="displayImage1(this)" id="yourImg" class="form-control" style="display: none;" accept="image/*" >
            <span style="color:red">
            <?php
            if(isset($yourImg_error)){
            echo $yourImg_error;
            }
            ?>
            </span> 
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="eduImg" class="form-label">ပညာအရေအချင်းပုံဖြည့်ရန်</label>
        </div>
        <div class="col-md-9">
        <img src="upload/jobapply/<?php echo $result[0]['certificate_dir'];?>" class="form-control" id="eduImgDisplay"/>
        <input type="file" id="eduImg" onchange="displayImage2(this)" style="display: none;" name="eduImg" accept="image/*">
            <span style="color:red">
            <?php
            if(isset($eduImg_error)){
            echo $eduImg_error;
            }
            ?>
            </span>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3"></div>
        <div class="col-md-9">
        <button name="submit" class="btn btn-primary my-3 mx-1 justify-content-center" type="submit">ဖောင်တင်မည်</button>
        <a name="cancel" class="btn btn-danger my-3 mx-1 justify-content-center" href="adminJobFormIndex.php">မလုပ်တော့ပါ</a>
        </div>
    </div>

</form>
</div>
</main> 
<?php include_once 'masterlayouts/admin_footer.php';?>

            