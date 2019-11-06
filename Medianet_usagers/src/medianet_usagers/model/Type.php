<?php 

namespace medianet_usagers\model; // Espace de noms

class Type extends \Illuminate\Database\Eloquent\Model { //  Définition de la classe

	// Définition des variables de la table
	protected $table = 'type';
	protected $primaryKey = 'id';
	public $timestamps = false;

	/* Récupère tous les documents d'un type */
	public function medias(){
		return $this->belongsToMany('medianet_usagers\model\Document','media','type','reference');

		/*
		*	medianet_usagers\model\Document = La classe du model lié 
		*	media = Nom de la table pivot
		*	type = Nom de la clé étrangère de la table pivot 
		*	reference = Nom clé étrangère de latable qui est présent dans la table document
		*/
	}
}