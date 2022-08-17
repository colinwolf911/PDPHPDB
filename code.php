<?php
session_start();
$conn=mysqli_connect('localhost','shau','test1234','simplephp');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['save_excel'])){
    


    //get the data from import file which is in the index2.php and we want the name from it as well

    $fileName=$_FILES['import_files']['name'];
    $file_ext= pathinfo($fileName,PATHINFO_EXTENSION);

    //validation 
    $allowed_text=['xls','csv','xlsx'];

    if(in_array($file_ext,$allowed_text)){

         //$inputFileName = './sampleData/example1.xls';
         $inputFileNamePath = $_FILES['import_files']['tmp_name']; 

       /** Load $inputFileName to a Spreadsheet object **/
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        //****check the get activities 
        $data=$spreadsheet ->getActiveSheet()->toArray();
        
        //check the excel sheet 
        foreach($data as $row){
            $id= $row['0'];
            $SKU=$row['1'];
            $Product=$row['2'];
            $Supplier=$row['3'];
            $SupplierSKU=$row['4'];
            $SupplierProductName=$row['5'];
            $URLs=$row['6'];
            $DropShip=$row['7'];
            $LatestPrice=$row['8'];
            $FixedPrice=$row['9'];
            

               
            //query
            $productsQuery="INSERT INTO codet0(id,SKU,Product,Supplier,SupplierSKU,SupplierProductName,URLs,DropShip,LatestPrice,FixedPrice)VALUES('$id','$SKU','$Product','$Supplier','$SupplierSKU','$SupplierProductName','$URLs','$DropShip','$LatestPrice','$FixedPrice')";

            //keep result into mysql funciton 
            $result=mysqli_query($conn,$productsQuery);
            $msg=true;               
        }
        if(isset($msg)){
            $_SESSION['MESSAGE']="successfully  uploaded";
            header('Location: index2.php');
            exit(0);

        }
        else{
            $_SESSION['MESSAGE']="failed to uploaded";
            header('Location: index2.php');
            exit(0);
        }

    }
    else {
        //redict pages
        $_SESSION['MESSAGE']="Invalid File";
        header('Location: index2.php');
        exit(0);
    }
    

}

?>