<?php


namespace medianet_usagers\model;


/* Creation de la class usager*/

class Usager extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'Usager';
    protected $primaryKey = 'id';
    public $timestamps = false;

/* méthode emprunt*/
    public function emprunt()
    {
        return $this->BelongsToMany('medianet_usagers\model\Document', 'emprunt', 'usager', 'document');
        /*
			*	medianet_usagers\model\Document = La classe du model lié
			*	emprunt = Nom de la table pivot
			*	usager = Nom de la clé étrangère de la table pivot
			*	document = Nom clé étrangère de latable qui est présent dans la table document
			*/
    }
}