<?php
session_start();


session_unset();
session_destroy();

header("Location: /WT_FALL-25-26-/PROJECT/project%20p/MVC/Views/login.php");
exit;
