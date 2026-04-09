<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?$APPLICATION->ShowTitle()?></title>
    <?$APPLICATION->ShowHead()?>
    <style>
        /* Убираем синий цвет у ссылок */
        .header a, .phone {
            color: inherit;
            text-decoration: none;
        }
        /* Стили для логотипа */
        .logo {
            font-size: 24px;
            font-weight: bold;
        }
        .logo span {
            color: #FFD500;
        }
    </style>
</head>
<body>

<div id="panel"><?$APPLICATION->ShowPanel();?></div>

<header class="header">
    <div class="container header__inner">
        <!-- Логотип - целиком включаемая область -->
        <?$APPLICATION->IncludeFile(
            "/local/include/logo.php",
            array(),
            array(
                "MODE" => "html",
                "SHOW_BORDER" => true,
                "NAME" => "Логотип"
            )
        );?>
        
        <div class="header__info">
            <div class="work-time">
                Работаем 
                <?$APPLICATION->IncludeFile(
                    "/local/include/work_hours.php",
                    array(),
                    array(
                        "MODE" => "text",
                        "SHOW_BORDER" => true,
                        "NAME" => "Часы работы"
                    )
                );?>
            </div>
            <div class="contact-block">
                <?$APPLICATION->IncludeFile(
                    "/local/include/phone.php",
                    array(),
                    array(
                        "MODE" => "html",
                        "SHOW_BORDER" => true,
                        "NAME" => "Телефон"
                    )
                );?>
                <a href="#calc" class="callback-link">Заказать звонок</a>
            </div>
            <?$APPLICATION->IncludeFile(
                "/local/include/telegram.php",
                array(),
                array(
                    "MODE" => "html",
                    "SHOW_BORDER" => true,
                    "NAME" => "Telegram"
                )
            );?>
        </div>
    </div>
</header>

<main>