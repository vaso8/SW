<?php

namespace App\Core;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model {
    
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);

        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => '127.0.0.1:33033',
            'database'  => 'scandiweb',
            'username'  => 'root',
            'password'  => 'password',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
            'port'      => '33033'
        ]);
        $capsule->bootEloquent();
    }
}