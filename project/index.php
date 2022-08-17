<?php 
//mysqli or pdo for objects
//00conncetions

include('config/db_conn.php');

//01write query for all phones
$sql='SELECT title,name, product,email ,id FROM phones ORDER BY created_at';
//02make query & get result
$result=mysqli_query($conn,$sql);

//03 fetch the resulting rows as an array
$phones=mysqli_fetch_all($result,MYSQLI_ASSOC);

//04 free from memory 
mysqli_free_result($result);

//05 close the connection
mysqli_close($conn);
//print_r($phones);

//explode go throught the array 
//

//print_r(explode(',', $phones[0]['product']));
?>










<!doctype html>
<html lang="en"> 
<?php include('templates/header.php');?>
<h4 class="center grey-text">phones!</h4>
<div class="container">
    <div class="row">
        <?php foreach($phones as $phone): ?>
            <div class="col s6 md3"> 
                <!--place some images-->
                <div class="card z-depth-0">
                     <!--place some images-->
                     <img src="img/puppy0.jpg" class="phone"> 
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($phone['title']); ?></h6>
                        <ul><?php foreach(explode(',',$phone['product'])as $prod): ?>
                        <li> <?php echo htmlspecialchars($prod); ?></li><?php endforeach;?>
                        
                        </ul>
                       
            </div>
            <div class="card-action right-align">
                <a  class="brand-text" href="details.php?id= <?php echo $phone['id']?>">more infos</a>
            </div>
        </div>
    </div>
        <?php endforeach; ?>
        <?php if(count($phones)>=2
        ):?>
        <p>there are two or more</p>
        <?php else: ?><p>there are less than two phones</p><?php endif;?>

    </div>
</div>

<?php include('templates/footer.php');?>
    
 
</html>