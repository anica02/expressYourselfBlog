<!DOCTYPE html>
<html lang="en">
  <?php 
  session_start();
  $_SESSION['page']="userPost";
  if(!isset($_SESSION['user'])){
    http_response_code(404);
    echo "<b>404 PAGE NOT FOUND</b>";
   
  }
  else{?>
  <?php 
   include('includes/head.php');
   include('config/connection.php');
   include('functions/function.php');
   $userId=$_SESSION['user']->id_user;
  ?>
  
  <body class="blog_index" data-spy="scroll" data-target=".navbar-fixed-top" data-offset="100">
    
    
    <!-- Preloader -->
    <div id="preloader">
        <div id="spinner"></div>
    </div>
    <!-- End Preloader-->

    <?php 
   include('includes/header.php');
   ?>

   <div class="section-title-bg text-center m-bottom-40 ">
        <h2 class="wow fadeInDown no-margin" data-wow-duration="1s" data-wow-delay="0.6s"><strong>My posts</strong></h2>
        <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
        <p class="section-subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">Section where you can edit your posts</p>
    </div>
    <section class="blog-index">

        <!--Container-->
        <div class="container clearfix">
        <div class="row">

            <div class="col-sm-4 sidebar" id="filter">
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
                         <a href="userPosts.php?tagName=<?=$tag->tag_name?>"><?=$tag->tag_name?></a>   
                        <?php } ?>
                        <li><a href="userPosts.php?tagName=all">All tags</a></li>
                    </ul>
                </div> <!--End widget-->

                <div class="widget">
                    <ul class="cat-archives">
                        <li><a href="userPosts.php?post=desc">THE NEWSET POSTS</a></li>
                    </ul>
              
                </div>
                <!--Widget 4-->
                <div class="widget">
                    <h4>Archives</h4>

                    <ul class="cat-archives">
                    <?php 
                         $postDate=getPostsUserDate($userId);
                        
                         foreach($postDate as $date){
                        ?>
                        <li><a href="userPosts.php?dateP=<?=$date->post_date?>" ><?php
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
                    
                     $postsByTag= getPostWithTagNameU($tagName,$userId);
                     if($postsByTag){
                        postsEdit($postsByTag);
                     }
                    elseif($tagName=="all"){
                        $allPosts= getUsersPosts($userId);
                        postsEdit($allPosts);
                    }
                     else{
                        echo "<div class='alert alert-danger text-center'>No posts have been found with this tag</div>";
                     }
                elseif(isset($_GET['dateP'])):
                    $postDate=$_GET['dateP'];
                    $postsD= postsByDateU($postDate,$userId);
                    postsEdit($postsD);
                elseif(isset($_POST['btnTitleP'])):
                    $sValue=$_POST['postTitleS'];
                    $postsTitle= postsByTitleU($sValue,$userId);
                    if(empty($sValue)|| !($postsTitle)){
                        echo "<div class='alert alert-danger text-center'>No posts have been found with this title</div>";
                    }
                    else{
                        
                        postsEdit($postsTitle);
                    }
                elseif(isset($_GET['post'])):
                    $post=$_GET['post'];
                    $postDesc=getPostsDescU($userId);
                    postsEdit($postDesc);
                
                else:
                    $allPosts=getUsersPosts($userId);
                    if(!$allPosts){
                        echo "<div class='alert alert-danger text-center'>You haven't uploaded any posts yet</div>";
                    }
                    else{
                    postsEdit($allPosts);
                    }
                  
                endif;?>
                </div> <!-- /.inner-row -->
            </div> <!-- /.col -->
    
        </div> <!-- /.row -->
        </div> <!-- /.container -->

    </section><!--End blog single section-->
    
    <?php 
   
   include('includes/footer.php');
   ?>


   
    
  </body>
</html>
<?php } ?>