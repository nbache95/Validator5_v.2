<?php 
class Session
{
    private int $seid;
	private $session ; 
	
	/**
     * execute 'intert into' query 
     * @param string $sql sql query string to execute 
     */
	 
    public function __construct($id)
    {
        $this->seid = $id;
		$this->session['id'] = 0; 
		$this->session['status'] = "close"; 
		$this->start(); 
    }

    public function start()
    {
        session_start(); 
        $this->session['id'] = $this->seid;
		$_SESSION['id'] = $this->seid;
		$this->session['status'] = "open";
		$_SESSION['status'] = "open";
		$fp = fopen('../log.txt','a+'); // ouvrir le fichier ou le créer
        fseek($fp,SEEK_END); // poser le point de lecture à la fin du fichier
        $nouverr= "date = ".date("Y/m/d")."id= ".$this->session['id']. "; status = ". $this->session['status']."\r\n"; // ajouter un retour à la ligne au fichier
        fputs($fp,$nouverr); // ecrire ce texte
        fclose($fp); //fermer le fichier
    }
	
	public function stop()
	{
		$this->session['status'] = "open";
		$_SESSION['status'] = "open";
		$fp = fopen('../log.txt','a+'); // ouvrir le fichier ou le créer
        fseek($fp,SEEK_END); // poser le point de lecture à la fin du fichier
        $nouverr= "id= ".$this->session['id']. "; status = ". $this->session['status']."\r\n"; // ajouter un retour à la ligne au fichier
        fputs($fp,$nouverr); // ecrire ce texte
        fclose($fp); //fermer le fichier
		session_destroy(); 
	}
	
	public function __toString()
	{
		return ("$this"); 
	}
}
?>