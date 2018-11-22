<?php $this->load->view('template/header'); ?>

  <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Product</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="col-sm-6 col-lg-12">
                 
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                  ADD PRODUCT
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">ADD PRODUCT</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="col-sm-6 col-lg-12">
                            <div class="col-sm-3 col-lg-3">
                                id :
                            </div>
                            <div class="col-sm-3 col-lg-9">
                                <input type="text" class="form-control" name="pro_id" id="pro_id">
                            </div>
                        </div><br><br>

                        <div class="col-sm-6 col-lg-12">
                            <div class="col-sm-3 col-lg-3">
                                name :
                            </div>
                            <div class="col-sm-3 col-lg-9">
                                <input type="text" class="form-control" name="pro_name" id="pro_name">
                            </div>
                        </div><br><br>

                        <div class="col-sm-6 col-lg-12">
                            <div class="col-sm-3 col-lg-3">
                                detail :
                            </div>
                            <div class="col-sm-3 col-lg-9">
                                <!-- <input type="text" name="pro_detail" id="pro_detail"> -->
                                <div class="form-group">
                                <!-- <label for="exampleFormControlTextarea1">Example textarea</label> -->
                                <textarea class="form-control" id="pro_detail" rows="5"></textarea>
                                <span id="countdown_textarea" class="help-block countdown-textarea text-left"></span>
                              </div>
                            </div>
                        </div><br><br>

                        <div class="col-sm-6 col-lg-12">
                            <div class="col-sm-3 col-lg-3">
                                image :
                            </div>
                            <div class="col-sm-3 col-lg-9"> 
                                <form method="post" id="upload_form" align="center" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input  type="file" class="form-control" name="image_file" id="image_file" />
                                        <br /> 
                                        <input type="submit"  name="upload" id="upload" value="Upload" class="form-control btn btn-info" />
                                    </div>
                                </form>
                                 
                                <div id="uploaded_image"></div>

                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-12"><br>
                            <div class="col-sm-3 col-lg-3">
                                price :
                            </div>
                            <div class="col-sm-3 col-lg-9">
                                <input type="number" class="form-control" name="pro_price" id="pro_price">
                            </div>
                        </div>

                       <!--  <div class="col-sm-6 col-lg-12">
                            <div class="col-sm-3 col-lg-4">
                                amount :
                            </div>
                            <div class="col-sm-3 col-lg-8">
                                <input type="text" name="pro_amount" id="pro_amount">
                            </div>
                        </div><br><br> -->

                        <div class="col-sm-6 col-lg-12"><br>
                            <div class="col-sm-3 col-lg-3">
                                color :
                            </div>
                            <div class="col-sm-3 col-lg-9">
                                <input type="text" class="form-control" name="pro_color" id="pro_color">
                            </div>
                        </div><br><br>

                        <div class="col-sm-6 col-lg-12"><br>
                            <div class="col-sm-3 col-lg-3">
                                size s:
                            </div>
                            <div class="col-sm-3 col-lg-9">
                                <input type="number" class="form-control" name="pro_size_s" id="pro_size_s">
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-12"><br>
                            <div class="col-sm-3 col-lg-3">
                                size m:
                            </div>
                            <div class="col-sm-3 col-lg-9">
                                <input type="number" class="form-control" name="pro_size_m" id="pro_size_m">
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-12"><br>
                            <div class="col-sm-3 col-lg-3">
                                size l:
                            </div>
                            <div class="col-sm-3 col-lg-9">
                                <input type="number" class="form-control" name="pro_size_l" id="pro_size_l">
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-12"><br>
                            <div class="col-sm-3 col-lg-3">
                                size xl:
                            </div>
                            <div class="col-sm-3 col-lg-9">
                                <input type="number" class="form-control" name="pro_size_xl" id="pro_size_xl">
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-12"><br>
                            <div class="col-sm-3 col-lg-3">
                                size 2xl:
                            </div>
                            <div class="col-sm-3 col-lg-9">
                                <input type="number" class="form-control" name="pro_size_2xl" id="pro_size_2xl">
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-12"><br>
                            <div class="col-sm-3 col-lg-3">
                                size 3xl:
                            </div>
                            <div class="col-sm-3 col-lg-9">
                                <input type="number" class="form-control" name="pro_size_3xl" id="pro_size_3xl">
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-12"><br>
                            <div class="col-sm-3 col-lg-3">
                                size 4xl:
                            </div>
                            <div class="col-sm-3 col-lg-9">
                                <input type="number" class="form-control" name="pro_size_4xl" id="pro_size_4xl">
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-12"><br>
                            <div class="col-sm-3 col-lg-3">
                                category :
                            </div>
                            <div class="col-sm-3 col-lg-9">
                                <select class="form-control chooseproduct" id="sel1">
                                    <?php
                                    $cate_num = 1;
                                    foreach ($product_category as $row) {
                                        $cate_id = $row->cate_id;
                                        $cate_name = $row->category_name_th;
                                        echo '<option name="pro_category" id="pro_category" value="' . $cate_num . '">' . $cate_name . '</option>';
                                        $cate_num++;
                                    }
                                    ?>
                                </select>
                            </div>
                        </div><br><br>    
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                        <button type="button" name="btn_add_product" id="btn_add_product" class="btn btn-primary">SAVE</button>
                      </div>
                    </div>
                  </div>
                </div>

            </div><br><br>
           
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">ลำดับ</th>
                  <th scope="col">รูปสินค้า</th>
                  <th scope="col">ชื่อสินค้า</th>
                  <th scope="col">ราคาขาย</th>
                  <th scope="col">จำนวนสินค้า</th>
                  <th scope="col">จัดการสินค้า</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                    $num = 0 ; 
                    foreach ($product as $k) {
                        $product_id = $k->product_id;
                        $product_image = $k->product_image;
                        $product_image = base_url().'upload/'.$product_image;?> 
                    <tr>
                      <th scope="row"><?php echo $num+1?></th>
                      <td><img width=110px" src="<?php echo $product_image; ?>"/></td>
                      <td><?php echo $k->product_name;?></td>
                      <td><?php echo $k->product_price;?></td>
                      <td><?php echo $k->product_amount;?></td>
                      <td>
                        <button type="button" class="btn btn-primary"  onclick="btn_editproduct(<?php echo $product_id; ?>);">EDIT
                        </button> / <button>DELETE</button>
                      </td>
                    </tr>
               <?php 
                    $num++; 
                    } 
               ?>


               <!-- <?php //print_r($product); ?> -->


               <!--  <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td colspan="2">Larry the Bird</td>
                  <td>@twitter</td>
                  <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editproduct">
                  ADD PRODUCT
                </button> / <button>DELETE</button></td>
                </tr> -->
              </tbody>
            </table>
           
            

                <!-- Modal -->
                <div class="modal fade" id="editproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">EDIT PRODUCT</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="col-sm-6 col-lg-12">
                            <div class="col-sm-3 col-lg-4">
                                id :
                            </div>
                            <div class="col-sm-3 col-lg-8">
                                <input type="text" name="edit_pro_id" id="edit_pro_id">
                            </div>
                        </div><br><br>

                        <div class="col-sm-6 col-lg-12">
                            <div class="col-sm-3 col-lg-4">
                                name :
                            </div>
                            <div class="col-sm-3 col-lg-8">
                                <input type="text" name="edit_pro_name" id="edit_pro_name">
                            </div>
                        </div><br><br>

                        <div class="col-sm-6 col-lg-12">
                            <div class="col-sm-3 col-lg-4">
                                detail :
                            </div>
                            <div class="col-sm-3 col-lg-8">
                                <!-- <input type="text" name="edit_pro_detail" id="edit_pro_detail"> -->
                                <div class="form-group">
                                <!-- <label for="exampleFormControlTextarea1">Example textarea</label> -->
                                <textarea class="form-control" id="edit_pro_detail" rows="5"></textarea>
                              </div>

                            </div>
                        </div><br><br>

                        <div class="col-sm-6 col-lg-12">
                            <div class="col-sm-3 col-lg-4">
                                image :
                            </div>
                            <div class="col-sm-3 col-lg-8"> 
                                <!-- <input type="text" name="pro_image" id="pro_image"> -->
                                <input type="file" name="edit_pro_image" size="3" />
                            </div>
                        </div><br><br>

                        <div class="col-sm-6 col-lg-12">
                            <div class="col-sm-3 col-lg-4">
                                price :
                            </div>
                            <div class="col-sm-3 col-lg-8">
                                <input type="text" name="edit_pro_price" id="edit_pro_price">
                            </div>
                        </div><br><br>

                        <div class="col-sm-6 col-lg-12">
                            <div class="col-sm-3 col-lg-4">
                                amount :
                            </div>
                            <div class="col-sm-3 col-lg-8">
                                <input type="text" name="edit_pro_amount" id="edit_pro_amount">
                            </div>
                        </div><br><br>

                        <div class="col-sm-6 col-lg-12">
                            <div class="col-sm-3 col-lg-4">
                                color :
                            </div>
                            <div class="col-sm-3 col-lg-8">
                                <input type="text" name="edit_pro_color" id="edit_pro_color">
                            </div>
                        </div><br><br>

                        <div class="col-sm-6 col-lg-12">
                            <div class="col-sm-3 col-lg-4">
                                category :
                            </div>
                            <div class="col-sm-3 col-lg-8">
                                <select class="form-control chooseproduct" id="edit_pro_category" name="edit_pro_category">
                                    <?php
                                    $cate_num = 1;
                                    foreach ($product_category as $row) {
                                        $cate_id = $row->cate_id;
                                        $cate_name = $row->category_name_th;
                                        echo '<option value="' . $cate_num . '">' . $cate_name . '</option>';
                                        $cate_num++;
                                    }
                                    ?>
                                </select>
                            </div>
                        </div><br><br>    
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                        <button type="button" name="btn_add_product" id="btn_add_product" class="btn btn-primary">SAVE</button>
                      </div>
                    </div>
                  </div>
                </div>


            </div>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
</body>
</html>
<script src="<?php echo base_url("assets/js/characterCountdown.js"); ?>"></script>
<script type="text/javascript">

    $(document).ready(function(){  
      $('#upload_form').on('submit', function(e){  
           e.preventDefault();  
           if($('#image_file').val() == '')  
           {  
                alert("Please Select the File");  
           }  
           else  
           {  
                $.ajax({  
                     url:"<?php echo site_url(); ?>Product/upload_file",   
                     //base_url() = http://localhost/tutorial/codeigniter  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     success:function(data)  
                     {  
                          $('#uploaded_image').html(data);  
                     }  
                });  
           }  
      });  
 });  

    $('#pro_detail').characterCountdown({
        defaultText: 'เหลือตัวอักษรอีก: ',
        countdownTarget: '#countdown_textarea',
        maxChars: 500
    });
    
    $('#btn_add_product').on('click', function() {

        var pro_id = $("#pro_id").val();
        var pro_name = $("#pro_name").val();
        var pro_detail = $("#pro_detail").val();
        var pro_image = $("#image_file").val();
        var pro_price = $("#pro_price").val();
        var pro_amount = $("#pro_amount").val();
        var pro_color = $("#pro_color").val();
        var pro_category = $("#pro_category").val();

        var filename = pro_image.replace(/C:\\fakepath\\/, '');

        // console.log('url img :'+ filename);    

        if (pro_id == "") {
            swal("Good job!", "You clicked pro_id!", "error", {
                  button: "Aww yiss!",
                });
        }else if (pro_name == "") {
            swal("Good job!", "You clicked pro_name!", "error", {
                  button: "Aww yiss!",
                });
        }else if (pro_detail == "") {
            swal("Good job!", "You clicked pro_detail!", "error", {
                  button: "Aww yiss!",
                });
        }else if (pro_image == "") {
            swal("Good job!", "You clicked pro_image!", "error", {
                  button: "Aww yiss!",
                });
        }else if (pro_price == "") {
            swal("Good job!", "You clicked the button!", "error", {
                  button: "Aww yiss!",
                });
        }else if (pro_amount == "") {
            swal("Good job!", "You clicked pro_amount!", "error", {
                  button: "Aww yiss!",
                });
        }else if (pro_color == "") {
            swal("Good job!", "You clicked pro_color!", "error", {
                  button: "Aww yiss!",
                });
        }else if (pro_category == "") {
            swal("Good job!", "You clicked pro_category!", "success", {
                  button: "Aww yiss!",
                });
        }
        


        var data = {
            'pro_id': pro_id,
            'pro_name': pro_name,
            'pro_detail': pro_detail,
            'pro_image': filename,
            'pro_price': pro_price,
            'pro_amount': pro_amount,
            'pro_color': pro_color,
            'pro_category': pro_category
        };

        $.ajax({
            url: "<?php echo site_url('product/add_product'); ?>",
            type: 'POST',
            data: data,
            success: function (data) {
                console.log(data);           
                var myObj = JSON.parse(data);
                var status = myObj.status;
                          
                if (status == "save") {
                  swal("Good job!", "You Add Product!", "success", {
                  button: "Aww yiss!",
                });
                }else{
                    swal("Error!", "You Add Product dupicate!", "error", {
                  button: "Aww yiss!", });
                }     
            }
        });
    });


    function btn_editproduct(pro_id){
        if(pro_id != ""){
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "<?php echo base_url('product/show_product');?>",
                data: { 'pro_id': pro_id },
                success: function(data){
                    console.log(data['product']);


                    if(data['product'].length > 0){
                        // console.log("show");

                        $("#edit_pro_id").val(data['product'][0]['product_id']);
                        $("#edit_pro_name").val(data['product'][0]['product_name']);
                        $("#edit_pro_detail").val(data['product'][0]['product_detail']);
                        $("#edit_pro_image").val(data['product'][0]['product_image']);
                        $("#edit_pro_price").val(data['product'][0]['product_price']);
                        $("#edit_pro_amount").val(data['product'][0]['product_amount']);
                        $("#edit_pro_color").val(data['product'][0]['product_color']);
                        $("#edit_pro_category").val(data['product'][0]['product_category_id']);
                        
                        $('#editproduct').modal('show');
                        
                    }else{
                        swal('Error', 'No Product Detail', 'error');
                        return false;
                    }
                },
                error: function(err){
                    swal('Error', 'Please Call IT Department', 'error');
                    return false;
                }
            });
        }else{
            swal('Error', 'No Product ID for get detail', 'error');
        }

        return false;
    }


</script>