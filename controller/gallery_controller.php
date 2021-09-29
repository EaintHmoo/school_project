<?php
include_once(__DIR__.'/../model/gallery.php');
class GalleryController extends Gallery{
    //create a photo in gallery
    function addGallery($type,$caption,$description,$photo_dir){
        return $this->createGallery($type,$caption,$description,$photo_dir);
    }

    //list photo in gallery
    function showGallerys()
    {
        $results = $this->getGallerys();
        return $results;
    }

    //list of all activities photo in gallery
    function showAllActivities()
    {
        $results= $this->getAllActivities();
        return $results;
    }

    //list of all building photo in gallery
    function showBuildings()
    {
        $results= $this->getBuildings();
        return $results;
    }

    //list of photo in gallery with type
    function showActivitePhoto($type)
    {
        $results= $this->getActivitePhoto($type);
        return $results;
    }

    //list of donation photo in gallery
    function showOtherPhoto()
    {
        $results= $this->getOtherPhoto();
        return $results;
    }

    //show single line photo in gallery
    function showGallery($id)
    {
        $result = $this->getGallery($id);
        return $result;
    }

    //edit photo in gallery
    function editGallery($id,$type,$caption,$description,$photo_dir){
        return $this->updateGallery($id,$type,$caption,$description,$photo_dir);
    }

    function deletePhoto($id){
        $this->deletePhotoWithId($id);
    }
    
}
?>