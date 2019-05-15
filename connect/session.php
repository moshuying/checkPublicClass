<?php
session_start();
if(!empty($_SESSION['username'])) {
//     echo ("<script>console.log(".$_SESSION['username'].")</script>");
}else{
    header("Location:../");
}
?>