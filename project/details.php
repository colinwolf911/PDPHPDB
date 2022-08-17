<?php
//01database connect files
include('config/db_conn.php');
//04B ACTIONS FROM FORMS 
if(isset($_POST['delete'])){
    //05a getting actually id 
    $id_to_delete=mysqli_real_escape_string($conn,$_POST['id_to_delete']);
    //setting the delete string 
    $sql="DELETE FROM phones WHERE id=$id_to_delete";

    //check it's work or not
    if(mysqli_query($conn,$sql)){
        //sucess then change the location
        header('Location: index.php');

    }{
        //failure
        echo "query error: ".mysqli_error($conn);
    }
}



//02checking get request  id param
if(isset($_GET['id'])){
    $id=mysqli_real_escape_string($conn,$_GET['id']);

    //make sql
    $sql="SELECT * FROM phones WHERE id=$id";

    //get the query result 
    $result=mysqli_query($conn,$sql);

    //fetch the data in array forms 
    $phone=mysqli_fetch_assoc($result);

    //freeze the connection
    mysqli_free_result($result);
    mysqli_close($conn);
    //to check the connections
    //print_r($phone);

}

//changing reference form a calss herf at index.php <a href="#" class="brand-text">more infos</a>
?>
<!doctype html>
<html lang="en">
<?php include('templates/header.php');?>
<div class="container center grey-text">
    <?php //checking id existing or not  
    if($phone): ?>
    <h4><?php echo htmlspecialchars($phone['title']);  ?></h4>
    <p>Created by : <?php echo htmlspecialchars($phone['email']);?></p>
    <p><?php echo date($phone['created_at']);?></p>
    <h5>product</h5>
    <p><?php echo htmlspecialchars($phone['product']);?></p>

<!--03 delete form -->
<!--04A ACTIONS -->
<form action="details.php" method="POST">
    <input type="hidden" name="id_to_delete" value="<?php echo $phone['id']?>">
    <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">


</form>






    <?php else: //add to defensive error to show if there's no product?>
        <h5>there is no such products  exists!</h5>
    <?php endif; ?>
</div>

<?php include('templates/footer.php');?>

</html>