<?php if(!defined('PLX_ROOT')) exit; ?>


<h2>Plugin Autotweet</h2>

<p>Ce plugin permet de tweeter automatiquement chaque article publié sur Pluxml.</p>


<h3>Configuration du plugin</h3>

<p>Pour faire fonctionner ce plugin, il faut créer une application Twitter qui a un accès en écriture sur votre compte Twitter, et renseigner les API key dans le <a href="parametres_plugin.php?p=autotweet">panneau de configuration du plugin</a>. Si vous ne savez pas du tout comment créer une application Twitter ou récupérer les clés, voici les étapes à suivre :</p>

<ul>
    <li>Allez sur le site <a href="https://dev.twitter.com/user/login">Twitter for developers</a> et connectez vous.</li>
    <li>Allez sur la page <a href="https://dev.twitter.com/apps">My applications</a> et créez une application. Remplissez seulement les champs obligatoires.</li>
    <li>Une fois l'application créée, aller sur l'onglet "Settings", changez les accès en "Read and Write" et cliquez sur bouton en bas pour enregistrer.</li>
    <li>Retournez sur le premier onglet "Details" et cliquez sur le bouton "Create my access token".</li>
    <li>Vous avez maintenant dans cet écran toutes les informations demandées pour paramétrer le plugin : Consumer key, Consumer secret, Access token et Access token secret.</li>
</ul>


<h3>Technique</h3>

<p>Le plugin a été développé et testé sous PHP 5.3 et Pluxml 5.1.6.</p>

<p>Le code source du plugin est disponible sur <a href="https://github.com/jibriss/pluxml_autotweet">Github</a>, veuillez vous assurer d'avoir la dernière version avant toute remontée de bug.</p>

<p>Pour fonctionner ce plugin communique avec l'API Twitter grâce avec OAuth, en utilisant la bibliothèque <a href="https://github.com/themattharris/tmhOAuth">tmhOAuth</a>.</p>