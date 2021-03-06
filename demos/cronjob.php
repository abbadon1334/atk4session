<?php

declare(strict_types=1);

include __DIR__.'/../vendor/autoload.php';

$p = new \atk4\data\Persistence_SQL('mysql:dbname=atk4;host=localhost', 'atk4', '');

// create the table in database using schema\Migration
// use it one time to creqate the table, don't migrate on every call, please leave mysql alone ;)
(new \atk4\schema\Migration\MySQL(new \atk4\ATK4DBSession\SessionModel($p)))->migrate();

// init SessionHandler
(new \atk4\ATK4DBSession\SessionHandler($p))->executeGC();
