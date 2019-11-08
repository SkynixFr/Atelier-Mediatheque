<?php 

namespace medianet_usagers\model; // Espace de noms

class Emprunt extends \Illuminate\Database\Eloquent\Model { //  Définition de la classe
	
	// Définition des variables de la table
    protected $table = 'emprunt';
    protected $primaryKey = 'id';
    public $timestamps = false;

}
