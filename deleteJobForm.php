<?php
    include_once('controller/job_controller.php');
    $id = $_POST['id'];
    $jobController = new jobController();
    $jobController->deleteJob($id);
    $results = $jobController->showJobs();

    $output="";
    foreach($results as $result){
        //Variable Type
        $output.= "<tr>";
        $output.= "<td><img src='upload/jobapply/".$result['photo_dir']."' width='150px'></td>";
        $output.= "<td>".$result['name']."</td>";
        $output.= "<td>".$result['nrc']."</td>";
        $output.= "<td>".$result['father_name']."</td>";
        $output.= "<td>".$result['phone']."</td>";
        $output.= "<td>".$result['email']."</td>";
        $output.= "<td id=".$result['id'].">
        <a href='viewJobForm.php?id=".$result['id']."' class='btn btn-success'><i class='fa fa-eye'></i></a>
        <a href='editJobForm.php?id=".$result['id']."' class='btn btn-warning'><i class='fa fa-edit'></i></a>
        <button class='btn btn-danger jobform-delete'><i class='fa fa-trash'></i></button>
        </td>";
        $output.= "</tr>";
        //Array Type(Json Type)
        //$output=json_encode($result);
        
    }
    echo $output;
 ?>