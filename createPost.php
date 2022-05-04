

   <!DOCTYPE html>
    <html lang="en">
    <?php 
     
      session_start();
      $_SESSION['page']="create";
      if(!isset($_SESSION['user'])){
        http_response_code(404);
        echo "<b>404 PAGE NOT FOUND</b>";
      }
      else{?>
    <?php
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
    <div class="section-title-bg text-center m-bottom-20 ">
        <h2 class="wow fadeInDown no-margin" data-wow-duration="1s" data-wow-delay="0.6s"><strong>Share your thoughts with other people</strong></h2>
        <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
    </div>

    <!--BLog single section-->
    <section id="blog-single" class="p-top-80 p-bottom-80">

        <!--Container-->
        <div class="container clearfix ">
       

            <div class="col-12  ">
                <form action="form_check/formCreatePost.php" method="post" enctype="multipart/form-data" id="formCP" name="formCP" >
                    <div class="form-group formFont wow zoomIn">
                        <input type="text" id="postTitle" name="postTitle"  placeholder="Post title" value="<?=signValues("postTitle","dataPost")?>"/>
                        <?=error("errorsPost","postTitle");?>
                    </div>
                    <div class="form-group formFont wow zoomIn">
                        <textarea placeholder="Post description" name="postDes" id="postDes" value="<?=signValues("postDes","dataPost")?>"></textarea>
                        <?=error("errorsPost","postDes");?>
                    </div>
                    <div class="form-group formFont2 wow zoomIn" name="tagsPost">
                        <label class="formFont">Posts Tags:</label></br>
                        
                            <?php $tags=tags();
                            $i=1;
                            foreach($tags as $t){?>
                               <input type="checkbox" name="<?=$i?>" value="<?=$t->tag_name?>"> <?=$t->tag_name?></br>
                            <?php
                            $i++; } ?>
                        </select>
                        
                    </div>
                    <?=error("errorsPost","tagPost");?>
                    <div class="form-group  wow zoomIn">
                        <label class="formFont">Posts Image:</label>
                        <input type="file"  name="postImg" value="<?=signValues("postImg","dataPost")?>"/>
                        <?=error("errorsPost","postImg");?>
                    </div>
                 
                    <div class="col-sm-12 contact-form-item">
                       <input type="submit" class="btn btn-main btn-theme wow fadeInUp" name="btnUpload" data-lang="en" value="UPLOAD">
                 </div>
                </form>

              
               
            </div> <!-- /.col -->
        </div> <!-- /.container -->

    </section><!--End blog single section-->

   <?php 
   include('includes/footer.php');
   ?>
    
  </body>
</html> 
   <?php }?>
  
 