<?php

namespace medianet_usagers\view;

class MedianetUsagersView extends \mf\view\AbstractView {

	private $router;

	public function __construct($data = ''){
		parent::__construct($data);
		$this->router = new \mf\router\Router();
	}

	public function renderHeader(){
		if ( !isset($_SESSION["mdp"])){ 
			$header = '
			<header> 
				<nav>
					<a href="' . $this->router->urlFor('home') . '" >Home </a>
					<form method="POST" action ="' . $this->router->urlFor('search') . '">
						<input type="text" name="recherche" placeholder="Recherche..." title="Recherche">
						<button>Rechercher</button>
					</form>
					<a href="' . $this->router->urlFor('login') . '" >Login </a>
					<a href="' . $this->router->urlFor('signup') . '" >Signup </a>
				</nav>
			</header>';
			 }
		else{
			$header ='			
			<header> 
				<nav>
					<a href="' . $this->router->urlFor('home') . '" >Home </a>
					<form method="POST" action ="' . $this->router->urlFor('search') . '">
						<input type="text" name="recherche">
						<button>Rechercher</button>
					</form>
					<a href="' . $this->router->urlFor('usager') . '" >Mon compte </a>
					<form method="post" action="' . $this->router->urlFor('logout') . '">
						<button> Se déconnecter </button>
					</form>
				</nav>
			</header>';
		}

	
		return $header;
	}

	public function renderFooter(){
		$footer = '
			<footer>
	    		<ul>
	    			<li>Créée par les steack</li>
	    			<li><a href="#">Nous contacter</a></li>
	    			<li>Projet CIASIE</li>
	    		</ul>
    		</footer>';
		return $footer;
	}

	private function renderHome(){
		$motscles = $this->data;
		$home = '
		<section>
			<article>
				<p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker. </p>
			</article>
			<article>
				<p> Besoin d\'aide ? zinniArthur@email.fr | pallaraHugo@email.fr | melignerLudovic@email.fr | dayRomain@email.fr</p>
			</article>
		</section>
		<section>
			<article>
				<ul>
			'; 
				foreach ($motscles as $value) {
					$home .= "<li> $value->motscles </li>";
				};
			$home .= '</article>
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
					<img src="'.$httprequest->root . '/' . $image.'" alt="photo_du_document">
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
		<form method="post" action="' . $this->router->urlFor('send') . '">
			<input type="text" name="nom"/> </br>
			<input type="text"/ name="prenom"></br>
			<input type="date"/ name="datenaissance"></br>
			<input type="mail"/ name="email"></br>
			<input type="number" name="age"/></br>
			<input type="text" name="adresse"/></br>
			<input type="text"/ name="telephone"></br>
			<input type="password"/ name="motdepasse"></br>
			
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
			<input type="mail"/ name="email"></br>
			<input type="password"/ name="motdepasse"></br>
			<input type="hidden" name="messageErreur" value="Vous vous êtes trompé de mot de passe">
			<p> ' . $erreur . '</p>
			<button>Login</button>
		</form>
	';
		return $login;
	}

	private function renderSearch(){
		$recherche  = $this->data;
		$search = '
		<section>
			<h1>Titre<h1>
			<ul>';
			foreach ($recherche as $value) {
				$search .= "<li> Nom : $value->nom | Type : $value->type | Genre : $value->genre </li>";
			};
			$search .='</ul>';

		return $search;
	}
	protected function renderBody($selector){
		$html = $this->renderHeader();
		
		switch ($selector) {
			case "viewSearch":
				$html.= $this->renderSearch();
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
