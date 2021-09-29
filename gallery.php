<?php 
include_once 'masterlayouts/navbar.php';
include_once 'controller/gallery_controller.php';

$gControler = new GalleryController();
$allActivities = $gControler->showAllActivities();
$buildings = $gControler->showBuildings();


?>

  <!-- Page Header Start -->
  <div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Gallery</h2>
            </div>
            <div class="col-12">
                <p></p>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!--Activities Start-->
<div class="activities">
    <div class="justify-content-center d-flex flex-row">
        <div><hr class="sub-header-hr"></div>
        <div><p class="sub-header-p">Our School Activities</p></div>
        <div><hr class="sub-header-hr"></div>
    </div>
    <h2 class="text-center">Activities</h2>

    <div class="justify-content-center mt-3 mb-5 d-flex flex-row">
        <div class="p-1"><button type="button" class="btn aa-btn all">ALL</button></div>
        <div class="p-1"><button type="button" class="btn aa-btn donation">Donation</button></div>
        <div class="p-1"><button type="button" class="btn aa-btn ceremony">Ceremony</button></div>
        <div class="p-1"><button type="button" class="btn aa-btn sport">Sport</button></div>
        <div class="p-1"><button type="button" class="btn aa-btn trip">Trip</button></div>
        <div class="p-1"><button type="button" class="btn aa-btn others">Others</button></div>
    </div>

    <div class="container my-5">
        <div class="row" id="activities">
          <?php foreach($allActivities as $result): ?>
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <img src="upload/gallery/<?php echo $result['photo_dir'];?>" class="card-img-top img-fluid" alt="pyinnyaryadanar">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $result['caption'];?></h5>
                      <p class="card-text"><?php echo $result['description'];?></p>
                    </div>
                </div>  
            </div>
          <?php endforeach;?>
        </div>
      </div>

</div>
<!--Activities End-->

<!--School Building Start-->
<div class="building">
  <div class="py-5">
    <div class="justify-content-center d-flex flex-row">
      <div><hr class="sub-header-hr"></div>
      <div><p class="sub-header-p">Our School Buildings</p></div>
      <div><hr class="sub-header-hr"></div>
    </div>
    <h2 class="text-center">Buildings</h2>
  
    <div class="container my-5">
      <div class="row" id="buildings">

        <?php foreach($buildings as $result):?>
          <div class="col-md-3 col-sm-6">
          <img src="upload/gallery/<?php echo $result['photo_dir'];?>" class="img-fluid w-100">
        </div>
        <?php endforeach;?>
        
      </div>
    </div>
  </div>
</div>
<!--School Building End-->

<?php include_once 'masterlayouts/footer.php';?>