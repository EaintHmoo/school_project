<?php
    include_once('controller/announce_controller.php');
    $id = $_POST['id'];
    $announce = new AnnounceController();
    $announce->deleteAnnounce($id);
    $results = $announce->showAllAnnounce();

    $output="";
    foreach($results as $result){
        //Variable Type
        $output.= "<tr>";
        $output.= "<td><img src='upload/announce/".$result['photo_dir']."' width='150px'></td>";
        $output.= "<td>".$result['title']."</td>";
        $output.= "<td>".date_format(date_create($result['date']),'j M Y')."</td>";
        $output.= "<td id=".$result['id'].">
        <a href='viewAnnounce.php?id=".$result['id']."' class='btn btn-success'><i class='fa fa-eye'></i></a>
        <a href='editAnnounce.php?id=".$result['id']."' class='btn btn-warning'><i class='fa fa-edit'></i></a>
        <button class='btn btn-danger announce-delete'><i class='fa fa-trash'></i></button>
        </td>";
        $output.= "</tr>";
        //Array Type(Json Type)
        //$output=json_encode($result);
        
    }
    echo $output;
 ?>