<?php 

namespace medianet_usagers\model; // Espace de noms

class Document extends \Illuminate\Database\Eloquent\Model{ //  Définition de la classe
	
	// Définition des variables de la table
	protected $table = 'document';
	protected $primaryKey = 'ref';
	protected $timestamps = false;

	public function types(){
		
	}
}