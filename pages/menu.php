<a class="navbar-brand " img="" href="../index.php"><img class="brand_img ml-3" src='../img/1234.png' alt=""></a>

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="menu_title_brand">
    <img class="pt-2 img_centa_print" src='' alt="">
</div>
<div class="collapse navbar-collapse mr-5" id="navbarNav">
    <ul class="navbar-nav ml-auto" id="header_items">

        <?php
        if (isset($_SESSION['register'])) {

            echo "<li class='nav-item'><a href='index.php?page=admin_page' class='nav-link'>Админ Панель</a></li>";
        } else {
        }
        ?>


        <li class="nav-item ">
            <a class="nav-link" href="/">О компании <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=1">Услуги</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=2">Новости</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=3">Реквизиты</a>
        </li>
        <?php
        if (isset($_SESSION['register'])) {

            echo "<li class='nav-item'><a href='pages/out.php' class='nav-link'>Выйти</a></li>";
        }

        ?>

    </ul>
</div>