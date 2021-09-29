<?php 
include_once 'controller/student_controller.php';
$stuController = new StudentController();
$results = $stuController->showStudents();

@header('Content-Disposition:attachment;filename=studentform_data.csv');
$data = "";
$data .= "id,name,grade,father_name,mother_name,father_job,mother_job,phone,email,address,current_school"."\n";
foreach($results as $result){
    $data .= $result['id'].",";
    $data .= $result['name'].",";
    $data .= $result['grade'].",";
    $data .= $result['father_name'].",";
    $data .= $result['mother_name'].",";
    $data .= $result['father_job'].",";
    $data .= $result['mother_job'].",";
    $data .= $result['phone'].",";
    $data .= $result['email'].",";
    $data .= $result['address'].",";
    $data .= $result['current_school']."\n";  
}
echo $data;
exit();
?>