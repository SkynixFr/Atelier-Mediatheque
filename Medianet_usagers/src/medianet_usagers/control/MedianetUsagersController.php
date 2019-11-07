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

    public function viewView(){
    	
    	if(isset($this->request->get['id'])){
            $id = $this->request->get['id'];
        }else{
            $router = new \mf\router\Router();
            $alias = "default";
            $router->executeRoute($alias);
        }

    	$x = \medianet_usagers\model\Document::where('id','=', $id)->first();
    	
    	$vue = new \medianet_usagers\view\MedianetUsagersView($x);
    	$vue->render("viewView");
    }
}