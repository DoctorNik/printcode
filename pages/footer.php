<div id="footer_line" class="container-fluid p-0">
    <div class="row">
        <div class="col-md-6 footer">
            <a class="navbar-brand " img="" href="#"><img class="brand_img ml-3" src="/img/1234.png" alt=""></a>
            <img src="" alt="">
        </div>
        <div id="footer_menu" class="m-auto">
            <ul id="bottom_window" class="nav nav-pills nav-fill ">
                <li class="nav-item"><a href="/" class="nav-link">О компании</a></li>


                <?php
                if (isset($_SESSION['register'])) {

                    echo "<li class='nav-item'><a href='pages/out.php' class='nav-link'>Выйти</a></li>";
                    echo ' </ul>';
                } else {
                    echo "<li class='nav-item'><a href='index.php?page=admin_page' class='nav-link'>Войти</a></li>";
                    echo ' </ul>';
                }
                ?>

        </div>
    </div>
</div>

<script>
    $('.lead').liTextLength({
        length: 93,
        afterLength: '...',
        fullText: false
    });
</script>
<script>
    var phoneMask = IMask(
        document.getElementById('phone-mask'), {
            mask: '+{7}(000)000-00-00'
        });
</script>

<script>
    $(document).ready(function() {
        $("a.scrollto").click(function() {
            var elementClick = $(this).attr("href")
            var destination = $(elementClick).offset().top;
            jQuery("html:not(:animated),body:not(:animated)").animate({
                scrollTop: destination
            }, 800);
            $("#down_arrow").toggleClass('d-none');
            return false;

        });


        $("a.scrollto1").click(function() {
            var elementClick = $(this).attr("href")
            var destination = $(elementClick).offset().top;
            jQuery("html:not(:animated),body:not(:animated)").animate({
                scrollTop: destination
            }, 800);
            $("#up_arrow").toggleClass('d-none');
            return false;

        });

    });
</script>

<!-- accordion animation for services and contact page -->
<script>
    $(document).ready(function() {
        $(".accordion_1").mouseover(function() {
            $(".accordion_1").trigger("click");
        });
        $(".accordion_2").mouseover(function() {
            $(".accordion_2").trigger("click");
        });
        $(".accordion_3").mouseover(function() {
            $(".accordion_3").trigger("click");
        });
    });
</script>

<script>
    $('.card__item-text').liTextLength({
        length: 200,
        afterLength: '...',
        fullText: true,
        moreText: '<br>..Показать полный текст',
        lessText: '<br>Скрыть полный текст'
    });
</script>