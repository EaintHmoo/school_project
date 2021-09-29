<?php
include_once 'masterlayouts/navbar.php';
include_once 'controller/announce_controller.php';

$limit = 5;
$page = (isset($_GET['page']) && is_numeric($_GET['page']) ) ? $_GET['page'] : 1;
$paginationStart = ($page - 1) * $limit;

$aController = new AnnounceController();
$posts = $aController->showAnnounceFiveRows($paginationStart,$limit);
$allRecrods = $aController->showCountOfRows();

// Calculate total pages
$totoalPages = ceil($allRecrods / $limit);

// Prev + Next
$prev = $page - 1;
$next = $page + 1;

?>
  <!-- Page Header Start -->
  <div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Announcement</h2>
            </div>
            <div class="col-12">
                
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!--Announcement Start-->
<div class="announce">
    <div class="justify-content-center d-flex flex-row">
        <div><hr class="header-hr"></div>
        <div><h3 class="header-h">မိဘများဆီသို့ အကြောင်းကြားလွှာ</h3></div>
        <div><hr class="header-hr"></div>
    </div>
    <div class="container my-5">

      <?php foreach($posts as $post):?>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card w-100">
                    <div class="row g-0">
                      <div class="col-md-3">
                        <img src="upload/announce/<?php echo $post['photo_dir'];?>" class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-9">
                        <div class="card-body">
                          <h5 class="card-title"><?php echo $post['title'];?></h5>
                          <p class="card-text text-end date"><small class="text-muted"><?php echo date_format(date_create($post['date']),'j M Y');?></small></p>
                          <p class="card-text fifty-chars"><?php echo $post['description'];?></p>
                          <a href="news.php?id=<?php echo $post['id'];?>" class="btn can-btn">Readmore</a>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-md-2"></div>
        </div>
      <?php endforeach;?>
              
    </div>
</div>
<!--Announcement End-->

<!--Pagination Start-->
<div class="container mb-5">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
    <nav aria-label="Page navigation example mt-5">
            <ul class="pagination justify-content-center">
                <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
                    <a class="page-link"
                        href="<?php if($page <= 1){ echo '#'; } else { echo "?page=" . $prev; } ?>">Previous</a>
                </li>

                <?php for($i = 1; $i <= $totoalPages; $i++ ): ?>
                <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
                    <a class="page-link" href="announcement.php?page=<?= $i; ?>"> <?= $i; ?> </a>
                </li>
                <?php endfor; ?>

                <li class="page-item <?php if($page >= $totoalPages) { echo 'disabled'; } ?>">
                    <a class="page-link"
                        href="<?php if($page >= $totoalPages){ echo '#'; } else {echo "?page=". $next; } ?>">Next</a>
                </li>
            </ul>
      </nav>
    </div>
    <div class="col-md-2"></div>
  </div>
</div>
<!--Pagination End-->

<?php include_once 'masterlayouts/footer.php';?>