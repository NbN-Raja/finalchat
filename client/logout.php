<?php 
session_start();
session_set_cookie_params(0);

session_unset();
session_destroy();

header("Location: index.php");
exit;