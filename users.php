<!DOCTYPE html>
<html lang="en">
  <?php 
  session_start();
  $_SESSION['page']="users";
   include('includes/head.php');
   include('config/connection.php');
   include('functions/function.php');
  
  ?>
  <body class="blog_index" data-spy="scroll" data-target=".navbar-fixed-top" data-offset="100">
    
    
    <!-- Preloader -->
    <div id="preloader">
        <div id="spinner"></div>
    </div>
    <!-- End Preloader-->

    <?php 
   include('includes/header.php');?>
   <section class="blog-index">
   <div class="container clearfix">
        <div class="row">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" name="formUser">
                <div class="table-responsive" id="tableUser">
                    <?php 
                    showUsers();
                    ?>
                </div>
            </form>  
            <div class="col-12" id="dataUser">
               <h6>Things you as admin can change</h6>
               <form action="form_check/ajax.php" method="post" name="formEditUser">
                   <lable>Role:</lable></br>
                   </br>
                        <select name="role" id="role" class="form-control">
                            <option value="">Choose users role</option>
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                            <option value="3">Other</option>
                        </select></br>
                    <lable>Status:</lable></br></br>
                        <select name="status" id="status"class="form-control">
                            <option value="">Choose users account status</option>
                            <option value="1">Active</option>
                            <option value="0">Passive</option>
                        </select></br></br>
                    <input type="submit" name="btnUsersData" value="Edit" class="btn btn-main btn-theme btnUserData"/>
               </form>
              
            </div>
        </div>
   </section>

   <?php include ('includes/footer.php');
   
   ?>
   </body>
</html>