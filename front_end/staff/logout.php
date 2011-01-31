<?php
unset($_SESSION['name']); 
session_destroy(); 

if ( isset( $_COOKIE[ $session_name ] ) ) {
    if ( setcookie(session_name(), '', time()-3600, '/') ) {
        header("Location: index.html");
        exit();    
    }
    else
    {
        // setcookie() fails when there is output sent prior to calling this function.
    }
}
//header("Location: index.html");
?>