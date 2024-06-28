<?php require('includes/header.php'); ?>
<?php require('includes/navbar.php'); ?>

<main id="main">


  <!-- ======= About Section ======= -->
  <section class="section-about">

  <?php
      $legal_rights = "SELECT * FROM legal_rights";
      $legal_rights_result = mysqli_query($con, $legal_rights);
      $legal_rights_data = $legal_rights_result->fetch_assoc();
      ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12 section-t8 position-relative">
          <div class="row">
            <div class="col-md-6 col-lg-5">
              <img src="admin/uploads/<?php echo $legal_rights_data['img_link']; ?>" alt="" class="img-fluid" />
            </div>

            <div class="col-md-6 col-lg-5 section-md-t3">
              <div class="title-box-d">
                <h3 class="title-d">
                <?php echo $legal_rights_data['title']; ?>
                  <br />
                </h3>
              </div>
              <p class="text-dark">
                &copy;Copyrights <?php echo $legal_rights_data['copyright_title']; ?>
              </p>
              <p><?php echo $legal_rights_data['description']; ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


</main>
<!-- End #main -->

<?php require('includes/footer.php') ?>