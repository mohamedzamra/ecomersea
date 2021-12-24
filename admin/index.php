<?php
session_start();
$noNavbar ="";
$pageTitle ="login";
if(isset($_SESSION['username'])){
    header('location:dashboard.php');
}


include 'ent.php';
include $tpl ."header.php";
include 'includes/lang/en.php';



if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $hashedPass = sha1($password);

    $stmt=$con->prepare("SELECT userid ,username , password FORM users WHERE username = ?AND password = ?AND Gropid=1 LIMIT 1");
    $stmt->execute(array($username,$hashedpass));
    $row =$stmt->fetch();
    $count =$stmt->rowCount();
   

    if($count > 0){
         $_SESSION['username']=$username;
         $_SESSION['id']=$row['userid'];
         header('location:dashboard.php');
        exit();
       
    }

}
?>
<form class="login"action="<?php echo $_SERVER['PHP_SELF']?>"method="post">
    <h4 class="text-center">Admin login</h4>
<input class="form-control input-lg"type= "text" name="user" placeholder="username"autocompleta= "off"/>
<input class="form-control input_lg"type= "password" name="pass" placeholder="password"autocompleta ="new-password"/>
<input class="btn btn-primary"type= "submit" value="login" />
</form>
<?php include $tpl ."footer.php";


?>