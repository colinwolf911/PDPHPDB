
<?php
//conncetion 
session_start();
include('pd0db/config/db.conn.php');

//retrive data from db
//$sql='SELECT SKU,NAMES,STOCKS,PRICES FROM codet2';
$sql='SELECT * FROM codet2 ORDER BY PRICES';
//make queries  and get results 
$result =mysqli_query($conn,$sql);

//fetch the result rows as an array
$codet2 =mysqli_fetch_all($result,MYSQLI_ASSOC);

//print_r($codet2);
mysqli_free_result($result);
//close connecttion
mysqli_close($conn);



?>

<!doctype html>
<html lang="en"> 
<?php include('pd0db/template/header.php');?>

<h4 class="center grey-text">results !</h4>
<div class="container">
    <div class="row">
        <?php foreach ($codet2 as $codet2){?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content">
                        <h6><?php echo htmlspecialchars($codet2['STOCKS']);?></h6>
                        <div><?php echo htmlspecialchars($codet2['NAMES']);?></div>
                        <div><?php echo htmlspecialchars($codet2['SKU']);?></div>
                        <div><?php echo htmlspecialchars($codet2['PRICES']);?></div>
                    </div class="card-action right-align"><a href="#" class="brand-text">more info</a></div>
                    </div>
                </div>
            </div>
        <?php
    
    }?>
<?php include('pd0db/template/footer.php');?>
</html>