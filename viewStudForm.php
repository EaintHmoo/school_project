i
<?php 
        include_once 'masterlayouts/admin_header.php';
        include_once 'controller/student_controller.php';

        if(empty($_SESSION['email']))
        {
            header("location:login.php");
        }
        else
        {
            $email=$_SESSION['email'];
        }
        $sid=$_GET['cid'];
        $stu = new StudentController();
        $result = $stu->showStudent($sid);

?> 
<div id="layoutSidenav">
<?php include_once 'masterlayouts/admin_sidebar.php';?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
<h1 class="h3 my-3 font-weight-normal text-center">ကျောင်းဝင်ခွင့်ဖောင်</h1>
<form method="post" class="form-signin p-3" method="post" style="border:2px solid black;padding:5px;border-radius:5px" >
                                   
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="stu_name" class="form-label">ကျောင်းသား/သူအမည်</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="stu_name" value="<?php if(isset($result[0]['name'])) echo $result[0]['name'];?>" name="stu_name" disabled>
        </div>       
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="grade" class="form-label">တက်ရောက်မည့်အတန်း</label>
        </div>
        <div class="col-md-9">
        <?php

        $selection = array('Grade 5','Grade 6','Grade 7','Grade 8','Grade 9','Grade 10','Grade 11');
        echo '<select class="form-select" name="grade" disabled>';

        foreach ($selection as $selection) {
            $selected = ($result[0]['grade'] == $selection) ? "selected" : "";
            echo '<option '.$selected.' value="'.$selection.'">'.$selection.'</option>';
        }

        echo '</select>';
        ?>
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
        <label for="father_job" class="form-label">ဖခင် အလုပ်အကိုင်</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="father_job" value="<?php if(isset($result[0]['father_job'])) echo $result[0]['father_job'];?>" name="father_job" disabled>
        </div>       
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="mother_job" class="form-label">မိခင် အလုပ်အကိုင်</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="mother_job" value="<?php if(isset($result[0]['mother_job'])) echo $result[0]['mother_job'];?>" name="mother_job" disabled>
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
        <label for="current_school" class="form-label">လက်ရှိတက်ရောက်နေသောကျောင်း</label>
        </div>
        <div class="col-md-9">
        <textarea class="form-control" id="current_school" name="current_school" rows="3" disabled><?php if(isset($result[0]['current_school'])) echo $result[0]['current_school'];?></textarea>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-9">
        <a name="cancel" class="btn btn-success my-3 mx-1 justify-content-center" href="adminStudFormIndex.php">ရှေ့စာမျက်နှာဆီသို့</a>
        </div>
    </div>

</form>
</div>
</main> 
<?php include_once 'masterlayouts/admin_footer.php';?>

            