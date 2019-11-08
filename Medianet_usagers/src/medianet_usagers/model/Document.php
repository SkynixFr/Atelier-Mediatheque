<?php 

namespace medianet_usagers\model; // Espace de noms

class Document extends \Illuminate\Database\Eloquent\Model{ //  Définition de la classe
	
	// Définition des variables de la table
	protected $table = 'document';
	protected $primaryKey = 'id';
	public $timestamps = false;

	/* Récupère tous les types d'un document */
	public function types(){
		return $this->belongsToMany('medianet_usagers\model\Type', 'media', 'reference', 'type');

		/*
		*	medianet_usagers\model\Type = La classe du model lié 
		*	media = Nom de la table pivot
		*	reference = Nom de la clé étrangère de la table pivot 
		*	type = Nom de la clé étrangère de la table pivot
		*/
	}

	/* Récupère tous les motsclés d'un type */
	public function motcles(){
		return $this->belongsToMany('medianet_usagers\model\MotsCles', 'recherche', 'reference', 'motcle');

		/*
		*	medianet_usagers\model\MotsCles = La classe du model lié 
		*	recherche = Nom de la table pivot
		*	reference = Nom de la clé étrangère de la table pivot 
		*	motcle = Nom de la clé étrangère de la table pivot
		*/
	}

	/* Récupère l'usager du document */
	public function usager(){
		return $this->belongsToMany('medianet_usagers\model\Usager', 'emprunt', 'document', 'usager');
		
		/*
		*	medianet_usagers\model\Usager = La classe du model lié 
		*	emprunt = Nom de la table pivot
		*	document = Nom de la clé étrangère de la table pivot 
		*	usager = Nom de la clé étrangère de la table pivot
		*/
	}
	
}