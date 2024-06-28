<?php 
ob_start();

require('authentication.php'); ?>

<?php require('includes/header.php'); ?>
<?php require('includes/navbar.php'); ?>




<?php

if (isset($_GET['id'])) {

  $id = $_GET['id'];
  $product_details = "SELECT * FROM product_details WHERE id=$id";
  $product_details_result = mysqli_query($con, $product_details);
  $product_details_data = $product_details_result->fetch_assoc();
  // $result = mysqli_query($con, $query);
  // $data = $result->fetch_assoc();
}

?>
<section class="mt-5 h-100 gradient-custom">
  <div class=" container py-5">
    <div class="row d-flex justify-content-center my-4">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">Confirm Your Order.</h5>
          </div>
          <div class="card-body">
            <!-- Single item -->
            <div class="row">
              <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                <!-- Image -->
                <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                  <img src="admin/uploads/<?php echo $product_details_data['img_link']; ?>"
                    class="w-100" alt="" />
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                  </a>
                </div>
                <!-- Image -->
              </div>

              <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                <!-- Data -->
                <p><strong><?php echo $product_details_data['title']; ?></strong></p>
                <p>Color: <?php echo $product_details_data['color']; ?></p>
                <p>Size: <?php echo $product_details_data['size']; ?></p>
                
                <!-- Data -->
              </div>

              <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <!-- Quantity -->
                <div class="d-flex mb-4" style="max-width: 300px">
                  <button data-mdb-button-init data-mdb-ripple-init class="btn btn-height btn-light px-3 me-2"
                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                    <i class="fas fa-minus text-dark"></i>
                  </button>

                  <div data-mdb-input-init class="form-outline">
                    <input id="form1" min="0" name="quantity" value="1" type="number" class="form-control" />
                    <label class="form-label" for="form1">Quantity</label>
                  </div>

                  <button data-mdb-button-init data-mdb-ripple-init class="btn btn-height btn-light px-3 ms-2"
                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                    <i class="fas fa-plus text-dark"></i>
                  </button>
                </div>
                <!-- Quantity -->

                <!-- Price -->
                <p class="text-start text-md-center">
                  <strong>Rs:<?php echo $product_details_data['price']; ?></strong>
                </p>
                <!-- Price -->
              </div>
            </div>
            <!-- Single item -->

            <hr class="my-4" />
            <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn check   btn-lg btn-block" onclick="location.href='payment_methods.php'">
              Proceed To Payment.
            </button>

            <!-- Single item -->
       
            <!-- Single item -->
          </div>
        </div>
       
       
    </div>
  </div>
</section>
<?php require('includes/footer.php') ;
ob_end_flush();
?>
