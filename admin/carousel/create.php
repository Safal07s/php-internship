<?php require('../includes/header.php'); ?>
<?php require('../auth/protected.php'); ?>

<?php require('../includes/navbar.php'); ?>

<?php require('../includes/sidebar.php'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Create Carousel</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Carousel</li>
        <li class="breadcrumb-item active">Add Carousel</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add Carousel</h5>


            <?php

            if (isset($_POST['submit'])) {

             
              $filename = $_FILES['dataFile']['name'];
              $filesize = $_FILES['dataFile']['size'];
              $explode = explode('.', $filename);
              $file = strtolower($explode[0]);
              $ext = strtolower($explode[1]);
              $finalname = $file . time() . '.' . $ext;
              $description = $_POST['description'];
              $button = $_POST['button'];

              if ($button != "" && $description != "" && $filename != "") {
                if ($filesize > 20000) {
                  if ($ext == "png" || $ext == "jpg" || $ext == "jpeg") {
                    if (move_uploaded_file($_FILES['dataFile']['tmp_name'], '../uploads/' . $finalname)) {
                      $insert = "INSERT INTO carousel(description,button,img_link,type)  
                    VALUES ('$description','$button', '$finalname', '$ext')";
                      $result = mysqli_query($con, $insert);
                      if ($result) {
                        echo "File is submitted";

                        // header("Refresh:2; URl=index.php?success");
                        echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                      } else {

                        echo "File is not submitted";
                      }
                    } else {
                      echo "File is not uploaded";
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
                <label for="input1" class="form-label">Button</label>
                <input type="text" class="form-control" name="button" id="input1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="input1" class="form-label">Image</label>
                <input type="file" class="form-control" name="dataFile" id="input1" aria-describedby="emailHelp">
              </div>

              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
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