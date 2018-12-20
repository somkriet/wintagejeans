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

    <!-- Page Content -->
    <div class="container">
      <!-- <hr> -->

      <!-- <div class="my-4" style="font-size: 18px;">ขายดีประจำสัปดาห์</div> -->
      <!-- Marketing Icons Section -->
      <div class="col-lg-12">
     <!--  <div class="col-md-6">
         <?php
            foreach($productdetail as $r){
                $product_id = $r->product_id;
                $image = $r->product_image;
                $product_image = base_url().'backend/upload/'.$image;?> 
                  <li style="list-style:none;">
                    <div class="col-lg-12 mb-4">
                    <div class="card h-100">
                      <h4 class="card-header"><?php echo $r->product_name; ?></h4> -->
  <!--                     <div class="card-body">
                          <div class="col-md-4"> -->
                       <!--  <img width="410px" height="450px" src="<?php echo $product_image; ?>"/>
                        </div> -->
                     <!--  </div>
                      <div class="card-footer">
                        <div class="hp-mod-price-first-line">
                          <span class="price"><?php echo $r->product_name; ?></span>
                        </div>
                        <div class="hp-mod-price-first-line">
                          <span class="currency" style="color: red;">฿</span><span class="price" style="color: red;"><?php echo $r->product_price; ?></span>
                        </div>
                        <a href="<?php echo base_url().'productdetail/'.$product_id; ?>" >ดูรายละเอียดสินค้า</a>
                      </div>
                    </div>
                  </div>
                </li>
             <?php } ?>  --> 
      <!-- </div>  -->
      <!-- <div class="col-md-6">
         <span class="price"><?php echo $r->product_name; ?></span>
      </div>
 -->
    </div>
      <hr>


 
      <!-- Features Section -->
      <div class="row">
         <div class="col-lg-6">
          <?php
            foreach($productdetail as $r){
                $product_id = $r->product_id;
                $image = $r->product_image;
                $product_image = base_url().'backend/upload/'.$image;?>
          <img class="img-fluid rounded"  src="<?php echo $product_image; ?>" alt="">
        </div>
        <div class="col-lg-6">
          <h2><?php echo $r->product_name.'('.$product_id.')'; ?></h2>
          <!-- <p>The Modern Business template by Start Bootstrap includes:</p> -->
          <div class="panel panel-default">
            <div class="panel-body" style="size: 100px;">ราคา : <?php echo $r->product_price; ?> บาท</div>
          </div>
          <br>
          <ul>
            <li>
              <strong>รายละเอียดสินค้า :</strong>  <?php echo $r->product_detail; ?>
            </li>
            <li><strong>สี :</strong>  <?php echo $r->product_color; ?></li>
            <li><strong>ไซส์ :</strong>  <?php if($r->size_s > 0 ){ 
                          echo 'size s :'.$r->size_s;
                        }

                        if($r->size_m > 0 ){
                          echo 'size m :'.$r->size_m;
                        }

                        if($r->size_l > 0 ){
                          echo 'size l :'.$r->size_l;
                        }

                        if($r->size_xl > 0 ){
                          echo 'size xl :'.$r->size_xl;
                        }

                        if($r->size_2xl > 0 ){
                          echo 'size 2xl :'.$r->size_2xl;
                        }

                        if($r->size_3xl > 0 ){
                          echo 'size 3xl :'.$r->size_3xl;
                        }

                        if($r->size_4xl > 0 ){
                          echo 'size 4xl :'.$r->size_4xl;
                        }?>
                
            </li>
            <li><strong>หมวดหมู่สินค้า :</strong>  <?php echo $r->product_category_id; ?></li>
            <!-- <li>Unstyled page elements for easy customization</li> -->
          </ul>
          
          <button>หยิบใส่ตระกร้า</button> <button>ซื้อสินค้า</button>
        </div>
       <?php } ?>
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