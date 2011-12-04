<?php
class hamGravatar extends plxPlugin {

	/**
	 * Constructeur de la classe
	 *
	 * @return	null
	 * @author	StÈphane F.  
	 **/	
	public function __construct($default_lang) {

		# Appel du constructeur de la classe plxPlugin (obligatoire)
		parent::__construct($default_lang);
		
		# droits pour accéder ‡ la page config.php du plugin
		$this->setConfigProfil(PROFIL_ADMIN);

		# Ajouts des hooks
		$this->addHook('hamGravatar', 'hamGravatar');
		
	}
	
	public function hamGravatar () {
		$hamGravatar_size = $this->getParam('hamGravatar_size');
		$hamGravatar_defaut = $this->getParam('hamGravatar_defaut');
		$hamGravatar_defaut_url = $this->getParam('hamGravatar_defaut_url');
		$hamGravatar_rated = $this->getParam('hamGravatar_rated');
		$plxShow = plxShow::getInstance();
		$type = $plxShow->plxMotor->plxRecord_coms->f('type');
		
	        if($type=='admin') {
	            $email = $plxShow->plxMotor->plxRecord_coms->f('mail');
	            if($email!='') $hamGravatar = $email;
	            $author = $plxShow->plxMotor->plxRecord_coms->f('author');
	            foreach($plxShow->plxMotor->aUsers as $user) {
	                if($user['name']==$author) $hamGravatar =  plxUtils::strCheck($user['email']);
	            }
	        } else {
	            $hamGravatar = plxUtils::strCheck($plxShow->plxMotor->plxRecord_coms->f('mail'));
	        }
	        
	        if($hamGravatar_defaut == 'url') {
	        	$hamGravatar_d = urlencode($hamGravatar_defaut_url);
	       	} else {
	       		$hamGravatar_d = $hamGravatar_defaut;
	       	}
	        
		$hamGravatar_mail = md5( strtolower( trim($hamGravatar)));
		
		echo 'http://www.gravatar.com/avatar.php?gravatar_id='.$hamGravatar_mail.'&amp;d='.$hamGravatar_d.'&amp;s='.$hamGravatar_size.'&amp;r='.$hamGravatar_rated;
		}

}
?>