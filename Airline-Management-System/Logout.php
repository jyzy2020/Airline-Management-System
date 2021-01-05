
<!-- Log out program logic -->

<?php
session_start();
session_destroy();
header ("Location: http://localhost/index.html");
?>
