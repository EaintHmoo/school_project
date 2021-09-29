<?php
include_once(__DIR__.'/../model/announce.php');
class AnnounceController extends Announce{
    //create a photo in gallery
    function addAnnounce($title,$description,$date,$photo_dir){
        return $this->createAnnounce($title,$description,$date,$photo_dir);
    }

    function showAllAnnounce(){
        return $this->getAnnounceAllRows();
    }
    //list photo in gallery
    function showAnnounceFiveRows($start,$limit)
    {
        $results = $this->getAnnounceFiveRows($start,$limit);
        return $results;
    }

    function showCountOfRows(){
        $results = $this->getCountOfRows();
        return $results;
    }

    function showAnnounceOneRow($id){
        $result = $this->getAnnounceOneRow($id);
        return $result;
    }

    //edit photo in gallery
    function editAnnounce($id,$title,$description,$date,$photo_dir){
        return $this->updateAnnounce($id,$title,$description,$date,$photo_dir);
    }

    function deleteAnnounce($id){
        $this->deleteAnnounceRow($id);
    }
    
}
?>