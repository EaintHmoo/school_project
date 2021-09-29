
        <?php 
        include_once 'masterlayouts/admin_header.php';
        include_once 'controller/gallery_controller.php';
        $gController = new GalleryController();
        $results = $gController->showGallerys();
        
        ?>
        <div id="layoutSidenav">
        <?php include_once 'masterlayouts/admin_sidebar.php';?>
    
        
            <div id="layoutSidenav_content">
                
                <main>
                    <div class="container-fluid px-4">
                        <div class="container py-3">
                        <a class="btn btn-success float-end mt-3" href="addGallery.php">အသစ်ထည့်ရန်</a>
                        <a class="btn btn-warning mx-3 float-end mt-3" href="exportGallery.php">Download</a>
                        </div>
                        <h4 class="mt-3 mb-4">Activities ဓာတ်ပုံများ</h4>
                        <table class="table table-stripped">
                        <thead>
                        <td>Photo</td>
                        <td>Type</td>
                        <td>Caption</td>
                        <td>Actions</td>
                        </thead>
                        <tbody id="tablebody">
                        <?php
                        foreach($results as $result){
                            echo "<tr>";
                            echo "<td><img src='upload/gallery/".$result['photo_dir']."' width='150px'></td>";
                            echo "<td>".$result['type']."</td>";
                            echo "<td>".$result['caption']."</td>";
                            echo "<td id=".$result['id'].">
                            <a href='viewGallery.php?id=".$result['id']."' class='btn btn-success'><i class='fa fa-eye'></i></a>
                            <a href='editGallery.php?id=".$result['id']."' class='btn btn-warning'><i class='fa fa-edit'></i></a>
                            <button class='btn btn-danger gallery-delete'><i class='fa fa-trash'></i></button>
                            </td>";
                            echo "</tr>";
                            
                        }
                        ?>
                        </tbody>
                        </table>
                    </div>
                    
                </main>
                <?php include_once 'masterlayouts/admin_footer.php'?>
            