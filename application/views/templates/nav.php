 <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.html"><?=$this->lang->line("web_name"); ?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
       
        <div class="collapse navbar-collapse" id="navbarResponsive">

           <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url("home"); ?>"><?=$this->lang->line("home"); ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="services.html"><?=$this->lang->line("best_seller"); ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html"><?=$this->lang->line("contact"); ?></a>
            </li>
        </ul>

          <ul class="navbar-nav ml-auto">
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?=$this->lang->line("tracking_order"); ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="portfolio-1-col.html"><?=$this->lang->line("order_list"); ?></a>
                <a class="dropdown-item" href="portfolio-2-col.html"><?=$this->lang->line("tracking_order"); ?></a>
              </div>
            </li>

             <li class="nav-item dropdown">
                <?php if ($this->session->userdata('logged_in') == TRUE) {
                  $user_data = $this->session->userdata('fname');?>
                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownlogin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php  echo $user_data; ?>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownlogin">
                    <a class="dropdown-item" href="<?php echo site_url("profile"); ?>">ข้อมูลของฉัน</a>
                    <a class="dropdown-item" href="#">ออกจากระบบ</a>
                  </div>

               <?php }else{ ?>
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#login-modal">เข้าสู่ระบบ</a>
               <?php } ?>

            
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php if ($this->session->userdata('lang') == 'english') {
                  echo "English";
                }else{
                  echo "ภาษาไทย";
                }?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                <a class="dropdown-item" href="<?php echo $this->router->class."/change/thailand"; ?>">ภาษาไทย</a>
                <a class="dropdown-item" href="<?php echo $this->router->class."/change/english"; ?>">English language</a>

              </div>
            </li>


          </ul>
        </div>
      </div>
    </nav>
    
      <form method="post" id="myform" mame="myform">
      <!-- Modal -->
      <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Email: <input type="text" name="email" id="email" placeholder="email" class="form-control">
              Password: <input type="password" name="password" id="password" placeholder="password" class="form-control">
            </div>
            <div class="modal-footer">
              <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
              <button type="submit" class="btn btn-primary" id="bt_login">Login</button>
                <div id="msg_login"></div>

              
              <a href="">Register</a>
            </div>
          </div>
        </div>
      </div>
    </form>
 
  <script type="text/javascript">
    // $(function() {

$(document).ready(function() {
      $(function(){
        $('#email').focus();
      });

      $('#myform').on('submit', function(){

          var email = $('#email').val();
          var password = $('#password').val();
          $('#msg_login').empty();

          $.ajax({
              type: "POST",
              dataType: "JSON",
              url: "<?php echo site_url('login/user_login'); ?>",
              data: {'email': email,'password': password},
              beforeSend: function(xls){
                $('#msg_login').html('<img style="margin-bottom: 0px;" src="<?php echo base_url('assets/img/loader.gif')?>">');
              },
              success: function (data) {
                    console.log(data);

                if(data['status']=='error'){
                  $('#msg_login').html('<font color="red"><b>Invalid</b> Username or Password</font>');
                  // $('#txt_username').val("");
                  $('#password').val("");
                  $('#password').focus();
                }else{
                  // alert('pass');
                  window.location.href="<?php echo base_url('home');?>";
                }

              }
          });
      });

}); 
</script>