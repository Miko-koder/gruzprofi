<?php
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;

Loc::loadMessages(__FILE__);

class mycompany_gruzprofi extends CModule
{
    public $MODULE_ID = 'a_a.gruzprofi';
    public $MODULE_VERSION;
    public $MODULE_VERSION_DATE;
    public $MODULE_NAME;
    public $MODULE_DESCRIPTION;
    public $PARTNER_NAME = "A&A";
    public $PARTNER_URI = "https://gruzprofi.ru";

    public function __construct()
    {
        $arModuleVersion = [];
        include(__DIR__ . '/version.php');
        
        $this->MODULE_VERSION = $arModuleVersion['VERSION'];
        $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        $this->MODULE_NAME = "ГрузПрофи - Готовый сайт грузоперевозок";
        $this->MODULE_DESCRIPTION = "Установка лендинга грузоперевозок с калькулятором, автопарком и отзывами";
    }

    public function DoInstall()
    {
        global $APPLICATION, $step;
        
        ModuleManager::registerModule($this->MODULE_ID);
        
        // Копируем файлы шаблона
        $this->InstallFiles();
        
        $step = intval($step);
        if ($step < 2) {
            $APPLICATION->IncludeAdminFile(
                Loc::getMessage("MYCOMPANY_GRUZPROFI_INSTALL_TITLE"), 
                __DIR__ . "/step1.php"
            );
        } elseif ($step == 2) {
            $this->InstallWizard();
        }
    }

    public function DoUninstall()
    {
        // Удаляем файлы шаблона
        DeleteDirFilesEx("/local/templates/gruzprofi/");
        DeleteDirFilesEx("/local/include/gruzprofi/");
        
        ModuleManager::unRegisterModule($this->MODULE_ID);
    }

    public function InstallFiles()
    {
        // Копируем шаблон сайта
        CopyDirFiles(
            __DIR__ . "/files/templates/gruzprofi",
            $_SERVER["DOCUMENT_ROOT"] . "/local/templates/gruzprofi",
            true,
            true
        );
        
        // Копируем включаемые области
        CopyDirFiles(
            __DIR__ . "/files/templates/gruzprofi/include_areas",
            $_SERVER["DOCUMENT_ROOT"] . "/local/include",
            true,
            true
        );
        
        return true;
    }

    public function InstallWizard()
    {
        global $APPLICATION;
        
        // Запускаем мастер установки
        LocalRedirect("/bitrix/admin/wizard_install.php?lang=" . LANGUAGE_ID . "&wizardName=mycompany:gruzprofi&" . bitrix_sessid_get());
    }
}
?>