<?php

namespace medianet_usagers\view;

class MedianetUsagersView extends \mf\view\AbstractView {

	private $router;

	public function __construct($data = ''){
		parent::__construct($data);
		$this->router = new \mf\router\Router();
	}

	public function renderHeader(){
		if ( !isset($_SESSION["mdp"]) && !isset($_SESSION["email"])){ 
			$header = '
			<header> 
				<a href="' . $this->router->urlFor('home') . '" >Home </a>
				<input type="text">
				<a href="' . $this->router->urlFor('login') . '" >Login </a>
				<p>Pas encore enregistrer ? Créez votre compte</p>
				<a href="' . $this->router->urlFor('signup') . '" >Signup </a>
			</header>';
			 }
		else{
			$header ='			
			<header> 
				<a href="' . $this->router->urlFor('home') . '" >Home </a>
				<input type="text">
				<a href="' . $this->router->urlFor('usager', ['id' => $_SESSION['id']]) . '" >Mon compte </a>&nbsp;
				<form method="post" action="' . $this->router->urlFor('logout') . '">
					<button> Se déconnecter </button>
				</form>
			</header>';
		}

	
		return $header;
	}

	public function renderFooter(){
		$footer = '
			<footer>
	    		<p> Créée par les steack</p>
	    		<a href="#">Nous contacter</a>
	    		<p>Projet CIASIE</p>
    		</footer>';
		return $footer;
	}

	private function renderHome(){
		$home = '
		<section>
			<article>
				<p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker. </p>
			</article>
			<article>
				<p> Besoin d\'aide ? Nous contacter dayromain@yahoo.fr </p>
			</article>
		</section>
		<section>
			<article>
				Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est
				le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de 
				texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté 
				à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la 
				vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de 
				mise en page de texte, comme Aldus PageMaker.
			</article>
		</section>';
		return $home;
	}

	private function renderView(){

		$httprequest = new \mf\utils\HttpRequest();

		$valueDocument = $this->data;
		$motscles = $this->data->motcles()->get();

		$indispo = $valueDocument->indisponible;
		$dispo = $valueDocument->disponible;
		$titre = $valueDocument->nom;
		$description = $valueDocument->description;
		$image = $valueDocument->image;

		if ($dispo == 1 && $indispo != 1) {
			$etat = '<span class="available">Disponible</span>';
			$button = '<a href="#">Emprunter</a>';
		}
		else if($dispo != 1  && $indispo == 1){
			$etat = '<span>Indisponible</span>';
		}

		$motcles = '';
		foreach ($motscles as $key) {
			$motcles .= '<li>'. $key->motscles .'</li>';
		}

		$view = '
			<section>
				<div class="row">
					<img src="'.$httprequest->root .'/'.$image.'" alt="photo_du_document">
					<p>Disponibilité : '. $etat  .'</p>
					'.$button.'
					<ul>
						'.$motcles.'
					</ul>
				</div>
			</section>
			<section>
				<h1>Description</h1>
				<div class="row">
					<h2>'. $titre .'</h2>
					<p>'. $description .'</p>
				</div>
			</section>	
			';
			return $view;
	}
  
	private function renderUsager(){
		
		$httprequest = new \mf\utils\HttpRequest();
		$default = $httprequest->root;

		$valueUsager = $this->data;	
		$emprunts = $valueUsager->documents()->get();

		$usager = '
		<h1>Vos informations personnelles</h1>
		<section>
			<p>Nom : '. $valueUsager->nom .'</p>
			<p>Prénom : '. $valueUsager->prenom .'</p>
			<p>Age : '. $valueUsager->age .'</p>
			<p>Date de Naissance : '. $valueUsager->datenaissance .'</p>
			<p>Email : '. $valueUsager->email .'</p>
			<p>Telephone : '. $valueUsager->telephone .'</p>
			<p>Adresse : '. $valueUsager->adresse .'</p>
		</section>
		<section>';

		foreach ($emprunts as $key) {
			$usager .= "<article>
				<h1>Nom : $key->nom</h1>
				<ul>
					<li>Date emprunt : a rajouter</li>	
				</ul>
			</article>";
		}

		$usager.= '</section>
		';
		return $usager;
		
	}
	
	private function renderSignup(){
		$signup = '
		<h1>Créé votre compte</h1>
		<form method="post" action="' . $this->router->urlFor('send') . '">
			<label for ="nom">Nom :</label><input type="text" name="nom"/>
			<label for ="prenom">Prenom :</label><input type="text"/ name="prenom">
			<label for ="datenaissance">Votre date de naissance :</label><input type="date"/ name="datenaissance">
			<label for ="email">Votre email :</label><input type="mail"/ name="email">
			<label for ="age">Votre âge :</label><input type="number" name="age"/>
			<label for ="adresse">Votre adresse :</label><input type="text" name="adresse"/>
			<label for ="telephone">Votre numéro de téléphone :</label><input type="text"/ name="telephone">
			<label for ="motdepasse">Votre mot de passe:</label><input type="password"/ name="motdepasse">
			
			<button>SignUp</button>
		</form>
	';
		return $signup;
	}
	private function renderLogin(){
		$erreur = $this->data;
		$login = '
		<h1>Vous connectez </h1>
		<form method="post" action="' . $this->router->urlFor('sendLogin') . '">
			<label for ="email">Votre email :</label><input type="mail"/ name="email"></br>
			<label for ="motdepasse">Votre mot de passe:</label><input type="password"/ name="motdepasse"></br>
			<input type="hidden" name="messageErreur" value="Vous vous êtes trompé de mot de passe">
			<p> ' . $erreur . '</p>
			<button>Login</button>
		</form>
	';
		return $login;
	}
	protected function renderBody($selector){
		$html = $this->renderHeader();
		
		switch ($selector) {
			case "viewSearch":
				$html.= $this->renderTweet();
				break;
			case "viewHome":
				$html.= $this->renderHome();
				break;
			case "viewView":
				$html.= $this->renderView();
				break;
			case "viewUsager":
				$html.= $this->renderUsager();
				break;
			case "viewLogin":
				$html.= $this->renderLogin();
				break;
			case "viewSignup":
				$html.= $this->renderSignUp();
				break;
			default:
				$html.= $this->renderHome();
				break;
		}

		$html.= $this->renderFooter();
		
		return $html;
	}

}
