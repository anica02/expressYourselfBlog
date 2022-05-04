<?php 
    session_start();
    include "../config/connection.php";
    include "../functions/function.php";

    if($_POST["btnCreatAcc"]){
     
        
            $status = 201; 
            $message = null;
            $fName=$_POST["firstNameSg"];
            $lName=$_POST["lastNameSg"];
            $email=$_POST["emailSg"];
            $pass=$_POST["passwdSg"];
            $coPass=$_POST["passwdSgCon"];
            $passL=strlen($pass);
            $errors=[];
            $data=[];
       
            $regName="/^[A-ZĆČĐŽŠ]{1}[a-zćčđžš]{2,15}(\s[A-ZČĆŠĐŽ]{1}[a-zčćšđž]{2,15})*$/";

            if(!$fName){
                $errors['firstNameSg']="First name must be filed in";
            }
            else{
           
                if(!preg_match($regName,$fName)){
                    $errors['firstNameSg']="First name has to start with one uppercase letter and length has to be at least 3 characters"; 
                }
                else{
                    $data['firstNameSg']=$fName;
                }
            }

            if(!$lName){
                $errors['lastNameSg']="Last name must be filed in";
            }
            else{

                if(!preg_match($regName,$lName)){
                    $errors['lastNameSg']="Last name has to start with one uppercase letter and length has to be at least 3 characters"; 
                }
                else{
                    $data['lastNameSg']=$lName;
                }
            
            }

            if(!$email){
                $errors['emailSg']="Email must be filed in";
            }
            else{
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $errors['emailSg']="Email wasn't entered in an valid format";
                }
                else{
                    $data['emailSg']=$email;
                }
            }

            if(!$pass){
                $errors['passwdSg']="Password must be filed in";
            }
            else{
                $regPass="/^(?=.*[a-zčćđžš])(?=.*[A-ZČĆĐŽŠ])(?=.*\d)(?=.*[@$!%*?])([A-ZČĆĐŽŠa-zčćđžš\d@$!%*?]){8,}$/";
                if(!preg_match ($regPass,$pass)){
                    $errors['passwdSg']="Password length has to be at least 8 character and has to contain at least one uppercase letter, one lowercase, one number and one special character";
                }
                else{
                    $data['passwdSg']=$pass;
                }
            }

            if(!$coPass){
                $errors['passwdSgCon']="Confirmed password must be filed in";
            }
            else{
                if($coPass!=$pass){
                    $errors['passwdSgCon']="Confirmed password doesn't match the main password";
                }
                else{
                    $data['passwdSgCon']=$coPass;
                }
            }
            if(count($errors)!=0){
                $_SESSION['errorsForm'] = $errors;
                $_SESSION['dataForm']=$data;
                header('Location: ../signUp.php');
            }
        
           
            if(count($errors)==0){
                try{
                    $message = "";
                    $status = 201; 
                    
                    $passM=md5($pass);
                    $randN=rand();
                    $upit=signUp($fName,$lName,$email,$passM,$randN);
                   
                    $msg="You have successfully created your account, click on the link to verify it <a href='http://www.expressYourselfBlog.com/formSignUpCheck.php?code=$randN'>Verify your account</a>";
                    $subject="Verify account";

                    mail($email,$subject,$msg);
                   
                    header("Location: ../logIn.php");
                    $_SESSION['success']="Your account has been created now you need to log in";
                }
                catch(PDOException $ex){
                        header("Location: ../signUp.php");
                        $message = $ex->getMessage();
                        $status = 500; 
                        http_response_code($status);
                }
               
   
            }
    }
    else{
        header("Location: ../index.php");
    }
?>