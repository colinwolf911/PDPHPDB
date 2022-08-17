<?php

session_start();
//override the name
//$_SESSION['name']='PD ONLINE SHOPPING';
//CHECKING OUT THE QUERY STRING
if($_SERVER['QUERY_STRING']=='noname'){
    //delete a single 
    //unset($_SESSION['name']);
    //delete all session
    session_unset();
}
$name=$_SESSION['name'] ?? 'Guest';

//get the cookie
$gender=$_COOKIE['gender'] ??'unknown';

?>


<head>
    <title>PD ONLINE SHOPPING </title>
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
     <style type="text/css">
        .brand{
            background:#cbb09c !important;

        }
        .brand-text{
            color:#cbb09c !important;
            
        }
        form{
            max-width: 460px;
            margin:20px auto;
            padding: 20px;
        }
        .phone{
            width: 100px;
            padding: 40px auto 30px;
            display: block;
            position: relative;
            top:-5px;
        }
     </style>
</head>
<body class="grey lighten-4">
    <nav class="white z-depth-0">
        <div class="container">
            <a href="index.php" class="brand-logo brand-text">PD online shopping</a>
            <ul id="nav-moblie" class="right hiden-on-small-and down">
                <li class="grey-text">Hello  <?php echo htmlspecialchars($name);?></li>
                <li class="grey-text">(<?php echo htmlspecialchars($gender);?>)</li>
                <li><a href="add.php" class="btn brand z-depth-0">add a product</a></li>

            </ul>
        </div>
    </nav>

