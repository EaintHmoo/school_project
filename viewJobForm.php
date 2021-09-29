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

?> 
<div id="layoutSidenav">
<?php include_once 'masterlayouts/admin_sidebar.php';?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
<h1 class="h3 my-3 font-weight-normal text-center">အလုပ်လျှောက်လွှာဖောင်</h1>
<form method="post" class="form-signin p-3" method="post" style="border:2px solid black;padding:5px;border-radius:5px" >
                                   
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="name" class="form-label">အမည်</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="stu_name" value="<?php if(isset($result[0]['name'])) echo $result[0]['name'];?>" name="name" disabled>
        </div>       
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="nrc" class="form-label">မှတ်ပုံတင်</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="nrc" value="<?php if(isset($result[0]['nrc'])) echo $result[0]['nrc'];?>" name="nrc" disabled>
        </div>
    </div>         
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="father_name" class="form-label">ဖခင်အမည်</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="father_name" value="<?php if(isset($result[0]['father_name'])) echo $result[0]['father_name'];?>" name="father_name" disabled>
        </div>        
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="mother_name" class="form-label">မိခင်အမည်</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="mother_name" value="<?php if(isset($result[0]['mother_name'])) echo $result[0]['mother_name'];?>" name="mother_name" disabled>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="race" class="form-label">လူမျိုး</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="race" value="<?php if(isset($result[0]['race'])) echo $result[0]['race'];?>" name="race" disabled>
        </div>       
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="religion" class="form-label">ကိုးကွယ်သည့်ဘာသာ</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="religion" value="<?php if(isset($result[0]['religion'])) echo $result[0]['religion'];?>" name="religion" disabled>
    </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="bdate" class="form-label">မွေးနေ့</label>
        </div>
        <div class="col-md-9">
        <input type="date" class="form-control" id="date" value="<?php if(isset($result[0]['birthdate'])) echo $result[0]['birthdate'];?>" name="date" disabled>
    </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="‌age" class="form-label">အသက်</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="age" value="<?php if(isset($result[0]['age'])) echo $result[0]['age'];?>" name="age" disabled>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="married" class="form-label">အိမ်ထောင်ရှိ/မရှိ</label>
        </div>
        <div class="col-md-9">
        <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="married" id="yes" value="yes" <?php echo ($result[0]['married']== 'yes') ?  "checked" : "" ;  ?>>
                <label class="form-check-label" for="yes">ရှိ</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="married" id="no" value="no" <?php echo ($result[0]['married']== 'no') ?  "checked" : "" ;  ?>>
            <label class="form-check-label" for="no">မရှိ</label>
        </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="education" class="form-label">ပညာအရေအချင်း</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="education" value="<?php if(isset($result[0]['education'])) echo $result[0]['education'];?>" name="education" disabled>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="year" class="form-label">ဆယ်တန်းအောင်သည့်ခုနှစ်</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="year" value="<?php if(isset($result[0]['year'])) echo $result[0]['year'];?>" name="year" disabled>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="course" class="form-label">တက်ခဲ့ဖူးသည့်သင်တန်း</label>
        </div>
        <div class="col-md-9">
        <textarea class="form-control" id="course" name="course" rows="3" disabled><?php if(isset($result[0]['course'])) echo $result[0]['course'];?></textarea>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="job_experience" class="form-label">လုပ်ငန်းအတွေ့အကြုံ</label>
        </div>
        <div class="col-md-9">
        <textarea class="form-control" id="job_experience" name="job_experience" rows="3" disabled><?php if(isset($result[0]['job_experience'])) echo $result[0]['job_experience'];?></textarea>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="phone" class="form-label">ဆက်သွယ်ရန်ဖုန်းနံပါတ်</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="phone" value="<?php if(isset($result[0]['phone'])) echo $result[0]['phone'];?>" name="phone" disabled>
        </div>       
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="email" class="form-label">Email address</label>
        </div>
        <div class="col-md-9">
        <input type="email" class="form-control" id="email" value="<?php if(isset($result[0]['email'])) echo $result[0]['email'];?>" name="email" disabled>
        </div>        
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="address" class="form-label">နေရပ်လိပ်စာ <small>(ရပ်ကွက်/မြို့/ပြည်နယ်)</small></label>
        </div>
        <div class="col-md-9">
        <textarea class="form-control" id="address" name="address" rows="3" disabled><?php if(isset($result[0]['address'])) echo $result[0]['address'];?></textarea>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="yourImg" class="form-label">ဓာတ်ပုံဖြည့်ရန်</label>
        </div>
        <div class="col-md-9">
        <img src="upload/jobapply/<?php echo $result[0]['photo_dir'];?>" class="form-control" id="yourImgDisplay"/>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="eduImg" class="form-label">ပညာအရေအချင်းပုံဖြည့်ရန်</label>
        </div>
        <div class="col-md-9">
        <img src="upload/jobapply/<?php echo $result[0]['certificate_dir'];?>" class="form-control" id="eduImgDisplay"/>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3"></div>
        <div class="col-md-9">
        <a name="cancel" class="btn btn-success my-3 mx-1 justify-content-center" href="adminJobFormIndex.php">ရှေ့စာမျက်နှာဆီသို့</a>
        </div>
    </div>

</form>
</div>
</main> 
<?php include_once 'masterlayouts/admin_footer.php';?>

            