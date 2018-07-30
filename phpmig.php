<?php

use \Phpmig\Adapter;

error_reporting(-1);
ini_set('display_errors', 1);

define('DOCROOT', __DIR__. DIRECTORY_SEPARATOR . 'public' .DIRECTORY_SEPARATOR);
define('APPPATH', realpath(__DIR__.'/fuel/app/').DIRECTORY_SEPARATOR);
define('PKGPATH', realpath(__DIR__.'/fuel/packages/').DIRECTORY_SEPARATOR);
define('COREPATH', realpath(__DIR__.'/fuel/core/').DIRECTORY_SEPARATOR);
defined('FUEL_START_TIME') or define('FUEL_START_TIME', microtime(true));
defined('FUEL_START_MEM') or define('FUEL_START_MEM', memory_get_usage());

if(!file_exists(COREPATH.'classes'.DIRECTORY_SEPARATOR.'autoloader.php'))
{
	die('No composer autoloader found. Please run composer to install the FuelPHP framework dependencies first!');
}
require COREPATH.'classes'.DIRECTORY_SEPARATOR.'autoloader.php';
class_alias('Fuel\\Core\\Autoloader', 'Autoloader');

require_once('fuel/vendor/autoload.php');
require_once('fuel/app/bootstrap.php');

Database_Connection::instance()->connect(); 
$pdo = Database_Connection::instance()->connection();

$container = new ArrayObject();

// replace this with a better Phpmig\Adapter\AdapterInterface
$container['phpmig.adapter'] = new Phpmig\Adapter\PDO\Sql($pdo, 'migrations');

$container['phpmig.migrations_path'] = __DIR__ . DIRECTORY_SEPARATOR . 'fuel/app/migrations';

// You can also provide an array of migration files
// $container['phpmig.migrations'] = array_merge(
//     glob('migrations_1/*.php'),
//     glob('migrations_2/*.php')
// );

return $container;
