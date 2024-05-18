<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/modules/classes.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="yandex-verification" content="e8460790715d608e" />
    <meta name="description" content="Маркировка по честному знаку. Печать цветных этикеток с кодом DataMatrix. Услуги по маркировке молочной продукции, одежды и других товаров попадающих под обязательную маркировку.">
    <meta name="Keywords" content="честный знак, маркировка, этикетка, печать этикеток, принтер этикеток, маркировка молочной продукции">
    <title>CentaPrint - инновация маркировки.</title>
    <link rel="shortcut icon" href="img/qr.jpg" type=image/jpg">
    <link rel="stylesheet" href="js/modal/jquery.arcticmodal-0.3.css">
    <!-- arcticModal theme -->
    <link rel="stylesheet" href="js/modal/themes/simple.css">
    <!--end modal window  -->
    <link rel="stylesheet" href='style/effects.css'>
    <link rel="stylesheet" href='style/style.css'>
    <link rel="stylesheet" href="style/media.css">
    <link rel="stylesheet" href="style/news.css">
    <link rel="stylesheet" href="style/admin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script src="https://unpkg.com/imask"></script>
    <script src='js/formMail.js'></script>
    <script src='js/jquery.liTextLength.js'></script>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode
                .insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(73047748, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/73047748" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
    <!-- arcticModal -->
    <script src="js/modal/jquery.arcticmodal-0.3.min.js"></script>
</head>

<body>
    <div id="main_container" class="container-fluid p-0">
        <!-- header -->
        <nav class="navbar navbar-expand-lg navbar-light opacity_menu container-fluid p-0" id="m2">
            <?php include_once("menu.php"); ?>
        </nav>

        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            if ($page === '1') include_once("services_contact.php");
            if ($page === '2') include_once("news.php");
            if ($page === '3') include_once("recvizit.php");
            if ($page === 'admin_page') include_once("admin.php");

            if (isset($_SESSION['register']) && $page === 'update') include_once("update.php");
        } else {
            include_once("pages/main.php");
        }
        include_once('footer.php');
        ?>

    </div>

</body>

</html>