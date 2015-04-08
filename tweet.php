<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <script src="js/widgets.js"></script>
        <script>
            twttr.ready(function (twttr) {
                document.ready(function () {
                    twttr.widgets.createShareButton(
                            'https://dev.twitter.com/',
                            count: 'none',
                            text: 'Sharing a URL using the Tweet Button',
                            hashtags: 'TESTE, testetweet, site',
                            related: 'agenciamd2',
                            via: 'serginhuDiet'
                }).then(function (el) {
                })
                {

                console.log("Button created.")
                }
                );
            });
        </script>
    </head>
    <body>
        <a id="new-button" href="#"></a>
        <?Php
        $consumerKey = 'Consumer-Key';
        $consumerSecret = 'Consumer-Secret';
        $oAuthToken = 'OAuthToken';
        $oAuthSecret = 'OAuth Secret';
        
        // incluimos la librería para usar la API OAuth
        require_once('twitteroauth.php');
        $tweet = new TwitterOAuth($consumerKey, $consumerSecret, $oAuthToken, $oAuthSecret);
        
        # aqui tu lógica para recoger el contenido del tweet, ya sea de tu bbdd, feed, rss o fichero
        $tweet->post('statuses/update', array('status' => 'Aqui contenido de tu tweet, tambien puedes enviar urls o hashtags'));
        ?>

    </body>
</html>