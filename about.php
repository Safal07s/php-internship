<?php require('includes/header.php'); ?>
<?php require('includes/navbar.php'); ?>

<main id="main">
  <!-- ======= Intro Single ======= -->
  <?php
  $abouts = "SELECT * FROM abouts";
  $abouts_result = mysqli_query($con, $abouts);
  $abouts_data = $abouts_result->fetch_assoc();
  ?>


  <section class="intro-single">
    <div class="container " style="margin-top: -6rem ;">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">
              <?php echo $abouts_data['top_title']; ?>

            </h1>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.php">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                About
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!-- End Intro Single-->

  <!-- ======= About Section ======= -->
  <section class="section-about">
    <div class="container" style="margin-top: -8rem ;">
      <div class="row">
        <div class="col-md-12 section-t8 position-relative">
          <div class="row">
            <div class="col-md-6 col-lg-5">
              <img src="admin/uploads/<?php echo $abouts_data['img_link']; ?>" alt="" class="img-fluid" />
            </div>

            <div class="col-md-6 col-lg-5 section-md-t3">
              <div class="title-box-d">
                <h3 class="title-d">
                  <?php echo $abouts_data['title']; ?>

                  <br />
                </h3>
              </div>
              <p class="color-text-a">
                <?php echo $abouts_data['description']; ?>

              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-about">
    <div class="container" style="margin-top: -8rem ;">
      <?php
        $ceo="SELECT * FROM ceo";
        $ceo_result=mysqli_query($con,$ceo);
        $ceo_data=$ceo_result->fetch_assoc();
      ?>

      <div class="row">
        <div class="col-md-12 section-t8 position-relative">
          <div class="row">
            <div class="col-md-6 col-lg-5">
              <img src="admin/uploads/<?php echo $ceo_data['img_link']; ?>" alt="" class="img-fluid" />
            </div>

            <div class="col-md-6 col-lg-5 section-md-t3">
              <div class="title-box-d">
                <h3 class="title-d">
                  <?php echo $ceo_data['title'] ?><br />
                </h3>
              </div>
              <p class="color-text-a">
              <?php echo $ceo_data['description']; ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<!-- End #main -->

<?php require('includes/footer.php') ?>