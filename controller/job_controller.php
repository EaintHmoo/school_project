<?php
include_once(__DIR__.'/../model/job.php');
class JobController extends Job{
    //create student
    function addJob($name,$father_name,$mother_name,$nrc,$race,$religion,$bdate,$age,$married,$education,$year,$course,$job_experience,$phone,$email,$address,$yourImg,$eduImg){
        return $this->createJob($name,$father_name,$mother_name,$nrc,$race,$religion,$bdate,$age,$married,$education,$year,$course,$job_experience,$phone,$email,$address,$yourImg,$eduImg);
    }

    //list students
    function showJobs()
    {
        $results = $this->getJobs();
        return $results;
    }

    //show single line student
    function showJob($sid)
    {
        $result = $this->getJob($sid);
        return $result;
    }

    //edit student
    function editJob($jid,$name,$father_name,$mother_name,$nrc,$race,$religion,$bdate,$age,$married,$education,$year,$course,$job_experience,$phone,$email,$address,$yourImg,$eduImg){
       return $this->updateJob($jid,$name,$father_name,$mother_name,$nrc,$race,$religion,$bdate,$age,$married,$education,$year,$course,$job_experience,$phone,$email,$address,$yourImg,$eduImg);
        // $this->updateJob($jid,$name,$father_name,$mother_name,$nrc,$race,$religion,$bdate,$age,$married,$education,$year,$course,$job_experience,$phone,$email,$address,$yourImg,$eduImg);
    }
    
    //delete student form
    function deleteJob($id){
        $this->deleteJobForm($id);
    }
}
?>