<?php
/**
 * Created by PhpStorm.
 * User           : RyMey
 * Email          : rya.meyvriska@mail.ugm.ac.id
 * Linkedin       : https://id.linkedin.com/in/rymey
 * Github Account : https://github.com/RyMey
 * Date           : 14/12/2015
 * Time           : 20.43
 */

use Illuminate\Database\Capsule\Manager;

$manager = new Manager();
$manager->addConnection(array(
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'goodtrack',
    'username' => 'root',
    'password' => '',
    'prefix' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci'
));
$manager->bootEloquent();
$manager->setAsGlobal();
$conn = $manager->connection();
?>