<?php require('includes/header.php'); ?>
<?php require('includes/navbar.php'); ?>

<main id="main">


  <!-- ======= About Section ======= -->
  <section class="section-about">
    <div class="container">

    <?php
      $privacy_policy = "SELECT * FROM privacy_policy";
      $privacy_policy_result = mysqli_query($con, $privacy_policy);
      $privacy_policy_data = $privacy_policy_result->fetch_assoc();
      ?>
      <div class="row">
        <div class="col-md-12 section-t8 ">
          <div class="col-md-6 col-lg-5 section-md-t3">
            <div class="title-box-d">
              <h1 class="title-d">
              <?php echo $privacy_policy_data['top_title']; ?>
                <br />
              </h1>
            </div>
            <h3 class="text-dark">
            <?php echo $privacy_policy_data['title']; ?>
            </h3>
          </div>
          <section>

            <p><?php echo $privacy_policy_data['description']; ?>
            </p>
          </section>

        </div>
      </div>
    </div>
  </section>


</main>
<!-- End #main -->

<?php require('includes/footer.php') ?>