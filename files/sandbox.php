<?php
//file part 2
$files='readme.txt';

//opening file for reading r reading only
$handle=fopen($files,'r');
//overwrite the end 
$handle=fopen($handle,'+a');

//read the file
//echo fread($handle,filesize($file));
//echo fread($handle,70);//how many byte we wantit

//03 read the single line a pointer
//echo fgets($handle);
//echo fgets($handle);
//echo fgets($handle);

//04read single character
echo fgetc($handle);
echo fgetc($handle);

//05write to file
fwrite($handle,"\nhere is new product on sale within 40 days");//override at the beginning


//06 file close
fclose($handle);

//delete the file
unlink($file);


?>