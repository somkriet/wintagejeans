
<!DOCTYPE html>
<html lang="en">

  <head>
    <?php $this->load->view("templates/header"); ?>
    <link href="<?php echo base_url("assets/css/login-from.css"); ?>" rel="stylesheet">

  </head>

  <body>
    <?php $this->load->view("templates/nav"); ?>

 <!--  <div class="container">
    <div class="col-xs-6">
        <h2>Vertical (basic) form</h2>
    <form action="/action_page.php">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
      </div>
      <div class="checkbox">
        <label><input type="checkbox" name="remember"> Remember me</label>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    </div>

    
  </div> -->

 <div class="container">
 <!-- Stack the columns on mobile by making one full-width and the other half-width -->
<div class="row" >
  <div class="col-2 col-md-3">
  </div>
  <div class="col-12 col-md-6" >
    <!-- .col-12 .col-md-8 -->
    <h2>Login</h2>
    <form action="/action_page.php">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
      </div>
      <div class="checkbox">
        <label><input type="checkbox" name="remember"> Remember me</label>
      </div>
      <button type="submit" class="btn btn-default" align="center">Submit</button>
    </form>


  </div>
  <!-- <div class="col-6 col-md-4">.col-6 .col-md-4</div> -->
</div>

<!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
<!-- <div class="row">
  <div class="col-6 col-md-4">.col-6 .col-md-4</div>
  <div class="col-6 col-md-4">.col-6 .col-md-4</div>
  <div class="col-6 col-md-4">.col-6 .col-md-4</div>
</div> -->

<!-- Columns are always 50% wide, on mobile and desktop -->
<!-- <div class="row">
  <div class="col-6">.col-6</div>
  <div class="col-6">.col-6</div>
</div> -->
</div>


   

        <?php $this->load->view("templates/footer"); ?>

  </body>

</html>

