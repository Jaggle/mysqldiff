<?php

/**
 * This file is part of project mysqldiff.
 *
 * Author: Jake
 * Create: 2020-07-08 20:24:10
 */

namespace Jaggle\MysqlDiff;

use Doctrine\DBAL\Platforms\MySqlPlatform;
use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager;

class MysqlDiff
{
    private $app;

    private $src;

    private $dest;

    public function __construct($src, $dest, Container $container = null)
    {
        $this->app = $container;

        $this->src = $src;
        $this->dest = $dest;
    }

    public function diff()
    {
        $mgr = new Manager($this->app);

        $src = $mgr->getConnection($this->src);
        $dest = $mgr->getConnection($this->dest);

        $srcSchema = $src->getDoctrineSchemaManager()->createSchema();

        $migrate = $dest->getDoctrineSchemaManager()->createSchema()->getMigrateToSql($srcSchema, new MySqlPlatform());

        return $migrate;
    }

    public function revert()
    {
        $mgr = new Manager($this->app);

        $src = $mgr->getConnection($this->src);
        $dest = $mgr->getConnection($this->dest);

        $destSchema = $dest->getDoctrineSchemaManager()->createSchema();

        $migrate = $src->getDoctrineSchemaManager()->createSchema()->getMigrateToSql($destSchema, new MySqlPlatform());

        return $migrate;
    }

    public function createMigration()
    {

    }
}
