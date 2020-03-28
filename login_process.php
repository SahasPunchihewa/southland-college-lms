<?php
session_start();

if ($_POST['username'] == 'admin' && $_POST['password'] == 'MySouthlands@1885'){
    $_SESSION['auth'] = true;
    header('Location: '.'portal.php');
}else{
    header('Location: '."login.php?fail=true");
}
?>