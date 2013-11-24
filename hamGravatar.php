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
		$this->addHook('AdminUsersFoot', 'AdminUsersFoot');
		$this->addHook('AdminProfilTop', 'AdminProfilTop');
		$this->addHook('AdminUserTop', 'AdminUserTop');
		$this->addHook('ThemeEndBody', 'ThemeEndBody');
		$this->addHook('ThemeEndHead', 'ThemeEndHead');
		
	}
	
	public function AdminUsersFoot() {?>
		<script type="text/javascript">
		/* <![CDATA[ */
		if (typeof jQuery == 'undefined') {
			document.write('<script type="text\/javascript" src="<?php echo PLX_PLUGINS ?>hamGravatar\/js/jquery-1.10.2.min.js"><\/script>');
		}
		/* ]]> */
		</script>
		
		<?php 
					
		echo '<?php $table_profils = json_encode($plxAdmin->aUsers); ?>';
			
		?>
		<script type="text/javascript" src="<?php echo PLX_PLUGINS ?>hamGravatar/js/md5.js"></script>
		<style type="text/css">th.gravatar {width:55px;}</style>
		<script type="text/javascript">
		/* <![CDATA[ */
		$(document).ready(function(){
					
			function calculateGravatar(emailAddress) {
				var grav ='';
				var email = emailAddress.toLowerCase().trim();
				var hash = CryptoJS.MD5(email);
				grav = 'http://www.gravatar.com/avatar/'+hash+'?s=50&r=g&d=mm'
				return grav;
			}

			$('<th></th>').addClass('title gravatar').text('Gravatar').insertBefore('.table th:eq(0)');

			var table_profils = <?php echo '<?php echo $table_profils; ?>' ?>;

			$.each(table_profils, function(i, item) {
						
				var gravatarimg = calculateGravatar(item.email);

				$('<td></td>').html('<a title="Envoyer un email" href="mailto:'+item.email+'" target="_top"><img src="'+gravatarimg+'" /></a>').insertBefore('.table tbody tr:eq('+(i-1)+') td:eq(0)');

			});
					
			$('<td></td>').insertBefore('.table tbody tr:last td:eq(0)');
	
		});
		/* ]]> */
		</script>

		<?php
	}
	
	public function AdminUserTop() {?>
		<script type="text/javascript">
		/* <![CDATA[ */
		if (typeof jQuery == 'undefined') {
			document.write('<script type="text\/javascript" src="<?php echo PLX_PLUGINS ?>hamGravatar\/js/jquery-1.10.2.min.js"><\/script>');
		}
		/* ]]> */
		</script>
		
		<script type="text/javascript" src="<?php echo PLX_PLUGINS ?>hamGravatar/js/md5.js"></script>
		<script type="text/javascript">
		/* <![CDATA[ */
		$(document).ready(function(){
					
			function calculateGravatar(emailAddress) {
				var grav ='';
				var email = emailAddress.toLowerCase().trim();
				var hash = CryptoJS.MD5(email);
				grav = 'http://www.gravatar.com/avatar/'+hash+'?s=150&r=g&d=mm'
				return grav;
			}
					
			var email = $('#id_email');
					
			var gravatarimg = calculateGravatar( email.val() );
					
			$('#content').css('background', 'url("' + gravatarimg + '") no-repeat top 20px right 20px ');
					
			email.blur(function() {
				var gravatarimg = calculateGravatar( email.val() );
				$('#content').css('background', 'url("' + gravatarimg + '") no-repeat top 20px right 20px ');
			});
					
	
		});
		/* ]]> */
		</script>

		<?php
	}
	
	public function AdminProfilTop() {?>
		<script type="text/javascript">
		/* <![CDATA[ */
		if (typeof jQuery == 'undefined') {
			document.write('<script type="text\/javascript" src="<?php echo PLX_PLUGINS ?>hamGravatar\/js/jquery-1.10.2.min.js"><\/script>');
		}
		/* ]]> */
		</script>
		
		<script type="text/javascript" src="<?php echo PLX_PLUGINS ?>hamGravatar/js/md5.js"></script>
		<script type="text/javascript">
		/* <![CDATA[ */
		$(document).ready(function(){
				
			function calculateGravatar(emailAddress) {
				var grav ='';
				var email = emailAddress.toLowerCase().trim();
				var hash = CryptoJS.MD5(email);
				grav = 'http://www.gravatar.com/avatar/'+hash+'?s=150&r=g&d=mm'
				return grav;
			}
				
			var email = $('#id_email');
				
			var gravatarimg = calculateGravatar( email.val() );
				
			$('#content').css('background', 'url("' + gravatarimg + '") no-repeat top 20px right 20px ');
				
			email.blur(function() {
				var gravatarimg = calculateGravatar( email.val() );
				$('#content').css('background', 'url("' + gravatarimg + '") no-repeat top 20px right 20px ');
			});
				

		});
		/* ]]> */
		</script>

		<?php
	}
	
	public function ThemeEndBody() {
		if ($this->getParam('activate_textarea') =='ok') {
	?>
		
		<script type="text/javascript" src="<?php echo PLX_PLUGINS ?>hamGravatar/js/md5.js"></script>
		<script type="text/javascript">
		/* <![CDATA[ */
		$(document).ready(function(){
					
			function calculateGravatar(emailAddress) {
				var grav ='';
				var email = emailAddress.toLowerCase().trim();
				var hash = CryptoJS.MD5(email);
				grav = 'http://www.gravatar.com/avatar/'+hash+'?s=50&r=g&d=mm'
				return grav;
			}
					
			var email = $('input[name="mail"]');
			
			console.log(email.val());
					
			var gravatarimg = calculateGravatar( email.val() );
					
			$('textarea[name="content"]').css('background', 'url("' + gravatarimg + '") no-repeat bottom 5px right 5px ');
					
			email.blur(function() {
				var gravatarimg = calculateGravatar( email.val() );
				$('textarea[name="content"]').css('background', 'url("' + gravatarimg + '") no-repeat bottom 5px right 5px ');
			});
					
	
		});
		/* ]]> */
		</script>

		<?php }
	}
	
	public function ThemeEndHead() {
		if ($this->getParam('activate_textarea') =='ok') {
	?>
		<script type="text/javascript">
		/* <![CDATA[ */
		if (typeof jQuery == 'undefined') {
			document.write('<script type="text\/javascript" src="<?php echo PLX_PLUGINS ?>hamGravatar\/js/jquery-1.10.2.min.js"><\/script>');
		}
		/* ]]> */
		</script>

		<?php }
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