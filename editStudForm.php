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
        $results = $stu->showStudent($sid);

        $stu_name =$results[0]['name'];
        $grade = $results[0]['grade'];
        $father_name = $results[0]['father_name'];
        $father_job = $results[0]['father_job'];
        $mother_name = $results[0]['mother_name'];
        $mother_job = $results[0]['mother_job'];
        $phone = $results[0]['phone'];
        $email = $results[0]['email'];
        $address = $results[0]['address'];
        $current_school = $results[0]['current_school'];
        if(isset($_POST["submit"]))
        {
        if(empty($_POST['stu_name']))
        {
            $stu_name_error = "!!!ကျောင်းသား/သူနာမည်ဖြည့်ပါ";
        }
        else{
            $stu_name = $_POST['stu_name'];
        }
        if(empty($_POST['father_name']))
        {
            $father_name_error = "!!!ဖခင်နာမည်ဖြည့်ပါ";
        }
        else{
            $father_name = $_POST['father_name'];
        }
        if(empty($_POST['father_job']))
        {
            $father_job_error = "!!!ဖခင်အလုပ်အကိုင်ဖြည့်ပါ";
        }
        else{
            $father_job = $_POST['father_job'];
        }
        if(empty($_POST['mother_name']))
        {
            $mother_name_error = "!!!မိခင်နာမည်ဖြည့်ပါ";
        }
        else{
            $mother_name = $_POST['mother_name'];
        }
        if(empty($_POST['mother_job']))
        {
            $mother_job_error = "!!!မိခင်အလုပ်အကိုင်ဖြည့်ပါ";
        }
        else{
            $mother_job = $_POST['mother_job'];
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
        if(empty($_POST['current_school']))
        {
            $current_school_error = "!!!လက်ရှိတက်ရောက်နေသည့်ကျောင်းကိုဖြည့်ပါ";
        }
        else{
            $current_school = $_POST['current_school'];
        }
        
        $stu_name = $_POST['stu_name'];
        $grade = $_POST['grade'];
        $father_name = $_POST['father_name'];
        $father_job = $_POST['father_job'];
        $mother_name = $_POST['mother_name'];
        $mother_job = $_POST['mother_job'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $current_school = $_POST['current_school'];
        
        if(!empty($stu_name) && !empty($grade) && !empty($father_name) && !empty($father_job) && !empty($mother_name) && !empty($mother_job)&& !empty($phone)  && !empty($address) && !empty($current_school))
        {
            
            $result = $stu->editStudent($sid,$stu_name,$grade,$father_name,$mother_name,$father_job,$mother_job,$phone,$email,$address,$current_school);
            if($result)
            {
              exit(header('location:adminStudFormIndex.php'));
            }
        }
        
        }
?> 
<div id="layoutSidenav">
<?php include_once 'masterlayouts/admin_sidebar.php';?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
<h1 class="h3 my-3 font-weight-normal text-center">ကျောင်းဝင်ခွင့်ဖောင်ပြုပြင်ခြင်း</h1>
<form method="post" class="form-signin p-3" method="post" style="border:2px solid black;padding:5px;border-radius:5px" >
                                   
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="stu_name" class="form-label">ကျောင်းသား/သူအမည်</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="stu_name" value="<?php if(isset($stu_name)) echo $stu_name;?>" name="stu_name" autofocus>
            <span style="color:red">
            <?php
            if(isset($stu_name_error)){
            echo $stu_name_error;
            }
            ?>
            </span>
        </div>       
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="grade" class="form-label">တက်ရောက်မည့်အတန်း</label>
        </div>
        <div class="col-md-9">
        <?php

        $selection = array('Grade 5','Grade 6','Grade 7','Grade 8','Grade 9','Grade 10','Grade 11');
        echo '<select class="form-select" name="grade" >';

        foreach ($selection as $selection) {
            $selected = ($grade == $selection) ? "selected" : "";
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
        <input type="text" class="form-control" id="father_name" value="<?php if(isset($father_name)) echo $father_name;?>" name="father_name">
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
        <input type="text" class="form-control" id="mother_name" value="<?php if(isset($mother_name)) echo $mother_name;?>" name="mother_name">
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
        <label for="father_job" class="form-label">ဖခင် အလုပ်အကိုင်</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="father_job" value="<?php if(isset($father_job)) echo $father_job;?>" name="father_job">
            <span style="color:red">
            <?php
            if(isset($father_job_error)){
            echo $father_job_error;
            }
            ?>
            </span>
        </div>       
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="mother_job" class="form-label">မိခင် အလုပ်အကိုင်</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="mother_job" value="<?php if(isset($mother_job)) echo $mother_job;?>" name="mother_job">
            <span style="color:red">
            <?php
            if(isset($mother_job_error)){
            echo $mother_job_error;
            }
            ?>
            </span>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="phone" class="form-label">ဆက်သွယ်ရန်ဖုန်းနံပါတ်</label>
        </div>
        <div class="col-md-9">
        <input type="text" class="form-control" id="phone" value="<?php if(isset($phone)) echo $phone;?>" name="phone">
            <span style="color:red">
            <?php
            if(isset($phone_error)){
            echo $phone_error;
            }
            ?>
            </span>
        </div>       
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="email" class="form-label">Email address</label>
        </div>
        <div class="col-md-9">
        <input type="email" class="form-control" id="email" value="<?php if(isset($email)) echo $email;?>" name="email">
            <span style="color:red">
            <?php
            if(isset($email_error)){
            echo $email_error;
            }
            ?>
            </span>
            <div class="form-text message">မဖြည့်လည်းရပါသည်</div>
        </div>        
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="address" class="form-label">နေရပ်လိပ်စာ <small>(ရပ်ကွက်/မြို့/ပြည်နယ်)</small></label>
        </div>
        <div class="col-md-9">
        <textarea class="form-control" id="address" name="address" rows="3"><?php if(isset($address)) echo $address;?></textarea>
            <span style="color:red">
            <?php
            if(isset($address_error)){
            echo $address_error;
            }
            ?>
            </span>
            <div class="form-text message"></div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        <label for="current_school" class="form-label">လက်ရှိတက်ရောက်နေသောကျောင်း</label>
        </div>
        <div class="col-md-9">
        <textarea class="form-control" id="current_school" name="current_school" rows="3"><?php if(isset($current_school)) echo $current_school;?></textarea>
            <span style="color:red">
            <?php
            if(isset($current_school_error)){
            echo $current_school_error;
            }
            ?>
            </span>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-9">
        <button name="submit" class="btn btn-primary my-3 mx-1 justify-content-center" type="submit">ဖောင်တင်မည်</button>
        <a name="cancel" class="btn btn-danger my-3 mx-1 justify-content-center" href="adminStudFormIndex.php">မလုပ်တော့ပါ</a>
        </div>
    </div>

</form>
</div>
</main> 
<?php include_once 'masterlayouts/admin_footer.php';?>

            