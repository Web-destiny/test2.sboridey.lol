<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="icon" type="image/svg+xml" href="/frontend/web/img/favicon/favicon.svg">
    <link rel="apple-touch-icon" sizes="180x180" href="/frontend/web/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/frontend/web/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/frontend/web/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/frontend/web/img/favicon/site.webmanifest">

    <link rel="stylesheet" href="/font/Gilroy/stylesheet.css">
    <link rel="stylesheet" href="/css/login.css?4563471">

    <link rel="stylesheet" href="/font/Gilroy/stylesheet.css">
    <link rel="stylesheet" href="/font/Ballo/stylesheet.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/custom-select.css">
    <link rel="stylesheet" href="/css/style.css?345346536">

    <script src="/js/jquery-3.5.1.min.js"></script>

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>


    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();
            for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
            k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(92331060, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/92331060" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <?= $content ?>

    <script src="/js/login.js?57645346789"></script>

    <script src="/js/apexcharts.min.js"></script>
    <script src="/js/custom_select.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/statistic_chart.js"></script>
    <script src="/js/script.js?76545678"></script>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
