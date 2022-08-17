<?php
//00file system -part1
//00read file
/*$quotes=readfile('readme.txt');
echo $quotes;*///follow by the number byte

//01if the file doesn't exist
$files='readme.txt';
if(file_exists($files)){
    echo  readfile($files).'<br>';
//copy files
copy($files,'copyreadme.txt').'<br>';

//absoulte path
echo realpath($files).'<br>';

//filesize
echo filesize($files).'<br>';

//rename files
//rename($files,'readmechangetotext.txt').'<br>';

}else{
    echo "files doesn't exist";
}




?>