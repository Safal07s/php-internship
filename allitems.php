<?php require('includes/header.php'); ?>
<?php require('includes/navbar.php'); ?>

<!-- Main Section -->
<section class="section-t8">
  <div class="container " style="margin-top:-1rem;" >
    <div class="row">
      <!-- Sidebar Filters -->
      <div class="col-md-3">
        <div class="filter-sidebar" style="position: sticky; top: 0; ; margin-right:2rem" >
          <h3>Filter Products</h3>
          <form method="GET" action="">
            <!-- Category Filter -->
            <div class="mb-3">
              <label for="category">Category</label>
              <select id="category" name="category" class="form-select">
                <option value="">All Categories</option>
                <option value="mens" <?php if(isset($_GET['category']) && $_GET['category'] == 'mens') echo 'selected'; ?>>Mens</option>
                <option value="womens" <?php if(isset($_GET['category']) && $_GET['category'] == 'womens') echo 'selected'; ?>>Womens</option>
                <option value="shoes" <?php if(isset($_GET['category']) && $_GET['category'] == 'shoes') echo 'selected'; ?>>Shoes</option>
                <option value="pants" <?php if(isset($_GET['category']) && $_GET['category'] == 'pants') echo 'selected'; ?>>Pants</option>
                <option value="sunglass" <?php if(isset($_GET['category']) && $_GET['category'] == 'sunglass') echo 'selected'; ?>>Sunglass</option>
              </select>
            </div>

            <!-- Price Range Filter -->
            <div class="mb-3">
              <label for="price">Price Range</label>
              <select id="price" name="price" class="form-select">
                <option value="">All Prices</option>
                <option value="0-1000" <?php if(isset($_GET['price']) && $_GET['price'] == '0-1000') echo 'selected'; ?>>Rs 0 - Rs 1000</option>
                <option value="1000-5000" <?php if(isset($_GET['price']) && $_GET['price'] == '1000-5000') echo 'selected'; ?>>Rs 1000 - Rs 5000</option>
                <option value="5000-10000" <?php if(isset($_GET['price']) && $_GET['price'] == '5000-10000') echo 'selected'; ?>>Rs 5000 - Rs 10000</option>
                <option value="10000+" <?php if(isset($_GET['price']) && $_GET['price'] == '10000+') echo 'selected'; ?>>Above Rs 10000</option>
              </select>
            </div>

            <!-- Submit Button -->
            <div class="mb-3">
              <button type="submit" class="btn btn-success w-100">Apply Filters</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Products Display -->
      <div class="col-md-9">
        <div class="row">
          <div class="col-md-12 " >
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Shop now. Get Exciting Deals & Offers</h2>
              </div>
            </div>
          </div>
        </div>

        <div class="row" >
          <?php
            // Initialize SQL query
            $product_query = "SELECT * FROM product_details WHERE 1=1";

            // Apply category filter
            if (!empty($_GET['category'])) {
              $category = mysqli_real_escape_string($con, $_GET['category']);
              $product_query .= " AND (name LIKE '%$category%' OR title LIKE '%$category%' OR description LIKE '%$category%')";
            }

            // Apply price filter
            if (!empty($_GET['price'])) {
              $price_range = explode('-', $_GET['price']);
              if (count($price_range) == 2) {
                $min_price = intval($price_range[0]);
                $max_price = intval($price_range[1]);
                $product_query .= " AND price BETWEEN $min_price AND $max_price";
              } elseif ($_GET['price'] == '10000+') {
                $product_query .= " AND price > 10000";
              }
            }

            // Execute the query
            $product_result = mysqli_query($con, $product_query);
            if (mysqli_num_rows($product_result) > 0) {
              while ($product_details_data = mysqli_fetch_assoc($product_result)) {
          ?>
            <div class="col-md-4 mt-4">
              <div class="card-box-c foo">
                <div class="card-header-c">
                  <div class="card-box-ico">
                    <a href="product_details.php?id=<?php echo $product_details_data['id']; ?>">
                      <img src="admin/uploads/<?php echo $product_details_data['img_link'] ?>" alt="">
                    </a>
                  </div>
                  <div class="card-title-c align-self-center">
                    <p class="text-dark fs-4"><?php echo $product_details_data['title']; ?></p>
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
            } else {
              echo "<div class='col-md-12'><p class='text-center'>No products found matching your criteria.</p></div>";
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require('includes/footer.php'); ?>
