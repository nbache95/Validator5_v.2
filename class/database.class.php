<?php 
class Database 
{
	private $host; 
	private $datab ; 
    private $login; 
    private $pass;
    public $conn; 
    
    public function __construct()
    {
		$this->host = "mysql-validator5.alwaysdata.net"; 
		$this->datab = "validator5_db"; 
        $this->login = "232541"; 
        $this->pass = "mdpProjet5*"; 
    }
    
	public function __tostring(){
		$out = "host = ".$this->host . " -- datab = " .$this->datab . " -- login = " .$this->login . " -- pass = ".this-pass ; 
		echo $out; 
	}

    /**
     * Make connection to db
     */
    public function connexion()
    {
        try
        {
            $db = new PDO
            (
            'mysql:host='.$this->host.'; dbname='.$this->datab.';charset=utf8mb4',$this->login, $this->pass
            );
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
            $this->conn = $db;
			//echo "connexion bdd reussie" ;
        }
        catch (PDOException $e)
        {
            $msg = 'ERREUR PDO dans ' . $e->getFile() . 'L' . $e->getLine() . ' : ' . $e->getMessage(); 
            echo($msg);
			die($msg);			
        }
    }

    /**
     * execute 'intert into' query 
     * @param string $sql sql query string to execute 
     */
    public function insertquery($sql)
    {
		try
        {
			$this->conn->exec($sql);
		}
		catch(PDOException $e)
		{
			echo "Erreur : " . $e->getMessage();
		}
    }
	
	/**
     * execute 'update' query 
     * @param string $sql sql query string to execute 
     */
    public function updatequery($sql)
    {
		try
        {
			$this->conn->exec($sql);
		}
		catch(PDOException $e)
		{
			echo "Erreur : " . $e->getMessage();
		}
    }
	
    /**
     * execute 'select from' query 
     * @param string $sql sql query string to execute 
	 * return array 
     */
	public function selectquery($sql)
    {
		try
        {
			$queryurl = $this->conn->prepare($sql);
			$queryurl->execute(); 
			$urlarray = $queryurl->fetchAll(PDO::FETCH_ASSOC);
			$ret = array() ; 
			foreach ($urlarray as $row)
			{
				array_push($ret, $row['url_site']); 
			}
			return $urlarray;
		}
		catch(PDOException $e)
		{
			echo "Erreur : " . $e->getMessage();
		}
		
    }
	
	/**
     * execute 'select from' query for gettng id_user to make authentification
     * @param string $sql sql query string to execute 
     */
	public function selectqueryauthid($sql)
    {
		try
        {
			$queryid = $this->conn->prepare($sql);
			$queryid->execute(); 
			$idarray = $queryid->fetchAll(PDO::FETCH_ASSOC);
            foreach ($idarray as $row)
            {
                $ret = $row['id_users']; 
				//echo "ret = " . $ret; 
            }
			return $ret;
		}
		catch(PDOException $e)
		{
			echo "Erreur : " . $e->getMessage();
		}
    }
	
	/**
     * execute 'select from' query for getting hashed password to make authentification
     * @param string $sql sql query string to execute 
     */
	public function selectqueryauthpas($sql)
    {
		try
        {
			$querypas = $this->conn->prepare($sql); 
			$querypas->execute(); 
			$pasarray = $querypas->fetchAll(PDO::FETCH_ASSOC);
            foreach ($pasarray as $row)
            {
                $ret = $row['pwd']; 
				//echo "ret = " . $ret; 
            }
			return $ret; 
		}
		catch(PDOException $e)
		{
			echo "Erreur : " . $e->getMessage();
		}
    }
	
	/**
     * execute 'select from' query for getting name of user
     * @param string $sql sql query string to execute 
     */
	public function selectqueryinfo($sql)
    {
		try
        {
			$queryinfo = $this->conn->prepare($sql); 
			$queryinfo->execute(); 
			$infoarray = $queryinfo->fetchAll(PDO::FETCH_ASSOC);
            foreach ($infoarray as $row)
            {
                //$name = $row['nom_users'];
				//$surname = $row['prenom_users'];
				//$mail = $row['mail_users'];
				$societe = $row['societe'];
            }
			//$array = [$name, $surname, $mail, $societe];
			return $societe;
		}
		catch(PDOException $e)
		{
			echo "Erreur : " . $e->getMessage();
		}
    } 
}
?>