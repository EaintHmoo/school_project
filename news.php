<?php 
include_once 'masterlayouts/navbar.php';
include_once 'controller/announce_controller.php';
$id = $_GET["id"];

$aController = new AnnounceController();
$result = $aController->showAnnounceOneRow($id);
?>

  <!-- Page Header Start -->
  <div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Announcement</h2>
            </div>
            <div class="col-12">
                <a href="">Announcement</a>
                <a href="">Card Title</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!--News Detail Start-->
<div class="news">
    <div class="container my-5">
        <h2><?php echo $result[0]['title'];?></h2>
        <p><?php echo $result[0]['description'];?></p>
        <a href="announcement.php" class="btn can-btn">Back</a>
    </div>
</div>

<!--News Detail End-->
<?php include_once 'masterlayouts/footer.php';?>