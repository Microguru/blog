<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: http://localhost/phpblog/index.php"); // Redirecting To Home Page
}
?>