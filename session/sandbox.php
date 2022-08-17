<?php
//session
if(isset($_POST['submit'])){
    //cookie for gender
    setcookie('gender', $_POST['gender'],time() + 86400);

    session_start();
    $_SESSION['name']=$_POST['name'];

   // echo $_SESSION['name'];
   header('Location: project/index.php');
}

?>
<!doctype html>
<html lang="en">
    <head>
        <title>php sessions</title>
    </head>
    <body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <input type="text" name="name">
        <select name="gender">
            <option value="male">male</option>
            <option value="female">female</option>
            <option value="rather not to say ">others</option>
        </select>
        <input type="submit" name="submit" value="submit"class="btn brand z-depth-0" >
    </form>
    </body>
</html>