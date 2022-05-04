<?php 


function logIn($email,$pass){
    global $conn;
    $query="SELECT * FROM user as u JOIN role as r ON u.id_role=r.id_role WHERE email=:email AND user_passwd=:user_passwd AND u_status=1";
    $stmt=$conn->prepare($query);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':user_passwd',$pass);
    $stmt->execute();
    
    if($stmt->rowCount()==1){
        return $stmt->fetch();
    }
    else{
        return false;
    }
   
}

function signUp($fName,$lName,$email,$pass,$randN){
    global $conn;
    $role=2;
   
    
    $query="INSERT INTO user(id_user,id_role,user_first_name,user_last_name,email,user_passwd,u_status,rand_passwd) VALUES(NULL,$role,'$fName','$lName','$email','$pass',0,$randN)";
   
    if($conn->query($query) === TRUE){
        return true;
    }
    else{
        return false;
    }
   
   
}
function updateUser($randN){
    global $conn;
    $query="UPDATE user SET u_status=1 WHERE rand_passwd=$randN";

    if($conn->query($query) === TRUE){
        return true;
    }
    else{
        return false;
    }
}
function signValues($name,$session){
    if(isset($_SESSION[$session][$name])){
      echo $_SESSION[$session][$name];
      unset($_SESSION[$session][$name]);
    }
    else{
        echo "";
       
       
    }
    
}

function tags(){
    global $conn;
    $query="SELECT tag_name FROM tag";
    return $conn->query($query)->fetchAll();

}
function getTagsId($name){
    global $conn;
    $query="SELECT id_tag FROM tag WHERE tag_name='$name'";
    return $conn->query($query)->fetch();
}
function dates(){
    global $conn;
    $query="SELECT DISTINCT post_date FROM post";
    return $conn->query($query)->fetchAll();

}

function error($session,$name){
    if(isset($_SESSION[$session][$name])){
        echo "<div class=' fontS alert alert-danger '>".$_SESSION[$session][$name]."</div>";
        unset($_SESSION[$session][$name]);
    }
    else{
       
       echo "";
    }
}

function insertPost($title,$desc,$date,$imgAlt,$imgSrc,$userId){
    global $conn;

    $query="INSERT INTO post(id_post,title,desPost,img_src,img_alt,post_date,id_user) VALUES(NULL,'$title','$desc','$imgSrc','$imgAlt','$date',$userId)";

    if($conn->query($query) === TRUE){
        return true;
    }
    else{
        return false;
    }
    
    
}

function insertPostTag($idTag,$idPost){
    global $conn;
    $query="INSERT INTO post_tag(id_post_tag,id_post,id_tag) VALUES(NULL,$idPost,$idTag)";

    if($conn->query($query) === TRUE){
        return true;
    }
    else{
        return false;
    }
}


function lastPost(){
    global $conn;
    $query="SELECT id_post FROM post ORDER BY id_post DESC LIMIT 0,1";
    $post=$conn->query($query)->fetch();
    $postId="";
 
    
    foreach($post as $p){
      $postId=$p;
    }
    return $postId;
}




function getUsersPosts($idUser){
    global $conn;
    $query="SELECT * FROM post p   WHERE id_user=$idUser";
    return $conn->query($query)->fetchAll();
}
function getPostsDescU($idUser){
    global $conn;
    $query="SELECT * FROM post p   WHERE id_user=$idUser ORDER BY p.id_post DESC";
    return $conn->query($query)->fetchAll();
}

function getPostsUserDate($idUser){
    global $conn;
    $query="SELECT post_date FROM post p  WHERE id_user=$idUser";
    return $conn->query($query)->fetchAll();
}

function getPostWithTagNameU($tagName,$idUser){
    global $conn;
    $query="SELECT * FROM post p INNER JOIN post_tag pt ON p.id_post=pt.id_post INNER JOIN tag t ON pt.id_tag=t.id_tag  WHERE id_user=$idUser AND tag_name='$tagName'";
    return $conn->query($query)->fetchAll();
}

function postsByDateU($dateP,$idUser){
    global $conn;
    $query="SELECT * FROM post p  WHERE id_user=$idUser AND post_date='$dateP'";
    return $conn->query($query)->fetchAll();
}

function postsByTitleU($pTitle,$idUser){
    global $conn;
    $query="SELECT * FROM post p  WHERE id_user=$idUser AND title='$pTitle'";
    return $conn->query($query)->fetchAll();
}


function getPosts(){
    global $conn;
    $query="SELECT  * FROM post p";
    return $conn->query($query)->fetchAll();
}
function getPostsDesc(){
    global $conn;
    $query="SELECT * FROM post p  ORDER BY id_post DESC";
    return $conn->query($query)->fetchAll();
}

function getPostWithTagName($tagName){
    global $conn;
    $query="SELECT * FROM post p INNER JOIN post_tag pt ON p.id_post=pt.id_post INNER JOIN tag t ON pt.id_tag=t.id_tag WHERE tag_name='$tagName'";
    return $conn->query($query)->fetchAll();
}

function postsByDate($dateP){
    global $conn;
    $query="SELECT * FROM post p  WHERE post_date='$dateP'";
    return $conn->query($query)->fetchAll();
}

function postsByTitle($pTitle){
    global $conn;
    $query="SELECT * FROM post p  WHERE title='$pTitle'";
    return $conn->query($query)->fetchAll();
}

function getNavIndidivual(){
    global $conn;
    $query="SELECT nav_text,nav_href FROM nav WHERE id_role=3";
    return $conn->query($query)->fetchAll();
}

function getNavUser(){
    global $conn;
    $query="SELECT nav_text,nav_href FROM nav WHERE id_role IN (2,3) AND nav_text NOT IN ('Log In','Sign up')";
    return $conn->query($query)->fetchAll();
}

function getNavAdmin(){
    global $conn;
    $query="SELECT nav_text,nav_href FROM nav WHERE id_role IN (2,3,1) AND nav_text NOT IN ('Log In','Sign up','Blogs')";
    return $conn->query($query)->fetchAll();
}

function allTagsShow(){
    $allPosts=getPosts();
                 foreach($allPosts as $post){
                 ?>
                    <div class="col-xs-12 m-bottom-40">
                        <div class="blog wow zoomIn" data-wow-duration="1s" data-wow-delay="0.7s">
                            <div class="blog-media">
                               <img src="<?=$post->img_src?>" alt="<?=$post->img_alt?>">
                            </div><!--post media-->
                            
                            <div class="blog-post-info clearfix">
                                <span class="time"><i class="fa fa-calendar"></i><?php
                                $date=$post->post_date;
                                $dateFormat=date("d M Y", strtotime($date));  
                                echo $dateFormat;
                                ?></span>
                               
                            </div><!--post info-->
                            
                            <div class="blog-post-body">
                                <h4><?=$post->title?></h4>
                                <p class="p-bottom-20"><?=$post->desPost?></p>
                               
                            </div><!--post body-->                   
                        </div> <!-- /.blog -->
                    </div>
    <?php }
}

function postsShow($array,$idU){
    foreach($array as $post){
        ?>
           <div class="col-xs-12 m-bottom-40">
               <div class="blog wow zoomIn" data-wow-duration="1s" data-wow-delay="0.7s">
                   <div class="blog-media">
                      <img src="<?=$post->img_src?>" alt="<?=$post->img_alt?>">
                   </div><!--post media-->
                   
                   <div class="blog-post-info clearfix">
                       <span class="time"><i class="fa fa-calendar"></i><?php
                       $date=$post->post_date;
                       $dateFormat=date("d M Y", strtotime($date));  
                       echo $dateFormat;
                       ?></span>
                   </div><!--post info-->
                   
                   <div class="blog-post-body">
                       <h4><?=$post->title?></h4>
                       <p class="p-bottom-20"><?=$post->desPost?></p>
                     <?php 
                     if($idU==1){
                         echo "<input type='button' class='btn btn-main btn-theme btnDeleteP' data-id='<?=$post->id_post?>'  value='Delete post'/>";
                     }
                     else {
                         echo "";
                     }
                     
                     ?> 
                   </div><!--post body-->                   
               </div> <!-- /.blog -->
           </div>
<?php }
}

function postsEdit($array){
   
    foreach($array as $post){
      
        ?>
           <div class="col-xs-12 m-bottom-40">
               <div class="blog wow zoomIn" data-wow-duration="1s" data-wow-delay="0.7s">
                   <div class="blog-media">
                      <img src="<?=$post->img_src?>" alt="<?=$post->img_alt?>">
                   </div><!--post media-->
                   
                   <div class="blog-post-info clearfix">
                       <span class="time"><i class="fa fa-calendar"></i><?php
                       $date=$post->post_date;
                       $dateFormat=date("d M Y", strtotime($date));  
                       echo $dateFormat;
                       ?></span>
                      
                   </div><!--post info-->
                   
                   <div class="blog-post-body">
                       <h4><?=$post->title?></h4>
                       <p class="p-bottom-20"><?=$post->desPost?></p>  
                       <input type="button" class="btn btn-main btn-theme btnDeleteP" data-id="<?=$post->id_post?>"  value="Delete post"/>
                      
                     
                   </div><!--post body-->                   
               </div> <!-- /.blog -->
           </div>
<?php }
}



function showUsers(){
    global $conn;
    $query="SELECT * FROM user";
    $users=$conn->query($query)->fetchAll();

    $show="<table class='table table-striped'> "; 
    $show.="<thead><tr><th scope='col'>Id role</th><th scope='col'>First Name</th><th scope='col'>Last Name</th><th scope='col'>Email</th><th scope='col'>Status</th>
    <th scope='col'></th><th scope='col'></th></tr></thead><tbody>"; 
    foreach($users as $u){ 
        $show.="<tr  scope='row'>"; $show.="<td>"; $show.=$u->id_role; $show.="</td>"; 
        $show.="<td>"; $show.=$u->user_first_name; $show.="</td>"; 
        $show.="<td>"; $show.=$u->user_last_name; $show.="</td>"; 
        $show.="<td>"; $show.=$u->email; $show.="</td>"; 
        $show.="<td>"; $show.=$u->u_status; $show.="</td>"; 
        $show.="<td>"; 
        $show.='<input type="button" class="btn btn-main btn-theme btnDeleteUser" data-id='; $show.=$u->id_user; $show.=' value="Delete user"/>'; 
        $show.="</td>"; 
        $show.="<td>"; 
        $show.='<input type="button" class="btn btn-main btn-theme btnEditUser" name="btnUser" data-id='; $show.=$u->id_user; $show.=' value="Edit user"/>'; 
        $show.="</td>"; 
        $show.="</tr>"; 
        } 
        $show.="</tbody></table>"; 
    echo $show; 
       
}


?>