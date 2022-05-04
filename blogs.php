<!DOCTYPE html>
<html lang="en">
  <?php 
  session_start();
  $_SESSION['page']="blog";
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
   include('includes/header.php');
   $userId="";
   if(isset($_SESSION['user'])){
    $userId=$_SESSION['user']->id_user;
   }
   
   ?>
  
   

    <!-- Section Title Blog -->
    <div class="section-title-bg text-center m-bottom-40 ">
        <h2 class="wow fadeInDown no-margin" data-wow-duration="1s" data-wow-delay="0.6s"><strong>Surfing other people's posts</strong></h2>
        <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
        <p class="section-subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">See what other people have to say</p>
    </div>
    <div class="col-12">
                <?php 
                
                if(isset($_SESSION['successPost'])){
                    echo "<div class='alert alert-success text-center'>".$_SESSION['successPost']."</div>";
                    unset($_SESSION['successPost']);
                }
                else{
                    echo "";
                }
                $idPost="";
                ?>
 
    </div>
    
    <!--BLog single section-->
    <section class="blog-index">

        <!--Container-->
        <div class="container clearfix">
        <div class="row">

            <div class="col-sm-4 sidebar">
                <!-- Widget 1 -->
                <div class="widget ">
                <h4>Posts by title</h4>
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="search-form" method="post">
                     <input type="text" onfocus="if(this.value == 'Search') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Search'; }"  value="Search" name="postTitleS">
                     <input type="submit" class="submit-search" value="Ok" name="btnTitleP">
                   </form>
                </div> <!--End widget-->
                
                    
                <!-- Widget 3 -->
                <div class="widget">
                    <h4>Popular tags</h4>
                    <ul class="tag-list">
                        <?php 
                         $tagName=tags();
                        foreach($tagName as $tag){
                        ?>
                        <li>
                         <a href="blogs.php?tagName=<?=$tag->tag_name?>"><?=$tag->tag_name?></a>   
                        <?php } ?>
                        <li><a href="blogs.php?tagName=all">All tags</a></li>
                    </ul>
                </div> <!--End widget-->

                <div class="widget">
                    <ul class="cat-archives">
                        <li><a href="blogs.php?post=desc">THE NEWSET POSTS</a></li>
                    </ul>
              
                </div>
                <!--Widget 4-->
                <div class="widget">
                    <h4>Archives</h4>

                    <ul class="cat-archives">
                    <?php 
                         $postDate=dates();
                        
                         foreach($postDate as $date){
                        ?>
                        <li><a href="blogs.php?dateP=<?=$date->post_date?>" ><?php
                                $date1=$date->post_date;
                                $dateFormat1=date("d M Y", strtotime($date1));  
                                echo $dateFormat1;?>
                        </a></li>
                        <?php } ?> 
                    </ul>
                </div> <!--End widget-->
                                                   
               
            </div> <!-- /.col -->
            <div class="col-sm-8">

                <div class="row">
                    <?php 
                        if(isset($_GET['tagName'])):
                            $tagName=$_GET['tagName'];
    
                            $postsByTag=getPostWithTagName($tagName);
                            if($postsByTag){
                                postsShow($postsByTag,$userId);
                            }
                            elseif($tagName=="all"){
                                allTagsShow();
                            }
                            else{
                                echo "<div class='alert alert-danger text-center'>No posts have been found with this tag</div>";
                            }
                            elseif(isset($_GET['dateP'])):
                                    $postDate=$_GET['dateP'];
                                    $postsD= postsByDate($postDate);
                                    postsShow($postsD,$userId);
                             elseif(isset($_POST['btnTitleP'])):
                                    $sValue=$_POST['postTitleS'];
                                    $postsTitle= postsByTitle($sValue);
                                    if(empty($sValue)|| !($postsTitle)){
                                        echo "<div class='alert alert-danger text-center'>No posts have been found with this title</div>";
                                    }
                                    else{
                                        
                                        postsShow($postsTitle,$userId);
                                    }
                            elseif(isset($_GET['post'])):
                                    $post=$_GET['post'];
                                    $postDesc=getPostsDesc();
                                    postsShow($postDesc,$userId);

                            else:
                                    $allPosts=getPosts();
                                    postsShow($allPosts,$userId);
                                    
                                
                            endif;?>
                </div> <!-- /.inner-row -->
            </div> <!-- /.col -->               
            
    
        </div> <!-- /.row -->
        <?php 
        
        ?>
        </div> <!-- /.container -->

    </section><!--End blog single section-->


    <?php 
   include('includes/footer.php');
   ?>


   
    
  </body>
</html>