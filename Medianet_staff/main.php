<?php 

// Chargement de la configuration de la BD
$config = parse_ini_file("conf/config.ini");

// Chargement des Autoloadeurs;
require_once 'src/mf/utils/ClassLoader.php';
$loader = new \mf\utils\ClassLoader('src');
$loader->register();
require_once 'vendor/autoload.php';

// Chargement de la connexion à la BD
$db = new Illuminate\Database\Capsule\Manager();
$db->addConnection($config);
$db->setAsGlobal();
$db->bootEloquent();

// Ajout des css
/*src\nomprojet\view\???::addStyleSheet('css/???.css');*/

// Définition des uses
use \mf\router\Router;

// Instanciation des classes
$router = new Router();