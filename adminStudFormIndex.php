
        <?php 
        include_once 'masterlayouts/admin_header.php';
        include_once 'controller/student_controller.php';
        $studController = new StudentController();
        $results = $studController->showStudents();
        
        ?>
        <div id="layoutSidenav">
        <?php include_once 'masterlayouts/admin_sidebar.php';?>
    
        
            <div id="layoutSidenav_content">
                
                <main>
                    <div class="container-fluid px-4">
                        <div class="container py-3">
                        <a class="btn btn-success float-end" href="addStudForm.php">ဖောင်အသစ်ထည့်ရန်</a>
                        <a class="btn btn-warning mx-3 float-end" href="exportStudForm.php">Download</a>
                        </div>
                        <h4 class="mt-3 mb-4">ကျောင်းဝင်ခွင့်ဖောင်များ</h4>
                        <table class="table table-stripped">
                        <thead>
                        <td>Name</td>
                        <td>Grade</td>
                        <td>Father Name</td>
                        <td>Phone</td>
                        <td>Email</td>
                        <td>Current School</td>
                        <td>Actions</td>
                        </thead>
                        <tbody id="tablebody">
                        <?php
                        foreach($results as $result){
                            echo "<tr>";
                            echo "<td>".$result['name']."</td>";
                            echo "<td>".$result['grade']."</td>";
                            echo "<td>".$result['father_name']."</td>";
                            echo "<td>".$result['phone']."</td>";
                            echo "<td>".$result['email']."</td>";
                            echo "<td>".$result['current_school']."</td>";
                            echo "<td id=".$result['id'].">
                            <a href='viewStudForm.php?cid=".$result['id']."' class='btn btn-success'><i class='fa fa-eye'></i></a>
                            <a href='editStudForm.php?cid=".$result['id']."' class='btn btn-warning'><i class='fa fa-edit'></i></a>
                            <button class='btn btn-danger stuform-delete'><i class='fa fa-trash'></i></button>
                            </td>";
                            echo "</tr>";
                            
                        }
                        ?>
                        </tbody>
                        </table>
                    </div>
                    
                </main>
                <?php include_once 'masterlayouts/admin_footer.php'?>
            