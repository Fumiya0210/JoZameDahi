create database jozamedahi4_php;
grant all on jozamedahi4_php.* to dbuser@localhost identified by 'f1kubey3';
use jozamedahi3_php

create table entriey3 ( 
    id int not null auto_increment primary key, 
    name varchar(255),
    email varchar(255),
    memo text, 
    created datetime, 
    modified datetime 
);
define('DSN','mysql:host=localhost;dbname=jozamedahi4_php');
define('DB_USER', 'dbuser');
define('DB_PASSWORD', 'f1kubey3');
define('SITE_URL', 'https://fumiya0210.github.io/JoZameDahi/');
define('ADMIN_URL', SITE_URL.'admin/');
error_reporting(E_ALL & ~E_NOTICE);
session_set_cookie_params(0, '/jozamedahi4_php/');