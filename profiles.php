<?php 

include 'processForm.php';
$sql = "SELECT * FROM users";

$result = mysqli_query($conn,$sql);
$users = mysqli_fetch_all($result,MYSQLI_ASSOC);

 ?>
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
                <table class="table table-bordered">
                    <thead>
                        <th>Profile Image</th>
                        <th>Bio</th>
                    </thead>
                    <tbody>
                        <?php foreach($users as $user): ?>
                        <tr>
                            <td><img src="upload/<?php echo $user['profile_image']; ?>" width="100"/></td>
                           <td> <?php echo $user['bio'];?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>