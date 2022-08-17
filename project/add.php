<?php 
//mysqli or pdo for objects
//00conncetions

include('config/db_conn.php');

//check the data wheather it has been sent or not 
//ASSOCIATED ARRAY TO CHECK wheather isset
/*if (isset($_GET['submit'])){
    echo $_GET['email'];
    echo $_GET['name'];
    echo $_GET['title'];
    echo $_GET['product'];
}*/
//to prevent the script from users such as <script >window.location="http://www.thenetninja.co.uk"</script>
//using htmlspecialchars
/*02
if (isset($_POST['submit'])){
    echo htmlspecialchars($_POST['email']);
    echo htmlspecialchars($_POST['name']);
    echo htmlspecialchars($_POST['title']);
    echo htmlspecialchars($_POST['product']);
}*/
//05 empty string at first by init the values 
$email=$name=$title=$product='';
//check with erros
$errors=array('email'=>'','name'=>'','title'=>'','product'=>'');
//03
if (isset($_POST['submit'])){

    //validate the form
    if(empty($_POST['email'])){
        $errors['email']= "an email is require<br/>";
    }else{
        $email=$_POST['email'];
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors['email']='EMAIL MUCH BE A VALID EMAIL ADDRESS';
        }
    }
//check name fields 
    if(empty($_POST['name'])){
        $errors['name']="a name is require<br/>";
    }else{
        $name=$_POST['name'];
        if(!preg_match('/^[a-zA-Z\s]+$/',$name)){
            $errors['name']= "a name must be letters space";
        }
    }
    //check tilte fields 
    if(empty($_POST['title'])){
        $errors['title']= "a title is require<br/>";
    }else{
        $title=$_POST['title'];
        if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
            $errors['title']= "a title must be letters space";
        }
    }
    //check product fields
    if(empty($_POST['product'])){
        $errors['product']="an product is require<br/>";
    }else{
        $product=$_POST['product'];
        if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/',$product)){
            $errors['product']="a product must be separate line";
        }
    }

    //check the errors before redicts
    if(array_filter($errors)){
        //echo "errors in the form";
    }else{
        //store data into db
        //00 check the data before push into the db
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $name=mysqli_real_escape_string($conn,$_POST['name']);
        $title=mysqli_real_escape_string($conn,$_POST['title']);
        $product=mysqli_real_escape_string($conn,$_POST['product']);

        //001 create a sql
        $sql="INSERT INTO phones(email,name,title,product)VALUES('$email','$name','$title','$product')";
        //002 SAVE INTO DB AND OUT
        if(mysqli_query($conn,$sql)){
            //sucess
             //redict to home page
            header('Location:index.php');

        }else{
            //error
            echo 'query error: '.mysqli_error($conn);
        }
       // echo "form is valid";
       //in future saving it into the db
       //redict to home page
       //header('Location:index.php');
    }

}//end of post check 
?>

<!doctype html>
<html lang="en"> 
<?php include('templates/header.php');?>

<section class="container grey-text">
    <h4 class="center">add the product</h4>
    <?php // <form action="add.php" class="white" method="GET"> action to handle the file ?>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" class="white" method="POST">
        <label>your email:</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
        <div class="red-text"><?php echo $errors['email'];?></div>
        <label>your name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($name)?>">
        <div class="red-text"><?php echo $errors['name'];?></div>
        <label>your title:</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($title)?>">
        <div class="red-text"><?php echo $errors['title'];?></div>
        <label>select your product (comma separated):</label>
        <input type="text" name="product" value="<?php echo htmlspecialchars($product)?>">
        <div class="red-text"><?php echo $errors['product'];?></div>
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>

<?php include('templates/footer.php');?>
    
 
</html>