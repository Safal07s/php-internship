<?php
// Start session


// Include required files
require('admin/config/config.php'); // Ensure this file contains your database connection code
require('includes/header.php');
require('includes/navbar.php');

// Fetch all cart items
$cart_items_query = "SELECT * FROM cart"; // Removing the status filter to see all items
$cart_items_result = mysqli_query($con, $cart_items_query);

// Check for SQL error
if (!$cart_items_result) {
    echo "Error: " . mysqli_error($con);
    exit();
}

// Initialize totals
$total_items = 0;
$total_amount = 0;

// Calculate totals
$cart_items = []; // Array to store cart items for display
while ($cart_item = mysqli_fetch_assoc($cart_items_result)) {
    $total_items += $cart_item['quantity'];
    $total_amount += $cart_item['price'] * $cart_item['quantity'];
    $cart_items[] = $cart_item; // Collect items for display
}
?>

<section class="mt-5 h-100 gradient-custom">
  <div class="container py-5">
    <div class="row d-flex justify-content-center my-4">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">Cart - <span id="cartCountDisplay"><?php echo $total_items; ?></span> items</h5>
          </div>
          <div class="card-body">
            <!-- Display each cart item -->
            <?php
            if (count($cart_items) == 0) {
                echo "<p>Your cart is empty.</p>";
            } else {
                foreach ($cart_items as $cart_item) {
            ?>
              <div class="row mb-4">
                <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                  <!-- Image -->
                  <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                    <img src="admin/uploads/<?php echo $cart_item['img_link']; ?>" class="w-100" alt="" />
                    <a href="#!">
                      <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                    </a>
                  </div>
                  <!-- Image -->
                </div>

                <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                  <!-- Data -->
                  <p><strong><?php echo $cart_item['title']; ?></strong></p>
                  <p>Color: <?php echo $cart_item['color']; ?></p>
                  <p>Size: <?php echo $cart_item['size']; ?></p>
                  <button type="button" class="btn btn-primary btn-sm me-1 mb-2 remove-item" data-item-id="<?php echo $cart_item['id']; ?>" title="Remove item">
                    <i class="fas fa-trash"></i>
                  </button>
                  <button type="button" class="btn btn-danger btn-sm mb-2" data-mdb-tooltip-init title="Move to the wish list">
                    <i class="fas fa-heart"></i>
                  </button>
                  <!-- Data -->
                </div>

                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                  <!-- Quantity -->
                  <div class="d-flex mb-4" style="max-width: 300px">
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-height btn-light px-3 me-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                      <i class="fas fa-minus text-dark"></i>
                    </button>

                    <div data-mdb-input-init class="form-outline">
                      <input id="form1" min="0" name="quantity" value="<?php echo $cart_item['quantity']; ?>" type="number" class="form-control" />
                      <label class="form-label" for="form1">Quantity</label>
                    </div>

                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-height btn-light px-3 ms-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                      <i class="fas fa-plus text-dark"></i>
                    </button>
                  </div>
                  <!-- Quantity -->

                  <!-- Price -->
                  <p class="text-start text-md-center">
                    <strong>Rs <?php echo number_format($cart_item['price'] *  $cart_item['quantity'], 2); ?></strong>
                  </p>
                  <!-- Price -->
                </div>
              </div>
              <hr class="my-4" />
            <?php
                }
            }
            ?>
            <!-- End of cart items loop -->
          </div>
        </div>

        <div class="card mb-4 mb-lg-0">
          <div class="card-body">
            <p><strong>We accept</strong></p>
            <img class="me-2" width="120px" src="https://cdn.esewa.com.np/ui/images/esewa_og.png?111" alt="eSewa" />
            <img class="me-2" width="120px" src="https://logowik.com/content/uploads/images/219_visa.jpg" alt="Visa" />
            <img class="me-2" width="120px" src="https://miro.medium.com/v2/resize:fit:1006/1*xqUNa2hUbiis04Z2XTr4Jw.png" alt="Mastercard" />
            <img class="me-2" width="120px" src="https://is1-ssl.mzstatic.com/image/thumb/Purple211/v4/f9/b5/24/f9b5249b-b2bd-4582-cfd9-8a184ef32c46/AppIcon-0-0-1x_U007emarketing-0-7-0-sRGB-85-220.png/1200x630wa.png" alt="PayPal" />
          </div>
        </div>
      </div>
      
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">Summary</h5>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                Products
                <span>Rs <?php echo number_format($total_amount, 2); ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                Shipping
                <span>Gratis</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                  <strong>Total amount</strong>
                  <strong>
                    <p class="mb-0">(including VAT)</p>
                  </strong>
                </div>
                <span><strong>Rs <?php echo number_format($total_amount, 2); ?></strong></span>
              </li>
            </ul>
            <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn check btn-lg btn-block" onclick="location.href='payment_methods.php'">
              Go to checkout
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require('includes/footer.php'); ?>

<!-- Include jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
// Function to fetch and update cart count
function updateCartCount() {
    $.ajax({
        url: 'fetch_cart_count.php', // PHP script to fetch cart count
        type: 'GET',
        success: function(data) {
            $('#cartCountDisplay').text(data); // Update cart count display
            $('#navbarCartCount').text(data); // Update cart count display
        }
    });
}
// Function to update cart item quantity
function updateCartItem(itemId, quantity) {
    $.ajax({
        url: 'update_cart_item.php', // PHP script to update cart item quantity
        type: 'POST',
        data: { id: itemId, quantity: quantity },
        success: function(response) {
            if (response.status === 'success') {
                updateCartSummary(); // Update cart summary upon successful update
            } else {
                alert(response.message); // Alert if update fails
            }
        }
    });
}

// Add this to cart.php
$(document).ready(function() {
    // Update count on page load
    updateCartCount();

    // Change quantity event handler
    $('.btn.btn-light.px-3.me-2').on('click', function() {
        var input = $(this).siblings('input[type="number"]');
        var newQuantity = parseInt(input.val()) - 1;
        var itemId = input.attr('id').split('_')[1];

        if (newQuantity >= 0) {
            input.val(newQuantity);
            updateCartItem(itemId, newQuantity);
        }
    });

    $('.btn.btn-light.px-3.ms-2').on('click', function() {
        var input = $(this).siblings('input[type="number"]');
        var newQuantity = parseInt(input.val()) + 1;
        var itemId = input.attr('id').split('_')[1];

        input.val(newQuantity);
        updateCartItem(itemId, newQuantity);
    });

    // Remove item event handler
    $('.remove-item').on('click', function() {
        var itemId = $(this).data('item-id');
        if (confirm('Are you sure you want to remove this item?')) {
            $.post('delete_cart_item.php', { id: itemId }, function(response) {
                if (response.status === 'success') {
                    window.location.reload(true); // Reload the page to reflect changes
                } else {
                    alert(response.message);
                }
            }, 'json');
        }
    });
});



// Function to change quantity of cart item (increment or decrement)
function changeQuantity(itemId, change) {
    var quantityElement = $('#quantity_' + itemId);
    var newQuantity = parseInt(quantityElement.val()) + change;
    if (newQuantity >= 0) {
        quantityElement.val(newQuantity);
        updateCartItem(itemId, newQuantity);
    }
}

// Call updateCartCount initially on page load
$(document).ready(function() {
    updateCartCount(); // Update cart count on page load
});

document.addEventListener('DOMContentLoaded', function() {
    // Attach event listener to all remove buttons
    document.querySelectorAll('.remove-item').forEach(function(button) {
        button.addEventListener('click', function() {
            var itemId = this.getAttribute('data-item-id');
            if (confirm('Are you sure you want to remove this item?')) {
                // Make an AJAX request to delete the item
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'delete_cart_item.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function() {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.status === 'success') {
                            // Reload the current page after deletion
                            window.location.reload(true); // Force reload from server
                        } else {
                            alert(response.message);
                        }
                    } else {
                        alert('An error occurred while trying to remove the item.');
                    }
                };

                xhr.send('id=' + itemId);
            }
        });
    });
});

function updateCartSummary() {
    // Fetch all remaining cart items and update the summary
    var totalItems = 0;
    var totalAmount = 0;

    document.querySelectorAll('.row.mb-4').forEach(function(item) {
        var quantity = parseInt(item.querySelector('input[name="quantity"]').value);
        var price = parseFloat(item.querySelector('.text-start.text-md-center strong').textContent.replace('Rs ', '').replace(',', ''));
        totalItems += quantity;
        totalAmount += price * quantity;
    });

    document.querySelector('.card-header h5').textContent = 'Cart - ' + totalItems + ' items';
    document.querySelector('.list-group-item:nth-of-type(1) span').textContent = 'Rs ' + totalAmount.toFixed(2);
    document.querySelector('.list-group-item:nth-of-type(3) span strong').textContent = 'Rs ' + totalAmount.toFixed(2);

    updateCartCount(); // Update cart count display
}
</script>
