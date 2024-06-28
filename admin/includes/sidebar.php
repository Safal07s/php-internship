
 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" href="../dashboard.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

<?php if( $_SESSION['Role']==1){ ?>



  <!-- admin -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#admin" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Admin</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="admin" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="../admin/create.php">
          <i class="bi bi-circle"></i><span>Create Admin</span>
        </a>
      </li>
      <li>
        <a href="../admin/index.php">
          <i class="bi bi-circle"></i><span>Manage Admin</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->




<!-- seller -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#seller" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Seller</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="seller" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="../seller/create.php">
          <i class="bi bi-circle"></i><span>Create Seller</span>
        </a>
      </li>
      <li>
        <a href="../seller/index.php">
          <i class="bi bi-circle"></i><span>Manage Sellers</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->

  <!-- logo -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#logo" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Logo</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="logo" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="../logo/create.php">
          <i class="bi bi-circle"></i><span>Create Logo</span>
        </a>
      </li>
      <li>
        <a href="../logo/index.php">
          <i class="bi bi-circle"></i><span>Manage Logo</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->


  <!-- categories -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#categories" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="categories" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="../categories/create.php">
          <i class="bi bi-circle"></i><span>Create Categories</span>
        </a>
      </li>
      <li>
        <a href="../categories/index.php">
          <i class="bi bi-circle"></i><span>Manage Categories</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->


  <!-- explore -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#explore" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Explore</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="explore" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="../explore/create.php">
          <i class="bi bi-circle"></i><span>Create Explore</span>
        </a>
      </li>
      <li>
        <a href="../explore/index.php">
          <i class="bi bi-circle"></i><span>Manage Explore</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->

  <!-- carousel -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#carousel" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Carousel</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="carousel" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="../carousel/create.php">
          <i class="bi bi-circle"></i><span>Create Carousel</span>
        </a>
      </li>
      <li>
        <a href="../carousel/index.php">
          <i class="bi bi-circle"></i><span>Manage Carousel</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->

  <!-- site map -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#site_map" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Site Map</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="site_map" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="../site_map/create.php">
          <i class="bi bi-circle"></i><span>Create Site Map</span>
        </a>
      </li>
      <li>
        <a href="../site_map/index.php">
          <i class="bi bi-circle"></i><span>Manage Site Map</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->


  <!-- legal rights -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#legal_rights" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Legal Rights</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="legal_rights" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="../legal_rights/create.php">
          <i class="bi bi-circle"></i><span>Create Legal Rights</span>
        </a>
      </li>
      <li>
        <a href="../legal_rights/index.php">
          <i class="bi bi-circle"></i><span>Manage Legal Rights</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->

  <!-- privacy policy -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#privacy_policy" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Privacy Policy</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="privacy_policy" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="../privacy_policy/create.php">
          <i class="bi bi-circle"></i><span>Create Privacy Policy</span>
        </a>
      </li>
      <li>
        <a href="../privacy_policy/index.php">
          <i class="bi bi-circle"></i><span>Manage Privacy Policy</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->





  <!-- contacts -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#contacts" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Contacts</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="contacts" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="../contacts/create.php">
          <i class="bi bi-circle"></i><span>Create Contacts</span>
        </a>
      </li>
      <li>
        <a href="../contacts/index.php">
          <i class="bi bi-circle"></i><span>Manage Contacts</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->

  <!-- abouts -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#abouts" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Abouts</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="abouts" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="../abouts/create.php">
          <i class="bi bi-circle"></i><span>Create Abouts</span>
        </a>
      </li>
      <li>
        <a href="../abouts/index.php">
          <i class="bi bi-circle"></i><span>Manage Abouts</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->

  <!-- ceo -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#ceo" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>CEO</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="ceo" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="../ceo/create.php">
          <i class="bi bi-circle"></i><span>Create CEO</span>
        </a>
      </li>
      <li>
        <a href="../ceo/index.php">
          <i class="bi bi-circle"></i><span>Manage CEO</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->


  
  <!-- settings  -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#settings" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="settings" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="../settings/create.php">
          <i class="bi bi-circle"></i><span>Add Settings</span>
        </a>
      </li>
      <li>
        <a href="../settings/index.php">
          <i class="bi bi-circle"></i><span>Manage Settings</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->

<?php }?> 

  <!-- customer -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#customer" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Customer</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="customer" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="../customer/create.php">
          <i class="bi bi-circle"></i><span>Create Customer</span>
        </a>
      </li>
      <li>
        <a href="../customer/index.php">
          <i class="bi bi-circle"></i><span>Manage Customer</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->

  <!-- cart -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#cart" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Cart</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="cart" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="../cart/create.php">
          <i class="bi bi-circle"></i><span>Create Cart</span>
        </a>
      </li>
      <li>
        <a href="../cart/index.php">
          <i class="bi bi-circle"></i><span>Manage Cart</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->


  <!-- sale -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#sale" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Sale</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="sale" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="../sale/create.php">
          <i class="bi bi-circle"></i><span>Create Sales</span>
        </a>
      </li>
      <li>
        <a href="../sale/index.php">
          <i class="bi bi-circle"></i><span>Manage Sales</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->


  <!-- product details  -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#product_details" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Product Details</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="product_details" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="../product_details/create.php">
          <i class="bi bi-circle"></i><span>Create Product Details</span>
        </a>
      </li>
      <li>
        <a href="../product_details/index.php">
          <i class="bi bi-circle"></i><span>Manage Product Details</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->


 
</ul>

</aside><!-- End Sidebar-->
