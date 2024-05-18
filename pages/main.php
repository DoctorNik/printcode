<?php function is_session_started()
{
    if (php_sapi_name() !== 'cli') {
        if (version_compare(phpversion(), '5.4.0', '>=')) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}

if (is_session_started() === FALSE) session_start();

?>

<header class="header container-fluid p-0">
    <div class="container__description">
        <h3 class="main_title">Маркировка по Честному знаку</h3>
        <p class="main_article">Оказываем услуги по термотрансферной печати для маркировки товаров</p>
        <button class="btn about-title" onclick="window.location.href = '#accordion';">УЗНАТЬ
            ПОДРОБНЕЕ</button>
    </div>
    <!-- overlay -->
    <div class="head_img container-fluid overlay p-0">
    </div>
</header>
<!-- body -->
<a href="#m2" class="scrollto1">
    <div class="wrapper" id="up_arrow">
        <div class="arrow_top one">
            <img src="../img/arrow/2712111.png" alt="">
        </div>
</a>
</div>

<div class="wrapper" id="down_arrow">
    <a href="#footer_line" class="scrollto">
        <div class="arrow one">
            <img src="https://image.flaticon.com/icons/svg/271/271210.svg" alt="">
        </div>
    </a>
</div>
<!-- main markirovka  -->
<div class="container mt-5" id="mark_main">
    <div class="row about_us">
        <h2 class="head about_us">Что такое Маркировка?</h2>
    </div>
    <div id="mark_main_text" class="row">
        <p>Код маркировки — это специальный код DataMatrix, который наносится на товар или товарную упаковку. Код маркировки позволяет проверить подлинность и отследить этапы жизненного цикла товара.</p>

    </div>

</div>
<!-- cheme block -->
<div class="container">
    <div id="cheme">
        <h2>Жизненный цикл маркировки товаров</h2>
        <div>
            <img src="./img/mark/1.png">
            <p><b>Производитель</b></p>
            <p>Обязан нанести код маркировки на свою продукцию</p>
        </div>
        <div class="top">
            <img src="./img/mark/2.png">
            <p><b>Логистика</b></p>
            <p>Движение товара фиксируется при каждом перемещении</p>
        </div>
        <div>
            <img src="./img/mark/3.png">
            <p><b>Магазин</b></p>
            <p>Сканирует код товара при приемке</p>
        </div>
        <div class="top">
            <img src="./img/mark/4.png">
            <p><b>Касса</b></p>
            <p>При продаже товара на кассе, код выбывает из оборота</p>
        </div>
        <div>
            <img src="./img/mark/5.png">
            <p><b>Потребитель</b></p>
            <p>Информация о движении товара отображена в мобильном приложени.
            <p>
        </div>
    </div>
</div>
<hr>

<!-- icons -->
<div class="container mt-5" id="description_mark">
    <div class="row about_us">
        <h2 class="head about_us">Подробнее о маркировке</h2>
    </div>
    <hr>
    <div class="row mt-3">
        <div class="col-2 icon_for_desc">
            <img src="./img/clothing.png" alt="Маркировка одежды">
        </div>
        <div class="col-9">
            <p><strong>Маркировка товаров легкой промышленности.</strong> С 1 января 2021 все <a href="https://xn--80ajghhoc2aj1c8b.xn--p1ai/business/projects/light_industry/marking_goods/" target="_blank">товары легкой промышленности попадающие под маркировку</a> должны быть
                промаркированы кодами Data Matrix, полученными в ЦРПТ Честный знак.
                Оказываем услуги печати этикеток с марикировкой, а так же услуги маркировки под ключ (от 100
                шт.). Цена маркировки одной единицы 1.5 рубля, может меняться в меньшую сторону зависимости от
                объема </p>
        </div>
    </div>
    <hr>
    <div class="row mt-3">
        <div class="col-2 icon_for_desc">
            <img src="./img/milk-bottle.png" alt="Маркировка молочной продукции">
        </div>
        <div class="col-9">
            <p> <strong>Маркировка молочной продукции.</strong> С 20 января 2021 года - старт обязательной <a href="https://xn--80ajghhoc2aj1c8b.xn--p1ai/business/projects/dairy/" target="_blank">маркировки молочной продукции</a>, с 1 июня 2021 года маркировка становится
                обязательной для категорий
                "мороженое" и "сыры". Наша компания имеет ряд готовых кейсов по реализации требований маркировки
                товаров, таких как маркировка под ключ - предоставление готовых цветных этикеток с
                кодами Data Matrix, полученными в ЦРПТ Честный знак, а также оказание услуг по внедрению
                кейс-технологий в ваше производство.
            </p>
        </div>
    </div>
    <hr>
    <div class="row mt-3">
        <div class="col-2 icon_for_desc">
            <img src="./img/water.png" alt="">

        </div>
        <div class="col-9">
            <p><strong>Маркировка упакованной воды.</strong>С 1 апреля 2020 года по 1 марта 2021 года проводится
                эксперимент по <a href="https://xn--80ajghhoc2aj1c8b.xn--p1ai/business/projects/water/" target="_blank"> маркировке упакованной воды.</a>Мы можем предложить ряд решений по
                маркировке вашей продукции как под ключ, так и с внедрением в ваше производство.</p>
        </div>
    </div>
    <hr>
    <div class="row mt-3">
        <div class="col-2 icon_for_desc">
            <img src="./img/beer.png" alt="">
        </div>
        <div class="col-9">
            <p><strong>Маркировка пива и пивных напитков.</strong>Правительство РФ утвердило проведение
                эксперимента по <a href="https://xn--80ajghhoc2aj1c8b.xn--p1ai/business/projects/beer/" target="_blank">маркировке пива</a> с 1 апреля 2021 года. Эксперимент ЦПРТ Честный знак
                затронет все типы упаковки — от стеклянной тары до кег — и завершится к началу сентября.</p>
        </div>
    </div>
    <hr class="mb-5">
</div>
<!-- end icons -->

<!-- about us -->

<div id="accordion" class="container p-0 about mt-0 mb-5">
    <div class="card about_us" id="about__block">
        <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            <h3 class="head_about_us mb-0"> О НАС </h3>
            <h5 class="head_about_us mb-0"> Подробнее </h5>
        </a>
    </div>
    <div class="row">
        <div class="col">
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="container card-body">
                    <p class="about_title">Наш профиль это оказание услуг по печати этикеток и маркировке по системе
                        Честный
                        знак, также
                        инсталяции, продажа и внедрение готовых кейсов в ваше производство. Честный ЗНАК —
                        Национальная
                        система
                        цифровой маркировки и прослеживаемости товаров Центра развития перспективных технологий,
                        созданного
                        для
                        реализации глобальных проектов в цифровой экономике.По данным ЦРПТ в 2024 году каждый товар
                        будет
                        промаркирован. Маркировка представляет собой зашифрованный DataMatrix QR-Code. Наше
                        производство, может вам предложить
                        цветные этикетки на вашу продукцию с нанесенными кодами маркировки, таким образом вам
                        придется
                        только наклеить этикетки на вашу продукцию и ввести товар в оборот, на этом все требования
                        по маркировке будут соблюдены. </p>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="container" style="background-color:rgba(70,68,23,0.25);">
    <!-- form -->
    <div class="container form_about_div p-5" id="form_about_div">
        <h2>НАПИШИТЕ НАМ</h2>
        <form id="mail_form" method="post" action="" enctype="multipart/form-data">
            <div class="form-group form_on_video" id="form_for_client">
                <label for="exampleFormControlInput1">Ваш Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@yandex.ru">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Выберете тему</label>
                <select class="form-control" id="theme" name="theme">
                    <option>Маркировка одежды</option>
                    <option>Маркировка молочной продукции</option>
                    <option>Маркировка упакованной воды</option>
                    <option>Маркировка пивных напитков</option>
                    <option>Маркировка общие сведения</option>
                    <option>Прочие вопросы</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Введите текст</label>
                <textarea class="form-control" id="message" name="message" rows="3"></textarea>
            </div>
            <button type="submit" id="send_message" class="btn button_about">ОТПРАВИТЬ</button>
        </form>
        <div id="errorMess"></div>
    </div>
</div>
<!-- Новости -->
<div class="container" id="head_news__container">
    <div class="row about_us" id="head_news">
        <h2 class="head_about_us mb-5 mt-5">Новости</h2>
    </div>
    <?php

    echo '<div id="result" class="row">';
    $news = News::getFourNewsOnMainPage();

    foreach ($news as $new) {
        $new->drawNews();
    }
    // echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '<div class="container p-0">';
    include_once('services_contact.php');
    echo '</div>';
    ?>
