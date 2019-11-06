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
}