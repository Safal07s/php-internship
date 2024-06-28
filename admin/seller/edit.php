<?php require('../includes/header.php'); ?>
<?php require('../auth/protected.php'); ?>

<?php require('../includes/navbar.php'); ?>

<?php require('../includes/sidebar.php'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Update Seller</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Seller</li>
        <li class="breadcrumb-item active">Update Seller</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Update Seller</h5>

            <?php
            if (isset($_GET['id'])) {
              $id = $_GET['id'];
              $show_query = "SELECT *FROM seller WHERE id='$id'";
              $show_result = mysqli_query($con, $show_query);
              // To get only one row data
              $data = mysqli_fetch_assoc($show_result);
              // $data = $show_result->fetch_assoc();
            }

            if (isset($_POST['submit'])) {
              $name = $_POST['name'];
              $email = $_POST['email'];
              $username = $_POST['username'];
              // $password = $_POST['password'];

              // validation to input field
              if ($name != "" && $email != "" && $username != "") {
                $query = " UPDATE seller SET name='$name', email='$email', username='$username' WHERE id='$id'"; // variable
                $result = mysqli_query($con, $query); // connect to database



                if ($result) {
            ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Seller is Updated</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php
                  // header("Refresh:2; URL=index.php?success");
                  echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php?success\">";
                } else {
                ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Seller is not Updated</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            <?php
                  header("Refresh:2; URL=edit.php?error");
                }
              } else {

                header("Refresh:0; URL=edit.php?empty");
              }
            }

            ?>


            <!-- Multi Columns Form -->
            <a class="btn btn-success btn-sm " href="index.php" role="button">Manage Seller </a>
            <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
              <div class="col-md-6">
                <label for="inputName5" class="form-label">Your Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo  $data['name']; ?>" id="inputName5">
              </div>
              <div class="col-md-6">
                <label for="inputEmail5" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo  $data['email']; ?>" id="inputEmail5">
              </div>
              <div class="col-md-6">
                <label for="inputPassword5" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo  $data['username']; ?>" id="inputPassword5">
              </div>
             
              <div class="col-md-12">
                <button type="submit" class="btn btn-danger" name="submit">Update</button>
              </div>
            </form><!-- End Multi Columns Form -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<?php require('../includes/footer.php'); ?>