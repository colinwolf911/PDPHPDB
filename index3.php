

<?php
//conncetion 
session_start();
include('pd0db/config/db.conn.php');

//retrive data from db
$sql='SELECT SKU,NAMES,STOCKS,PRICES FROM codet2';
//$sql='SELECT * FROM codet2 ORDER BY PRICES';
//make queries  and get results 
$result =mysqli_query($conn,$sql);

//fetch the result rows as an array
//$codet2 =mysqli_fetch_all($result,MYSQLI_ASSOC);

//print_r($codet2);
//mysqli_free_result($result);
//close connecttion
//mysqli_close($conn);



?>



<!doctype html>
<html lang="en"> 
<?php include('pd0db/template/header.php');?>
<body>
<table align="center" border="1px" style="width:600px ;line-height :40px;">
     <tr>
        <th colspan="6"><h2> combine table data from codet2 db</h2></th></tr>
          <tr>
            <t>
              <th >SKU</th>
              <th>NAMES</th>
              <th>STOCKS</th>
              <th>PRICES</th>
          </tr>
          </t>
    <?php 
        while($rows =mysqli_fetch_assoc ($result))
        {
 ?>

            <tr>
                <td><?php echo $rows['SKU'];?></td>
                <td><?php echo $rows['NAMES'];?></td>
                <td><?php echo $rows['STOCKS'];?></td>
                <td><?php echo $rows['PRICES'];?></td>
            </tr>
      <?PHP   }?>
        
      </table>


</body>

</html>
