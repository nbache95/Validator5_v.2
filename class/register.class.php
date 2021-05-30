<?php 
include_once("database.class.php");
class Register
{
	private $name; 
	private $surname; 
	private $email; 
	private $society; 
	private $pass1; 
	private $pass2; 
	
	public function __construct($n, $s, $m, $so, $p1, $p2)
	{
		$this->name = $n;
		$this->surname = $s;
		$this->email = $m;
		$this->society = $so;
		$this->pass1 = $p1;
		$this->pass2 = $p2;
	}
	
	/**	
	* Retun a string 
	*/
	public function __tostring () : string
	{
		return $this->name.$this->surname.$this->email.$this->society.$this->pass1.$this->pass2; 
	}
	/**	
	* Insert an user in db table
	*/
	public function add_user()
	{
		$dat = new Database();
		$dat->connexion();
		if ($this->pass1 == $this->pass2) 
		{
			$pass = password_hash($this->pass1, PASSWORD_DEFAULT);
			//echo ("------mdp----".$pass); 
			$query = "INSERT INTO users (nom_users, prenom_users, pwd, mail_users, societe, confirm_key) VALUES ('$this->name', '$this->surname', '$pass', '$this->email', '$this->society', 'false')"; 
			//echo ($query);
			$dat->insertquery($query);
			header("location:connexion.html");
		}
		else
		{
			//echo ("Les mots de passes ne sont pas identiques"); 
			header("location:inscription.html?fpass='true'");
		}
	}
}
?>