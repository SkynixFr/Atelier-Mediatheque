<?php 

namespace medianet_usagers\control;

class MedianetUsagersController extends \mf\control\AbstractController {

	public function __construct(){
        parent::__construct();
    }

    public function viewHome(){
    	$vue = new \medianet_usagers\view\MedianetUsagersView();
    	$vue->render("viewHome");
    }
    public function viewSearch(){
    	$vue = new \medianet_usagers\view\MedianetUsagersView();
    	$vue->render("viewSearch");
    }
    public function sendSearch(){
    	if(isset($this->request->post['rechercher'])){
            $recherche = $this->request->post['rechercher'];
        }else{
            $router = new \mf\router\Router();
            $alias = "default";
            $router->executeRoute($alias);
        }
        $document = \medianet_usagers\model\Document::where('id', '=', $recherche)->first();
        $vue = new \medianet_usagers\view\MedianetUsagersView($document);
        $vue->render("viewSearch");
    }
}

