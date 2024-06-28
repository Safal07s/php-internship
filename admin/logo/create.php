<?php require('../includes/header.php'); ?>
<?php require('../auth/protected.php'); ?>

<?php require('../includes/navbar.php'); ?>

<?php require('../includes/sidebar.php'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Create Logo</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Logo</li>
        <li class="breadcrumb-item active">Add Logo</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add Logo</h5>


            <?php

            if (isset($_POST['submit'])) {

              $filename = $_FILES['dataFile']['name'];
              $filesize = $_FILES['dataFile']['size'];
              $explode = explode('.', $filename);
              $file = strtolower($explode[0]);
              $ext = strtolower($explode[1]);
              $finalname = $file . time() . '.' . $ext;

              if ( $filename != "") {
                if ($filesize > 20000) {
                  if ($ext == "png" || $ext == "jpg" || $ext == "jpeg") {
                    if (move_uploaded_file($_FILES['dataFile']['tmp_name'], '../uploads/' . $finalname)) {
                      $insert = "INSERT INTO logo(img_link,type)  
                    VALUES ( '$finalname', '$ext')";
                      $result = mysqli_query($con, $insert);
                      if ($result) { 
                        echo "Logo is submitted";

                        // header("Refresh:2; URl=index.php?success");
                        echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                      } else {

                        echo "Logo is not submitted";
                      }
                    } else {
                      echo "Logo is not uploaded";
                    }
                  } else {
                    echo "File extension does not match";
                  }
                } else {
                  echo "File size must be 2kb";
                }
              } else {
                echo "All fields are required";
              }
            }

            ?>
            <form action="" method="POST" enctype="multipart/form-data">
              
              <div class="mb-3">
                <label for="input1" class="form-label">Image</label>
                <input type="file" class="form-control" name="dataFile" id="input1" aria-describedby="emailHelp">
              </div>

              

              <button type="submit" class="btn btn-danger btn-sm" name="submit">Submit</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<?php require('../includes/footer.php'); ?>