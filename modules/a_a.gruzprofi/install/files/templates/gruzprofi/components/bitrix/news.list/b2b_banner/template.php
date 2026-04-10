<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

// Если нет элементов - ничего не выводим
if (empty($arResult["ITEMS"])) {
    return;
}

// Если элементы есть, обрабатываем первый
$arItem = $arResult["ITEMS"][0];


// Безопасно получаем название
$title = "";
if (!empty($arItem["NAME"]) && is_string($arItem["NAME"])) {
    $title = $arItem["NAME"];
} else {
    $title = "Надежный партнер для бизнеса";
}

// Безопасно получаем подзаголовок
$subtitle = "";
// Проверяем PREVIEW_TEXT
if (!empty($arItem["PREVIEW_TEXT"]) && is_string($arItem["PREVIEW_TEXT"])) {
    $subtitle = $arItem["PREVIEW_TEXT"];
}
// Проверяем свойство SUBTITLE
if (empty($subtitle) && !empty($arItem["PROPERTIES"]["SUBTITLE"]["VALUE"])) {
    $val = $arItem["PROPERTIES"]["SUBTITLE"]["VALUE"];
    if (is_string($val)) {
        $subtitle = $val;
    } elseif (is_array($val) && isset($val[0]) && is_string($val[0])) {
        $subtitle = $val[0];
    }
}
if (empty($subtitle)) {
    $subtitle = "Организуем офисные переезды под ключ, доставляем товары селлеров на склады маркетплейсов (Wildberries, Ozon), развозим стройматериалы.";
}

// Безопасно получаем преимущества
$benefits = [];
if (!empty($arItem["PROPERTIES"]["BENEFITS"]["VALUE"])) {
    $val = $arItem["PROPERTIES"]["BENEFITS"]["VALUE"];
    if (is_array($val)) {
        foreach ($val as $v) {
            if (is_string($v) && !empty(trim($v))) {
                $benefits[] = trim($v);
            }
        }
    } elseif (is_string($val) && !empty(trim($val))) {
        $benefits[] = trim($val);
    }
}
if (empty($benefits)) {
    $benefits = [
        "Электронный документооборот (ЭДО)",
        "Безнал с НДС 20% / без НДС",
        "Персональный менеджер"
    ];
}

// Безопасно получаем ссылку
$tgLink = "";
if (!empty($arItem["PROPERTIES"]["TG_LINK"]["VALUE"])) {
    $val = $arItem["PROPERTIES"]["TG_LINK"]["VALUE"];
    if (is_string($val)) {
        $tgLink = $val;
    } elseif (is_array($val) && isset($val[0]) && is_string($val[0])) {
        $tgLink = $val[0];
    }
}
if (empty($tgLink)) {
    $tgLink = "/local/include/telegram.php";
// Или если нужно получить именно URL из файла:
ob_start();
include($_SERVER["DOCUMENT_ROOT"] . "/local/include/telegram.php");
$telegramContent = ob_get_clean();

// Извлекаем ссылку из содержимого
preg_match('/href="([^"]+)"/', $telegramContent, $matches);
$tgLink = $matches[1] ?? "https://t.me/username";
}

// Безопасно получаем текст кнопки
$btnText = "";
if (!empty($arItem["PROPERTIES"]["BTN_TEXT"]["VALUE"])) {
    $val = $arItem["PROPERTIES"]["BTN_TEXT"]["VALUE"];
    if (is_string($val)) {
        $btnText = $val;
    } elseif (is_array($val) && isset($val[0]) && is_string($val[0])) {
        $btnText = $val[0];
    }
}
if (empty($btnText)) {
    $btnText = "Получить прайс для юрлиц";
}

// Выводим баннер
?>
<div class="b2b-banner">
    <div class="b2b-content">
        <h2><?= htmlspecialchars($title) ?></h2>
        <p><?= htmlspecialchars($subtitle) ?></p>
        
        <?php if (!empty($benefits)): ?>
            <div class="b2b-tags">
                <?php foreach ($benefits as $benefit): ?>
                    <div class="b2b-tag"><?= htmlspecialchars($benefit) ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    
    <div>
        <a href="<?= htmlspecialchars($tgLink) ?>" target="_blank" rel="noopener" class="btn btn-primary">
            <?= htmlspecialchars($btnText) ?>
        </a>
    </div>
</div>