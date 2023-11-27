<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application Pdocourrier (adaptation du cas lafleur)
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoGsb qui contiendra l'unique instance de la classe
 *
 * @package default
 * @author Patrice Grand
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class Pdocourrier
{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=courrier';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;
		
		private static $monPdo;
		private static $monPdocourrier = null;

		//online version
		/*
		private static $serveur='mysql:host=avofouafrancis.mysql.db';
		private static $bdd='dbname=avofouafrancis';   		
		private static $user='avofouafrancis' ;    		
		private static $mdp='DSfoijfhsd82sds' ;*/

/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct()
	{
    		Pdocourrier::$monPdo = new PDO(Pdocourrier::$serveur.';'.Pdocourrier::$bdd, Pdocourrier::$user, Pdocourrier::$mdp); 
			Pdocourrier::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		Pdocourrier::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 *
 * Appel : $instancePdoHtAuto = PdoHtAuto::getPdoHtAuto();
 * @return l'unique objet de la classe PdoHtAuto
 */
	public  static function getPdocourrier()
	{
		if(Pdocourrier::$monPdocourrier == null)
		{
			Pdocourrier::$monPdocourrier=new Pdocourrier();
		}
		return Pdocourrier::$monPdocourrier;  
	}
/**
 * Retourne toutes les catégories sous forme d'un tableau associatif
 *
 * @return le tableau associatif des catégories 
*/

	// Systeme de connexion
	public function getVerifAdmin($login)
	{
		$req="SELECT mdp FROM adminuser WHERE email = :email;";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->bindParam(':email', $login, PDO::PARAM_STR);
		$res->execute();
		
		$laLigne = $res->fetchcolumn();
		return $laLigne;
	}

	// selection des messages de tout les utilisateurs

	public function getMessages()
	{
		$req = "SELECT * FROM gestionmessage WHERE statuts = 'controleMoi'";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->execute();

		$lesLigne = $res->fetchAll();
		return $lesLigne;
	}
	public function quarantaine($id_user)
	{
		$req = "UPDATE gestionmessage SET statuts = 'quarantaine' WHERE id = :statut";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->bindParam(':statut', $id_user, PDO::PARAM_STR);
		$res->execute();
	}
	public function validate($id_user)
	{
		$req = "UPDATE gestionmessage SET statuts = 'valide' WHERE id = :statut";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->bindParam(':statut', $id_user, PDO::PARAM_STR);
		$res->execute();
	}

}
?>
