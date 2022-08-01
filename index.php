<?php

require_once "./vendor/autoload.php";

require_once "./Routes/web.php";

if (!isset($_SESSION['Messages']))
    $_SESSION['Messages'] = [];