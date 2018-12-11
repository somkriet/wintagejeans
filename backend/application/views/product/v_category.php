<?php $this->load->view('template/header'); ?>

  <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>ประเภทสินค้า</h1>
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addproduct">
                  ADD CAREGORY
                </button>

                <!-- Modal ADD-->
                <div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">ADD CAREGORY</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      
                        <div class="col-sm-6 col-lg-12">
                            <div class="col-sm-3 col-lg-3">
                               Catagory name :
                            </div>
                            <div class="col-sm-3 col-lg-9">
                                <input type="text" class="form-control" name="cate_name" id="cate_name">
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
           
           <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">ลำดับ</th>
                  <th scope="col">ชื่อประเภทสินค้า</th>
                  <th scope="col">วันที่อัปเดตล่าสุด</th>
                  <th scope="col">วันที่เพิ่ม</th>
                  <th scope="col">คนที่เพิ่ม</th>
                  <th scope="col">จัดการประเภทสินค้า</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                    $num = 0 ; 
                    foreach ($product_category as $k) { 
                        $category_id = $k->category_id ?> 
                    <tr>
                      <th scope="row"><?php echo $num+1?></th>
                      <td><?php echo $k->category_name;?></td>
                      <td><?php echo $k->update_date;?></td>
                      <td><?php echo $k->create_date;?></td>
                      <td><?php echo $k->user_update;?></td>
                      <td>
                        <button type="button" class="btn btn-primary"  onclick="btn_showproduct('<?php echo $category_id; ?>');">EDIT
                        </button> / <button type="button" class="btn btn-danger" onclick="btn_deleteproduct('<?php echo $category_id; ?>');">DELETE</button>
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
           </div>
            

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
                            <div class="col-sm-3 col-lg-3">
                               Category name :
                            </div>
                            <div class="col-sm-3 col-lg-9">
                                <input type="text" class="form-control" name="edit_pro_name" id="edit_pro_name">
                            </div>
                        </div><br><br>
                    
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                        <button type="button" name="btn_update_product" id="btn_update_product" class="btn btn-primary">SAVE</button>
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

       $('#edit_upload_form').on('submit', function(e){  
           e.preventDefault();  
           if($('#edit_pro_image').val() == '')  
           {  
                alert("Please Select the File");  
           }  
           else  
           {  
                $.ajax({  
                     url:"<?php echo site_url(); ?>Product/upload_file",   
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     success:function(data)  
                     {  
                          $('#show_loaded_image').html(data);  
                     }  
                });  
           }  
      });  
 });  

    // $('#pro_detail').characterCountdown({
    //     defaultText: 'เหลือตัวอักษรอีก: ',
    //     countdownTarget: '#countdown_textarea',
    //     maxChars: 500
    // });
    
    $('#btn_add_product').on('click', function() {//button add product

        var pro_name = $("#pro_name").val();
        var pro_detail = $("#pro_detail").val();
        var pro_image = $("#image_file").val();
        var pro_price = $("#pro_price").val();
        var pro_cost_price = $("#pro_cost_price").val();
        var pro_color = $("#pro_color").val();
        var pro_size_s = $("#pro_size_s").val();
        var pro_size_m = $("#pro_size_m").val();
        var pro_size_l = $("#pro_size_l").val();
        var pro_size_xl = $("#pro_size_xl").val();
        var pro_size_2xl = $("#pro_size_2xl").val();
        var pro_size_3xl = $("#pro_size_3xl").val();
        var pro_size_4xl = $("#pro_size_4xl").val();
        var pro_category = $("#pro_category").val();
        var filename = pro_image.replace(/C:\\fakepath\\/, '');

        // console.log('url img :'+ filename);    

        if (pro_name == "") {
            swal("Warning!", "Please input name!", "error", {
                  button: "ok",
                });
        }else if (pro_detail == "") {
            swal("Warning!", "Please input detail!", "error", {
                  button: "ok",
                });
        }else if (pro_image == "") {
            swal("Warning!", "Please upload image product!", "error", {
                  button: "ok",
                });
        }else if (pro_price == "") {
            swal("Warning!", "Please input price!", "error", {
                  button: "ok",
                });
        }else if(pro_cost_price == ""){
            swal("Warning!", "Please input cost price", "error", {
                button: "ok",
            });
        }else if (pro_color == "") {
            swal("Warning!", "Please select color!", "error", {
                  button: "ok",
                });
        }else if (pro_category == "") {
            swal("Warning!", "Please select category!", "error", {
                  button: "ok",
                });
        }
    
        var data = {
            'pro_name': pro_name,
            'pro_detail': pro_detail,
            'pro_image': filename,
            'pro_price': pro_price,
            'pro_cost_price':pro_cost_price,
            'pro_size_s': pro_size_s,
            'pro_size_m': pro_size_m,
            'pro_size_l': pro_size_l,
            'pro_size_xl': pro_size_xl,
            'pro_size_2xl': pro_size_2xl,
            'pro_size_3xl': pro_size_3xl,
            'pro_size_4xl': pro_size_4xl,
            'pro_color': pro_color,
            'pro_category': pro_category
        };

        $.ajax({
            url: "<?php echo site_url('product/add_product'); ?>",
            type: 'POST',
            data: data,
            success: function(res){
                    swal('Success', 'Save Product Success', 'success');

                    $('#addproduct').modal('hide');

                    setTimeout(function(){
                        location.reload();
                    }, 1000);
            },
            error: function(err){
                    swal('Error', 'Please Call IT Department', 'error');
                    return false;
            }
        });
    });


    function btn_showproduct(pro_id){//button show product
        if(pro_id != ""){
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "<?php echo base_url('product/show_product');?>",
                data: { 'pro_id': pro_id },
                success: function(data){
                    console.log(data['product']);

                    $("#show_loaded_image").empty();
                    if(data['product'].length > 0){
                        // console.log("show");

                        $("#edit_pro_id").text(data['product'][0]['product_id']);
                        $("#edit_pro_name").val(data['product'][0]['product_name']);
                        $("#edit_pro_detail").val(data['product'][0]['product_detail']);

                        var html_img = '<img src="upload/' + data['product'][0]['product_image'] + '" width="150" height="250" class="img-thumbnail" />';
                        $("#show_loaded_image").append(html_img);

                        $("#edit_pro_price").val(data['product'][0]['product_price']);
                        $("#edit_pro_cost_price").val(data['product'][0]['product_cost_price']);
                        $("#edit_pro_color").val(data['product'][0]['product_color']);

                        $("#edit_pro_size_s").val(data['product'][0]['size_s']);
                        $("#edit_pro_size_m").val(data['product'][0]['size_m']);
                        $("#edit_pro_size_l").val(data['product'][0]['size_l']);
                        $("#edit_pro_size_xl").val(data['product'][0]['size_xl']);
                        $("#edit_pro_size_2xl").val(data['product'][0]['size_2xl']);
                        $("#edit_pro_size_3xl").val(data['product'][0]['size_3xl']);
                        $("#edit_pro_size_4xl").val(data['product'][0]['size_4xl']);
                        
                        $("#edit_pro_category").val(data['product'][0]['product_category_id']);
                        
                        // $('#editproduct').modal('show');
                        $("#editproduct").modal("toggle")
                        
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

    
    $('#btn_update_product').on('click', function() {// button update product

        var edit_pro_id = $("#edit_pro_id").val();
        var edit_pro_name = $("#edit_pro_name").val();
        var edit_pro_detail = $("#edit_pro_detail").val();
        var edit_image_file = $("#edit_image_file").val();
        var edit_pro_price = $("#edit_pro_price").val();
        var edit_pro_cost_price = $("#edit_pro_cost_price").val();
        var edit_pro_size_s = $("#edit_pro_size_s").val();
        var edit_pro_size_m = $("#edit_pro_size_m").val();
        var edit_pro_size_l = $("#edit_pro_size_l").val();
        var edit_pro_size_xl = $("#edit_pro_size_xl").val();
        var edit_pro_size_2xl = $("#edit_pro_size_2xl").val();
        var edit_pro_size_3xl = $("#edit_pro_size_3xl").val();
        var edit_pro_size_4xl = $("#edit_pro_size_4xl").val();
        var edit_pro_color = $("#edit_pro_color").val();
        var edit_pro_category = $("#edit_pro_category").val();


        // if(pro_image != ""){
            // var filename = pro_image.replace(/C:\\fakepath\\/, '');
        // }else{
        //     var filename = "null";
        // }
        var edit_filename = pro_image;
        
        // console.log('url img :'+ filename);    

        if (edit_pro_name == "") {
            swal("Good job!", "Please input product name!", "error", {
                  button: "ok",
                });
        }else if (edit_pro_detail == "") {
            swal("Good job!", "Please input product detail!", "error", {
                  button: "ok",
                });
        }else if (edit_pro_price == "") {
            swal("Good job!", "Please input product price!", "error", {
                  button: "ok",
                });
        }else if (edit_pro_cost_price == "") {
            swal("Good job!", "Please input product cost price", "error", {
                  button: "ok",
                });
        }else if (edit_pro_color == "") {
            swal("Good job!", "Please input product color!", "error", {
                  button: "ok",
                });
        }else if (edit_pro_category == "") {
            swal("Good job!", "Please input productlicked product category!", "error", {
                  button: "ok",
                });
        }
        

        var data = {
            'product_id': edit_pro_id, 
            'pro_name': edit_pro_name,
            'pro_detail': edit_pro_detail,
            'pro_image': edit_filename,
            'pro_price': edit_pro_price,
            'pro_cost_price': edit_pro_cost_price,
            'pro_size_s': edit_pro_size_s,
            'pro_size_m': edit_pro_size_m,
            'pro_size_l': edit_pro_size_l,
            'pro_size_xl': edit_pro_size_xl,
            'pro_size_2xl': edit_pro_size_2xl,
            'pro_size_3xl': edit_pro_size_3xl,
            'pro_size_4xl': edit_pro_size_4xl,
            'pro_color': edit_pro_color,
            'pro_category': edit_pro_category
        };

        $.ajax({
            url: "<?php echo site_url('product/update_product'); ?>",
            type: 'POST',
            data: data,
             success: function(data){
                    swal('Success', 'update Product Success', 'success');

                    $('#editproduct').modal('hide');

                    // setTimeout(function(){
                    //     location.reload();
                    // }, 1000);
            },
            error: function(err){
                    swal('Error', 'Please Call IT Department', 'error');
                    return false;
            }
        });
    });


     function btn_deleteproduct(product_id){//button Delete
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {

            $.ajax({
                url: "<?php echo site_url('product/delete_product'); ?>",
                type: 'POST',
                data: {'product_id': product_id},
                success: function (data) {
                    console.log(data);           
                      // swal("Deleted!", "You Delete Product!", "success");
                      swal("Deleted!", "You Delete Product!", {
                          icon: "success",
                        });

                    setTimeout(function(){
                        location.reload();
                    }, 1000);
                }
            });

          } else {

            swal("คุณยกเลิกการลบ Product!");

          }

        });

     }


</script>