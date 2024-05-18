<div class="container mt-5">
    <main class='main ml-3' id='main' style="margin-top:150px; margin-bottom:150px;">
        <?
        echo '<div class="d-none container table mt-5" id="hide"><h5 id="text_notification" class="text-success"></h5></div>';

        // form log in
        $echo = "<div class='container table mr-5 login_enter_block'>
<div class='tale-wrapper'>
            <div class='table-title'><h4>Войти в панель администратора</h4></div>
            <div class='mb-3 table-content'>
          
                        <form method='post' id='login-form' class=''>
                        <label for='exampleInputEmail1' class='form-label'>Login</label><br>
                                      <input type='text' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp'  name='login' required><br>
                                        <label for='exampleInputPassword1' class='form-label'>Password</label>
                                     <input type='password' placeholder='Пароль' class='form-control'
                                       name='password' required><br>
                                    <input type='submit' value='Войти' class='btn btn-primary'>
                      </form>
             </div>
</div>
</div>";

        // check log in users
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $users = Tools::checkUser($_POST['login'], $_POST['password']);
        }

        if (isset($_SESSION['register'])) {

            $echo = null;

        ?>
            <div class="container table" id="block_admin_forms">
                <form method='post' class=''>
                    <input type='submit' class='btn btn-danger' name='exit' id='exit' value='Exit'>
                </form>
                <br>
                <!-- //  out form with select -->
                <form id="cat_num" class="form-group" action="" method="post" enctype="multipart/form-data">
                    <label for="category">
                        <input type="text" class="form-control" name="category" id="category_text" placeholder="Категория">
                        <br>
                        <select class="form-control" name="catid" id="catid">
                            <option selected disabled>Выберете категорию</option>
                            <?php Categories::selectCategory(); ?>
                        </select>
                        <br>
                        <input type="submit" name="add_cat" id="add_cat" class="btn btn-sm btn-success" value="Добавить" disabled>
                        <input type="submit" name="del_cat" value="Удалить" value="Удалить" class="btn btn-sm btn-danger" disabled>
                    </label>
                </form>
                <h5 id="errorMessCat"></h5>
                <br>
                <h3 class="mb-3">Удалить Новость</h3>
                <form class="form-group" id="del_news" action="" method="post" enctype="multipart/form-data">
                    <label for="news_name"><select class="form-control" name="news_name" id="news_name">
                            <option selected disabled>Выберете новость</option>
                            <?php
                            DeletionEditingNews::drawFormToDeleteNews();
                            ?>
                        </select>
                        <br>
                        <input type="submit" name="del_news_button" id="del_news_button" value="Удалить" value="Удалить" class="btn btn-sm btn-danger" disabled>
                    </label>
                </form>
                <br>
                <br>
                <!-- // out the form news -->


                <h2>Добавить новость</h2><br>

                <form class="form-group" id="add_news_id" action="" method="post" enctype="multipart/form-data">
                    <label for="catid_news">
                        <select class="form-control" name="catid_news" id="catid_news">
                            <option selected disabled>Выберете категорию</option>
                            <?php Categories::selectCategory(); ?>
                        </select>
                    </label>
                    <br>
                    <label for="name_news">Название:
                        <input class="form-control" type="text" name="name_news" id="name_news" placeholder="Название статьи">
                    </label>
                    <br>
                    <label for="title">Описание:
                        <input class="form-control" type="text" name="title" id="title">
                    </label>
                    <br>
                    <label for="date">Дата:
                        <input class="form-control" type="date" name="date" id="date">
                    </label>
                    <br>
                    <label for="info">Текст статьи:
                        <textarea class="form-control" name="info" id="info" cols="50" rows="5"></textarea>
                    </label>
                    <br>
                    <label for="imagepath">Image:
                        <input class="form-control" type="file" accept="img/*" name="imagepath" id="imagepath">
                    </label>
                    <br>
                    <input type="submit" name="add_news" id="add_news" class="btn btn-sm btn-success" value="Добавить" disabled>
                    <input type="reset" name="add_news_cancel" id="add_news_cancel" class="btn btn-sm btn-info" value="Сброс" disabled>
                </form>
            </div>

            <!-- script for activate buttons when we begin to enter symbols in the form -->
            <script>
                $(document).ready(function() {
                    $('#add_news_id').on('change', function() {
                        $('#add_news_id input[type=submit]').prop('disabled', false);
                    });
                    $('#catid, #category_text').on('change', function() {
                        $('#cat_num input[type=submit]').prop('disabled', false);
                    });
                });
            </script>
            <!-- 
            // exit -->
        <?php
            if (isset($_POST['exit'])) {
                session_destroy();
                echo '<script>window.location=document.URL</script>';
            }
            if (isset($_POST['add_news'])) {
                if (!empty($_FILES)) {

                    $path = "./img/news/" . $_FILES['imagepath']['name'];
                    move_uploaded_file($_FILES['imagepath']['tmp_name'], $path);
                    $add = new NewNews(trim($_POST['name_news']), $_POST['info'], $path, $_POST['date']);
                    $add->addToDb();
                    echo "<script>
                    $(document).ready(function(){
                    $('#hide').removeClass('d-none');
                    $('#text_notification').text('Новость Добавлена');
                    window.setTimeout(function(){   
                    $('#hide').addClass('d-none');
                    window.location=document.URL;
                    },3000);});</script>";
                } else {
                    echo "error";
                }
            }

            //add the category
            if (isset($_POST['add_cat'])) {
                $category = $_POST['category'];
                Categories::addCategory($category);
                echo "<script>
                $(document).ready(function(){
                $('#hide').removeClass('d-none');
                $('#text_notification').text('Категория Добавлена');
                window.setTimeout(function(){   
                $('#hide').addClass('d-none');
                window.location=document.URL;
                },3000);});</script>";
            }

            if (isset($_POST['del_cat'])) {

                Categories::deleteCat();
                echo "<script>
                $(document).ready(function(){
                $('#hide').removeClass('d-none');
                $('#text_notification').text('Категория Удалена');
                window.setTimeout(function(){   
                $('#hide').addClass('d-none');
                window.location=document.URL;
                },3000);});</script>";
            }

            if (isset($_POST['del_news_button'])) {
                DeletionEditingNews::deleteNews();
                echo "<script>
                $(document).ready(function(){
                $('#hide').removeClass('d-none');
                $('#text_notification').text('Новость Удалена');
                window.setTimeout(function(){   
                $('#hide').addClass('d-none');
                window.location=document.URL;
                },3000);});</script>";
            }
        }
        echo $echo;
        ?>
    </main>
</div>