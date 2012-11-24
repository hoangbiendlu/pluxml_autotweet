<?php
require_once 'tmhOAuth.php';

class autotweet extends plxPlugin {

    public function __construct($default_lang) {
        # Appel du constructeur de la classe plxPlugin (obligatoire)
        parent::__construct($default_lang);

        # Déclaration des hooks
        $this->addHook('plxAdminEditArticle', 'hook_plxAdminEditArticle');

        # limite l'accès à l'écran d'administration du plugin
        $this->setConfigProfil(PROFIL_ADMIN);
    }

    public function hook_plxAdminEditArticle() {

        $consumer_key = $this->getParam('consumer_key');
        $consumer_secret = $this->getParam('consumer_secret');
        $user_token = $this->getParam('user_token');
        $user_secret = $this->getParam('user_secret');

        $tmhOAuth = new tmhOAuth(array(
                                       'consumer_key' => $this->getParam('consumer_key'),
                                       'consumer_secret' => $this->getParam('consumer_secret'),
                                       'user_token' => $this->getParam('user_token'),
                                       'user_secret' => $this->getParam('user_secret')
                                       ));

        if (isset($_POST['publish'])) { // Si c'est un insert
            
            $tag = str_replace(',', ' #', $_POST['tags']);
        	
        	$url = "http://".$_SERVER['HTTP_HOST']."/article" . (int)$_POST['artId'] . "/" . $_POST['url'];
        	$message = $_POST['title'] . ' ' . $url .  ' #' . trim(str_replace('# ', '#', $tag));

            $tmhOAuth->request('POST', $tmhOAuth->url('1/statuses/update'), 
                               array('status' => $message));

        } 
    }

}
?>