<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
    
    if(isset($_SESSION['page'])){
        $page=$_SESSION['page'];
        switch($page){
            case "index": echo "<title>Express yourself | Home</title>
                                <meta name='description' content='Express yourself - website where you can see what people have to say on 
                                on a given topic and write your one post'>
                                <meta name='keywords' content='blog,express,posts'>"; break;
            case "logIn": echo "<title>Express yourself | Log in</title>
                                <meta name='description' content='Express yourself - Login your account  to catch up and add your new post '>
                                <meta name='keywords' content='log in, email, account, blogs'>"; break;
            case "signUp": echo "<title>Express yourself | Sign Up</title>
                                <meta name='description' content='Express yourself - Sign up so you could create your account and begin writing your thoughts '>
                                <meta name='keywords' content='sign up,email, create, account, blogs'>"; break;
            case "blog": echo "<title>Express yourself | Blog</title>
                               <meta name='description' content='Express yourself - See what other people had posted on a certain topic '>
                               <meta name='keywords' content='title, blogs,tags, archives, posts, newest'>"; break;
            case "create": echo "<title>Express yourself | Create post</title>
                               <meta name='description' content='Express yourself - Create new posts by adding title, description, tag and image to them'>
                               <meta name='keywords' content='title, blogs,tags, description, image, upload, posts'>"; break;
            case "userPost": echo "<title>Express yourself | My posts</title>
                               <meta name='description' content='Express yourself - View your uploaded posts and edit them'>
                               <meta name='keywords' content='title, blogs,tags, posts, archives, newest'>"; break;
        }
    }
    ?>
    <!-- <title>Express yourself | Blog</title> -->
    
   
    
    <script src="https://kit.fontawesome.com/ce9a3cdf18.js" crossorigin="anonymous"></script>
    
    <!-- Favicons -->
    <link rel="shortcut icon" href="img/icon.png">
    
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" />
    
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    
    <!-- CSS Files For Plugin -->
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/font-awesome/font-awesome.min.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet" />
    <link href="css/YTPlayer.css" rel="stylesheet" />
    <link href="inc/owlcarousel/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="inc/owlcarousel/css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="inc/revolution/css/settings.css" rel="stylesheet" />
    <link href="inc/revolution/css/layers.css" rel="stylesheet" />
    <link href="inc/revolution/css/navigation.css" rel="stylesheet" />
    
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/mycss.css" rel="stylesheet">

</head>