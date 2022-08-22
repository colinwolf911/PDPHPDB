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
            $SKU= $row['0'];
            $ItemName=$row['1'];
            $Brand=$row['2'];
            $availabilities=$row['3'];
            $SOH=$row['4'];
            $InvoicePriceexGST=$row['5'];
            $RRPIncGST=$row['6'];
            $Barcode=$row['7'];
            $Shipping_Weight=$row['8'];
            $Shipping_Length =$row['9'];
            $Shipping_Width=$row['10'];
            $Shipping_Height =$row['11'];
            $Image_Link =$row['12'];
           
            

               
            //query
            $productsQuery="INSERT INTO codet1(SKU,ItemName,Brand,availabilities,SOH,InvoicePriceexGST,RRPIncGST,Barcode,Shipping_Weight,Shipping_Length,Shipping_Width,Shipping_Height,Image_Link)VALUES('$SKU','$ItemName','$Brand','$availabilities','$SOH','$InvoicePriceexGST','$RRPIncGST','$Barcode','$Shipping_Weight','$Shipping_Length','$Shipping_Width','$Shipping_Height','$Image_Link')";

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