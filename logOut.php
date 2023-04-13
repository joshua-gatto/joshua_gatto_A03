<?php
if(isset($_SESSION["user"])){
    unset($_SESSION["user"]);
    include("index.php");
}else{
    include("profile.php");
}
?>