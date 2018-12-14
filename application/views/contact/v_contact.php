<!DOCTYPE html>
<html lang="en">

  <head>
    <?php $this->load->view("templates/header"); ?>

  </head>

  <body>
    <?php $this->load->view("templates/nav"); ?>

<header>
   
</header>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Product</li>
  </ol>
</nav>

<div class="container">

  <div class="row">
         <div class="col-lg-6">
            <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d112061.09262729759!2d77.208022!3d28.632485!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x644e33bc3def0667!2sIndior+Tours+Pvt+Ltd.!5e0!3m2!1sen!2sus!4v1527779731123" width="100%" height="650px" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
         </div>

         <div class="col-lg-6">
            <div class="contact-form">
              <h1 class="title">Contact Us</h1>
              <h2 class="subtitle">We are here assist you.</h2>
              <form action="">
                <input type="text" name="name" class="form-control" placeholder="Your Name" /><br>
                <input type="email" name="e-mail" class="form-control" placeholder="Your E-mail Adress" /><br>
                <input type="tel" name="phone" class="form-control" placeholder="Your Phone Number"/><br>
                <textarea name="text" id="" rows="8" class="form-control" placeholder="Your Message"></textarea><br>
                <button class="btn-send">Get a Call Back</button>
              </form>
            </div>
         </div>
  </div>


  
  
</div>

  <?php $this->load->view("templates/footer"); ?>

  </body>

</html>