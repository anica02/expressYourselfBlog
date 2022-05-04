<?php 
    session_start();
    include "../config/connection.php";
    include "../functions/function.php";


    if(isset($_POST['btnUpload'])){
        $title=$_POST['postTitle'];
        $desc=trim($_POST['postDes']);

        $tagName1="";
        $tagName2="";
        $tagName3="";
        $tagName4="";
        $tagName5="";
        $tagName6="";
        $tagId=[];

        if(isset($_POST['1'])){
            $tagName1=$_POST['1'];
            $tag=getTagsId($tagName1);
            foreach($tag as $t){
                array_push($tagId,$t);
            }
            
        }
        if(isset($_POST['2'])){
            $tagName2=$_POST['2'];
            $tag=getTagsId($tagName2);
            foreach($tag as $t){
                array_push($tagId,$t);
            }
            
        }
        if(isset($_POST['3'])){
            $tagName3=$_POST['3'];
            $tag=getTagsId($tagName3);
            foreach($tag as $t){
                array_push($tagId,$t);
            }
        }
        if(isset($_POST['4'])){
            $tagName4=$_POST['4'];
            $tag=getTagsId($tagName4);
            foreach($tag as $t){
                array_push($tagId,$t);
            }
        }
        if(isset($_POST['5'])){
            $tagName5=$_POST['5'];
            $tag=getTagsId($tagName5);
            foreach($tag as $t){
                array_push($tagId,$t);
            }
        }
        if(isset($_POST['6'])){
            $tagName6=$_POST['6'];
            $tag=getTagsId($tagName6);
            foreach($tag as $t){
                array_push($tagId,$t);
            }
        }
       
      
        $postDate=gmdate("Y-m-d");
        $userId=$_SESSION['user']->id_user;
        $imgDb="";
        $errors=[];
        $data=[];

        $regTitle="/^[A-ZĆČĐŽŠ]{1}[a-zćčđžš]{2,15}(\s[A-ZČĆĐŽŠa-zčćšđžš]{2,15})*$/";

        if(!$title){
            $errors['postTitle']="Title must be filed in";
        }
        else{
       
            if(!preg_match($regTitle,$title)){
                $errors['postTitle']="Title has to start with one uppercase letter and length has to be at least 3 characters"; 
            }
            else{
                $data['postTitle']=$title;
            }
        }

        if(!$desc){
            $errors['postDes']="Description must be filed in";
        }
        else{
            $data['postDes']=$desc;
        }

        if(empty($tagId)){
           
            $errors['tagPost']="You need to choose a tag for your post";
        }
        else{
            $data['tagPost']=$tagId;
        }
        

        if(!isset($_FILES['postImg'])){
            $errors['postImg']="You have to upload an image";
        }
        elseif(isset($_POST['postImg'])){
           
            $img = $_FILES["postImg"];
           
            $data["postImg"]=$img;
            $imgName = time()."_".$img['name'];
            $imgPath = "../img/blog/$imgName";
            $tmpName = $img['tmp_name'];
   

            move_uploaded_file($tmpName,$imgPath);

            $dim=getimagesize($imgPath);
       
            $imgWidth=$dim[0];
            $imgHeight=$dim[1];

            $newW=640;
            $newH=426;

            $imgExt=pathinfo($imgPath,PATHINFO_EXTENSION);

       
            $upload=($imgExt=="png") ? imagecreatefrompng($imgPath) : imagecreatefromjpeg($imgPath);

            $canvas = imagecreatetruecolor($newW, $newH);

            $imgnew=imagecopyresampled($canvas, $upload, 0, 0, 0, 0, $newW, $newH, $imgWidth, $imgHeight);   
            $imgPathDb="";
            $imgDb = ($imgExt == "png") ? imagepng($canvas, "../img/blog/blog_img_".time().".png") : imagejpeg($canvas, "../img/blog/blog_img_".time().".jpg");
            if($imgExt == "png"){
                $imgPathDb="img/blog/blog_img_".time().".png";
            }
            else{
                $imgPathDb="img/blog/blog_img_".time().".jpg";
            }
          
            if(!$imgDb){
                
                $errors['postImg']="Something went wrong while adding post imagYou have ";
            }
            
        }
    
        
        

       if(count($errors)!=0){
            $_SESSION['errorsPost'] = $errors;
            $_SESSION['dataPost']=$data;
            header('Location: ../createPost.php');
       }

        if(count($errors)==0){
               try{
                $message = "";
                $status = 201; 
               
               
                $insertPost=insertPost($title,$desc,$postDate,$title,$imgPathDb,$userId);
                $idPost=lastPost();
                
                
                foreach($tagId as $t){
                    insertPostTag($t,$idPost);
                }
                header("Location: ../blogs.php");
                $_SESSION['successPost']="You have uploded your post";
            }
            catch(PDOException $ex){
                    header("Location: ../createPost.php");
                    $message = $ex->getMessage();
                    $status = 500; 
                    http_response_code($status);
            }
        }
    }
    else{
        header('Loaction : ../createPost.php');
       
    }
?>