<?php 

include('../config/connection.php');

if(isset($_POST['pId'])){ 
    $postId=intval($_POST['pId']);
    $query1="DELETE FROM post_tag WHERE id_post=$postId";
    $query2="DELETE FROM post WHERE id_post=$postId";
    try { 
        $conn->query($query1)->rowCount() > 0 ? http_response_code(200) : 
        http_response_code(500); 
        $conn->query($query2)->rowCount() > 0 ? http_response_code(200) : 
        http_response_code(500); 
    }catch(PDOException $e) { 
    http_response_code(500); 
    }
}

if(isset($_POST['uId'])){ 
    $userId=intval($_POST['uId']);
    $query1="DELETE FROM post WHERE id_user=$userId";
    $query2="DELETE FROM user WHERE id_user=$userId";
    try { 
        $conn->query($query1)->rowCount() >= 0 ? http_response_code(200) : 
        http_response_code(500); 
        $conn->query($query2)->rowCount() > 0 ? http_response_code(200) : 
        http_response_code(500); 
    }catch(PDOException $e) { 
    http_response_code(500); 
    }
}

// if(isset($_POST['uEditId'])){
//     $userId=intval($_POST['uEditId']);
    
//     $role=$_POST['role'];
//     $status=$_POST['status'];
//     $errors=0;
//     if((!empty($role)) && (!empty($status))){
//         $roleInt=intval($role);
//         $statusInt=intval($status);
//         $query="UPDATE user SET id_role=$roleInt, u_status=$statusId WHERE id_user=$userId";
//         try { 
//            $update=$conn->query($query)->rowCount() > 0 ? http_response_code(200) : 
//             http_response_code(500); 
//            if($update){
//              header("Location: ../users.php");
//            }
           
//         }catch(PDOException $e) { 
//             echo "Greska";
//         http_response_code(500); 
//         }
//     }
//     elseif(!empty($role)){
//         $roleInt=intval($role);
//         $query1="UPDATE user SET id_role=$roleInt WHERE id_user=$userId";
//         try { 
//            $update=$conn->query($query1)->rowCount() > 0 ? http_response_code(200) : 
//             http_response_code(500); 
//            if($update){
//              header("Location: ../users.php");
//            }
           
//         }catch(PDOException $e) { 
//         http_response_code(500); 
//         }
//     }
//     elseif(!empty($status)){
//         $statusInt=intval($status);
//         $query2="UPDATE user SET u_status=$statusInt WHERE id_user=$userId";
//         try { 
//             $update=$conn->query($query2)->rowCount() > 0 ? http_response_code(200) : 
//             http_response_code(500); 
//             if($update){
//                 header("Location: ../users.php");
//               }
//         }catch(PDOException $e) { 
//         http_response_code(500); 
//         }
//     }
    
    
// }

?>