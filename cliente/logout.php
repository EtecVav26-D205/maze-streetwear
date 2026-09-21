
<?php

session_start();

session_unset();

session_destroy();

header("Location: /maze-streetwear/index.php");

exit;
