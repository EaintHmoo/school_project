
        <?php 
        include_once 'masterlayouts/admin_header.php';
        include_once 'controller/student_photo_controller.php';
        $studPhoto = new StuPhotoController();
        $results = $studPhoto->showAllPhoto();
        
        ?>
        <div id="layoutSidenav">
        <?php include_once 'masterlayouts/admin_sidebar.php';?>
    
        
            <div id="layoutSidenav_content">
                
                <main>
                    <div class="container-fluid px-4">
                        <div class="container py-3">
                        <a class="btn btn-success float-end mt-3" href="addStudPhoto.php">အသစ်ထည့်ရန်</a>
                        <a class="btn btn-warning mx-3 float-end mt-3" href="exportStudPhoto.php">Download</a>
                        </div>
                        <h4 class="mt-3 mb-4">ကျောင်းသားဟောင်းပုံများ</h4>
                        <table class="table table-stripped">
                        <thead>
                        <td>Photo</td>
                        <td>Name</td>
                        <td>Year</td>
                        <td>Distinction</td>
                        <td>Actions</td>
                        </thead>
                        <tbody id="tablebody">
                        <?php
                        foreach($results as $result){
                            echo "<tr>";
                            echo "<td><img src='upload/stuphoto/".$result['photo_dir']."' width='150px'></td>";
                            echo "<td>".$result['name']."</td>";
                            echo "<td>".$result['year']."</td>";
                            echo "<td>".$result['distinction']."</td>";
                            echo "<td id=".$result['id'].">
                            <a href='viewStudPhoto.php?id=".$result['id']."' class='btn btn-success'><i class='fa fa-eye'></i></a>
                            <a href='editStudPhoto.php?id=".$result['id']."' class='btn btn-warning'><i class='fa fa-edit'></i></a>
                            <button class='btn btn-danger stuphoto-delete'><i class='fa fa-trash'></i></button>
                            </td>";
                            echo "</tr>";
                            
                        }
                        ?>
                        </tbody>
                        </table>
                    </div>
                    
                </main>
                <?php include_once 'masterlayouts/admin_footer.php'?>
            