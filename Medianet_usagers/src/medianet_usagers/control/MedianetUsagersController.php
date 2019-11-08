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
        }
    	$x = \medianet_usagers\model\Document::where('id','=', $id)->first();
    	
    	$vue = new \medianet_usagers\view\MedianetUsagersView($x);
    	$vue->render("viewView");
    }
  
    public function viewUsager(){
       if(isset($this->request->get['id'])){
            $id = $this->request->get['id'];
        }
      $requete = \medianet_usagers\model\Usager::where('id','=',$id)->first();
    	$vue = new \medianet_usagers\view\MedianetUsagersView($requete);
    	$vue->render("viewUsager");
    }

    public function viewSignup(){
    	
    	$vue = new \medianet_usagers\view\MedianetUsagersView();
    	$vue->render("viewSignup");

    }

    public function sendSignup(){
    	$vue = new \medianet_usagers\view\MedianetUsagersView();
        $user = new \medianet_usagers\model\Usager();
		$user->nom = $this->request->post['nom'];
		$user->prenom = $this->request->post['prenom'];
		$user->datenaissance = date('Y-m-d',strtotime($this->request->post['datenaissance']));
		$user->email = $this->request->post['email'];
		$user->age = $this->request->post['age'];
		$user->adresse = $this->request->post['adresse'];
		$user->telephone = $this->request->post['telephone'];
		
        $user->motdepasse = password_hash($this->request->post['motdepasse'], PASSWORD_DEFAULT);
        
        
		$user->etat = 0;
		$user->numadherent = null;
		$user->dateadhesion = null;
		if ($user->motdepasse  != null ){
			
			$user->save();
			 $vue->render("viewHome");
			
			}
        
   	 }
    public function viewLogin(){
    
        $vue = new \medianet_usagers\view\MedianetUsagersView();
        $vue->render("viewLogin");

    }
    public function sendLogin(){
        $vue = new \medianet_usagers\view\MedianetUsagersView();
        $userBd = \medianet_usagers\model\Usager::where('email', '=', $this->request->post['email'])->first();
        
        if (password_verify($this->request->post['motdepasse'], $userBd->motdepasse)){
            $vue->render("viewHome");
        }else {
            $erreur = $this->request->post['messageErreur'];
            $vue = new \medianet_usagers\view\MedianetUsagersView($erreur);      
            $vue->render("viewLogin");
        }

    }
}

