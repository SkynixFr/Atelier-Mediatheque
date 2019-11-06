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


