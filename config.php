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
	$plxPlugin->saveParams();

	# redirection sur la page de configuration du plugin
	header('Location: parametres_plugin.php?p=hamGravatar');
	exit;
}


?>
	<h2>Configuration de hamGravatar</h2>
	
<form method="post" action="parametres_plugin.php?p=hamGravatar">
	
	<fieldset style="border-top:1px solid #ddd; margin-top:20px;">
	<legend style="margin-left:5px; padding:0 5px; color:#2481C6;text-transform:uppercase;"><strong>Avatar par défaut</strong></legend>
		<table class="table">
		<thead>
			<tr>
					<th class="checkbox">&nbsp;</th>
					<th class="icon">&nbsp;</th>
					<th class="description">Description</th>
					<th class="action">&nbsp;</th>
				</tr>
		</thead>
		<tbody>
		<tr class="plugins-<?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_defaut')) == 'url'){?>1<?php } else {?>0<?php } ?> top">
			<td valign="middle"><input type="radio" name="hamGravatar_defaut" value="url" <?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_defaut')) == 'url'){?>checked<?php }?> /></td>
			<td><span style="border: 1px solid #333;display: block;width: 40px;height: 40px;line-height: 40px;text-align: center;"><strong>URL</strong></span></td>
			<td><input name="hamGravatar_defaut_url" type="text" id="hamGravatar_defaut_url" maxlength="255" size="50" value="<?php echo plxUtils::strCheck($plxPlugin->getParam('hamGravatar_defaut_url')) ?>" /><br/>
			Lien direct (http://www.monsite.com/mon_image.jpg) vers une image personnelle</td>
			<td class="right">&nbsp;</td>
		</tr>
		<tr class="plugins-<?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_defaut')) == 'mm'){?>1<?php } else {?>0<?php } ?> top">
			<td valign="middle"><input type="radio" name="hamGravatar_defaut" value="mm" <?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_defaut')) == 'mm'){?>checked<?php }?> /></td>
			<td><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=40"></td>
			<td><strong>mystery-man</strong><br/>
			Une simple silhouette de personne (ne varie pas en fonction de l'email du commentateur)
			<br/><em>Variable Gravatar = mm</em></td>
			<td class="right">&nbsp;</td>
		</tr>
		<tr class="plugins-<?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_defaut')) == 'identicon'){?>1<?php } else {?>0<?php } ?> top">
			<td valign="middle"><input type="radio" name="hamGravatar_defaut" value="identicon" <?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_defaut')) == 'identicon'){?>checked<?php }?> /></td>
			<td><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=identicon&amp;s=40"></td>
			<td><strong>identicon</strong><br/>
			Une forme géométrique basé sur l'email du commentateur
			<br/><em>Variable Gravatar = identicon</em></td>
			<td class="right">&nbsp;</td>
		</tr>
		<tr class="plugins-<?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_defaut')) == 'monsterid'){?>1<?php } else {?>0<?php } ?> top">
			<td valign="middle"><input type="radio" name="hamGravatar_defaut" value="monsterid" <?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_defaut')) == 'monsterid'){?>checked<?php }?> /></td>
			<td><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=monsterid&amp;s=40"></td>
			<td><strong>monsterid</strong><br/>
			Un monstre avec différentes faces, couleurs etc... en fonction de l'email du commentateur
			<br/><em>Variable Gravatar = monsterid</em></td>
			<td class="right">&nbsp;</td>
		</tr>
		<tr class="plugins-<?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_defaut')) == 'wavatar'){?>1<?php } else {?>0<?php } ?> top">
			<td valign="middle"><input type="radio" name="hamGravatar_defaut" value="wavatar" <?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_defaut')) == 'wavatar'){?>checked<?php }?> /></td>
			<td><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=wavatar&amp;s=40"></td>
			<td><strong>wavatar</strong><br/>
			Un visage généré en fonction de l'email du commentateur avec différentes expressions et couleurs
			<br/><em>Variable Gravatar = wavatar</em></td>
			<td class="right">&nbsp;</td>
		</tr>
		<tr class="plugins-<?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_defaut')) == 'retro'){?>1<?php } else {?>0<?php } ?> top">
			<td valign="middle"><input type="radio" name="hamGravatar_defaut" value="retro" <?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_defaut')) == 'retro'){?>checked<?php }?> /></td>
			<td><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=retro&amp;s=40"></td>
			<td><strong>retro</strong><br/>
			Une tête 8-bit pixélisée générée en fonction de l'email du commentateur
			<br/><em>Variable Gravatar = retro</em></td>
			<td class="right">&nbsp;</td>
		</tr>
		</tbody>
        </table>
        </fieldset>
		<p class="submit">
		<input type="submit" name="Submit" class="button-primary" value="<?php $plxPlugin->lang('L_SAVE') ?>" />
		<?php echo plxToken::getTokenPostMethod() ?>
		</p>
		
	<fieldset style="border-top:1px solid #ddd; margin-top:20px;">
	<legend style="margin-left:5px; padding:0 5px;color:#2481C6; text-transform:uppercase;"><strong>Taille de l'avatar</strong></legend>
	<label for="hamGravatar_size">Valeur V en pixels (V x V)</label>
	<input name="hamGravatar_size" type="text" id="hamGravatar_size" maxlength="2" size="2" value="<?php echo plxUtils::strCheck($plxPlugin->getParam('hamGravatar_size')) ?>" />
	<a title="80 x 80 par défaut (maximum 512px)" class="help">&nbsp;</a>
	</fieldset>
	<p class="submit">
		<input type="submit" name="Submit" class="button-primary" value="<?php $plxPlugin->lang('L_SAVE') ?>" />
		<?php echo plxToken::getTokenPostMethod() ?>
		</p>
	
    <fieldset style="border-top:1px solid #ddd; margin-top:20px;">
	<legend style="margin-left:5px; padding:0 5px; color:#2481C6;text-transform:uppercase;"><strong>Niveau de censure des avatars</strong></legend>
		<table class="table">
		<thead>
			<tr>
					<th class="checkbox">&nbsp;</th>
					<th class="icon">&nbsp;</th>
					<th class="description">Description</th>
					<th class="action">&nbsp;</th>
				</tr>
		</thead>
		<tbody>
			<tr class="plugins-<?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_rated')) == 'g'){?>1<?php } else {?>0<?php } ?> top">
				<td valign="middle">
				<input type="radio" name="hamGravatar_rated" value="g" <?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_rated')) == 'g'){?>checked<?php }?> />
				</td>
				<td><img alt="" src="../../plugins/hamGravatar/img/picto_cat1.gif" width="40px" /></td>
				<td>
					<strong>Tout public</strong> 
					<br/>Convient pour l'affichage sur tous les sites Web avec n'importe quel type de public
					<br/><em>Variable Gravatar = g</em>
				</td>
				<td class="right">&nbsp;</td>
			</tr>
			<tr class="plugins-<?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_rated')) == 'pg'){?>1<?php } else {?>0<?php } ?> top">
				<td valign="middle">
				<input type="radio" name="hamGravatar_rated" value="pg" <?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_rated')) == 'pg'){?>checked<?php }?> />
				</td>
				<td><img alt="" src="../../plugins/hamGravatar/img/picto_cat3.gif" width="40px" /></td>
				<td>
					<strong>Interdit aux moins de 12 ans</strong> 
					<br/>Peut contenir des gestes grossiers, des individus habillés  de façon provocante, des gros mots, ou de la violence légère
					<br/><em>Variable Gravatar = pg</em>
				</td>				
				<td class="right">&nbsp;</td>
			</tr>
			<tr class="plugins-<?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_rated')) == 'r'){?>1<?php } else {?>0<?php } ?> top">
				<td valign="middle">
				<input type="radio" name="hamGravatar_rated" value="r" <?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_rated')) == 'r'){?>checked<?php }?> />
				</td>
				<td><img alt="" src="../../plugins/hamGravatar/img/picto_cat4.gif" width="40px" /></td>
				<td>
					<strong>Interdit aux moins de 16 ans</strong> 
					<br/>Peut contenir des choses telles que des blasphèmes, de la violence intense, de la nudité, ou l'utilisation de drogues dures
					<br/><em>Variable Gravatar = r</em>
				</td>
				<td class="right">&nbsp;</td>
			</tr>
			<tr class="plugins-<?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_rated')) == 'x'){?>1<?php } else {?>0<?php } ?> top">
				<td valign="middle">
				<input type="radio" name="hamGravatar_rated" value="x" <?php if(plxUtils::strCheck($plxPlugin->getParam('hamGravatar_rated')) == 'x'){?>checked<?php }?> />
				</td>
				<td><img alt="" src="../../plugins/hamGravatar/img/picto_cat5.gif" width="40px" /></td>
				<td>
					<strong>Adulte</strong> 
					<br/>Peut contenir des images pornographiques ou de violence extrême
					<br/><em>Variable Gravatar = x</em>
				</td>
				<td class="right">&nbsp;</td>
			</tr>
		</tbody>
        </table>
     </fieldset>
	 <p class="submit">
		<input type="submit" name="Submit" class="button-primary" value="<?php $plxPlugin->lang('L_SAVE') ?>" />
		<?php echo plxToken::getTokenPostMethod() ?>
	</p>
	</form>