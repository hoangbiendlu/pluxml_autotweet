<?php if(!defined('PLX_ROOT')) exit; ?>

<?php
if(!empty($_POST)) {
    $plxPlugin->setParam('consumer_key', $_POST['consumer_key'], 'string');
    $plxPlugin->setParam('consumer_secret', $_POST['consumer_secret'], 'string');
    $plxPlugin->setParam('user_token', $_POST['user_token'], 'string');
    $plxPlugin->setParam('user_secret', $_POST['user_secret'], 'string');

    $plxPlugin->saveParams();
    header('Location: parametres_plugin.php?p=autotweet');
    exit;
}
?>

<h2>Panneau de configuration Autotweet</h2>

<p>Le plugin a besoin de ces informations pour tweetter sur votre compte</p>

<form action="parametres_plugin.php?p=autotweet" method="post">
    consumer_key : <input type="text" name="consumer_key" value="<?php echo plxUtils::strCheck($plxPlugin->getParam('consumer_key')) ?>" /><br />

    consumer_secret : <input type="text" name="consumer_secret" value="<?php echo plxUtils::strCheck($plxPlugin->getParam('consumer_secret')) ?>" /><br />

    user_token : <input type="text" name="user_token" value="<?php echo plxUtils::strCheck($plxPlugin->getParam('user_token')) ?>" /><br />

    user_secret : <input type="text" name="user_secret" value="<?php echo plxUtils::strCheck($plxPlugin->getParam('user_secret')) ?>" /><br />

    <input type="submit" name="submit" value="Enregistrer" />
</form>