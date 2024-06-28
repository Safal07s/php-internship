<?php require('includes/header.php'); ?>
<?php require('includes/navbar.php'); ?>

<main id="main">

  <!-- ======= Intro Single ======= -->

  <section class="intro-single">
    <div class="container" style="margin-top: -6rem ;">
      <?php
      $site_map = "SELECT * FROM site_map";
      $site_map_result = mysqli_query($con, $site_map);
      $site_map_data = $site_map_result->fetch_assoc();
      ?>
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single"><?php echo $site_map_data['title']; ?></h1>
            <span class="color-text-a">
              <?php echo $site_map_data['description']; ?>
            </span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.php">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Sitemap
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section><!-- End Intro Single-->

  <!-- ======= Contact Single ======= -->
  <section class="contact">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="contact-map box">
            <div id="map" class="contact-map">
              <?php
              $settings="SELECT * FROM settings";
              $settings_result=mysqli_query($con,$settings);
              while($settings_data=$settings_result->fetch_assoc()){
                if($settings_data['site_key']=='map'){
                  $map= $settings_data['site_value'];
                }
              }
              ?>
              <iframe src="<?php echo $map;?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section><!-- End Contact Single-->

</main><!-- End #main -->

<?php require('includes/footer.php'); ?>