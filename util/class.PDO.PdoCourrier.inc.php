<?php
class Pdocourrier
{
	private static $serveur = 'mysql:host=localhost';
	private static $bdd = 'dbname=courrier';
	private static $user = 'root';
	private static $mdp = '';

	private static $monPdo;
	private static $monPdocourrier = null;
	private function __construct()
	{
		Pdocourrier::$monPdo = new PDO(Pdocourrier::$serveur . ';' . Pdocourrier::$bdd, Pdocourrier::$user, Pdocourrier::$mdp);
		Pdocourrier::$monPdo->query("SET CHARACTER SET utf8");
	}

	public function _destruct()
	{
		Pdocourrier::$monPdo = null;
	}

	public static function getPdocourrier()
	{
		if (Pdocourrier::$monPdocourrier == null) {
			Pdocourrier::$monPdocourrier = new Pdocourrier();
		}
		return Pdocourrier::$monPdocourrier;
	}

	// Systeme de connexion
	public function getVerifAdmin($login)
	{
		$req = "SELECT mdp FROM adminuser WHERE email = :email;";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->bindParam(':email', $login, PDO::PARAM_STR);
		$res->execute();

		$laLigne = $res->fetchcolumn();
		return $laLigne;
	}

	// selection des messages de tout les utilisateurs
	public function getMessages()
	{
		$req = "SELECT * FROM messages WHERE statuts = 'controleMoi'OR statuts='controle'";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->execute();

		$lesLigne = $res->fetchAll();
		return $lesLigne;
	}
	// mise en quarantaine des messages
	public function quarantaine($id_user, $motif)
	{
		// var_dump($id_user);
		// $req = "UPDATE messages SET statuts = 'quarantaine' modif = 'quarantaine' WHERE id = :statut";
		// $res = Pdocourrier::$monPdo->prepare($req);
		// $res->bindParam(':statut', $id_user, PDO::PARAM_STR);
		// $res->execute();

		$req = "UPDATE messages SET statuts = 'quarantaine', motif = :motif , id_controler = :id_controler WHERE id = :id";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->execute([
			':id' => $id_user,
			':motif' => $motif,
			':id_controler' => $_SESSION['adminID'],
		]);
		$req = "INSERT INTO `logs`(`id_msg`, `id_controler`, `action`) VALUES (:id_msg,:id_controler,:actions)";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->execute([
			':id_msg' => $id_user,
			':id_controler' => $_SESSION['adminID'],
			':actions' => "Refuser",
		]);

	}
	// validation des messages
	public function validate($id_user)
	{
		$req = "UPDATE messages SET statuts = 'valide' , motif=NULL , id_controler = :id_controler WHERE id = :statut";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->execute([
			':statut' => $id_user,
			':id_controler' => $_SESSION['adminID'],
		]);

		$req = "INSERT INTO `logs`(`id_msg`, `id_controler`, `action`) VALUES (:id_msg,:id_controler,:actions)";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->execute([
			':id_msg' => $id_user,
			':id_controler' => $_SESSION['adminID'],
			':actions' => "Valider",
		]);
	}
	// selection des messages valides
	public function getMessagesValide()
	{
		$req = "SELECT * FROM messages WHERE statuts = 'valide'";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->execute();

		$lesLigne = $res->fetchAll();
		return $lesLigne;
	}
	// selection des messages en quarantaine
	public function getMessagesQuarantaine()
	{
		$req = "SELECT * FROM messages WHERE statuts = 'quarantaine'";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->execute();

		$lesLigne = $res->fetchAll();
		return $lesLigne;
	}
	public function getEleve($classe)
	{
		$req = "SELECT nom,prenom FROM etudiant WHERE classe = :classe";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->bindParam(':classe', $classe, PDO::PARAM_STR);
		$res->execute();

		$lesLigne = $res->fetchAll();
		return $lesLigne;
	}


	//controle d'un message pas bon
	// public function controlAMsg($ligne)
	// {
	// 	$req = "UPDATE gestionmessage SET statuts = 'valide' WHERE id = :statut";
	// 	$res = Pdocourrier::$monPdo->prepare($req);
	// 	$res->bindParam(':statut', $id_user, PDO::PARAM_STR);
	// 	$res->execute();
	// }






	//choix d'un message
	public function takeAMsg()
	{
		$req = "SELECT * FROM messages WHERE statuts = 'controleMoi'";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->execute();

		$lesLigne = $res->fetchAll();
		if (isset($lesligne[0])) {
			$lesLigne = $lesLigne[0];
		}

		$req = "UPDATE `messages` SET `statuts`='controle' ,`id_controler` = :id_controler  WHERE `id` = :id";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->execute([
			':id' => $lesLigne[0][0],
			':id_controler' => $_SESSION['adminID'],
		]);

		return $lesLigne;

	}

	//Verifier si l'admin n'a pas déja un message
	public function verifMsgAdmin()
	{
		$req = "SELECT * FROM `messages` WHERE `statuts` = 'controle' AND `id_controler` = :id";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->execute([
			':id' => $_SESSION['adminID'],
		]);

		$laLigne = $res->fetchAll();

		if (isset($laLigne[0])) {
			return true;
		} else {
			return false;
		}
	}

	//Recuperer le message déja en traitement
	public function reTakeAMsg()
	{
		$req = "SELECT * FROM messages WHERE`statuts` = 'controle' AND `id_controler` = :id OR `id_controler` = NULL";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->execute([
			':id' => $_SESSION['adminID'],
		]);

		$laLigne = $res->fetchAll();
		return $laLigne;
	}

	// Recuperer l'id de l'admin
	public function getAdminID($login)
	{
		$req = "SELECT id FROM adminuser WHERE email = :email;";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->bindParam(':email', $login, PDO::PARAM_STR);
		$res->execute();

		$laLigne = $res->fetchcolumn();
		return $laLigne;

	}

	//recuperer l'eleve par son ID
	public function getEleveByID($id)
	{
		$req = "SELECT id_user,nom, prenom, classe FROM etudiants WHERE id_user = :id;";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->bindParam(':email', $id, PDO::PARAM_STR);
		$res->execute([
			':id' => $id,
		]);

		$laLigne = $res->fetch();
		return $laLigne;
	}

	public function getLogs()
	{
		$req = "SELECT * FROM logs ORDER BY date DESC";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->execute();

		$lesLigne = $res->fetchAll();
		return $lesLigne;
	}

	public function getAdminNameByID($id_admin)
	{
		$req = "SELECT nom,prenom FROM adminuser WHERE `id`=:id";
		$res = Pdocourrier::$monPdo->prepare($req);
		$res->execute([
			":id" => $id_admin,
		]);

		$lesLigne = $res->fetch();
		return $lesLigne;
	}
}
?>