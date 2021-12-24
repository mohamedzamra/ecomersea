<?php
session_start();
if(isset($_SESSION['username'])){
   echo "welcom".$_SESSION['username'];

}else{
    
    
    header('loaction:index.php');
    exit();


}
echo 'not failedc';
?>