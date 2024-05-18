<?php
$root = $_SERVER['DOCUMENT_ROOT'] . '/';
require_once "config.php";

class News
{
    public $id;
    public $newsname;
    public $info;
    public $imagepath;
    public $newdate;
    function __construct(
        $newsname,
        $info,
        $imagepath,
        $newdate,
        $id
    ) {
        $this->id = $id;
        $this->newsname = $newsname;
        $this->info = $info;
        $this->imagepath = $imagepath;
        $this->newdate = $newdate;
    }

    static function getNews()
    {
        try {
            $pdo = Tools::connect();
            $ps = $pdo->query("SELECT * FROM news ORDER BY id DESC LIMIT 4,10");
            while ($row = $ps->fetch()) {
                $new = new News($row['newsname'], $row['info'], $row['imagepath'], $row['newdate'], $row['id']);
                $news[] = $new;
            }
            return  $news;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    static function getFourNewsOnMainPage($id = 0)
    {
        try {

            $pdo = Tools::connect();
            $ps = $pdo->query("SELECT * FROM news LIMIT 4");
            while ($row = $ps->fetch()) {
                $new = new News($row['newsname'], $row['info'], $row['imagepath'], $row['newdate'], $row['id']);
                $news[] = $new;
            }
            return  $news;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    function drawNews()
    {

        echo '<div class="col-md-3 col-xs-3 col">';
        if (isset($_SESSION['register'])) {
            echo "<div style='border: solid 1px gray;'>";
            echo "<a  role='button' class='btn btn-warning m-1' href='index.php?page=update&id={$this->id}'>Редактировать</a>";
        } else {
        }
        echo "<a class='card-body_href' href='index.php?page=2&id={$this->id}'>";
        echo '   <div class="container-fluid card-body p-0">';
        echo "<img class='card-img-top picture' src='{$this->imagepath}' alt=''>";
        echo "<div class='text_block'><h5 class=''>$this->newsname</h5></div>";
        echo "<p class='card-text lead'>$this->info</p>";
        echo "<a href='index.php?page=2&id={$this->id}' class='btn_news'>Подробнее</a>";
        echo '    </div>';
        echo '    </div>';
        echo ' </a>';

        if (isset($_SESSION['register'])) {
            echo ' </div>';
        } else {
        }
    }
    function drawSideNewsPage()
    {
        echo '<div class="row vh-100 mb-3 card cart__news-mini">';
        echo "<a href='index.php?page=2&id={$this->id}' class='exampleModal{$this->id}'>";
        echo '<div class="col cart__item">';
        echo "<h5 class='card__item-title'>$this->newsname</h5>";
        echo "<img src='../{$this->imagepath}' alt=''>";
        echo "<p class='card__item-text mt-2'>$this->info</p>";
        echo '</div>';
        echo '</a>';
        echo '</div>';
    }

    static function getLastNews()
    {
        try {
            $pdo = Tools::connect();
            $ps = $pdo->query("SELECT * FROM news ORDER BY id DESC 
        LIMIT 4 ");
            while ($row = $ps->fetch()) {
                $mainnew = new News($row['newsname'], $row['info'], $row['imagepath'], $row['newdate'], $row['id']);
                $mainnews[] = $mainnew;
            }
            return  $mainnews;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function drawMainNews()
    {

        echo '<div class="card cart__news m-md-5" >';
        echo "<a href='index.php?page=2&id={$this->id}' class='exampleModal{$this->id}'>
    <div class='card cart__back' style='position:relative;'>";
        echo "<img class='main_card_img'   src='../{$this->imagepath}' alt=''>";
        echo '<div class="card_wrapper"  style="background-color:black; position:absolute; min-height:100%; min-width:100%; opacity:0.25">';
        echo '    </div>';
        echo '    </div></a>';
        echo "<h4 class='title'>$this->newdate</h4>";
        echo "<h5 class='card-title'>$this->newsname</h5>";
        echo '    </div>';
    }
}

class NewNews extends News
{
    function __construct(
        $newsname,
        $info,
        $imagepath,
        $newdate
    ) {
        $this->newsname = $newsname;
        $this->info = $info;
        $this->imagepath = $imagepath;
        $this->newdate = $newdate;
    }

    function addToDb()
    {

        $pdo = Tools::connect();
        $ps = $pdo->prepare("INSERT INTO news (newsname,info,imagepath,newdate) VALUES (:newsname,:info,:imagepath,:newdate)");
        $add = (array)$this;
        array_shift($add);
        $ps->execute($add);
    }
}


class DeletionEditingNews
{

    public function getUpdateData($id)
    {
        $pdo = Tools::connect();
        $ps = $pdo->query("SELECT * FROM `news` WHERE `id` = '$id'");
        while ($row = $ps->fetch()) {
            $new = new News($row['newsname'], $row['info'], $row['imagepath'], $row['newdate'], $row['id']);
            $news[] = $new;
        }
        return  $news;
    }

    public function drawUpdateData($news_id)
    {
        $news = $news_id[0];
        echo '<div style="margin-top: 120px; max-width:60vw; min-height:78vh" class="container">
        <h3>Update News</h3>';
        echo '<form class="form-group" action="" enctype="multipart/form-data" method="post" id="update_news_form">';
        echo "<input type='hidden' name='id' value='{$news->id}'>";
        echo '<label for="update_theme">Тема Новости</label>';
        echo "<input id='update_theme' class='form-control' type='text' name='newsname' value=' {$news->newsname}'><label for='update_desc'>Описание новости</label>";

        echo "<textarea id='update_desc' class='form-control' name='info'>{$news->info}</textarea><label for='update_date'>Дата</label>
        <input id='update_date' class='form-control' type='date' name='date' value='{$news->newdate}'><br><div> Картинка новости</div>";
        echo "<img class='card-img-top picture' style='width:20vw' src='{$news->imagepath}' alt=''><br><br><input id='update_img' type='file' accept='image/*' name='imagepath' value='{$news->imagepath}'>
        <br>
        <br>
        <button type='submit' name='update_news' class='btn btn-info' disabled>Update</button>
        <button type='submit' class='btn btn-danger' disabled>Cancel</button>
    </form>
    </div>'";
        echo "<script>
      $(document).ready(function() {
          $('#update_news_form').on('change', function() {
              $('#update_news_form button').prop('disabled', false);
          });
      });
  </script>";
    }
    function updateToDb($newsname, $info, $imagepath, $newdate, $id)
    {

        $pdo = Tools::connect();
        $sql = "UPDATE `news` SET `newsname`=:newsname, `info`=:info, `imagepath`=:imagepath, `newdate`=:newdate WHERE `id`=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':newsname', $newsname);
        $stmt->bindParam(':info', $info);
        $stmt->bindParam(':imagepath', $imagepath);
        $stmt->bindParam(':newdate', $newdate);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    static function drawFormToDeleteNews()
    {

        $pdo = Tools::connect();
        $ps = $pdo->query("SELECT * FROM news");
        while ($row = $ps->fetch()) {
            echo "<option value='{$row["id"]}'>'{$row["newsname"]}'</option>";
        }
        echo "<script>
                            $(document).ready(function(){
                            $('#news_name').on('change', function() {
                            $('#del_news input[type=submit]').prop('disabled', false);
                            });});</script>";
        echo "<script>
                            $(document).ready(function() {
                                $('#del_news_button').click(function() {
                                    return confirm('Do you want to Delete ?');
                                });
                            });
                        </script>";
    }


    static function deleteNews()
    {
        try {
            $pdo = Tools::connect();
            $ps = $pdo->prepare("DELETE FROM `news` WHERE id = :id");
            $ps->bindParam(':id', $id);
            $id = $_POST['news_name'];
            $ps->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}


class Categories
{


    static function selectCategory()
    {
        $pdo = Tools::connect();
        $ps = $pdo->query("SELECT * FROM categories");
        while ($row = $ps->fetch()) {
            echo "<option value='{$row["id"]}'>{$row['category']}</option>";
        }
    }

    static function addCategory($category)
    {
        try {
            $pdo = Tools::connect();
            $ps = $pdo->prepare("INSERT INTO `categories` (`category`) VALUES (:category)");
            $ps->bindParam(':category', $category);
            $ps->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    static function deleteCat()
    {

        try {
            $catid = $_POST['catid'];
            $pdo = Tools::connect();
            $ps = $pdo->prepare("DELETE FROM `categories` WHERE id = :catid");
            $ps->bindParam(':catid', $catid);
            $ps->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
