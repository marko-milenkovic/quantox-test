<?php


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\Setup;

class Database
{
    private static $databaseParams = [
        'driver' => 'pdo_mysql',
        'user' => 'root',
        'password' => '',
        'dbname' => 'quantox-test',
    ];

    public function getEntityManager(): ?EntityManager
    {
        $paths = ['./Entity/'];
        $isDevMode = true;
        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
        try
        {
            return EntityManager::create(self::$databaseParams, $config);
        }
        catch (ORMException $e)
        {
            return null;
        }
    }
}