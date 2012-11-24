<?php
require_once __DIR__.'/tmhOAuth.php';

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

        if (isset($_POST['publish'])) { // Si c'est un insert
            echo "<?php autotweet::tweet('$consumer_key', '$consumer_secret', '$user_token', '$user_secret', \$content); ?>";
        }
    }

    public static function tweet($consumer_key, $consumer_secret, $user_token, $user_secret, $content) {
        $tmhOAuth = new tmhOAuth(compact('consumer_key', 'consumer_secret', 'user_token', 'user_secret'));
        $url = plxAdmin::getInstance()->aConf['racine'] . $content['url'];
        $tag = explode(',', $content['tags']);
        foreach($tag as &$t) {
            $t = '#' . preg_replace('/[^a-zA-Z]/', '', $t);
        }
        $message = $content['title'] . ' ' . $url . ' ' . implode(' ', $tag);
        $tmhOAuth->request('POST', $tmhOAuth->url('1/statuses/update'), 
                           array('status' => $message));
    }

}
?>
