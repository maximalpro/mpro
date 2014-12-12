<?php

require_once 'lib/db_params.php';
require_once 'lib/m/init.php';

$s2=new SOCIAL2();
$s2->sdb();
$s2->auth('login', 'pass');

?>