<?php require('includes/header.php'); ?>
<?php require('includes/navbar.php'); ?>



<?php

if (isset($_GET['id'])) {

  $id = $_GET['id'];
  $sale = "SELECT * FROM sale WHERE id=$id";
  $sale_result = mysqli_query($con, $sale);
  $sale_data = $sale_result->fetch_assoc();
  // $result = mysqli_query($con, $query);
  // $data = $result->fetch_assoc();
}

?>


<main id="main">
  <!-- ======= Intro Single ======= -->
  <section class="intro-single" style="margin-top: -5rem ;">




    <div class="container ">
      <h2><?php echo $sale_data['name']; ?></h2>
    </div>
  </section>
  <!-- End Intro Single -->

  <!-- ======= Agent Single ======= -->
  <section class="agent-single">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="row">
            <div class="col-md-6">
              <div class="border ">

                <img src="admin/uploads/<?php echo $sale_data['img_link']; ?>" alt="" class="agent-avatar img-fluid" />
              </div>
            </div>
            <div class="col-md-5 section-md-t3">
              <div class="agent-info-box">
                <div class="agent-title">
                  <div class="title-box-d">
                    <h3 class="title-d">
                      <?php echo $sale_data['title']; ?><br />
                    </h3>
                  </div>
                </div>
                <div class="agent-content mb-3">
                  <p class="content-d text-dark">
                    <?php echo $sale_data['description']; ?>
                  </p>

                  <div class="info-agents color-a">
                    <h4>
                      <strong class="text-color">RS:<?php echo $sale_data['sale_price']; ?> </strong>
                    </h4>
                    <h5 class="text-decoration-line-through color-text-a">
                      Rs:<?php echo $sale_data['org_price']; ?>
                    </h5>

                    <p class="pt-3">
                      <strong>Sizes Available</strong>
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                      <label class="btn  btn-outline-dark " for="btnradio1"><?php echo $sale_data['size']; ?></label>


                    </div>
                    </p>
                    <p class="pt-3">
                      <strong>Color </strong>
                    <div class="d-grid gap-2 d-md-block">
                      <button class="btn btn-dark" type="button"><?php echo $sale_data['color']; ?></button>
                    </div>
                    </p>
                    <p class="pt-3">
                      <strong>Quantity</strong>
                      <input type="number" name="" id="">
                    </p>
                    <div class="d-grid gap-2 d-md-block">
                      <button class="btn btn-primary px-5" type="button" onclick="location.href='salesbuy.php?id=<?php echo $sale_data['id']; ?>'">Buy Now</button>
                      


                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="comment">
          <h3>Comment your thoughts</h3>
          <textarea name="" id="" style="height: 200px; width: 100%;">
              </textarea>
          <div class="d-grid gap-2 d-md-block">
            <button class="btn btn-primary" type="submit">Submit</button>
            <button class="btn btn-danger" type="submit">Discard</button>
          </div>
        </div>
        <div class="col-md-12 section-t8">
          <div class="title-box-d">
            <h2 class="fw-bold">You May Also Like</h2>
          </div>
        </div>
        <div class="row property-grid grid">
          <!-- filter option -->
          <!-- <div class="col-sm-12">

                <div class="grid-option">
                  <form>
                    <select class="custom-select">
                      <option selected>All</option>
                      <option value="1">New to Old</option>
                      <option value="2">For Rent</option>
                      <option value="3">For Sale</option>
                    </select>
                  </form>
                </div>
              </div> --><?php
                        $product_details = "SELECT *FROM product_details";
                        $product_details_result = mysqli_query($con, $product_details);
                        $counter=0;
                        while ($product_details_data = $product_details_result->fetch_array()) {
                        ?>
            <div class="col-md-4 pe-4">
              <div class="card-box-c foo">
                <div class="card-header-c   ">
                  <div class="card-box-ico">
                    <a href="converse.php">
                      <img src="admin/uploads/<?php echo $product_details_data['img_link'];?>" alt="" height="180px" width="250px">

                    </a>
                    <!-- <span class="bi bi-cart"></span> -->
                  </div>
                  <div class="card-title-c align-self-center">
                    <p class="text-dark fs-4 "><?php echo $product_details_data['title']; ?></p>
                    <h3 class="content-c text-color">
                      Rs:<?php echo $product_details_data['price']; ?>
                    </h3>
                    <button type="button" class="btn btn-color">View More
                      <span class="bi bi-chevron-right"></span>
                    </button>
                  </div>
                </div>
                <!-- <div class="card-footer-c">
                    <a href="#" class="link-c link-icon"
                      >Read more
                      <span class="bi bi-chevron-right"></span>
                    </a>
                  </div> -->
              </div>
            </div>
          <?php
          $counter++;
          if ($counter>=3){
            break;
          }
                        }
          ?>
        </div>
      </div>
    </div>
  </section>
  <!-- End Agent Single -->
</main>
<!-- End #main -->

<?php require('includes/footer.php'); ?>