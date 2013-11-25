<?php if(!defined('PLX_ROOT')) exit; ?>
<?php

# Control du token du formulaire
plxToken::validateFormToken($_POST);

if(!empty($_POST)) {

	# sauvegarde des paramètres
	$plxPlugin->setParam('hamGravatar_size', $_POST['hamGravatar_size'], 'string');
	$plxPlugin->setParam('hamGravatar_defaut', $_POST['hamGravatar_defaut'], 'string');
	$plxPlugin->setParam('hamGravatar_defaut_url', $_POST['hamGravatar_defaut_url'], 'string');
	$plxPlugin->setParam('hamGravatar_rated', $_POST['hamGravatar_rated'], 'string');
	$plxPlugin->setParam('activate_textarea', $_POST['activate_textarea'], 'string');
	$plxPlugin->saveParams();

	# redirection sur la page de configuration du plugin
	header('Location: parametres_plugin.php?p=hamGravatar');
	exit;
}

$activation_textarea = ($plxPlugin->getParam('activate_textarea')=='ok') ? 'Gravatar en temps réel activé' : 'Activer l\'aperçu immédiat';

?>
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
		var rated = '<?php echo plxUtils::strCheck($plxPlugin->getParam('hamGravatar_rated')) ?>';
		var defaut = '<?php echo plxUtils::strCheck($plxPlugin->getParam('hamGravatar_defaut')) ?>';
		grav = 'http://www.gravatar.com/avatar/'+hash+'?s=50&r='+rated+'&d='+defaut;
		return grav;
	}
			
	var email = $('input[name="email_test"]');
	
	console.log(email.val());
			
	var gravatarimg = calculateGravatar( email.val() );
			
	$('textarea[name="content_test"]').css('background', 'url("' + gravatarimg + '") no-repeat bottom 5px right 5px ');
			
	email.blur(function() {
		var gravatarimg = calculateGravatar( email.val() );
		$('textarea[name="content_test"]').css('background', 'url("' + gravatarimg + '") no-repeat bottom 5px right 5px ');
	});
			

});
/* ]]> */
</script>
<style type="text/css">
<!--
  @import url("<?php echo PLX_PLUGINS ?>hamGravatar/css/bootstrap.min.css");
-->
</style>
<div class="container pull-left">
	<ol class="breadcrumb">
	  <li><a href="./">Accueil</a></li>
	  <li><a href="./parametres_plugins.php">Plugins</a></li>
	  <li class="active"><?php echo $plxPlugin->getInfo('title') ?> - Version <?php echo $plxPlugin->getInfo('version') ?> - <?php echo $plxPlugin->getInfo('date') ?></li>
	</ol>
	
<form method="post" action="parametres_plugin.php?p=hamGravatar">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Options générales de Gravatar</h3>
		</div>
		<div class="panel-body">
			<div class="row">
			<div class="col-md-6">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Choix de l'avatar utilisé par défaut</h3>
				</div>
				<table class="table table-hover table-condensed">
				<tbody>
				<tr class="<?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_defaut')) == 'url'){?>success<?php } else {?>0<?php } ?>">
					<td><input type="radio" name="hamGravatar_defaut" value="url" <?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_defaut')) == 'url'){?>checked<?php }?> /></td>
					<td><span style="border: 1px solid #333;display: block;width: 40px;height: 40px;line-height: 40px;text-align: center;"><strong>URL</strong></span></td>
					<td><input name="hamGravatar_defaut_url" type="text" id="hamGravatar_defaut_url" maxlength="255" size="50" value="<?php echo plxUtils::strCheck($plxPlugin->getParam('hamGravatar_defaut_url')) ?>" /><br/>
					Lien direct (http://www.monsite.com/mon_image.jpg) vers une image personnelle</td>
				</tr>
				<tr class="<?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_defaut')) == 'mm'){?>success<?php } else {?>0<?php } ?>">
					<td><input type="radio" name="hamGravatar_defaut" value="mm" <?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_defaut')) == 'mm'){?>checked<?php }?> /></td>
					<td><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=40"></td>
					<td><strong>mystery-man</strong><br/>
					Une simple silhouette de personne (ne varie pas en fonction de l'email du commentateur)
					<br/><em>Variable Gravatar = mm</em></td>
				</tr>
				<tr class="<?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_defaut')) == 'identicon'){?>success<?php } else {?>0<?php } ?>">
					<td><input type="radio" name="hamGravatar_defaut" value="identicon" <?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_defaut')) == 'identicon'){?>checked<?php }?> /></td>
					<td><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=identicon&amp;s=40"></td>
					<td><strong>identicon</strong><br/>
					Une forme géométrique basé sur l'email du commentateur
					<br/><em>Variable Gravatar = identicon</em></td>
				</tr>
				<tr class="<?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_defaut')) == 'monsterid'){?>success<?php } else {?>0<?php } ?>">
					<td><input type="radio" name="hamGravatar_defaut" value="monsterid" <?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_defaut')) == 'monsterid'){?>checked<?php }?> /></td>
					<td><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=monsterid&amp;s=40"></td>
					<td><strong>monsterid</strong><br/>
					Un monstre avec différentes faces, couleurs etc... en fonction de l'email du commentateur
					<br/><em>Variable Gravatar = monsterid</em></td>
				</tr>
				<tr class="<?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_defaut')) == 'wavatar'){?>success<?php } else {?>0<?php } ?>">
					<td><input type="radio" name="hamGravatar_defaut" value="wavatar" <?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_defaut')) == 'wavatar'){?>checked<?php }?> /></td>
					<td><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=wavatar&amp;s=40"></td>
					<td><strong>wavatar</strong><br/>
					Un visage généré en fonction de l'email du commentateur avec différentes expressions et couleurs
					<br/><em>Variable Gravatar = wavatar</em></td>
				</tr>
				<tr class="<?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_defaut')) == 'retro'){?>success<?php } else {?>0<?php } ?>">
					<td><input type="radio" name="hamGravatar_defaut" value="retro" <?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_defaut')) == 'retro'){?>checked<?php }?> /></td>
					<td><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=retro&amp;s=40"></td>
					<td><strong>retro</strong><br/>
					Une tête 8-bit pixélisée générée en fonction de l'email du commentateur
					<br/><em>Variable Gravatar = retro</em></td>
				</tr>
				</tbody>
		        </table>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Niveau de censure des avatars</h3>
				</div>
				<table class="table table-hover table-condensed">
				<tbody>
					<tr class="<?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_rated')) == 'g'){?>success<?php } else {?>0<?php } ?>">
						<td valign="middle">
						<input type="radio" name="hamGravatar_rated" value="g" <?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_rated')) == 'g'){?>checked<?php }?> />
						</td>
						<td><img alt="" src="../../plugins/hamGravatar/img/picto_cat1.gif" width="40px" /></td>
						<td>
							<strong>Tout public</strong> 
							<br/>Convient pour l'affichage sur tous les sites Web avec n'importe quel type de public
							<br/><em>Variable Gravatar = g</em>
						</td>
					</tr>
					<tr class="<?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_rated')) == 'pg'){?>success<?php } else {?>0<?php } ?>">
						<td valign="middle">
						<input type="radio" name="hamGravatar_rated" value="pg" <?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_rated')) == 'pg'){?>checked<?php }?> />
						</td>
						<td><img alt="" src="../../plugins/hamGravatar/img/picto_cat3.gif" width="40px" /></td>
						<td>
							<strong>Interdit aux moins de 12 ans</strong> 
							<br/>Peut contenir des gestes grossiers, des individus habillés  de façon provocante, des gros mots, ou de la violence légère
							<br/><em>Variable Gravatar = pg</em>
						</td>
					</tr>
					<tr class="<?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_rated')) == 'r'){?>success<?php } else {?>0<?php } ?>">
						<td valign="middle">
						<input type="radio" name="hamGravatar_rated" value="r" <?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_rated')) == 'r'){?>checked<?php }?> />
						</td>
						<td><img alt="" src="../../plugins/hamGravatar/img/picto_cat4.gif" width="40px" /></td>
						<td>
							<strong>Interdit aux moins de 16 ans</strong> 
							<br/>Peut contenir des choses telles que des blasphèmes, de la violence intense, de la nudité, ou l'utilisation de drogues dures
							<br/><em>Variable Gravatar = r</em>
						</td>
					</tr>
					<tr class="<?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_rated')) == 'x'){?>success<?php } else {?>0<?php } ?>">
						<td valign="middle">
						<input type="radio" name="hamGravatar_rated" value="x" <?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_rated')) == 'x'){?>checked<?php }?> />
						</td>
						<td><img alt="" src="../../plugins/hamGravatar/img/picto_cat5.gif" width="40px" /></td>
						<td>
							<strong>Adulte</strong> 
							<br/>Peut contenir des images pornographiques ou de violence extrême
							<br/><em>Variable Gravatar = x</em>
						</td>
					</tr>
				</tbody>
		        </table>
			</div>
		</div>
		</div>
		<button type="submit" name="Submit" class="btn btn-success center-block"><?php $plxPlugin->lang('L_SAVE') ?></button>
		<?php echo plxToken::getTokenPostMethod() ?>
		</div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Options au niveau des commentaires publics</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Taille du Gravatar</h3>
				</div>
				<div class="panel-body">
					<div class="input-group">
					  <span class="input-group-addon">V =</span>
					  <input name="hamGravatar_size" id="hamGravatar_size" type="text" maxlength="2" size="2" value="<?php echo plxUtils::strCheck($plxPlugin->getParam('hamGravatar_size')) ?>"  class="form-control" placeHolder="80" />
					  <span class="input-group-addon">pixels</span>
					</div>
					<span class="help-block">Valeur V x V : 80 x 80 pixels par défaut, 512 pixels maximum</span>
					<p>En utilisant le code suivant dans la boucle des commentaires, comme indiqué dans la page aide du plugin</p>
					<p><code>&lt;?php eval($plxShow-&gt;callHook('hamGravatar')) ?&gt;</code></p>
				</div>
			</div>
		</div>
		<div class="col-md-6">

			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Gravatar en aperçu immédiat lors de la rédaction d'un commentaire</h3>
				</div>
				<div class="panel-body">
					<div class="form-group">
			  	    <div class="input-group">
			  	      <span class="input-group-addon">
			  	        <input class="btn-info" name="activate_textarea" type="checkbox" value="ok" <?php if($plxPlugin->getParam('activate_textarea') == 'ok'){?>checked<?php }?>> <?php echo $activation_textarea; ?>
			  	      </span>
			  	      <input type="text" name="email_test" class="form-control" placeholder="Testez un email" value="">
			  	    </div><!-- /input-group -->
				</div>
					<div class="form-group">
					<textarea id="id_content_test" name="content_test" cols="35" rows="6" class="form-control">Cliquez dans cette zone de rédaction après avoir saisi un email, comme si vous vouliez rédiger un commentaire en partie publique après avoir renseigné les différents champs d'informations du visiteur. C'est exactement ainsi que fonctionnera cette option en partie publique.</textarea>
				</div>
				</div>
			</div>
		</div>
		</div>
			<button type="submit" name="Submit" class="btn btn-success center-block"><?php $plxPlugin->lang('L_SAVE') ?></button>
			<?php echo plxToken::getTokenPostMethod() ?>
		</div>
	</div>
</form>
</div>