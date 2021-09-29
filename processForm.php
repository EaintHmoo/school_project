<?php 
$msg="";
$css_class="";

$conn = mysqli_connect('localhost','root','','img-upload');

if(isset($_POST['save-user'])){
    /*echo "<pre>",print_r($_POST),"</pre>";
    echo "<pre>",print_r($_FILES),"</pre>";
    echo "<pre>",print_r($_FILES['profileImage']),"</pre>";*/
    echo "<pre>",print_r($_FILES['profileImage']['name']),"</pre>";
    //die();

    $bio = $_POST['bio'];
    $profileImageName= time(). '_' . $_FILES['profileImage']['name'];

    $target = 'upload/'.$profileImageName;

    if(move_uploaded_file($_FILES['profileImage']['tmp_name'],$target)){
        $sql = "INSERT INTO users (profile_image, bio) VALUES ('$profileImageName','$bio')";
        if(mysqli_query($conn,$sql)){
            $msg="Image Uploaded successfully and saved to database";
            $css_class="alert-success";
        }else{
            $msg="Database Error: Failed to save user";
            $css_class="alert-danger";
        }
        
    }else{
        $msg="Failed to upload to upload";
        $css_class="alert-danger";
    }
}
?>