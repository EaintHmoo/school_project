<?php
 include_once 'masterlayouts/navbar.php';
 include_once 'controller/job_controller.php';
 
session_start();

$msg="";
$css_class="";


$name ="";
$father_name = "";
$mother_name = "";
$nrc="";
$race="";
$religion="";
$bdate="";
$age="";
$married='yes';
$education="";
$year="";
$course="";
$job_experience="";
$phone ="";
$email = "";
$address = "";
$yourImg = array();
$eduImg = array();
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
    $yourImg_error = "!!!မိမိဓာတ်ပုံဖြည့်ပါ";
}
else{
    $yourImg = $_FILES['yourImg'];
}
if(empty($_FILES['eduImg']['name']))
{
    $eduImg_error = "!!!ပညာအရေအချင်း certificate ဖြည့်ပါ";
}
else{
    $eduImg = $_FILES['eduImg'];
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
$yourImg = $_FILES['yourImg'];
$eduImg = $_FILES['eduImg'];

if(!empty($name) && !empty($father_name) && !empty($mother_name) && !empty($nrc) && !empty($race) && !empty($religion)&& !empty($bdate) && !empty($age) && !empty($married) && !empty($education)  && !empty($year)&& !empty($phone) && !empty($address) && !empty($yourImg) && !empty($eduImg) )
{
  $job = new JobController;
  $result = $job->addJob($name,$father_name,$mother_name,$nrc,$race,$religion,$bdate,$age,$married,$education,$year,$course,$job_experience,$phone,$email,$address,$yourImg,$eduImg);
  if($result)
  {
    $msg="Image Uploaded successfully and saved to database";
    $css_class="alert-success";
    $name ="";
    $father_name = "";
    $mother_name = "";
    $nrc="";
    $race="";
    $religion="";
    $bdate="";
    $age="";
    $married='yes';
    $education="";
    $year="";
    $course="";
    $job_experience="";
    $phone ="";
    $email = "";
    $address = "";
    $yourImg = array();
    $eduImg = array();
  }else{
    $msg="Database Error: Failed to save user ";
    $css_class="alert-danger";
  }
}

}
 ?>

  <!-- Page Header Start -->
  <div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Admission</h2>
            </div>
            <div class="col-12">
                <a href="">Admission</a>
                <a href="">Job Application</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!--Student Enroll Form Start-->
<div class="container my-5">
  <div class="row">
    <div class="col-md-3">
      <div class="right">
        <div class="rectangle">
          <h4>ADMISSION</h4>
        </div>
        <div class="hr">
          <div class="admission-link">
            <a href="fee.php">FEE</a><br>
            <a href="student_enrollment.php">STUDENT ENROLL</a><br>
            <a href="job_application.php">JOB APPLICAION</a><br>
          </div>
        </div>
      </div>      
    </div>
    <div class="col-md-9">
      <h2>Job Application Form</h2>
      <!--Show Message to User-->
      <?php if(!empty($msg)):?>
      <div class="alert <?php echo $css_class;?> wd">
      <?php echo $msg;?>
      </div>
      <?php endif; ?>
      <div class="stu-form">
        <!--Form-->
        <form method="post" action="job_application.php" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="name" class="form-label">အမည်</label>
            <input type="text" class="form-control" value="<?php if(isset($name)) echo $name;?>" id="name" name="name">
            <span style="color:red">
            <?php
            if(isset($name_error)){
            echo $name_error;
            }
            ?>
            </span>
          </div>
          <div class="mb-3">
            <label for="nrc" class="form-label">မှတ်ပုံတင်</label>
            <input type="text" class="form-control" value="<?php if(isset($nrc)) echo $nrc;?>" id="nrc" name="nrc">
            <span style="color:red"> 
            <?php
            if(isset($nrc_error)){
            echo $nrc_error;
            }
            ?>
            </span>
          </div>
          <div class="mb-3">
            <label for="father_name" class="form-label">ဖခင်အမည်</label>
            <input type="text" class="form-control" value="<?php if(isset($father_name)) echo $father_name;?>" id="father_name" name="father_name">
            <span style="color:red">
            <?php
            if(isset($father_name_error)){
            echo $father_name_error;
            }
            ?>
            </span>
          </div>
          <div class="mb-3">
            <label for="mother_name" class="form-label">မိခင်အမည်</label>
            <input type="text" class="form-control" value="<?php if(isset($mother_name)) echo $mother_name;?>" id="mother_name" name="mother_name">
            <span style="color:red">
            <?php
            if(isset($mother_name_error)){
            echo $mother_name_error;
            }
            ?>
            </span>
          </div>
          <div class="mb-3">
            <label for="race" class="form-label">လူမျိုး</label>
            <input type="text" class="form-control" value="<?php if(isset($race)) echo $race;?>" id="race" name="race">
            <span style="color:red">
            <?php
            if(isset($race_error)){
            echo $race_error;
            }
            ?>
            </span>
          </div>
          <div class="mb-3">
            <label for="religion" class="form-label">ကိုးကွယ်သည့်ဘာသာ</label>
            <input type="text" class="form-control" id="religion" value="<?php if(isset($religion)) echo $religion;?>" name="religion">
            <span style="color:red">
            <?php
            if(isset($religion_error)){
            echo $religion_error;
            }
            ?>
            </span>
          </div>
          <div class="mb-3">
            <label for="bdate" class="form-label">မွေးနေ့</label>
            <input type="date" class="form-control" value="<?php if(isset($bdate)) echo $bdate;?>" id="bdate" name="bdate">
            <span style="color:red">
            <?php
            if(isset($bdate_error)){
            echo $bdate_error;
            }
            ?>
            </span>
          </div>
          <div class="mb-3">
            <label for="‌age" class="form-label">အသက်</label>
            <input type="text" class="form-control" value="<?php if(isset($age)) echo $age;?>" id="age" name="age">
            <span style="color:red">
            <?php
            if(isset($age_error)){
            echo $age_error;
            }
            ?>
            </span>
          </div>
          <div class="mb-3">
            <label for="married" class="form-label">အိမ်ထောင်ရှိ/မရှိ</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="married" id="yes" value="yes" <?php echo ($married== 'yes') ?  "checked" : "" ;  ?>>
                <label class="form-check-label" for="yes">ရှိ</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="married" id="no" value="no" <?php echo ($married== 'no') ?  "checked" : "" ;  ?>>
                <label class="form-check-label" for="no">မရှိ</label>
              </div>
          </div>
          <div class="mb-3">
            <label for="education" class="form-label">ပညာအရေအချင်း</label>
            <input type="text" class="form-control" id="education" name="education" value="<?php if(isset($education)) echo $education;?>">
            <span style="color:red">
            <?php
            if(isset($education_error)){
            echo $education_error;
            }
            ?>
            </span>
          </div>
          <div class="mb-3">
            <label for="year" class="form-label">ဆယ်တန်းအောင်သည့်ခုနှစ်</label>
            <input type="text" class="form-control" value="<?php if(isset($year)) echo $year;?>" id="year" name="year">
            <span style="color:red">
            <?php
            if(isset($year_error)){
            echo $year_error;
            }
            ?>
            </span>
          </div>
          <div class="mb-3">
            <label for="course" class="form-label">တက်ခဲ့ဖူးသည့်သင်တန်း</label>
            <textarea class="form-control" id="course" name="course" rows="3"><?php if(isset($course)) echo $course;?></textarea>
            <div class="form-text message">မဖြည့်လည်းရပါသည်</div>
          </div>
          <div class="mb-3">
            <label for="job_experience" class="form-label">လုပ်ငန်းအတွေ့အကြုံ</label>
            <textarea class="form-control" id="job_experience" name="job_experience" rows="3"><?php if(isset($job_experience)) echo $job_experience;?></textarea>
            <div class="form-text message">မဖြည့်လည်းရပါသည်</div>
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">ဆက်သွယ်ရန်ဖုန်းနံပါတ်</label>
            <input type="text" class="form-control" value="<?php if(isset($phone)) echo $phone;?>" id="phone" name="phone">
            <span style="color:red">
            <?php
            if(isset($phone_error)){
            echo $phone_error;
            }
            ?>
            </span>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" value="<?php if(isset($email)) echo $email;?>" id="email" name="email">
            <div class="form-text message">မဖြည့်လည်းရပါသည်</div>
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">နေရပ်လိပ်စာ <small>(ရပ်ကွက်/မြို့/ပြည်နယ်)</small></label>
            <textarea class="form-control" id="address" name="address" rows="3"><?php if(isset($address)) echo $address;?></textarea>
            <span style="color:red">
            <?php
            if(isset($address_error)){
            echo $address_error;
            }
            ?>
            </span>
          </div>
          <div class="mb-3">
            <label for="yourImg" class="form-label">ဓာတ်ပုံဖြည့်ရန်</label>
            <img src="img/placeholder2.png" onclick="triggerClick1()" class="form-control" id="yourImgDisplay"/>
            <input type="file" name="yourImg" onchange="displayImage1(this)" id="yourImg" class="form-control" style="display: none;" accept="image/*" >
            <span style="color:red">
            <?php
            if(isset($yourImg_error)){
            echo $yourImg_error;
            }
            ?>
            </span>
          </div>
          <div class="mb-3">
            <label for="eduImg" class="form-label">ပညာအရေအချင်းပုံဖြည့်ရန်</label>
            <img src="img/placeholder2.png" onclick="triggerClick2()" class="form-control" id="eduImgDisplay"/>
            <input type="file" id="eduImg" onchange="displayImage2(this)" style="display: none;" name="eduImg" accept="image/*">
            <span style="color:red">
            <?php
            if(isset($eduImg_error)){
            echo $eduImg_error;
            }
            ?>
            </span>
          </div>
          <button type="submit" name="submit" class="btn sub-btn">ဖောင်တင်မည်</button>
          <button type="cancel" class="btn can-btn">မလုပ်တော့ပါ</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!--Student Enroll Form End-->

<?php include_once 'masterlayouts/footer.php';?>