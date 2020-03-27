<?php
session_start();

if ($_POST['username'] == 'admin' && $_POST['password'] == 'MySouthland@1885'){
    $_SESSION['auth'] = true;
    header('Location: '.'portal.php');
}else{
    header('Location: '."login.php?fail=true");
}
?>