<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
require_once './Service/Database.php';

$database = new Database();
$entityManager = $database->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);