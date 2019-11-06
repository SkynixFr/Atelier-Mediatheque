<?php 

namespace medianet_usagers\model;

class MotsCles extends \Illuminate\Database\Eloquent\Model {

    protected $table = 'motscles';
    protected $primaryKey = 'id';
    public $timestamps = false;

public function recherche(){
	return $this -> belongsToMany('medianet_usagers\model\Document','motscles','recherche','reference');
}

}

//medianet_usagers "référence à la classe Document.php dans le dossier model"
//motscles "nom de la table référence"
//recherche "nom de la table pivot"
//reference "clé étrangère dans la table pivot"


