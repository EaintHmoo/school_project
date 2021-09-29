<?php
include_once(__DIR__.'/../model/student_photo.php');
class StuPhotoController extends StuPhoto{
    //create student
    function addPhoto($name,$year,$exam_no,$distinction,$remark,$photo){
        return $this->createPhoto($name,$year,$exam_no,$distinction,$remark,$photo);
    }

    //list students
    function showAllPhoto()
    {
        $results = $this->getAllPhoto();
        return $results;
    }

    //list year
    function showYear(){
        $results = $this->getYear();
        return $results;
    }

    function showPhotoWithYr($yr){
        $results = $this->getPhotoWithYr($yr);
        return $results;
    }

    function showPhotoWithName($name){
        $results = $this->getPhotoWithName($name);
        return $results;
    }
    //show single line student
    function showPhoto($sid)
    {
        $result = $this->getPhoto($sid);
        return $result;
    }

    function deletePhoto($id){
        $this->deleteStudPhoto($id);
    }

    //edit student
    function editPhoto($id,$name,$year,$exam_no,$distinction,$remark,$photo_dir){
        return $this->updatePhoto($id,$name,$year,$exam_no,$distinction,$remark,$photo_dir);
    }
    
}
?>