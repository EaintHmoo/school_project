<!DOCTYPE html>
<?php include_once 'masterlayouts/navbar.php';?>

  <!-- Page Header Start -->
  <div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Admission</h2>
            </div>
            <div class="col-12">
                <a href="">Admission</a>
                <a href="">Fee</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!--Fee Start-->
<div class="container my-5">
  <div class="row">
    <div class="col-md-3">
      <div class="right">
        <div class="rectangle">
          <h4>ADMISSION</h4>
        </div>
        <div class="hr">
          <div class="admission-link">
            <a href="fee.php">FEE</a><br>
            <a href="student_enrollment.php">STUDENT ENROLL</a><br>
            <a href="job_application.php">JOB APPLICAION</a><br>
          </div>
        </div>
      </div>      
    </div>
    <div class="col-md-9" id="fee">
      <h2>Schedule of Fees</h2>
        <table class="w-100">
          <tr>
            <th colspan="2">Enrollment Fee</th>
          </tr>
          <tr>
            <td>Fundation</td>
            <td>60000</td>
          </tr>
          <tr>
            <td>Primary and Secondary</td>
            <td>120000</td>
          </tr>
          <tr>
            <th colspan="2">Application Fee</th>
          </tr>
          <tr>
            <td>All Student</td>
            <td>4000</td>
          </tr>
          <tr>
            <th colspan="2">Tutation Fee</th>
          </tr>
          <tr>
            <td>Early Year</td>
            <td>4000</td>
          </tr>
          <tr>
            <td>Nursery</td>
            <td>4000</td>
          </tr>
          <tr>
            <td>Reception</td>
            <td>4000</td>
          </tr>
        </table>
    </div>
  </div>
</div>


<!--Fee End-->

<?php include_once 'masterlayouts/footer.php';?>