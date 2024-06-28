<?php require('includes/header.php'); ?>
<?php require('includes/navbar.php'); ?>


<main id="main">
    <section class="section-services section-t8">
        <div class="container" style="margin-top: -2rem ;">

            <div class="row">
                <div class="col-md-12">
                    <?php

                    if (isset($_GET['id'])) {

                        $id = $_GET['id'];
                        $categories = "SELECT * FROM categories WHERE id=$id";
                        $categories_result = mysqli_query($con, $categories);
                        $categories_data = $categories_result->fetch_assoc();
                        $category_name = $categories_data['name'];
                        // $result = mysqli_query($con, $query);
                        // $data = $result->fetch_assoc();
                    }

                    ?>
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a"><?php echo $categories_data['name']; ?></h2>
                        </div>

                    </div>
                </div>
            </div>


            <div class="row" style="margin-top: -4rem ;">
                <?php
                if (isset($category_name)) {
                    $product_details = "SELECT * FROM product_details WHERE category_name='$category_name'";
                    $product_details_result = mysqli_query($con, $product_details);
                    while ($product_details_data = $product_details_result->fetch_array()) {
                ?>
                        <div class="col-md-4 mt-4">
                            <div class="card-box-c foo">
                                <div class="card-header-c   ">
                                    <div class="card-box-ico">
                                        <a href="product_details.php?id=<?php echo $product_details_data['id']; ?>">
                                            <img src="admin/uploads/<?php echo $product_details_data['img_link'] ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="card-title-c align-self-center">
                                        <p class="text-dark fs-4 "><?php echo $product_details_data['title']; ?> </p>
                                        <h3 class="content-c text-color">
                                            Rs:<?php echo $product_details_data['price']; ?>
                                        </h3>
                                        <button type="button" class="btn check" onclick="location.href='product_details.php?id=<?php echo $product_details_data['id']; ?>'">View More <span class="bi bi-chevron-right"></span></button>

                                    </div>
                                </div>

                            </div>
                        </div>
                <?php
                    }
                }
                ?>






            </div>






        </div>
    </section>

</main>
<!-- End #main -->

<?php require('includes/footer.php'); ?>