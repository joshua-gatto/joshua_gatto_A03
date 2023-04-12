<?php
if(isset($_COOKIE["session_ID"])){
    unset($_COOKIE["session_ID"]);
    include("index.php");
}else{
    include("profile.php");
}
?>