<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <script src="js/facebookLogin.js"></script>
        <!--script>
            checkLoginState();
        </script-->

        <?php
        require_once './facebook-sdk/autoload.php';

        use Facebook\FacebookRequest;
        use Facebook\FacebookSession;
        use Facebook\GraphObject;
        use Facebook\GraphUser;
        use Facebook\FacebookRequestException;
        use Facebook\FacebookJavaScriptLoginHelper;
        use Facebook\FacebookSignedRequestFromInputHelper;

FacebookSession::setDefaultApplication('640961876010371', 'c73c2203c29f41e2c8d9f175969a7d46');


        //$page_id = 'Teste';
        $page_id = '1587485744803371';
        $helper = new FacebookJavaScriptLoginHelper();
        try {
            $session = $helper->getSession();

            //var_dump($session);
            $permissao = (new FacebookRequest($session, 'GET', '/me/permissions'))->execute()->getGraphObject(GraphUser::className())->asArray();
            var_dump($permissao);
            $access_token = $session->getToken();
            //$access_token = (new FacebookRequest($session, 'GET', '/' . $page_id, array('fields' => 'access_token')))->execute()->getGraphObject()->asArray();
            //$access_token = $access_token->accessToken;
            //$access_token = $access_token['access_token'];
        } catch (FacebookRequestException $ex) {
            echo 'facebook request exception ';
        } catch (\Exception $ex) {
            echo 'another exception ';
        }
        if ($session) {
            try {

                $get = (new FacebookRequest($session, 'GET', '/me/accounts/'))->execute()->getGraphObject()->asArray();
                //var_dump($get);
                //die();

                $access_token = $get['access_token'];
                $response = (new FacebookRequest(
                $session,
                'POST',
//                'https://graph.facebook.com/'.$page_id.'/feed?access_token='.$access_token,
                '/'. $page_id .'/feed',
                array(
                'access_token' => $access_token,
                'name' => 'Facebook API: Posting As A Page using Graph API v2.x and PHP SDK 4.0.x',
                'link' => 'https://www.webniraj.com/2014/08/23/facebook-api-posting-as-a-page-using-graph-api-v2-x-and-php-sdk-4-0-x/',
                'caption' => 'The Facebook API lets you post to Pages you administrate via the API. This tutorial shows you how to achieve this using the Facebook PHP SDK v4.0.x and Graph API 2.x.',
                'message' => 'Check out my new blog post!',
                )
                ))->execute()->getGraphObject()->asArray();

                print_r($response);
                /*
                  $response = (new FacebookRequest(

                 * ***************** UsuÃ¡rios *********************
                 * postagem no feed
                 * 
                  $session, 'POST', '/me/feed', array(
                  //'link' => 'http://www.agenciamd2.com.br/img/logomd2.png',
                  //'url' => 'http://www.agenciamd2.com.br/img/logomd2.png',
                  'message' => 'MD2 Ã© o poder, dorga',
                  'name' => 'Name',
                  'caption' => 'Caption',
                  'picture' => 'http://www.agenciamd2.com.br/img/logomd2.png',
                  'description' => 'DescriÃ§Ã£o'
                  )
                  ))->execute()->getGraphObject();


                  //postagem fotos
                  $session, 'POST', '/me/photos', array(
                  //'link' => 'http://www.agenciamd2.com.br/img/logomd2.png',
                  'url' => 'https://scontent-gru.xx.fbcdn.net/hphotos-xfp1/v/t1.0-9/p526x296/1466178_818655561542576_927918944535345340_n.png?oh=ca22c0763fbbe3a6278f9c7f2a5aa0ae&oe=55A61A59',
                  'message' => 'MD2 Ã© o poder, dorga',
                  'name' => 'Name',
                  'caption' => 'Caption',
                  'picture' => 'http://www.agenciamd2.com.br/img/logomd2.png',
                  'description' => 'DescriÃ§Ã£o'
                  )
                  ))->execute()->getGraphObject();

                 */
            } catch (FacebookRequestException $e) {

                echo "Exception occured, code: " . $e->getCode();
                echo " with message: " . $e->getMessage();
            }

//    $me = (new FacebookRequest(
//            $session, 'GET', '/me'
//            ))->execute()->getGraphObject(GraphUser::className());
        }
        ?>
    </body>
</html>