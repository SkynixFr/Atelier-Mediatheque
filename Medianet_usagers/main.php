<?php 

// Chargement de la configuration de la BD
$config = parse_ini_file("conf/conf.ini");

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
use \medianet_usagers\model\Document;
use \medianet_usagers\model\MotsCles;
use \medianet_usagers\model\Type;
use \medianet_usagers\model\Usager; 

// Instanciation des classes
$router = new Router();
$document = new Document();
$motscles = new MotsCles();
$type = new Type();
$usager = new Usager();
 
// Définition de la route par défaut
$router->setDefaultRoute('/home/');

// Ajout des toutes les routes dans le tableau routes et des alias dans le tableau alias
$router->addRoute('home', '/home/', '\medianet_usagers\control\MedianetUsagersController', 'viewHome');
$router->addRoute('search', '/search/', '\medianet_usagers\control\MedianetUsagersController', 'viewSearch');
$router->addRoute('view', '/view/', '\medianet_usagers\control\MedianetUsagersController', 'viewView');
$router->addRoute('usager', '/usager/', '\medianet_usagers\control\MedianetUsagersController', 'viewUsager');
$router->addRoute('login', '/login/', '\medianet_usagers\control\MedianetUsagersController', 'viewLogin');
$router->addRoute('signup', '/signup/', '\medianet_usagers\control\MedianetUsagersController', 'viewSignup');
$router->addRoute('send', '/send/', '\medianet_usagers\control\MedianetUsagersController', 'sendSignup');

// Execution de la méthode de la route
$router->run();

	