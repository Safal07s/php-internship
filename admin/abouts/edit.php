<?php require('../includes/header.php'); ?>
<?php require('../auth/protected.php'); ?>

<?php require('../includes/navbar.php'); ?>

<?php require('../includes/sidebar.php'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Update Abouts</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Abouts</li>
        <li class="breadcrumb-item active">Update Abouts</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Update Abouts</h5>

     
            <!-- copied -->

            <?php

            if (isset($_GET['id'])) {

              $id = $_GET['id'];
              $query = "SELECT * FROM abouts WHERE id=$id";
              $result = mysqli_query($con, $query);
              $data = $result->fetch_assoc();
            }

            ?>

            <?php

            if (isset($_POST['submit'])) {
              $top_title = $_POST['top_title'];
              $title = $_POST['title'];
              $file_name = $_FILES['dataFile']['name'];
              $file_size = $_FILES['dataFile']['size'];
              $description = $_POST['description'];

              // submit previous file
              if ($top_title != "" && $title!="" && $file_name == "" && $description != "") {
                $querry = "UPDATE  abouts  SET  top_title='$top_title', title= '$title', description='$description' WHERE id='$id'";

                $result = mysqli_query($con, $querry);
                if ($result) {
                  echo "Updated title and description";
                } else
                  echo "not updated";
              }

              // submit new file & replace old file
              if ($top_title != "" && $title !="" && $file_name != "" && $description != "") {

                if ($file_size < 2000000) {
                  $explode = explode('.', $file_name); // explode cuts the name after the dot.
                  $file = strtolower($explode[0]);
                  $ext = strtolower($explode[1]);
                  $replace = str_replace(' ', '', $file); //to remove space
                  $finalname = $replace . time() . '.' . $ext; //concating names with time
                  $target_file = '../uploads/' . $finalname;
                  if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {

                    // replace old file
                    $oldfilelink = $data['img_link']; //file link from database
                    $finallink = '../uploads/' . $oldfilelink;
                    unlink($finallink);

                    if (move_uploaded_file($_FILES['dataFile']['tmp_name'], $target_file)) {

                      $querry = "UPDATE  abouts  SET  top_title='$top_title',title= '$title', img_link='$finalname', type='$ext',description='$description'  WHERE id='$id'";
                      $result = mysqli_query($con, $querry);
                      if ($result) {
                        ?>
                        <div class="alert alert-success" role="alert">
                          <h4 class="alert-heading">Abouts is updated.</h4>
                          </div>
                        <?php
                        echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                      } else {
                        echo "File is not uploaded";
                      }
                    } else {
                      echo "file upload failed";
                    }
                  } else {

                    echo "extension doesn't mattch";
                  }
                } else {
            ?>
                  <div class="alert alert-primary" role="alert">
                    file size must be less than 2MB
                  </div>

                <?php

                }
              } else {
                ?>
                <div class="alert alert-primary" role="alert">
                  Updated Succsefully
                </div>

            <?php
                echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
              }
            }
            ?>


            <a class="btn btn-success btn-sm " href="index.php" role="button">Manage Abouts </a>
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="input1" class="form-label">Top Title</label>
                <input type="text" class="form-control" name="top_title" value="<?php echo $data['top_title']; ?>" id="input1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="input1" class="form-label"> Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo $data['title']; ?>" id="input1" aria-describedby="emailHelp">
              </div>

              <div class="mb-3">
                <label for="input1" class="form-label">Description</label>
                <textarea class="form-control" id="input1" name="description" rows="3"><?php echo $data['description']; ?></textarea>
              </div>

              <div class="mb-3">
                <img src="../uploads/<?php echo $data['img_link'] ?>" alt="" width="100" height="100">
              </div>

              <div class="mb-3">
                <label for="input1" class="form-label">Image</label>
                <input type="file" class="form-control" name="dataFile" value="" id="input1" aria-describedby="emailHelp">

              </div>





              <button type="submit" class="btn btn-danger btn-sm" name="submit">Update</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<?php require('../includes/footer.php'); ?>