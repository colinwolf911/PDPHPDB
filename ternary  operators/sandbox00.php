<?php
//superglobals
//_GET['name'],$_POST['name']
echo $_SERVER['SERVER_NAME'].'<br/>';
echo $_SERVER['REQUEST_METHOD'].'<br/>';
echo $_SERVER['SCRIPT_FILENAME'].'<br/>';
echo $_SERVER['PHP_SELF'].'<br/>';


?>
<!doctype html>
<html lang="en">
    <head>
        <title>php sandbox</title>
    </head>
    <body>
        <p><?php echo $score>40 ?'high score:)!':'low score:(!'; ?></p>
    </body>
</html>