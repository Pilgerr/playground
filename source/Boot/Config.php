<?php
// Definição de todas as constantes do sistema
// Esse script consta no composer.json para ser incluido automaticamente

// DATABASE

define("CONF_DB_HOST", "localhost");
define("CONF_DB_USER", "root");
define("CONF_DB_PASS", "");
define("CONF_DB_NAME", "bd-playground"); // aqui deve ser alterado para o nome do banco de dados


// PROJECT URLs

define("CONF_URL_BASE", "http://www.localhost/playground"); // depois da / deve vir o nome da pasta do trabalho
define("CONF_URL_TEST", "http://www.localhost/playground"); // depois da / deve vir o nome da pasta do trabalho

// VIEW

define("CONF_VIEW_WEB", __DIR__ . "/../../themes/web");
define("CONF_VIEW_APP", __DIR__ . "/../../themes/app");
define("CONF_VIEW_ADM", __DIR__ . "/../../themes/adm");


// SITE

define("CONF_SITE_NAME", "Play Ground®");
define("CONF_SITE_FAVICON", "assets/svg/favicon.svg");
define("CONF_SITE_LOGO", "https://i.im.ge/2022/08/16/OOE4hC.logo-play.png");