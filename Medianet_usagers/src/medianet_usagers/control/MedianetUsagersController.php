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
    
    public function viewUsager(){
    	if(isset($this->request->get['id'])){
            $id = $this->request->get['id'];
        }else{
            $router = new \mf\router\Router();
            $alias = "default";
            $router->executeRoute($alias);
        }
        $requete = \medianet_usagers\model\Usager::where('id','=',$id)->first();
    	$vue = new \medianet_usagers\view\MedianetUsagersView($requete);
    	$vue->render("viewUsager");
    }

}