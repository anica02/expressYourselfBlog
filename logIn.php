<!DOCTYPE html>
<html lang="en">
  <?php
  session_start();
  $_SESSION['page']="logIn";
  include('includes/head.php');
  include('config/connection.php');
  include('functions/function.php');
 
  ?>
  <body class="single_post_page" data-spy="scroll" data-target=".navbar-fixed-top" data-offset="100">


    <!-- Preloader -->
    <div id="preloader">
        <div id="spinner"></div>
    </div>
    <!-- End Preloader-->


    <?php include('includes/header.php');?>

    <!-- m-top-80 m-bottom-100 -->

    <div class="container heightCon widthCon marginTop">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center m-bottom-40">
                        <h2 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Log in your account</h2>
                        <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
                </div>
            </div>
            <div class="col-12">
                <?php 
                
                if(isset($_SESSION['success'])){
                    echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
                    unset($_SESSION['success']);
                }
                else{
                    echo "";
                }
                
                
                ?>

            </div>

            <div class="col-12 mt-30">
            <div id="logIn">
                <form action="form_check/formLogIn.php" method="post" name="formLog" id="formLog">

                    <div class="col-12 form-group formFont wow zoomIn">
                        <input type="email" id="emailLog" name="emailLog"  placeholder="Email Adress"/>
                        <?=error("errorsLog","emailLog");?>
                    </div>
                        <div class="col-12 form-group formFont wow zoomIn">
                            <input type="password" id="passwdLog" name="passwdLog"  placeholder="Password"/>
                            <?=error("errorsLog","btnUserLogIn");?>
                            
                    </div>
                   

                  <div class="col-sm-12 contact-form-item">
                        <input type="submit" class="btn btn-main btn-theme wow fadeInUp" name="btnUserLogIn" data-lang="en" value="Log in">
                 </div>
                
                </form>
              
            </div>
            </div>

        </div>
    </div>

   <?php
   include('includes/footer.php');
   ?>

    

  </body>
</html>