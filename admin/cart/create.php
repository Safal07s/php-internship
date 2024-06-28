<?php require('../includes/header.php'); ?>

<?php require('../includes/navbar.php'); ?>

<?php require('../includes/sidebar.php'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Create Cart</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Cart</li>
        <li class="breadcrumb-item active">Add File</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add Cart</h5>


            <?php

            if (isset($_POST['submit'])) {

              $title = $_POST['title'];
              $filename = $_FILES['dataFile']['name'];
              $filesize = $_FILES['dataFile']['size'];
              $explode = explode('.', $filename);
              $file = strtolower($explode[0]);
              $ext = strtolower($explode[1]);
              $finalname = $file . time() . '.' . $ext;
              $price = $_POST['price'];
              $size = $_POST['size'];
              $color = $_POST['color'];
              $quantity = $_POST['quantity'];

              if ($title != "" && $price != "" && $filename != "" && $price !="" && $size !="" && $color !="" && $quantity !="") {
                if ($filesize > 20000) {
                  if ($ext == "png" || $ext == "jpg" || $ext == "jpeg") {
                    if (move_uploaded_file($_FILES['dataFile']['tmp_name'], '../uploads/' . $finalname)) {
                      $insert = "INSERT INTO cart(title,img_link,type,price,size,color,quantity)  
                    VALUES ( '$title', '$finalname', '$ext', '$price', '$size', '$color', '$quantity')";
                      $result = mysqli_query($con, $insert);
                      if ($result) {
                        echo "Cart is submitted";

                        // header("Refresh:2; URl=index.php?success");
                        echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                      } else {

                        echo "Cart is not submitted";
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
                <label for="input1" class="form-label"> Title</label>
                <input type="text" class="form-control" name="title" id="input1" aria-describedby="emailHelp" required>
              </div>
              <div class="mb-3">
                <label for="input1" class="form-label"> Price</label>
                <input type="text" class="form-control" name="price" id="input1" aria-describedby="emailHelp" required>
              </div>
              <div class="mb-3">
                <label for="input1" class="form-label"> Size</label>
                <input type="text" class="form-control" name="size" id="input1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="input1" class="form-label"> Color</label>
                <input type="text" class="form-control" name="color" id="input1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="input1" class="form-label"> Quantity</label>
                <input type="text" class="form-control" name="quantity" id="input1" aria-describedby="emailHelp" required>
              </div>
              <div class="mb-3">
                <label for="input1" class="form-label">Image</label>
                <input type="file" class="form-control" name="dataFile" id="input1" aria-describedby="emailHelp" required>
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