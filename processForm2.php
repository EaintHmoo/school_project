<?php 
    $msg="";
    $css_class="";

    $conn = mysqli_connect('localhost','root','','img-upload');
    if(isset($_POST['save-user'])){
    $bio = $_POST['bio'];
        
        if(isset($_FILES["profileImage"]) && $_FILES["profileImage"]["error"] == 0){
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
            $filename = time(). '_' .$_FILES["profileImage"]["name"];
            $filetype = $_FILES["profileImage"]["type"];
        
            
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!array_key_exists($ext, $allowed)){
                $msg="Error: Please select a valid file format.";
                $css_class="alert-danger";
            }else{
                    if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], "upload/" . $filename)){
                        $sql = "INSERT INTO users (profile_image, bio) VALUES ('$filename','$bio')";
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
                
        } else{
            $msg= "Error: " . $_FILES["profileImage"]["error"];
            $css_class="alert-danger";
        }
    }
?>