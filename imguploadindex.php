<?php include 'processForm2.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image Preview and Upload PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4 offset-md-4 form-div">
                <form action="imguploadindex.php" method="post" enctype="multipart/form-data">

                <h3 class="text-center">
                    Create Profile
                </h3>
                <?php if(!empty($msg)):?>
                    <div class="alert <?php echo $css_class;?>">
                    <?php echo $msg;?>
                </div>
                <?php endif; ?>
                <div class="form-group text-center">
                    <img src="img/placeholder.png" onclick="triggerClick()" id="profileDisplay"/>
                    <label for="profileImage">Profile Image</label>
                    <input type="file" name="profileImage" onchange="displayImage(this)" id="profileImage" class="form-control" style="display: none;" accept="image/*" >
                </div>
                <div class="form-group">
                    <lable for="bio">Bio</lable>
                    <textarea name="bio" id="bio" cols="30" class="form-control" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" name="save-user" class="form-control btn btn-primary btn-block">
                        Save User
                    </button>
                </div>    
                </form>
            </div>
        </div>
    </div>
</body>
<script src="script.js"></script>
</html>