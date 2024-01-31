<?php
class Pdocourrier
{   		
    private static $serveur='mysql:host=localhost';
    private static $bdd='dbname=courrier';   		
    private static $user='root' ;    		
    private static $mdp='' ;
		
	private static $monPdo;
	private static $monPdocourrier = null;
	private function __construct()
	{
    		Pdocourrier::$monPdo = new PDO(Pdocourrier::$serveur.';'.Pdocourrier::$bdd, Pdocourrier::$user, Pdocourrier::$mdp); 
			Pdocourrier::$monPdo->query("SET CHARACTER SET utf8");
	}
	
	public function _destruct(){
		Pdocourrier::$monPdo = null;
	}

	public  static function getPdocourrier()
	{
		if(Pdocourrier::$monPdocourrier == null)
		{
			Pdocourrier::$monPdocourrier=new Pdocourrier();
		}
		return Pdocourrier::$monPdocourrier;  
	}

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
	// mise en quarantaine des messages
	public function quarantaine($id_user)
	{
		$req = "UPDATE gestionmessage SET statuts = 'quarantaine' WHERE id = :statut";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->bindParam(':statut', $id_user, PDO::PARAM_STR);
		$res->execute();
	}
	// validation des messages
	/*public function validate($id_user)
	{
		$req = "UPDATE gestionmessage SET statuts = 'valide' WHERE id = :statut";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->bindParam(':statut', $id_user, PDO::PARAM_STR);
		$res->execute();
	}*/
	// selection des messages valides
	/*public function getMessagesValide()
	{
		$req = "SELECT * FROM gestionmessage WHERE statuts = 'valide'";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->execute();

		$lesLigne = $res->fetchAll();
		return $lesLigne;
	}*/
	// selection des messages en quarantaine
	/*public function getMessagesQuarantaine()
	{
		$req = "SELECT * FROM gestionmessage WHERE statuts = 'quarantaine'";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->execute();

		$lesLigne = $res->fetchAll();
		return $lesLigne;
	}*/
	public function getEleve($classe)
	{
		$req = "SELECT * FROM etudiants WHERE filiere = :classe ORDER BY nom";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->bindParam(':classe', $classe, PDO::PARAM_STR);
		$res->execute();

		$lesLigne = $res->fetchAll();
		return $lesLigne;
	}
	//récupérer tout les étudiants
	public function getAllEleve()
	{
		$req = "SELECT id_user,nom,prenom FROM etudiants ORDER BY nom";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->execute();

		$lesLigne = $res->fetchAll();
		return $lesLigne;
	}

	public function send_msg($id_user, $id_receiver, $message, $anonyme)
	{
		$req = "INSERT INTO `messages`(`id_user`, `id_receiver`, `message`, `anonyme`) VALUES (:id_user, :id_receiver, :message, :anonyme)";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->bindParam(':id_user', $id_user, PDO::PARAM_INT);
		$res->bindParam(':id_receiver', $id_receiver, PDO::PARAM_INT);
		$res->bindParam(':message', $message, PDO::PARAM_STR);
		$res->bindParam(':anonyme', $anonyme, PDO::PARAM_STR);

		$res->execute();
	}
		
	public function getNbMsgLeftEtudiant($identifiant)
	{
		$req="SELECT nb_Msg_Left FROM etudiants WHERE email = :email;";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->bindParam(':email', $identifiant, PDO::PARAM_STR);
		$res->execute();
		
		$laLigne = $res->fetchcolumn();
		return $laLigne;
	}

	public function decreaseNbMsg($identifiant)
	{
		$req="UPDATE etudiants SET nb_Msg_Left = nb_Msg_Left - 1 WHERE email = :email;";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->bindParam(':email', $identifiant, PDO::PARAM_STR);
		$res->execute();
		
		$laLigne = $res->fetchcolumn();
		return $laLigne;
	}
	// Systeme de connexion
	public function getVerifEtudiant($login)
	{
		$req="SELECT mdp FROM etudiants WHERE email = :email;";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->bindParam(':email', $login, PDO::PARAM_STR);
		$res->execute();
		
		$laLigne = $res->fetchcolumn();
		return $laLigne;
	}

	public function getEtudiantID($login)
	{
		$req="SELECT id_user,email,nom,prenom FROM etudiants WHERE email = :email;";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->bindParam(':email', $login, PDO::PARAM_STR);
		$res->execute();
		
		$laLigne = $res->fetchAll();
		return $laLigne;
	}

	public function getEtudiantLetters($id)
	{
		$req="SELECT * FROM messages WHERE id_receiver = :id AND visible = 1;";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->bindParam(':id', $id, PDO::PARAM_STR);
		$res->execute();
		
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	public function getEtudiantLettersSender($id)
	{
		$req="SELECT e.nom, e.prenom
		FROM etudiants e
		JOIN messages m ON e.id_user = m.id_user
		WHERE e.id_user = :id;";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->bindParam(':id', $id, PDO::PARAM_STR);
		$res->execute();
		
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	public function getOneLetter($id,$idM)
	{
		$req="SELECT *
		FROM etudiants e
		JOIN messages m ON e.id_user = m.id_user
		WHERE m.id_receiver = :id AND m.id = :idm";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->bindParam(':id', $id, PDO::PARAM_STR);
		$res->bindParam(':idm', $idM, PDO::PARAM_STR);

		$res->execute();
		
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
}
?>
