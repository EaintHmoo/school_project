
        <?php 
        include_once 'masterlayouts/admin_header.php';
        include_once 'controller/job_controller.php';
        $jController = new JobController();
        $results = $jController->showJobs();
        
        ?>
        <div id="layoutSidenav">
        <?php include_once 'masterlayouts/admin_sidebar.php';?>
    
        
            <div id="layoutSidenav_content">
                
                <main>
                    <div class="container-fluid px-4">
                        <div class="container py-3">
                        <a class="btn btn-warning mx-3 float-end" href="exportStudForm.php">Download</a>
                        </div>
                        <h4 class="mt-3 mb-4">အလုပ်လျှောက်လွှာဖောင်များ</h4>
                        <table class="table table-stripped">
                        <thead>
                        <td>Photo</td>
                        <td>Name</td>
                        <td>Nrc</td>
                        <td>Father Name</td>
                        <td>Phone</td>
                        <td>Email</td>
                        <td>Actions</td>
                        </thead>
                        <tbody id="tablebody">
                        <?php
                        foreach($results as $result){
                            echo "<tr>";
                            echo "<td><img src='upload/jobapply/".$result['photo_dir']."' width='150px'></td>";
                            echo "<td>".$result['name']."</td>";
                            echo "<td>".$result['nrc']."</td>";
                            echo "<td>".$result['father_name']."</td>";
                            echo "<td>".$result['phone']."</td>";
                            echo "<td>".$result['email']."</td>";
                            echo "<td id=".$result['id'].">
                            <a href='viewJobForm.php?id=".$result['id']."' class='btn btn-success'><i class='fa fa-eye'></i></a>
                            <a href='editJobForm.php?id=".$result['id']."' class='btn btn-warning'><i class='fa fa-edit'></i></a>
                            <button class='btn btn-danger jobform-delete'><i class='fa fa-trash'></i></button>
                            </td>";
                            echo "</tr>";
                            
                        }
                        ?>
                        </tbody>
                        </table>
                    </div>
                    
                </main>
                <?php include_once 'masterlayouts/admin_footer.php'?>
            