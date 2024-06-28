<?php require('config/config.php'); ?>
<?php require('auth/secure.php'); ?>
<?php
if (isset($_SESSION['Role']) && $_SESSION['Role']!='1'){
  header('location:customer/index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/logo_favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="dashboard.php" class="logo d-flex align-items-center">
    <img src="../assets/img/logo_fav.png" alt="">
    <span class="d-none d-lg-block">Quick Mart</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<div class="search-bar">
  <form class="search-form d-flex align-items-center" method="POST" action="#">
    <input type="text" name="query" placeholder="Search" title="Enter search keyword">
    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
  </form>
</div><!-- End Search Bar -->

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li><!-- End Search Icon-->

 

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6>Kevin Anderson</h6>
          <span>Web Designer</span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
            <i class="bi bi-gear"></i>
            <span>Account Settings</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
            <i class="bi bi-question-circle"></i>
            <span>Need Help?</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="auth/logout-process.php">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" href="dashboard.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->


  <?php if( $_SESSION['Role']==1 ){?>

 
 <!-- admin -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#admin" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Admin</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="admin" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="admin/create.php">
          <i class="bi bi-circle"></i><span>Create Admin</span>
        </a>
      </li>
      <li>
        <a href="admin/index.php">
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
        <a href="seller/create.php">
          <i class="bi bi-circle"></i><span>Create Seller</span>
        </a>
      </li>
      <li>
        <a href="seller/index.php">
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
        <a href="logo/create.php">
          <i class="bi bi-circle"></i><span>Create Logo</span>
        </a>
      </li>
      <li>
        <a href="logo/index.php">
          <i class="bi bi-circle"></i><span>Manage Logo</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->


  <!-- categoriees -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#categories" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="categories" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="categories/create.php">
          <i class="bi bi-circle"></i><span>Create Categories</span>
        </a>
      </li>
      <li>
        <a href="categories/index.php">
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
        <a href="explore/create.php">
          <i class="bi bi-circle"></i><span>Create Explore</span>
        </a>
      </li>
      <li>
        <a href="explore/index.php">
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
        <a href="carousel/create.php">
          <i class="bi bi-circle"></i><span>Create Carousel</span>
        </a>
      </li>
      <li>
        <a href="carousel/index.php">
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
        <a href="site_map/create.php">
          <i class="bi bi-circle"></i><span>Create Site Map</span>
        </a>
      </li>
      <li>
        <a href="site_map/index.php">
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
        <a href="legal_rights/create.php">
          <i class="bi bi-circle"></i><span>Create Legal Rights</span>
        </a>
      </li>
      <li>
        <a href="legal_rights/index.php">
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
        <a href="privacy_policy/create.php">
          <i class="bi bi-circle"></i><span>Create Privacy Policy</span>
        </a>
      </li>
      <li>
        <a href="privacy_policy/index.php">
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
        <a href="contacts/create.php">
          <i class="bi bi-circle"></i><span>Create Contacts</span>
        </a>
      </li>
      <li>
        <a href="contacts/index.php">
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
        <a href="abouts/create.php">
          <i class="bi bi-circle"></i><span>Create Abouts</span>
        </a>
      </li>
      <li>
        <a href="abouts/index.php">
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
        <a href="ceo/create.php">
          <i class="bi bi-circle"></i><span>Create CEO</span>
        </a>
      </li>
      <li>
        <a href="ceo/index.php">
          <i class="bi bi-circle"></i><span>Manage CEO</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->


  <!-- settings -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#settings" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="settings" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="settings/create.php">
          <i class="bi bi-circle"></i><span>Add Settings</span>
        </a>
      </li>
      <li>
        <a href="settings/index.php">
          <i class="bi bi-circle"></i><span>Manage Settings</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->
 <?php }
?>
  <!-- customer -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#customer" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Customers</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="customer" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="customer/create.php">
          <i class="bi bi-circle"></i><span>Create Customer</span>
        </a>
      </li>
      <li>
        <a href="customer/index.php">
          <i class="bi bi-circle"></i><span>Manage Customers</span>
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
        <a href="cart/create.php">
          <i class="bi bi-circle"></i><span>Create Cart</span>
        </a>
      </li>
      <li>
        <a href="cart/index.php">
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
        <a href="sale/create.php">
          <i class="bi bi-circle"></i><span>Create Sales</span>
        </a>
      </li>
      <li>
        <a href="sale/index.php">
          <i class="bi bi-circle"></i><span>Manage Sales</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->
  

  <!-- product details -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#product_details" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Product Details</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="product_details" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="product_details/create.php">
          <i class="bi bi-circle"></i><span>Create Product Details</span>
        </a>
      </li>
      <li>
        <a href="product_details/index.php">
          <i class="bi bi-circle"></i><span>Manage Product Details</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->


</ul>

</aside><!-- End Sidebar-->


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Sales <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>145</h6>
                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Revenue <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>$3,264</h6>
                      <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Customers <span>| This Year</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>1244</h6>
                      <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Reports <span>/Today</span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Sales',
                          data: [31, 40, 28, 51, 42, 82, 56],
                        }, {
                          name: 'Revenue',
                          data: [11, 32, 45, 32, 34, 52, 41]
                        }, {
                          name: 'Customers',
                          data: [15, 11, 32, 18, 9, 24, 11]
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'datetime',
                          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Recent Sales <span>| Today</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a href="#">#2457</a></th>
                        <td>Brandon Jacob</td>
                        <td><a href="#" class="text-primary">At praesentium minu</a></td>
                        <td>$64</td>
                        <td><span class="badge bg-success">Approved</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2147</a></th>
                        <td>Bridie Kessler</td>
                        <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                        <td>$47</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2049</a></th>
                        <td>Ashleigh Langosh</td>
                        <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                        <td>$147</td>
                        <td><span class="badge bg-success">Approved</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>Angus Grady</td>
                        <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                        <td>$67</td>
                        <td><span class="badge bg-danger">Rejected</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>Raheem Lehner</td>
                        <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                        <td>$165</td>
                        <td><span class="badge bg-success">Approved</span></td>
                      </tr>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title">Top Selling <span>| Today</span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Sold</th>
                        <th scope="col">Revenue</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-1.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa voluptas nulla</a></td>
                        <td>$64</td>
                        <td class="fw-bold">124</td>
                        <td>$5,828</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-2.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Exercitationem similique doloremque</a></td>
                        <td>$46</td>
                        <td class="fw-bold">98</td>
                        <td>$4,508</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-3.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Doloribus nisi exercitationem</a></td>
                        <td>$59</td>
                        <td class="fw-bold">74</td>
                        <td>$4,366</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-4.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum error</a></td>
                        <td>$32</td>
                        <td class="fw-bold">63</td>
                        <td>$2,016</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-5.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Sit unde debitis delectus repellendus</a></td>
                        <td>$79</td>
                        <td class="fw-bold">41</td>
                        <td>$3,239</td>
                      </tr>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Recent Activity <span>| Today</span></h5>

              <div class="activity">

                <div class="activity-item d-flex">
                  <div class="activite-label">32 min</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">56 min</div>
                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                  <div class="activity-content">
                    Voluptatem blanditiis blanditiis eveniet
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 hrs</div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
                    Voluptates corrupti molestias voluptatem
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">1 day</div>
                  <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                  <div class="activity-content">
                    Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 days</div>
                  <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                  <div class="activity-content">
                    Est sit eum reiciendis exercitationem
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">4 weeks</div>
                  <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                  <div class="activity-content">
                    Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                  </div>
                </div><!-- End activity item-->

              </div>

            </div>
          </div><!-- End Recent Activity -->

          <!-- Budget Report -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Budget Report <span>| This Month</span></h5>

              <div id="budgetChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                    legend: {
                      data: ['Allocated Budget', 'Actual Spending']
                    },
                    radar: {
                      // shape: 'circle',
                      indicator: [{
                          name: 'Sales',
                          max: 6500
                        },
                        {
                          name: 'Administration',
                          max: 16000
                        },
                        {
                          name: 'Information Technology',
                          max: 30000
                        },
                        {
                          name: 'Customer Support',
                          max: 38000
                        },
                        {
                          name: 'Development',
                          max: 52000
                        },
                        {
                          name: 'Marketing',
                          max: 25000
                        }
                      ]
                    },
                    series: [{
                      name: 'Budget vs spending',
                      type: 'radar',
                      data: [{
                          value: [4200, 3000, 20000, 35000, 50000, 18000],
                          name: 'Allocated Budget'
                        },
                        {
                          value: [5000, 14000, 28000, 26000, 42000, 21000],
                          name: 'Actual Spending'
                        }
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div><!-- End Budget Report -->

          <!-- Website Traffic -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Website Traffic <span>| Today</span></h5>

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Access From',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [{
                          value: 1048,
                          name: 'Search Engine'
                        },
                        {
                          value: 735,
                          name: 'Direct'
                        },
                        {
                          value: 580,
                          name: 'Email'
                        },
                        {
                          value: 484,
                          name: 'Union Ads'
                        },
                        {
                          value: 300,
                          name: 'Video Ads'
                        }
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div><!-- End Website Traffic -->

          <!-- News & Updates Traffic -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>

              <div class="news">
                <div class="post-item clearfix">
                  <img src="assets/img/news-1.jpg" alt="">
                  <h4><a href="#">Nihil blanditiis at in nihil autem</a></h4>
                  <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/news-2.jpg" alt="">
                  <h4><a href="#">Quidem autem et impedit</a></h4>
                  <p>Illo nemo neque maiores vitae officiis cum eum turos elan dries werona nande...</p>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/news-3.jpg" alt="">
                  <h4><a href="#">Id quia et et ut maxime similique occaecati ut</a></h4>
                  <p>Fugiat voluptas vero eaque accusantium eos. Consequuntur sed ipsam et totam...</p>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/news-4.jpg" alt="">
                  <h4><a href="#">Laborum corporis quo dara net para</a></h4>
                  <p>Qui enim quia optio. Eligendi aut asperiores enim repellendusvel rerum cuder...</p>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/news-5.jpg" alt="">
                  <h4><a href="#">Et dolores corrupti quae illo quod dolor</a></h4>
                  <p>Odit ut eveniet modi reiciendis. Atque cupiditate libero beatae dignissimos eius...</p>
                </div>

              </div><!-- End sidebar recent posts-->

            </div>
          </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>