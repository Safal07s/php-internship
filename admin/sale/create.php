<?php require('../includes/header.php'); ?>

<?php require('../includes/navbar.php'); ?>

<?php require('../includes/sidebar.php'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Create Sales</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Sales</li>
        <li class="breadcrumb-item active">Add File</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add Sales</h5>


            <?php

            if (isset($_POST['submit'])) {

              $name = $_POST['name'];
              $title = $_POST['title'];
              $description = $_POST['description'];
              $title = $_POST['title'];
              $filename = $_FILES['dataFile']['name'];
              $filesize = $_FILES['dataFile']['size'];
              $explode = explode('.', $filename);
              $file = strtolower($explode[0]);
              $ext = strtolower($explode[1]);
              $finalname = $file . time() . '.' . $ext;
              $sale_price = $_POST['sale_price'];
              $org_price = $_POST['org_price'];
              $size = $_POST['size'];
              $size = $_POST['size'];
              $color = $_POST['color'];

              if ($name!="" && $title != ""  && $description != "" && $sale_price != "" && $org_price != ""  && $filename != "") {
                if ($filesize > 20000) {
                  if ($ext == "png" || $ext == "jpg" || $ext == "jpeg") {
                    if (move_uploaded_file($_FILES['dataFile']['tmp_name'], '../uploads/' . $finalname)) {
                      $insert = "INSERT INTO sale(name,title,description,img_link,type,sale_price,org_price,size,color)  
                    VALUES ('$name','$title','$description', '$finalname', '$ext','$sale_price','$org_price', '$size','$color' )";
                      $result = mysqli_query($con, $insert);
                      if ($result) {
                        echo "Sales is submitted";

                        // header("Refresh:2; URl=index.php?success");
                        echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                      } else {

                        echo "Sales is not submitted";
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
                <label for="input1" class="form-label"> Name</label>
                <input type="text" class="form-control" name="name" id="input1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="input1" class="form-label"> Title</label>
                <input type="text" class="form-control" name="title" id="input1" aria-describedby="emailHelp">
              </div>
              
              <div class="mb-3">
                <label for="input1" class="form-label">Description</label>
                <textarea class="form-control" id="input1" name="description" rows="3"></textarea>
              </div>
            
              <div class="mb-3">
                <label for="input1" class="form-label">Image</label>
                <input type="file" class="form-control" name="dataFile" id="input1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="input1" class="form-label">Sale Price</label>
                <input type="number" class="form-control" name="sale_price" id="input1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="input1" class="form-label">Original Price</label>
                <input type="number" class="form-control" name="org_price" id="input1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="input1" class="form-label">Size</label>
                <input type="text" class="form-control" name="size" id="input1" aria-describedby="emailHelp">
              </div>
              
              <div class="mb-3">
                <label for="input1" class="form-label">Color</label>
                <input type="text" class="form-control" name="color" id="input1" aria-describedby="emailHelp">
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