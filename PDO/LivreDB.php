<?php
require_once "Constantes.php";
require_once "metier/Livre.php";
/**
 * 
*Classe permettant d'acceder en bdd pour inserer supprimer
 * selectionner des objets Livre
 *
 */
class LivreDB
{
	private $db; // Instance de PDO
	
	public function __construct($db)
	{
		$this->db=$db;
	}
	/**
	 * 
	 * fonction d'Insertion de l'objet Livre en base de donnee
	 * @param Livre $l
	 */
	public function ajout(Livre $l):void
	{
		$q = $this->db->prepare('INSERT INTO livre(titre,edition,information,AUTEUR) values(:titre,:edition,:information,:AUTEUR)');
	

        $q->bindValue(':titre',$l->getTitre());
        $q->bindValue(':edition',$l->getEdition());
        $q->bindValue(':information',$l->getInformation());
        $q->bindValue(':AUTEUR',$l->getAUTEUR());
		$q->execute();	
		$q->closeCursor();
		$q = NULL;
	}
    /**
     * 
     * fonction de Suppression de l'objet Livre
     * @param Livre $p
     */
	public function suppression(Livre $l):void{
		$q = $this->db->prepare('delete FROM livre where titre=:t and edition=:e and AUTEUR=:a');
        $q->bindValue(':t',$l->getTitre(),PDO::PARAM_STR);
        $q->bindValue(':e',$l->getEdition(),PDO::PARAM_STR);
        $q->bindValue(':a',$l->getAUTEUR());		
		$q->execute();	
		$q->closeCursor();
		$q = NULL;
	}
	/**
	 * 
	 * Fonction de selection en fonction du titre
	 * @param $titre
	 */
	public function selectionTitre($titre){
		$query = 'SELECT * FROM livre  WHERE titre like :titre ';
		$q = $this->db->prepare($query);

	    $q->bindValue(':titre',$titre);
		$q->execute();
		$arrAll = $q->fetch(PDO::FETCH_ASSOC);
		//si pas de Livre , on leve une exception
		

		if(empty($arrAll)){
			throw new Exception(Constantes::EXCEPTION_DB_Livre); 
		
		}
				
		$q->closeCursor();
		$q = NULL;
		//conversion du resultat de la requete en objet Livre
	 	$res= $this->convertpdoLivres($arrAll);
		//retour du resultat
		return $res;
	}
/**
	 * 
	 * Fonction de selection en fonction de l'id
	 * @param $id
	 */
	public function selectionId($id){
		$query = 'SELECT * FROM livre WHERE id= :id ';
		$q = $this->db->prepare($query);

	
		$q->bindValue(':id',$id);
	
		$q->execute();
		
		$arrAll = $q->fetch(PDO::FETCH_ASSOC);
		//si pas de Livre , on leve une exception

		if(empty($arrAll)){
			throw new Exception(Constantes::EXCEPTION_DB_Livre); 
		
		}
		
		$q->closeCursor();
		$q = NULL;
		//conversion du resultat de la requete en objet Livre
		$res= $this->convertpdoLivres($arrAll);
		//retour du resultat
		return $res;
	}
	/**
	 * 
	 * Fonction qui retourne toutes les Livres
	 * @throws Exception
	 */
	public function selectAll(){
		$query = 'SELECT * FROM livre';
		$q = $this->db->prepare($query);
		$q->execute();
		
		$arrAll = $q->fetchAll(PDO::FETCH_ASSOC);
		
		//si pas de Livres , on leve une exception
		if(empty($arrAll)){
			throw new Exception(Constantes::EXCEPTION_DB_Livre);
		}
		
				
		//Clore la requete préparée
		$q->closeCursor();
		$q = NULL;
		//retour du resultat
		return $arrAll;
	}
/**
	 * 
	 * Fonction qui convertie un PDO Livre en objet Livre
	 * @param $pdoLivres
	 * @throws Exception
	 */
	public function convertpdoLivres($pdoLivres){
        if(empty($pdoLivres)){
            throw new Exception(Constantes::EXCEPTION_DB_CONVERT_LIVRE);
        }
        //conversion du pdo en objet
        $obj=(object)$pdoLivres;
        //print_r($obj);
        //conversion de l'objet en objet Livre
        $livre=new Livre($obj->titre,$obj->edition,$obj->information, $obj->AUTEUR);
        //affectation de l'id livre
        $livre->setId($obj->id);
	 	return $livre;	 
	}
	/**
	 * 
	 * Fonction de modification d'une Livre
	 * @param Livre $l
	 * @throws Exception
	 */
    public function update(Livre $l)
	{
		try {
		$q = $this->db->prepare('UPDATE Livre set titre=:t,edition=:e,information=:i,AUTEUR=:a where id=:i');
		$q->bindValue(':i', $l->getId());	
		$q->bindValue(':t', $l->getTitre());	
		$q->bindValue(':e', $l->getEdition());		
		$q->bindValue(':i', $l->getInformation());	
		$q->bindValue(':a', $l->getAUTEUR());

		

		$q->execute();	
		$q->closeCursor();
		$q = NULL;
		}
		catch(Exception $e){
			throw new Exception(Constantes::EXCEPTION_DB_PERS_UP); 
			
		}
	}
}