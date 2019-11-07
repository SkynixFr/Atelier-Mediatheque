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
			$etat = 'Disponible';
			$button = '<a href="#">Emprunter</a>';
		}
		else if($dispo != 1  && $indispo == 1){
			$etat = 'Indisponible';
		}

		$motcles = '';
		foreach ($motscles as $key) {
			$motcles .= '<li>'. $key->motscles .'</li>';
		}

		$view = '
			<img src="'.$httprequest->root . $image.'" alt="photo_du_document">
			<p>Disponibilité : '. $etat  .'</p>
			'.$button.'
			<ul>
				'.$motcles.'
			</ul>
			<p></p>
			<h1>'. $titre .'</h1>
			<p>'. $description .'</p>
			';
			return $view;
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