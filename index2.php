<?php
session_start();
include('pd0db/config/db.conn.php');


?>
<!doctype html>
<html lang="en"> 
<?php include('pd0db/template/header.php');?>
<h4 class="center grey-text">upload files!</h4>
<?php include('pd0db/template/footer.php');?>

    <body>
        <div class="container">
         <div class="row">
          <div class="col-md-12 mt-4">
            <?php if(isset($_SESSION['MESSAGE'])){
              echo "<h4>".$_SESSION['MESSAGE']."</h4>";
              unset($_SESSION['MESSAGE']);
            }
            ?>
            <div class="card">
             <div class="card-header">
                <h4>How to import Excel Data into databse in PHP</h4>
            

              </div>
              <div class="card-body"></div>
              <form action="code.php" method="POST" enctype="multipart/form-data">
                <input type="file" name ="import_files" class="form-control"> 
                <button class="btn btn-primary mt-3" name="save_excel" class="btn btn-primary mt-3" >import </button></form>
            </div >
          </div>
        </div>
    </body>
 
</html>