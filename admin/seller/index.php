<?php require('../config/config.php');   ?>
<?php require('../includes/header.php'); ?>
<?php require('../auth/protected.php'); ?>

<?php require('../includes/navbar.php'); ?>

<?php require('../includes/sidebar.php'); ?>


<main id="main" class="main">
  <?php
  if (isset($_GET['delete'])) {
  ?>
    <div class=" container alert alert-success alert-dismissible fade show" role="alert">
      <strong>Seller is Deleted!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php
    // header("Refresh:2; URL=index.php");
    echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
  }
  ?>

  <div class="pagetitle">
    <h1>Manage Seller</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Seller</li>
        <li class="breadcrumb-item active">Manage Seller</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Manage Seller</h5>

            <!-- Table with stripped rows -->
            <a class="btn btn-primary btn-sm " href="create.php" role="button">Add Seller </a>

            <table class="table datatable">
              <thead>
                <tr>
                  <th>
                    #
                  </th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Role</th>
                  <th>Action</th>

                </tr>
              </thead>
              <tbody>
              <?php
                if (isset($_POST['role_change'])) {
                  // var_dump($_POST);
                  $role = $_POST['role'];
                  $id = $_POST['id'];


                  // Validate input
                  if ($role != "") {
                    $query = "UPDATE seller SET role='$role' WHERE id='$id'";
                    $result = mysqli_query($con, $query);

                    if (!$result) {
                      die('Role update query failed: ' . mysqli_error($con));
                    } else {
                      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                      <strong>Role is Updated</strong>
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
                      echo "<meta http-equiv='refresh' content='2;URL=index.php?success'>";
                    }
                  } else {
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                  <strong>Role or ID is empty</strong>
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
                  }
                } ?>

                <?php

                $select = 'SELECT *FROM seller';
                $result = mysqli_query($con, $select);
                $i = 1;
                while ($data = $result->fetch_assoc()) {
                ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data['role']; ?></td>
                    <td>
                      <a class="btn btn-primary btn-sm " href="edit.php?id=<?php echo $data['id']; ?>" role="button">Edit </a>
                      <a class="btn btn-danger btn-sm " onclick="return confirm('Do you want to delete this user?');" href="delete.php?id=<?php echo $data['id']; ?>">Delete </a>
                       <!-- Button trigger modal -->
                       <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $data['id']; ?>">
                        Change Role
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal<?php echo $data['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog        ">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" id="exampleModalLabel">Change Role</h4>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="role pb-2">
                                <h5>0-Customer, 1-Admin, 2-Seller </h5>

                              </div>
                              <div class="rolemanage">
                                <h3>
                                  Change Your Role
                                </h3>

                                <div class="col-md-6">
                                  <label for="inputEmail5" class="form-label">Role</label>

                                  <form action="" method="post" enctype="multipart/form-data">

                                    <input type="text" class="form-control" name="role" value="<?php echo  $data['role']; ?>" id="inputEmail5">
                                    <input type="text" class="form-control d-none" name="id" value="<?php echo  $data['id']; ?>" id="inputEmail5">
                                    <button type="submit" class="btn btn-primary" name="role_change">Save changes</button>

                                  </form>
                                </div>
                              </div>
                            </div>
                            <!-- HTML and modal structure should be checked for proper form submission -->


                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>


                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                <?php
                }

                ?>

              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
<?php require('../includes/footer.php'); ?>