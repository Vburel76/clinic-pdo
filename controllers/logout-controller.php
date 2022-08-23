<?php

setcookie("mySearch", '' , time()-3600);
setcookie("myView", '' , time()-3600);

session_unset();
session_destroy();
?>