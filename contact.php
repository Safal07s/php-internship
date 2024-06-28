<?php require('includes/header.php'); ?>
<?php require('includes/navbar.php'); ?>

<main id="main">

  <!-- ======= Intro Single ======= -->
  <section class="intro-single">
    <div class="container "style="margin-top: -6rem ;">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">

          <?php
              $contacts="SELECT * FROM contacts";
              $contacts_result=mysqli_query($con,$contacts);
              $contacts_data=$contacts_result->fetch_assoc()
              ?>
            <h1 class="title-single"><?php echo $contacts_data['title']; ?></h1>
            <span class="color-text-a"><?php echo $contacts_data['description']; ?>
              </span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.php">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Contact
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section><!-- End Intro Single-->

  <!-- ======= Contact Single ======= -->
  <section class="contact">
    <div class="container">
      <div class="row">
      <?php
              $settings="SELECT * FROM settings";
              $settings_result=mysqli_query($con,$settings);
              while($settings_data=$settings_result->fetch_assoc()){
                if($settings_data['site_key']=='map'){
                  $map= $settings_data['site_value'];
                }
                if($settings_data['site_key']=='email'){
                  $email= $settings_data['site_value'];
                }
                if($settings_data['site_key']=='phone'){
                  $phone= $settings_data['site_value'];
                }
                if($settings_data['site_key']=='location'){
                  $location= $settings_data['site_value'];
                }
              }
              ?>
        <div class="col-sm-12">
          <div class="contact-map box">
            <div id="map" class="contact-map">
            <iframe src="<?php echo $map; ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
        <div class="col-sm-12 section-t8">
          <div class="row">
            <div class="col-md-7">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control form-control-lg form-control-a" placeholder="Your Name" required>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <input name="email" type="email" class="form-control form-control-lg form-control-a" placeholder="Your Email" required>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input type="text" name="subject" class="form-control form-control-lg form-control-a" placeholder="Subject" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea name="message" class="form-control" name="message" cols="45" rows="8" placeholder="Message" required></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 my-3">
                    <div class="mb-3">
                      <div class="loading">Loading</div>
                      <div class="error-message"></div>
                      <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                  </div>

                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-a">Send Message</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-md-5 section-md-t3">
              <div class="icon-box section-b2">
                <div class="icon-box-icon">
                  <span class="bi bi-envelope"></span>
                </div>
                <div class="icon-box-content table-cell">
                  <div class="icon-box-title">
                    <h4 class="icon-title">Say Hello</h4>
                  </div>
                  <div class="icon-box-content">
                    <p class="mb-1">Email.
                      <span class="color-a"><?php echo $email; ?></span>
                    </p>
                    <p class="mb-1">Phone.
                      <span class="color-a"><?php echo $phone; ?></span>
                    </p>
                  </div>
                </div>
              </div>
              <div class="icon-box section-b2">
                <div class="icon-box-icon">
                  <span class="bi bi-geo-alt"></span>
                </div>
                <div class="icon-box-content table-cell">
                  <div class="icon-box-title">
                    <h4 class="icon-title">Find us in</h4>
                  </div>
                  <div class="icon-box-content">
                    <p class="mb-1">
                     <?php echo $location; ?>
                      <br> 
                    </p>
                  </div>
                </div>
              </div>
              <div class="icon-box">
                <div class="icon-box-icon">
                  <span class="bi bi-share"></span>
                </div>
                <div class="icon-box-content table-cell">
                  <div class="icon-box-title">
                    <h4 class="icon-title">Social networks</h4>
                  </div>
                  <div class="icon-box-content">
                    <div class="socials-footer">
                      <ul class="list-inline ">
                        <li class="list-inline-item">
                          <a href="#" class="link-one">
                            <i class="bi bi-facebook" aria-hidden="true"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="#" class="link-one">
                            <i class="bi bi-twitter" aria-hidden="true"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="#" class="link-one">
                            <i class="bi bi-instagram" aria-hidden="true"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="#" class="link-one">
                            <i class="bi bi-linkedin" aria-hidden="true"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Contact Single-->

</main><!-- End #main -->

<?php require('includes/footer.php'); ?>