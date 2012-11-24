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

<p>Le plugin a besoin des clés API de votre application Twitter. Si vous ne savez pas comment les récupérer, veuillez consulter la <a href="parametres_pluginhelp.php?p=autotweet">page d'aide</a>.</p>

<form action="parametres_plugin.php?p=autotweet" method="post">
    <fieldset class="config">
        <p class="field">
            <label>Consumer key : </label>
        </p>
        <input type="text" name="consumer_key" value="<?php echo plxUtils::strCheck($plxPlugin->getParam('consumer_key')) ?>" /><br />

        <p class="field">
            <label>Consumer secret : </label>
        </p>
        <input type="text" name="consumer_secret" value="<?php echo plxUtils::strCheck($plxPlugin->getParam('consumer_secret')) ?>" /><br />

        <p class="field">
            <label>Access token : </label>
        </p>
        <input type="text" name="user_token" value="<?php echo plxUtils::strCheck($plxPlugin->getParam('user_token')) ?>" /><br />

        <p class="field">
            <label>Access token secret :</label>
        </p>
        <input type="text" name="user_secret" value="<?php echo plxUtils::strCheck($plxPlugin->getParam('user_secret')) ?>" /><br />
    </fieldset>

    <input type="submit" name="submit" value="Enregistrer" />
</form>