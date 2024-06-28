<!-- navbar.php -->
<?php
// Start session to manage user state


// Include database configuration
require('admin/config/config.php'); // Ensure this file contains your database connection code

// Fetch the logo data for the navbar
$logo_query = "SELECT * FROM logo";
$logo_result = mysqli_query($con, $logo_query);
$logo_data = $logo_result->fetch_assoc();

// Fetch the total number of items in the cart
$cart_count_query = "SELECT SUM(quantity) AS total_items FROM cart";
$cart_count_result = mysqli_query($con, $cart_count_query);
$total_items = 0;
if ($cart_count_result) {
    $row = mysqli_fetch_assoc($cart_count_result);
    $total_items = $row['total_items'] ? $row['total_items'] : 0; // Default to 0 if no items
}
?>

<!-- Navbar HTML (update this part of navbar.php) -->
<nav class="navbar navbar-default navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container-fluid">
    <!-- Brand/logo -->
    <a class="navbar-brand ps-3" href="index.php">
      <img src="admin/uploads/<?php echo $logo_data['img_link']; ?>" alt="QuickMart Logo" width="80" height="50">
    </a>
    <!-- Toggler/collapsible Button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
    <!-- Navbar Links -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- Categories Dropdown -->
        <li class="nav-item dropdown ps-5">
          <a class="nav-link dropdown-toggle text-dark" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
            <i class="fa-solid fa-chevron-down ps-2"></i>
          </a>
          <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
            <?php
            $categories = "SELECT * FROM categories";
            $categories_result = mysqli_query($con, $categories);
            while ($categories_data = $categories_result->fetch_array()) {
            ?>
              <li><a class="dropdown-item" href="categories.php?id=<?php echo $categories_data['id']; ?>"><?php echo $categories_data['name']; ?></a></li>
            <?php
            }
            ?>
          </ul>
        </li>
        <!-- Explore Dropdown -->
        <li class="nav-item dropdown ps-5">
          <a class="nav-link dropdown-toggle text-dark" href="#" id="exploreDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Explore
            <i class="fa-solid fa-chevron-down ps-2"></i>
          </a>
          <ul class="dropdown-menu" aria-labelledby="exploreDropdown">
            <li><a class="dropdown-item" href="seller_registration.php">Become a Seller</a></li>
            <li><a class="dropdown-item" href="payment_methods.php">Payment Methods</a></li>
            <li><a class="dropdown-item" href="help_support.php">Help & Support</a></li>
          </ul>
        </li>
        <!-- View Cart -->
        <li class="nav-item ps-5">
          <a class="nav-link text-dark" href="cart.php" style="position: relative;">
            View Cart
            <i class="fa fa-shopping-cart ps-2" aria-hidden="true"></i>
            <span id="navbarCartCount" class="badge bg-light text-dark" style="position: absolute; top: -10px; right: -10px; display: <?php echo ($total_items > 0) ? 'inline' : 'none'; ?>;">
              <?php echo $total_items; ?>
            </span>
          </a>
        </li>
      </ul>
      <!-- Search Form -->
      <form class="d-flex ps-5" role="search" action="search.php" method="get">
        <input class="form-control me-2" type="search" name="search" placeholder="Search..." aria-label="Search">
        <button class="btn btn-outline-secondary" type="submit">
          <i class="fa-solid fa-magnifying-glass text-color"></i>
        </button>
      </form>
      <!-- User Actions: Login / Signup or Profile -->
      <?php
      if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        $select = "SELECT * from customer where id = '$id'";
        $result = mysqli_query($con, $select);
        if (mysqli_num_rows($result) > 0) {
          $data = mysqli_fetch_assoc($result);
          $username = $data['username'];
      ?>
        <div class="d-flex align-items-center ps-3">
          <a class="nav-link text-dark" href="">
            <div class="dropdown">
              <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-regular fa-user pe-2"></i><?php echo $username; ?>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="logout_pr.php">Logout</a></li>
              </ul>
            </div>
          </a>
        </div>
      <?php
        }
      } else {
      ?>
        <div class="d-flex align-items-center ps-5">
          <a class="nav-link text-dark" href="login.php">
            <i class="fa-regular fa-user"></i> Login
          </a>
          <span class="text-dark mx-2">|</span>
          <a class="nav-link text-dark" href="signup.php">Signup</a>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
</nav>

<!-- Include Bootstrap JS and optionally Popper.js for dropdown functionality -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
// Function to fetch and update cart count dynamically
function updateCartCount() {
  $.ajax({
    url: 'fetch_cart_count.php', // PHP script to fetch cart count
    type: 'GET',
    success: function(data) {
      let count = parseInt(data, 10);
      let cartCountBadge = $('#navbarCartCount');
      if (count > 0) {
        cartCountBadge.text(count);
        cartCountBadge.show();
      } else {
        cartCountBadge.hide();
      }
    }
  });
}

// Call updateCartCount initially on page load
$(document).ready(function() {
  updateCartCount(); // Update cart count on page load
});
</script>

