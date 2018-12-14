<!DOCTYPE html>
<html lang="en">

  <head>
    <?php $this->load->view("templates/header"); ?>

  </head>

  <body>
    <?php $this->load->view("templates/nav"); ?>

<header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('http://placehold.it/1900x1080')">
            <div class="carousel-caption d-none d-md-block">
              <h3>First Slide</h3>
              <p>This is a description for the first slide.</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Second Slide</h3>
              <p>This is a description for the second slide.</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Third Slide</h3>
              <p>This is a description for the third slide.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>


    <!-- Page Content -->
    <div class="container">
       <br>
       <div class="row mb-4">
        <div class="col-md-2" align="center">
          <div class="logo"><a href="https://www.shopbearhug.com/th" data-spy="affix" data-offset-top="600" class="affix-top"><img width="150px;" src="assets/img/wintage_logo.png" alt="wintage_logo" class="img-thumbnail"></a>
            </div>
         
        </div>
        <div class="col-md-8">
           <div style="font-size: 25px;">Wintage Jeans</div>
           <p>จำหน่ายสินค้า กางเกงยีนส์แฟชัน กางเกงทรงบอย กางเกงขาเดฟ กระโปรงยีนส์<br> แจ็คเก็ตยีนส์ กางเกงยีนส์ขาสั้นแฟชัน เอ๊๊ยมกระโปรงยีนส์ เอี๊ยมขายาว ทั้งปลีกและส่ง</p>
        </div>
        <div class="col-md-2">
          <div><?=$this->lang->line("contact_us"); ?> </div>
          <img width="40px;" src="assets/img/icon_facebook.png" alt="wintage_facebook" class="img-thumbnail"> <a href="https://www.facebook.com/wintagejeans/" target="_blank">facebook</a><br>
          <img width="40px;" src="assets/img/icon_instagram.png" alt="wintage_instagram" class="img-thumbnail"> <a href="https://www.instagram.com/wintage.jeans/" target="_blank">instagram</a><br>
          <img width="40px;" src="assets/img/icon_line.png" alt="wintage_line" class="img-thumbnail"> <a href="http://line.me/ti/p/%40nvy1441y" target="_blank">line</a><br>
         <!--  <a class="btn btn-lg btn-secondary btn-block" href="#"><img width="50px;" src="assets/img/wintage_logo.png" alt="wintage_logo" class="img-thumbnail"> Call to Action</a> -->

        </div>
      </div>
      <hr>

      <div class="my-4" style="font-size: 18px;">ขายดีประจำสัปดาห์</div>
      <!-- Marketing Icons Section -->
      <div class="row">
         <?php
            foreach($product as $r){
                $product_id = $r->product_id;
                $image = $r->product_image;
                // $product_image = base_url().'assets/img/category/'.$product_image;
                // $product_image = 'http://localhost/wintagejeans/backend/'.'upload/'.$image;
                $product_image = base_url().'backend/upload/'.$image;?> 
                  <li style="list-style:none;">
                    <div class="col-lg-12 mb-4">
                    <div class="card h-100">
                     <!--  <h4 class="card-header"><?php echo $r->product_name; ?></h4> -->
                      <div class="card-body">
                         <!-- <div class="col-md-4"> -->
                       <img width="210px" height="250px" class="border rounded" src="<?php echo $product_image; ?>"/>
                        <!-- </div> -->
                      </div>
                      <div class="card-footer">
                        <div class="hp-mod-price-first-line">
                          <span class="price"><?php echo $r->product_name; ?></span>
                        </div>
                        <div class="hp-mod-price-first-line">
                          <span class="currency" style="color: red;">฿</span><span class="price" style="color: red;"><?php echo $r->product_price; ?></span>
                        </div>
                        <!-- <a href="<?php echo base_url().'productdetail/'.$product_id; ?>" > -->
                          <a href="<?php echo base_url().'productdetail/show/'.$product_id; ?>" >ดูรายละเอียดสินค้า</a>
                      </div>
                    </div>
                  </div>
                </li>
             <?php } ?> 

       <!--  <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Card Title</h4>
            <div class="card-body">
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div> -->
       <!--  <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Card Title</h4>
            <div class="card-body">
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Card Title</h4>
            <div class="card-body">
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div> -->
      </div>
      <!-- /.row -->
      <hr>


      <!-- Portfolio Section -->
<!--       <h2>กางเกงยีนส์ขาสั้น</h2>

      <div class="row">
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project One</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Two</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Three</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos quisquam, error quod sed cumque, odio distinctio velit nostrum temporibus necessitatibus et facere atque iure perspiciatis mollitia recusandae vero vel quam!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Four</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Five</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Six</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque earum nostrum suscipit ducimus nihil provident, perferendis rem illo, voluptate atque, sit eius in voluptates, nemo repellat fugiat excepturi! Nemo, esse.</p>
            </div>
          </div>
        </div>
      </div> -->
      <!-- /.row -->

      <!-- Features Section -->
      <div class="row">
        <div class="col-lg-6">
          <h2>Modern Business Features</h2>
          <p>The Modern Business template by Start Bootstrap includes:</p>
          <ul>
            <li>
              <strong>Bootstrap v4</strong>
            </li>
            <li>jQuery</li>
            <li>Font Awesome</li>
            <li>Working contact form with validation</li>
            <li>Unstyled page elements for easy customization</li>
          </ul>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
        </div>
        <div class="col-lg-6">
          <img class="img-fluid rounded" src="http://placehold.it/700x450" alt="">
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Call to Action Section -->
      <div class="row mb-4">
        <div class="col-md-8">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
        </div>
        <div class="col-md-4">
          <a class="btn btn-lg btn-secondary btn-block" href="#">Call to Action</a>
        </div>
      </div>

    </div>
    <!-- /.container -->

        <?php $this->load->view("templates/footer"); ?>

  </body>

</html>