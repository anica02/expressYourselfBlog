


$('.btnDeleteP').on('click', function(){
         var post=$(this);
         var postId=$(this).data("id");
       
        $.ajax({ 
            type: 'POST', 
            url: 'form_check/ajax.php',
            data: { 
                    pId:postId
                  
            },
            dataType: "text",
            success: function(data,status,jqXHR){
            console.log("Server data", data);
            console.log(jqXHR.status);
            if(jqXHR.status==200) 
            post.parent().parent().css("display","none");
            },
            error: function(message){
            console.log(`${message.status} ${message.statusText}`); 
            } 
            }); 
});
 

$('.btnDeleteUser').on('click', function(){
        var user=$(this);
        var userId=$(this).data("id");
      
       $.ajax({ 
           type: 'POST', 
           url: 'form_check/ajax.php',
           data: { 
                   uId:userId
                 
           },
           dataType: "text",
           success: function(data,status,jqXHR){
           console.log("Server data", data);
           console.log(jqXHR.status);
           if(jqXHR.status==200) 
          user.parent().parent().css("display","none");
           },
           error: function(message){
           console.log(`${message.status} ${message.statusText}`); 
           } 
           }); 
});

$('.btnEditUser').on('click', function(){
        var userId=$(this).data("id");
      
       $.ajax({ 
           type: 'POST', 
           url: 'form_check/ajax.php',
           data: { 
                   uEditId:userId
                 
           },
           dataType: "text",
           success: function(data,status,jqXHR){
           console.log("Server data", data);
           console.log(jqXHR.status);
           if(jqXHR.status==200) 
             $('#dataUser').css('display','block');
           },
           error: function(message){
           console.log(`${message.status} ${message.statusText}`); 
           } 
           }); 
});
