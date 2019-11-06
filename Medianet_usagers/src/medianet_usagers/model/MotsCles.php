<?php 

namespace medianet_usagers\model; // Espace de noms

class MotsCles extends \Illuminate\Database\Eloquent\Model { //  Définition de la classe
	
	// Définition des variables de la table
    protected $table = 'motscles';
    protected $primaryKey = 'id';
    public $timestamps = false;

	/* Récupère tous les documents d'un motclé */
	public function recherche(){
		return $this -> belongsToMany('medianet_usagers\model\Document','recherche','motcle','reference');

		/*
		*	medianet_usagers\model\Document = La classe du model lié 
		*	recherche = Nom de la table pivot
		*	motcle = Nom de la clé étrangère de la table pivot 
		*	reference = Nom de la clé étrangère de la table pivot
		*/
	}
}
