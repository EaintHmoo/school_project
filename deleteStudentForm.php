<?php
    include_once('controller/student_controller.php');
    $id = $_POST['id'];
    $stuController = new studentController();
    $stuController->deleteStudent($id);
    $results = $stuController->showStudents();

    $output="";
    foreach($results as $result){
        //Variable Type
        $output.= "<tr>";
        $output.= "<td>".$result['name']."</td>";
        $output.= "<td>".$result['grade']."</td>";
        $output.= "<td>".$result['father_name']."</td>";
        $output.= "<td>".$result['phone']."</td>";
        $output.= "<td>".$result['email']."</td>";
        $output.= "<td>".$result['current_school']."</td>";
        $output.= "<td id=".$result['id'].">
        <a href='viewStudForm.php?cid=".$result['id']."' class='btn btn-success'><i class='fa fa-eye'></i></a>
        <a href='editStudForm.php?cid=".$result['id']."' class='btn btn-warning'><i class='fa fa-edit'></i></a>
        <button class='btn btn-danger stuform-delete'><i class='fa fa-trash'></i></button>
        </td>";
        $output.= "</tr>";
        //Array Type(Json Type)
        //$output=json_encode($result);
        
    }
    echo $output;
 ?>