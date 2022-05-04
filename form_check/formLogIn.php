<?php 
    session_start();
    include "../config/connection.php";
    include "../functions/function.php";

    if($_POST["btnUserLogIn"]){
        $email=$_POST["emailLog"];
        $pass=md5($_POST["passwdLog"]);
        $errors=[];
       
        if(!$email){
            $erros['emailLog']="Email must be filed out";
        }
        if(!$pass){
            $erros['passwdLog']="Password must be filed out";
        }
        

        if(count($errors)!=0){
            $_SESSION['errorsLog'] = $errors;
            header('Location: ../logIn.php');
        }

        

        if(count($errors)==0){
            $user=logIn($email,$pass);
            
            if($user){
               
                $_SESSION['user']=$user;
                if($user->id_role==1){
                    header("Location: ../index.php?page=admin");
                }
                if($user->id_role==2){
                    header("Location: ../index.php?page=user");
                }
            }
            else{
                 $erros['btnUserLogIn']="Incorrect email or password try again";
                 $_SESSION['errorsLog']=$erros;
                 header("Location: ../logIn.php");
            }
        }
        

        
    }
    else{
        header("Location: ../logIn.php");
    }
?>