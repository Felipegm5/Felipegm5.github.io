<?php
session_set_cookie_params(300);

session_start();

if (isset($_SESSION['last_activity'])) {
    $elapsed_time = time() - $_SESSION['last_activity'];
    
    if ($elapsed_time > 300) {
        session_destroy();
        header("location: http://localhost/Rubrica/index.html");
        exit();
    }
}
session_destroy();
header("location: http://localhost/Rubrica/index.html");

$_SESSION['last_activity'] = time();

?>