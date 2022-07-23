<?php

$files = glob('db/db*.Engin.php');
foreach ($files as $file) {
    require $file;
}