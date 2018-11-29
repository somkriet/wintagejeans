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
                  ADD COLOR
                </button>

                <!-- Modal ADD-->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">ADD COLOR</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                     
                        <div class="col-sm-6 col-lg-12">
                            <div class="col-sm-3 col-lg-4">
                                Color name :
                            </div>
                            <div class="col-sm-3 col-lg-8">
                                <input type="text" class="form-control" name="color_name" id="color_name">
                            </div>
                        </div><br><br>
                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                        <button type="button" name="btn_add_color" id="btn_add_color" class="btn btn-primary">SAVE</button>
                      </div>
                    </div>
                  </div>
                </div>

            </div><br><br>
           
            <div class="table-responsive">
            <table class="table table-hover" id="tb_color">
              <thead>
                <tr>
                  <th scope="col">ลำดับ</th>
                  <th scope="col">ชื่อสี</th>
                  <th scope="col">คนบันทึก</th>
                  <th scope="col">วันที่แก้ไข</th>
                  <th scope="col">วันที่บันทึก</th>
                  <th scope="col">จัดการสินค้า</th>
                </tr>
              </thead>
              <tbody>

                <?php 
                    $num = 0 ; 
                    foreach ($color as $value) {?> 
                    <tr>
                      <th scope="row"><?php echo $num+1?></th>
                      <td><?php echo $value->color_name;?></td>
                      <td><?php echo $value->user_update;?></td>
                      <td><?php echo $value->update_date;?></td>
                      <td><?php echo $value->create_date;?></td>
                      <td>
                        <button type="button" class="btn btn-primary"  onclick="btn_showcolor(<?php echo $value->color_id; ?>);">EDIT
                        </button> / <button>DELETE</button>
                      </td>
                    </tr>
               <?php 
                    $num++; 
                    } 
               ?>
              </tbody>
            </table>
        </div>
           
        <!-- Modal Edit-->
            <div class="modal fade" id="editcolor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">EDIT COLOR</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                     
                        <div class="col-sm-6 col-lg-12">
                            <div class="col-sm-3 col-lg-4">
                                color name :
                            </div>
                            <div class="col-sm-3 col-lg-8">
                                <input type="text" name="edit_color_name" id="edit_color_name">
                            </div>
                        </div><br><br>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                        <button type="button" name="btn_update_color" id="btn_update_color" class="btn btn-primary">SAVE</button>
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

    $('#btn_add_color').on('click', function() {//add color

        var color_name = $("#color_name").val();

        if (color_name == "") {
            swal("warning!", "Pleate input color name!", "error", {
                  button: "OK",
                });
        }
    
        var data = {
            'color_name': color_name
        };

        $.ajax({
            url: "<?php echo site_url('color/add_color'); ?>",
            type: 'POST',
            data: data,
            success: function (data) {
                console.log(data);           
                var myObj = JSON.parse(data);
                var status = myObj.status;
                          
                if (status == "save") {
                  swal("Good job!", "You Add Color name!", "success", {
                  button: "ok",
                });
                }else{
                    swal("Error!", "You Add Product dupicate!", "error", {
                  button: "ok", });
                }     
            }
        });
    });


    function btn_showcolor(color_id){//show name color
        if(color_id != ""){
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "<?php echo base_url('color/show_color');?>",
                data: { 'color_id': color_id },
                success: function(data){
                    // console.log(data['color']);
                    if(data['color'].length > 0){
                        $("#edit_color_name").val(data['color'][0]['color_name']);
                        $("#btn_update_color").val(data['color'][0]['color_id']);
                        $('#editcolor').modal('show');
                        
                    }else{
                        swal('Error', 'No Color Detail', 'error');
                        return false;
                    }
                },
                error: function(err){
                    swal('Error', 'Please Call IT Department', 'error');
                    return false;
                }
            });
        }else{
            swal('Error', 'No Color for get detail', 'error');
        }

        return false;
    }



     $('#btn_update_color').on('click', function() {//update color

        var color_id = $("#btn_update_color").val();
        var color_name = $("#edit_color_name").val();

        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "<?php echo base_url('color/update_color');?>",
            data: { 'color_id': color_id,
                    'color_name': color_name },
            success: function(data){
                // console.log(data['colorupdate']);
                swal('success', 'Update Color success', 'success');  
                setTimeout(function(){
                    location.reload();
                }, 1000);
                return false;
            },
            error: function(err){
                swal('Error', 'Please Call IT Department', 'error');
                return false;
            }
        });
    });


</script>