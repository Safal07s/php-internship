<?php require('../includes/header.php'); ?>
<?php require('../auth/protected.php'); ?>

<?php require('../includes/navbar.php'); ?>

<?php require('../includes/sidebar.php'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Create Settings</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Setings</li>
        <li class="breadcrumb-item active">Create Setings</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Create Settings</h5>

            <?php

            if (isset($_POST['submit'])) {
              $site_key = $_POST['site_key'];
              $site_value = $_POST['site_value'];
              // $username = $_POST['username'];
              // $password = md5($_POST['password']);

              if ($site_key != ""  && $site_value != "" ) {
                $insert = "INSERT INTO settings(site_key, site_value)
VALUES('$site_key',  '$site_value')";
                $result = mysqli_query($con, $insert);

                if ($result) {
            ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Settings is created</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php
                  // header("Refresh:2; URL=index.php?success");
                  echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                } else {
                ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Settings is not created</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            <?php
                  // header("Refresh:2; URL=create.php?error");
                  echo "<meta http-equiv=\"refresh\" content=\"2;URL=create.php?error\">";
                }
              } else {

                header("Refresh:0; URL=create.php?empty");
              }
            }

            ?>


            <!-- Multi Columns Form -->
            <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="inputName5" class="form-label">Site_key</label>
                <input type="text" class="form-control" name="site_key" id="inputName5">
              </div>
              <div class="mb-3">
                <label for="inputName5" class="form-label">Site_value</label>
                <input type="text" class="form-control" name="site_value" id="inputName5">
              </div>
             
             
              
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </form><!-- End Multi Columns Form -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<?php require('../includes/footer.php'); ?>