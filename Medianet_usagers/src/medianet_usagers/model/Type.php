<?php 

namespace medianet_usagers\model;
/**
 * 
 */
class Type extends \Illuminate\Database\Eloquent\Model 
	{
		protected $table = 'type';
		/* le nom de la table */
		protected $primaryKey = 'id';
		 /* le nom de la clé primaire */
		protected $timestamps = 'false';

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