<?php
include_once(__DIR__.'/../model/student.php');
class StudentController extends Student{
    //create student
    function addStudent($name,$grade,$father_name,$mother_name,$father_job,$mother_job,$phone,$email,$address,$current_school){
        return $this->createStudent($name,$grade,$father_name,$mother_name,$father_job,$mother_job,$phone,$email,$address,$current_school);
    }

    //list students
    function showStudents()
    {
        $results = $this->getStudents();
        return $results;
    }

    //show single line student
    function showStudent($sid)
    {   
        $result = $this->getStudent($sid);
        return $result;
    }

    //edit student
    function editStudent($sid,$name,$grade,$father_name,$mother_name,$father_job,$mother_job,$phone,$email,$address,$current_school){
        return $this->updateStudent($sid,$name,$grade,$father_name,$mother_name,$father_job,$mother_job,$phone,$email,$address,$current_school);
    }

    //delete student form
    function deleteStudent($sid){
        $this->deleteStudForm($sid);
    }
    
}
?>