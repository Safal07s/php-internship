<?php
// Start session (if not already started)

// Include required files
require('admin/config/config.php'); // Ensure this file contains your database connection code
require('includes/header.php');
require('includes/navbar.php');
?>

<?php


// Fetch product details
if (isset($_GET['id'])) {
  $product_id = $_GET['id'];
  $product_details_query = "SELECT * FROM product_details WHERE id=$product_id";
  $product_details_result = mysqli_query($con, $product_details_query);
  $product_details_data = $product_details_result->fetch_assoc();
  $category_name = $product_details_data['category_name'];
}


?>
<?php

// Handle 'Add to Cart' form submission
if (isset($_POST['add_to_cart'])) {
  // Capture form data
  $id = $_POST['id'];
  $title = $_POST['title'];
  $price = $_POST['price'];
  $size = $_POST['size'];
  $color = $_POST['color'];
  $img_link = $_POST['img_link'];
  $quantity = $_POST['quantity'];

  // Insert product details into the cart table
  $insert_cart_query = "INSERT INTO cart (title, price, size, color, quantity, img_link) VALUES ('$title', '$price', '$size', '$color', '$quantity', '$img_link')";
  if (mysqli_query($con, $insert_cart_query)) {
    header("Refresh:0; url=cart.php?success");
    exit; // Ensure script stops here to prevent further execution
  } else {
    echo "Error: " . mysqli_error($con);
  }
}

?>
<?php

// Handle comment form submission
if (isset($_POST['comment'])) {
  $comment = $_POST['comment'];
  $sql = "INSERT INTO `comments` (`comment_content`, `product_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$product_id', '0', current_timestamp())";
  if (mysqli_query($con, $sql)) {
    // Redirect to the same page to avoid form resubmission on refresh
    header("Location: product_details.php?");
    exit;
  } else {
    echo "Error: " . mysqli_error($con);
  }
}

?>

<!-- HTML Structure -->
<main id="main">
  <!-- Product Intro Section -->
  <section class="intro-single" style="margin-top: -5rem;">
    <div class="container">
      <h2><?php echo $product_details_data['name']; ?></h2>
    </div>
  </section>
  <!-- End Product Intro Section -->

  <!-- Product Details Section -->
  <section class="agent-single">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="row">
            <div class="col-md-6">
              <div class="border">
                <img src="admin/uploads/<?php echo $product_details_data['img_link']; ?>" alt="" class="agent-avatar img-fluid" />
              </div>
            </div>
            <div class="col-md-5 section-md-t3">
              <div class="agent-info-box">
                <div class="agent-title">
                  <div class="title-box-d">
                    <h3 class="title-d"><?php echo $product_details_data['title']; ?><br /></h3>
                  </div>
                </div>
                <div class="agent-content mb-3">
                  <p class="content-d text-dark"><?php echo $product_details_data['description']; ?></p>
                  <div class="info-agents color-a">
                    <h4>
                      <strong class="text-color">RS: <?php echo $product_details_data['price']; ?> </strong>
                    </h4>
                    <p class="pt-3">
                      <strong>Sizes Available</strong>
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                      <label class="btn btn-outline-dark" for="btnradio1"><?php echo $product_details_data['size']; ?></label>
                    </div>
                    </p>
                    <p class="pt-3">
                      <strong>Color </strong>
                    <div class="d-grid gap-2 d-md-block">
                      <button class="btn btn-dark" type="button"><?php echo $product_details_data['color']; ?></button>
                    </div>
                    </p>
                    <form action="" method="POST">
                      <!-- Hidden fields to pass product details -->
                      <input type="hidden" name="id" value="<?php echo $product_details_data['id']; ?>">
                      <input type="hidden" name="title" value="<?php echo $product_details_data['title']; ?>">
                      <input type="hidden" name="price" value="<?php echo $product_details_data['price']; ?>">
                      <input type="hidden" name="size" value="<?php echo $product_details_data['size']; ?>">
                      <input type="hidden" name="color" value="<?php echo $product_details_data['color']; ?>">
                      <input type="hidden" name="img_link" value="<?php echo $product_details_data['img_link']; ?>">
                      <input type="hidden" name="product_status" value="active">
                      <!-- Quantity input -->
                      <p class="pt-3">
                        <strong>Quantity</strong>
                        <input type="number" name="quantity" value="1" min="1" id="quantity">
                      </p>
                      <!-- Buttons -->
                      <button class="btn btn-primary px-5" type="button" onclick="location.href='productsbuy.php?id=<?php echo $product_details_data['id']; ?>'">Buy Now</button>
                      <button class="btn check px-5" type="submit" name="add_to_cart">
                        <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                        Add To Cart
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Comment Section -->
        <div class="container" id="ques">
          <h1 class="py-2 pt-4 mt-5">
            Comments <i class="fa fa-comment" aria-hidden="true"></i>
          </h1>
          <?php
          $id = $_GET['id'];
          $sql = "SELECT * FROM comments WHERE product_id=$id ORDER BY comment_time DESC";
          $result = mysqli_query($con, $sql);
          $noresult = true;
          while ($row = mysqli_fetch_assoc($result)) {
            $noresult = false;
            $content = $row['comment_content'];
            $comment_time = $row['comment_time'];

            echo '<div class="media my-3 d-flex">
                    <img src="assets/img/user_default.png" height="60px" alt="">
                    <div class="media-body  text-dark">
                    <p class="fw-bold my-0" > User / '. $comment_time .' </p>
                    
                   ' . htmlspecialchars($content) . '
                    </div>
                  </div>';
          }
          if ($noresult) {
            echo '<div class="p-5 bg-light rounded-3">
                    <div class="container py-5" style="margin-top: -4rem;">
                      <p class="col-md-8 fs-3 text-dark">
                        No Comments Found
                      </p>
                      <p class="col-md-8 fs-4">
                        Be the First To Post Comment.
                      </p>
                    </div>
                  </div>';
          }
          ?>
        </div>

        <div class="comment mt-2">
          <h3>Comment your thoughts</h3>
          <form action="" method="POST">
            <textarea name="comment" rows="5" style="width: 100%;"></textarea>
            <div class="d-grid gap-2 d-md-block">
              <button class="btn btn-success" type="submit">Post a comment <i class="fa fa-comment" aria-hidden="true"></i> </button>
            </div>
          </form>
        </div>

        <!-- Related Products Section -->
        <div class="col-md-12 section-t8">
          <div class="title-box-d">
            <h2 class="fw-bold">You May Also Like</h2>
          </div>
        </div>
        <div class="row property-grid grid">
          <?php
          $related_products_query = "SELECT * FROM product_details WHERE category_name='$category_name' AND id != $id";
          $related_products_result = mysqli_query($con, $related_products_query);
          $counter = 0;
          while ($related_products_data = $related_products_result->fetch_array()) {
          ?>
            <div class="col-md-4 pe-4">
              <div class="card-box-c foo">
                <div class="card-header-c">
                  <div class="card-box-ico">
                    <a href="product_details.php?id=<?php echo $related_products_data['id']; ?>">
                      <img src="admin/uploads/<?php echo $related_products_data['img_link']; ?>" alt="" height="180px" width="250px">
                    </a>
                  </div>
                  <div class="card-title-c align-self-center">
                    <p class="text-dark fs-4"><?php echo $related_products_data['title']; ?></p>
                    <h3 class="content-c text-color">
                      Rs:<?php echo $related_products_data['price']; ?>
                    </h3>
                    <button type="button" class="btn btn-color">View More
                      <span class="bi bi-chevron-right"></span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          <?php
            $counter++;
            if ($counter >= 3) {
              break;
            }
          }
          ?>
        </div>
      </div>
    </div>
  </section>
  <!-- End Product Details Section -->
</main>
<!-- End Main Section -->

<?php require('includes/footer.php'); ?>
