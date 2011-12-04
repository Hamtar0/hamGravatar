<?php if(!defined('PLX_ROOT')) exit; ?>
<style>
.code {
	background-color: white;
	color: black;
	padding: 10px;
	margin: 10px;
	border: 1px solid red;
}</style>
<h2>Aide à l'utilisation du plugin hamGravatar</h2>
<p>Pour utiliser correctement l'affichage des avatars des commentateurs en utilisant le service Gravatar, il suffit d'ajouter le code suivant dans la boucle des commentaires.</p>
<div class="code">&lt;?php eval($plxShow-&gt;callHook(&#39;hamGravatar&#39;)) ?&gt;</div>
<p>La boucle des commentaires se situe dans le fichier <strong>commentaires.php</strong> du thème utilisé pour afficher votre blog.<br/>
Elle est structurée ainsi :</p>
<div class="code">&lt;?php while($plxShow-&gt;plxMotor-&gt;plxRecord_coms-&gt;loop()): ?&gt;<br/>
<br/>
Blabla HTML et PHP<br/>
<br/>
&lt;?php endwhile; ?&gt;<br/>
</div>
<p>Le plugin est fait de manière à vous laisser libre court pour l'intégration. C'est à dire que le code utilisé renvoit uniquement l'url de l'avatar.<br/>
Donc pour une intégration parfaite et de manière générale, il faut dans insérer ce code pour avoir un affichage effectif.</p>
<div class="code">&lt;img src=&quot;&lt;?php eval($plxShow-&gt;callHook(&#39;hamGravatar&#39;)) ?&gt;&quot; class=&quot;avatar&quot; /&gt;</div>
<p>Donc pour terminer et simplifier, le code final de votre boucle de commentaires doit être structuré de cette manière :</p>
<div class="code">&lt;?php while($plxShow-&gt;plxMotor-&gt;plxRecord_coms-&gt;loop()): ?&gt;<br/>
<br/>
Blabla HTML et PHP<br/>
<br/>
&lt;img src=&quot;&lt;?php eval($plxShow-&gt;callHook(&#39;hamGravatar&#39;)) ?&gt;&quot; class=&quot;avatar&quot; /&gt;<br/>
<br/>
Blabla HTML et PHP<br/>
<br/>
&lt;?php endwhile; ?&gt;</div>
<p>J'espère avoir été assez clair pour les novices !</p>