<?php
include_once ('classes.php');
$pdo = Tools::connect();
$news = 'CREATE TABLE news(
    id int not null auto_increment primary key,
    newsname varchar(128) not null,
    info varchar(1024) not null,
    imagepath varchar(255) not null,
    newdate varchar(128) not null,
    action int
    )default charset="utf8"';
 $user = 'CREATE TABLE roles(
        id int not null auto_increment primary key,
        login varchar(32) unique,
        pass varchar(64),
        role varchar(32))default charset="utf8"';

$categories = 'CREATE TABLE categories(
     id int not null auto_increment primary key,
    category varchar(200))default charset="utf8"';
    
// $pdo->exec($user);
//  $pdo->exec($news);
// $pdo->exec($categories);