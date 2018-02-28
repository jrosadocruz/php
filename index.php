<?php

require('core/functions.php');
require('core/database/Connection.php');
$config = require('config.php');

$pdo = Connection::make($config['database']);

$tasks = $pdo -> prepare('select * from tasks');
$tasks -> execute();
$tasks = $tasks->fetchAll(PDO::FETCH_CLASS);

dd($tasks);
