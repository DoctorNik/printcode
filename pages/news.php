<div class="container-fluid" id="main_news_container">
    <div class="container-fluid p-0">
        <section class="row gx-5" id="box_for_all_news">
            <!-- колонка самая широкая -->

            <div class="col-xl-8" id="main_news">

                <?php
                $mainnews = News::getLastNews();
                foreach ($mainnews as $mainnew) {
                    $mainnew->drawMainNews();
                }
                ?>

            </div>
            <div class="col-xl-3 mt-5" id="additional_news">
                <div class="container-fluid">

                    <?php

                    $news = News::getNews();
                    foreach ($news as $new) {
                        $new->drawSideNewsPage();
                    }
                    ?>

                </div>
            </div>
        </section>

    </div>
</div>

<?php
include_once('footer.php');
//  Модальное окно !!

if (isset($_GET['id'])) {

    $pdo = Tools::connect();
    $ps = $pdo->prepare("SELECT * FROM `news` WHERE id= ?");
    $ps->execute([$_GET['id']]);
    while ($row = $ps->fetch()) {
        $news_id_for_draw = $row;
    }
    echo "<script>$('.exampleModal{$news_id_for_draw['id']}').ready(function(){
    $('#exampleModal').arcticmodal();});</script>";
}
?>

<div style="display: none;">
    <div class="box-modal" id="exampleModal">
        <div class="box-modal_close arcticmodal-close">закрыть</div>
        <div class="container mt-5">
            <div class="row">
                <div class="container text_title_modal">
                    <h2><?= $news_id_for_draw['newsname'] ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="container date_text_modal">
                    <p><?= $news_id_for_draw['newdate'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="container text_desc">
                    <p><?= str_replace(array("\r\n", "\n"), array("<p>", "</p>"), $news_id_for_draw['info']) ?></p>
                </div>
            </div>
        </div>
        <div class="box-modal_close arcticmodal-close">закрыть</div>
    </div>
</div>