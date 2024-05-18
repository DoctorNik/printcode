

<?php

$news_id = $_GET['id'];
$news_update = new DeletionEditingNews;
$out_news = $news_update->getUpdateData($news_id);
$news_update->drawUpdateData($out_news);

include_once("footer.php");

if (isset($_POST['update_news'])) {

    if ($_FILES['imagepath']['tmp_name'] != null) {
        $path = "./img/news/" . $_FILES['imagepath']['name'];
        move_uploaded_file($_FILES['imagepath']['tmp_name'], $path);
    } else {
        $id = $_POST['id'];
        $user_props = $news_update->getUpdateData($id);
        $path = $user_props[0]->imagepath;
    }
    $add = new DeletionEditingNews;
    $add->updateToDb(trim($_POST['newsname']), $_POST['info'], $path, $_POST['date'], $_POST['id']);
    echo '<script>window.location="../index.php"</script>';
}
