<?php

require_once './facebook-sdk/autoload.php';

use Facebook\FacebookRequest;
use Facebook\FacebookSession;
use Facebook\GraphObject;
use Facebook\FacebookRequestException;
use Facebook\FacebookJavaScriptLoginHelper;
use Facebook\FacebookSignedRequestFromInputHelper;

FacebookSession::setDefaultApplication('374885602698458', 'd6449eabc954e62cc2b93519f36954e5');


$helper = new FacebookJavaScriptLoginHelper();
try {
    $session = $helper->getSession();
} catch (FacebookRequestException $ex) {
    echo 'facebook request exception ';
} catch (\Exception $ex) {
    echo 'another exception ';
}
if ($session) {
    try {

        $response = (new FacebookRequest(
                /*
                 * postagem no feed
                 * 
                  $session, 'POST', '/me/feed', array(
                  //'link' => 'http://www.agenciamd2.com.br/img/logomd2.png',
                  //'url' => 'http://www.agenciamd2.com.br/img/logomd2.png',
                  'message' => 'MD2 é o poder, dorga',
                  'name' => 'Name',
                  'caption' => 'Caption',
                  'picture' => 'http://www.agenciamd2.com.br/img/logomd2.png',
                  'description' => 'Descrição'
                  )
                  ))->execute()->getGraphObject();
                 */
                
                //postagem fotos
                $session, 'POST', '/me/photos', array(
            //'link' => 'http://www.agenciamd2.com.br/img/logomd2.png',
            'url' => 'https://scontent-gru.xx.fbcdn.net/hphotos-xfp1/v/t1.0-9/p526x296/1466178_818655561542576_927918944535345340_n.png?oh=ca22c0763fbbe3a6278f9c7f2a5aa0ae&oe=55A61A59',
            'message' => 'MD2 é o poder, dorga',
            'name' => 'Name',
            'caption' => 'Caption',
            'picture' => 'http://www.agenciamd2.com.br/img/logomd2.png',
            'description' => 'Descrição'
                )
                ))->execute()->getGraphObject();

        echo "Posted with id: " . $response->getProperty('id');
    } catch (FacebookRequestException $e) {

        echo "Exception occured, code: " . $e->getCode();
        echo " with message: " . $e->getMessage();
    }

    $me = (new FacebookRequest(
            $session, 'GET', '/me'
            ))->execute()->getGraphObject(GraphUser::className());
}
?>