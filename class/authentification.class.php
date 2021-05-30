<?php 
include_once("database.class.php");
include_once("session.class.php");

class Authentification
{
    private string $email; 
    private string $password; 
	private string $true_password; 
    private array $session;
	
	public function __toString()
	{
		$out = "mail = ".$this->email . " --- pass = ".$this->password . " --- true password ".$this->true_password ;
	}
	
    public function __construct(string $mailr, string $passwordr)
    {
        $ndb = new Database();
        $this->email = $mailr; 
        $this->password = $passwordr; 

        $sql_id = "SELECT id_users FROM users WHERE mail_users = '". $this->email ."'" ; 
        $sql_password = "SELECT pwd FROM users WHERE mail_users = '". $this->email ."'"; 
        $sql_key = "UPDATE users SET confirm_key = 'true' WHERE mail_users = '". $this->email ."'";
		
		
        $ndb->connexion();
        $id_user = $ndb->selectqueryauthid($sql_id);
		$ndb->updatequery($sql_key);
        $this->true_password = $ndb->selectqueryauthpas($sql_password);

        if(password_verify($this->password, $this->true_password)== true )
        {
			//echo("conn reussie"); 
			//echo("iduser = ".$id_user); 
			header('Location: ./members/member.php?id_user=' . $id_user); 
        }
		else
		{
			echo ("e-mail ou mot de passe incorrect"); 
		}
    }
}
?>