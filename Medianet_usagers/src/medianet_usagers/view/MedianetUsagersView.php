<?php 

namespace medianet_usagers\view;

class MedianetUsagersView extends \mf\view\AbstractView{

	private $router;

	public function __construct($data = ''){
		parent::__construct($data);
		$this->router = new \mf\router\Router();
	}

	public function renderHeader(){
		$header = '
			<header> 
				<button>Menu</button>
				<input type="text">
				<button>Login</button>
			</header>';

		return $header;
	}

	public function renderFooter(){
		$footer = '
			<footer>
				<p> Créée par les steack</p>
				<a> Nous contacter !!! </a>
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
		private function renderSignup(){
		$signup = '
		<form method="post" action="' . $this->router->urlFor('send') . '" action="' . $this->router->urlFor('home') . '">
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
				$html.= $this->renderUserTweet();
				break;
			case "viewUser":
				$html.= $this->renderFormulaire();
				break;
			case "viewLogin":
				$html.= $this->renderSignUp();
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