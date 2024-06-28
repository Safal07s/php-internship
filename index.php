<?php require('includes/header.php'); ?>
<?php require('includes/navbar.php'); ?>



<!-- ======= Intro Section ======= -->
<div class="intro intro-carousel swiper position-relative">
  <div class="swiper-wrapper">
  <?php
        $carousel = "SELECT *FROM carousel";
        $carousel_result = mysqli_query($con, $carousel);
        while ($carousel_data = $carousel_result->fetch_array()){
          ?>
          <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url('admin/uploads/<?php echo $carousel_data['img_link'];  ?>')">
      <div class="overlay overlay-a"></div>
      <div class="intro-content display-table">
        <div class="table-cell">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="intro-body">

                  <h1 class="intro-title mb-4">
                    <span class="color-b"> </span><?php echo $carousel_data['description']; ?> <br />
                    
                  </h1>
                  <p class="intro-subtitle intro-price">
                    <a href="allitems.php"><span class="price-a"><?php echo $carousel_data['button']; ?></span></a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
          <?php
        }
        ?>
    
 
  </div>
  <div class="swiper-pagination"></div>
</div>
<!-- End Intro Section -->

<main id="main">
  <!-- ======= Sales Section ======= -->
  <section class="section-services section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Flash Sales</h2>
              <h4 class="text-color sale pt-4">Limited Time Offer, Don't Miss Out!! Ends in 7 days.</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="row ">
      <?php
        $sale = "SELECT *FROM sale";
        $sale_result = mysqli_query($con, $sale);
        while ($sale_data = $sale_result->fetch_array()){
          ?>
          <div class="col-md-4  mt-4">
          <div class="card-box-c foo">
            <div class="card-header-c   ">
              <div class="card-box-ico">
                <a href="sale_details.php?id=<?php echo $sale_data['id']; ?>">
                  <img src="admin/uploads/<?php echo $sale_data['img_link'] ?>" alt="">
                </a>
              </div>
              <div class="card-title-c align-self-center">
                <p class="text-dark fs-4 "><?php echo $sale_data['title']; ?> </p>
                <h3 class="content-c text-color">
                  Rs:<?php echo $sale_data['sale_price']; ?>
                </h3>
                <h3 class="content-c text-decoration-line-through">
                  Rs:<?php echo $sale_data['org_price']; ?>
                </h3>
              </div>
            </div>

          </div>
        </div>
          <?php
        }
        ?> 
    </div>
  </section>
  <!-- End Sales Section -->




  <!-- ======= For you Section ======= -->
  <section class="section-services section-t8">
    <div class="container">

      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Exclusively For You</h2>
            </div>
            <div class="title-link">
              <a href="allitems.php">View More <span class="bi bi-chevron-right"></span></a>
            </div>
          </div>
        </div>
      </div>


      <div class="row">
      <?php
        $product_details = "SELECT *FROM product_details";
        $product_details_result = mysqli_query($con, $product_details);
        $counter=0;
        while ($product_details_data = $product_details_result->fetch_array()){
          ?>
        <div class="col-md-4 mt-4">
          <div class="card-box-c foo">
            <div class="card-header-c   ">
              <div class="card-box-ico">
                <a href="product_details.php?id=<?php echo $product_details_data['id']; ?>">
                  <img src="admin/uploads/<?php echo $product_details_data['img_link'] ?>" alt="">
                </a>
              </div>
              <div class="card-title-c align-self-center">
                <p class="text-dark fs-4 "><?php echo $product_details_data['title']; ?> </p>
                <h3 class="content-c text-color">
                  Rs:<?php echo $product_details_data['price']; ?>
                </h3>
                <button type="button" class="btn check" onclick="location.href='product_details.php?id=<?php echo $product_details_data['id']; ?>'">View More <span class="bi bi-chevron-right"></span></button>
                
              </div>
            </div>

          </div>
        </div>
          <?php
          $counter++;
          if($counter>=9){
            break;
          }
        }
        ?>
        

        
      
        

      </div>


 


     
    </div>
  </section>
  <!-- End Services Section -->
</main>
<!-- End #main -->

<?php require('includes/footer.php'); ?>