<?php

namespace medianet_usagers\model; // Espace de noms

class Usager extends \Illuminate\Database\Eloquent\Model{ //  Définition de la classe

    // Définition des variables de la table
    protected $table = 'usagers';
    protected $primaryKey = 'id';
    public $timestamps = false;

    /* Récupère tous les documents d'un usager */
    public function documents(){
        return $this->BelongsToMany('medianet_usagers\model\Document', 'emprunt', 'usager', 'document');

        /*
		*	medianet_usagers\model\Document = La classe du model lié
		*	emprunt = Nom de la table pivot
		*	usager = Nom de la clé étrangère de la table pivot
		*	document = Nom clé étrangère de latable qui est présent dans la table document
		*/
    }
}