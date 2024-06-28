<?php require('includes/header.php'); ?>
<?php require('includes/navbar.php'); ?>


<section class="section-services section-t8 " style="margin-top: -4rem ;">

  <div class="container my-3">
    <h3>Search results for <em>" <?php echo $_GET['search']; ?>"</em></h3>
    <div class="result">
      <div class="container">
        <div class="row">
          <?php
          $noresults=true;
          $query = $_GET['search'];
          $product_details = "SELECT * FROM product_details WHERE MATCH (img_link,title,name,description) against ('$query');";
          $product_details_result = mysqli_query($con, $product_details);

          while ($product_details_data = $product_details_result->fetch_array()) {
            $noresults=false;
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

          }
          if ($noresults) {
            echo '<div class="mt-4 pt-0 p-5 mb-4 bg-light rounded-3">
          <div class="container-fluid py-5">
            <p class="col-md-8 fs-4 text-dark">
              No Results Found.
            </p>
            <p class="lead text-dark"> 
                  Suggestions:
                <ul class="text-dark">
                 <li > Make sure that all words are spelled correctly.</li>
                <li> Try different keywords.</li>
                <li> Try more general keywords.</li>
                </ul>
            </p>
            
          </div>
        </div>';
          }
          ?>






        </div>






      </div>
    </div>
  </div>



</section>
<!-- End Services Section -->
</main>
<!-- End #main -->

<?php require('includes/footer.php'); ?>