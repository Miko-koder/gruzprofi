<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

// Получаем логотип для разделения
ob_start();
$APPLICATION->IncludeFile(
    "/local/include/footer_logo.php",
    array(),
    array("MODE" => "text", "SHOW_BORDER" => false)
);
$LOGO_NAME = trim(ob_get_clean());
$logo_first = mb_substr($LOGO_NAME, 0, 4);
$logo_last = mb_substr($LOGO_NAME, 4);

$YEAR = date("Y");
?>

</main>

<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-col">
                <a href="/" class="logo" style="margin-bottom:20px;">
                    <?= htmlspecialchars($logo_first) ?>
                    <?php if($logo_last): ?>
                        <span><?= htmlspecialchars($logo_last) ?></span>
                    <?php endif; ?>
                </a>
                <p>
                    <?$APPLICATION->IncludeFile(
                        "/local/include/footer_text.php",
                        array(),
                        array("MODE" => "text", "SHOW_BORDER" => true, "NAME" => "Текст под логотипом")
                    );?>
                </p>
            </div>
            <div class="footer-col">
                <h4>
                    <?$APPLICATION->IncludeFile(
                        "/local/include/footer_contacts_title.php",
                        array(),
                        array("MODE" => "text", "SHOW_BORDER" => true, "NAME" => "Заголовок Контакты")
                    );?>
                </h4>
                <p>Телефон: 
                    <?$APPLICATION->IncludeFile(
                        "/local/include/footer_phone.php",
                        array(),
                        array("MODE" => "text", "SHOW_BORDER" => true, "NAME" => "Телефон в футере")
                    );?>
                </p>
                <p>Email: 
                    <?$APPLICATION->IncludeFile(
                        "/local/include/footer_email.php",
                        array(),
                        array("MODE" => "text", "SHOW_BORDER" => true, "NAME" => "Email в футере")
                    );?>
                </p>
                <p>Работаем: 
                    <?$APPLICATION->IncludeFile(
                        "/local/include/footer_work_hours.php",
                        array(),
                        array("MODE" => "text", "SHOW_BORDER" => true, "NAME" => "Часы работы в футере")
                    );?>
                </p>
            </div>
            <div class="footer-col">
                <h4>
                    <?$APPLICATION->IncludeFile(
                        "/local/include/footer_requisites_title.php",
                        array(),
                        array("MODE" => "text", "SHOW_BORDER" => true, "NAME" => "Заголовок Реквизиты")
                    );?>
                </h4>
                <p>
                    <?$APPLICATION->IncludeFile(
                        "/local/include/footer_company_name.php",
                        array(),
                        array("MODE" => "text", "SHOW_BORDER" => true, "NAME" => "Название компании")
                    );?>
                </p>
                <p>ИНН: 
                    <?$APPLICATION->IncludeFile(
                        "/local/include/footer_inn.php",
                        array(),
                        array("MODE" => "text", "SHOW_BORDER" => true, "NAME" => "ИНН")
                    );?>
                </p>
                <p>ОГРН: 
                    <?$APPLICATION->IncludeFile(
                        "/local/include/footer_ogrn.php",
                        array(),
                        array("MODE" => "text", "SHOW_BORDER" => true, "NAME" => "ОГРН")
                    );?>
                </p>
            </div>
        </div>
        <div class="footer-bottom">
            <div>
                &copy; <?= $YEAR ?> 
                <?= htmlspecialchars($logo_first) ?>
                <?php if($logo_last): ?><?= htmlspecialchars($logo_last) ?><?php endif; ?>. 
                <?$APPLICATION->IncludeFile(
                    "/local/include/footer_copyright.php",
                    array(),
                    array("MODE" => "text", "SHOW_BORDER" => true, "NAME" => "Текст копирайта")
                );?>
            </div>
            <div>
                <a href="/privacy/" style="color:inherit;">
                    <?$APPLICATION->IncludeFile(
                        "/local/include/footer_privacy.php",
                        array(),
                        array("MODE" => "text", "SHOW_BORDER" => true, "NAME" => "Ссылка на политику")
                    );?>
                </a>
            </div>
        </div>
    </div>
</footer>

<?$APPLICATION->IncludeFile(
    "/local/include/telegram.php",
    array(),
    array("MODE" => "html", "SHOW_BORDER" => true, "NAME" => "Telegram кнопка")
);?>

</body>
</html>