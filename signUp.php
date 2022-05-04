<!DOCTYPE html>
<html lang="en">
  <?php 
  session_start();
  $_SESSION['page']="signUp";
  include('includes/head.php');
  include('functions/function.php');
  include('config/connection.php');
  
  ?>
  <body class="single_post_page" data-spy="scroll" data-target=".navbar-fixed-top" data-offset="100">
    
    
    <!-- Preloader -->
    <div id="preloader">
        <div id="spinner"></div>
    </div>
    <!-- End Preloader-->

    
    <?php include('includes/header.php');?>

    <!-- m-top-80 m-bottom-100 -->
    
    <div class="container heightCon marginTop">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center m-bottom-40">
                        <h2 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Create your account</h2>
                        <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
                        <h6 class="section-subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s"><em>Already have an account?<a href="logIn.php" id="linkLogIn">&nbsp;Log in</a></em></h6>
                </div>
            </div>
            <div class="col-12 mt-30">
            <div id="signIn">
                <form action="form_check/formSignUp.php" method="post" name="formSign" id="formSign">
                    <div class="row form-group ">
                        <div class="col-sm-6 formFont wow zoomIn">
                            <input type="text" id="firstNameSg" name="firstNameSg" placeholder="First name" value="<?=signValues("firstNameSg","dataForm");?>"/>
                            <?=error("errorsForm","firstNameSg");?>
                        </div>
                        <div class="col-sm-6 formFont wow zoomIn">
                            <input type="text" id="lastNameSg" name="lastNameSg"  placeholder="Last name" value="<?=signValues("lastNameSg","dataForm");?>"/>
                            <?=error("errorsForm","lastNameSg");?>
                        </div>
                    </div>
                    <div class="col-12 form-group formFont wow zoomIn">
                        <input type="email" id="emailSg" name="emailSg"  placeholder="Email Adress" value="<?=signValues("emailSg","dataForm")?>"/>
                        <?=error("errorsForm","emailSg");?>
                    </div>
                    <div class="row form-group ">
                        <div class="col-sm-6 formFont wow zoomIn">
                            <input type="password" id="passwdSg" name="passwdSg"  placeholder="Password" value="<?=signValues("passwdSg","dataForm")?>"/>
                            <?=error("errorsForm","passwdSg");?>
                        </div>
                        <div class="col-sm-6 formFont wow zoomIn">
                            <input type="password" id="passwdSgCon" name="passwdSgCon" placeholder="Confirm password" value="<?=signValues("passwdSgCon","dataForm")?>"/>
                            <?=error("errorsForm","passwdSgCon");?>
                        </div>
                    </div>
                    <div class="form-group wow zoomIn">
                       
                    </div>

                  <div class="col-sm-12 contact-form-item">
                       <input type="submit" class="btn btn-main btn-theme wow fadeInUp" name="btnCreatAcc" data-lang="en" value="CREATE MY ACCOUNT">
                 </div>
                 <div class="col-sm-12">
                     <p>By registering, you accept our terms of use and our privacy policy.</p>
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