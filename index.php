<?php
include_once 'masterlayouts/navbar.php';
include_once 'controller/student_photo_controller.php';

$sController = new StuPhotoController();
$results = $sController->showAllPhoto();
$years = $sController->showYear();
?>

  <!--Banner img-->
  <img src="img/banner.png" width="100%">
  <!--Banner img End-->

  <!--About Us-->
  <div class="aboutus">
    <div class="container">
      <div class="row py-5">
        <div class="col-md-4">
          <img src="">
        </div>
        <div class="col-md-8">
          <h2>About Us</h2>
          <p>The Summit admission process is about finding the right fit. You need to feel that The Summit is the right school for your family.  To assist you with the process, we have personalized the admission process. </p>

          <p>Each applicant to The Summit is assigned an admission staff member who will guide you through the process, and you should feel free to reach out to your admission specialist any time you have a question.</p> 
            
          <p>If you would like more about The Summit before applying,  you can request information by completing an online inquiry form or by calling the admission office at 513-871-4700, ext. 261 or emailing us at </p>
        </div>
      </div>
      
    </div>
  </div>

  <!--About Us End-->

  <!--Discipline-->
  <div class="discipline">
    <div class="container-fluid">
        <div class="container py-5">
          <h2>စည်းကမ်းချက်များ</h2>
          <p class="pt-2">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore itaque deserunt culpa? Nihil soluta molestias, quas accusantium dicta debitis hic harum aliquam dolorum, deserunt magni ut! Quis libero fugit at!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam eum ullam dignissimos ipsa enim quia voluptates totam similique et vero accusamus dolorem magni, reiciendis velit in, hic suscipit ratione. Nostrum?
          </p>
        </div>
    </div>
  </div>
  <!--Discipline End-->

  <!--Video and Photo-->
  <div class="vandp">
    <div class="container-fluid">
      <div class="row first-row">
        <div class="col-md-6 p-0 m-0">
          <img src="img/monalisa.jpg" class="img-fluid w-100 p-0 m-0" alt="...">
        </div>
        <div class="col-md-6">
          <div class="content-right">
            <h3>Title</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi ducimus expedita omnis, vero, quis tempora perspiciatis soluta quidem, dolor neque reprehenderit vel dolorem earum vitae id fugit est commodi! Quisquam.</p>  
          </div>
        </div>
      </div>
      <div class="row second-row">
        <div class="col-md-6">
          <div class="content-left">
            <h3>Title</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi ducimus expedita omnis, vero, quis tempora perspiciatis soluta quidem, dolor neque reprehenderit vel dolorem earum vitae id fugit est commodi! Quisquam.</p>
          </div>
        </div>
        <div class="col-md-6 p-0 m-0">
          <img src="img/monalisa.jpg" class="img-fluid w-100 p-0 m-0" alt="...">
        </div>
      </div>
    </div>
  </div>
  <!--Video and Photo-->

  <!--Carousel-->
  <div id="carousel" class="my-5 text-center">
    <h2>ဖြေဆိုအောင်မြင်ပီးသောကျောင်းသားများ</h2>

    <div class="justify-content-center mt-3 mb-5 d-flex flex-row">
      <div class="p-1"><a class="btn all-stu">ALL</a></div>
      <div class="p-1">
        <!--Dropdown-->
        <div class="dropdown">
          <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Year
          </button>
          <ul class="dropdown-menu" id="stu-yr" aria-labelledby="dropdownMenuButton1">
            <?php
            foreach($years as $yr)
            {
              echo "<li data-src='".$yr['year']."'><a class='dropdown-item'>".$yr['year']."</a></li>";
            }
            ?>
          </ul>
        </div>
      </div>
      <div class="p-1">
        <!--Search bar-->
        <div class="input-group justify-content-center" id="searchbar">
          <div class="form-outline">
            <input type="search" id="searchinput" class="form-control" placeholder="Search with name"/>
          </div>
          <button type="button" id="seachbtn" onclick="searchName()" class="btn">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </div>
      

    <div id="carouselExampleDark" class="carousel carousel-dark slide " data-bs-ride="carousel" data-bs-interval="false">
      <div class="carousel-inner" id="stu-caro">

      <?php 
        echo "<div class='carousel-item active'>";
        echo "<div class='container'>";
        echo "<div class='row'>";
        
          foreach($results as $key=>$value)
          {
              //if we can divide $key by 8 without remainder
              if (($key+1) % 9 == 0) 
              {
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                  echo "<div class='carousel-item'>";
                  echo "<div class='container'>";
                  echo "<div class='row'>";
              }
              echo "<div class='col-sm-6 col-md-3'>";
              echo "<div class='card'>";
              echo "<img src='upload/stuphoto/".$value['photo_dir']."' class='card-img-top img-fluid'>";
              echo "<div class='card-body text-center'>";
              echo "<h4>".$value['name']."</h4>";
              echo $value['exam_no']."<br>";
              echo $value['year']."<br>";
              echo $value['distinction'];
              echo "</div></div></div>";
              
          }
        echo "</div>";  
        echo "</div>";
        echo "</div>";
      ?> 
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <!--Carousel End-->
  <?php include_once 'masterlayouts/footer.php';?>
 