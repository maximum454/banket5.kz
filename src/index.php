<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<div class="mfeedback">
    <? if (!empty($arResult["ERROR_MESSAGE"])) {
        foreach ($arResult["ERROR_MESSAGE"] as $v)
            ShowError($v);
    }
    if (strlen($arResult["OK_MESSAGE"]) > 0) {
        ?>
        <div class="mf-ok-text"><?= $arResult["OK_MESSAGE"] ?></div><?
    }
    ?>

    <form class="feedback__form" action="<?= POST_FORM_ACTION_URI ?>" method="POST">
        <?= bitrix_sessid_post() ?>
        <div class="modal-body">
            <div class="row">
                <div class="modal__header">ЗАказать обратный звонок</div>
            </div>
            <div class="row">
                <div class="modal__item col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="user_name" value="<?= $arResult["AUTHOR_NAME"] ?>" placeholder="Ваше имя">
                </div>
                <div class="modal__item col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="user_phone" value=""
                           placeholder="Контактный телефон">
                </div>
            </div>
            <div class="row">
                <div class="modal__item col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="user_email" value=""
                           placeholder="Электроннная почта">
                </div>
                <div class="modal__item col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <? if ($arParams["USE_CAPTCHA"] == "Y"): ?>
                        <div class="mf-captcha">
                            <div class="mf-text"><?= GetMessage("MFT_CAPTCHA") ?></div>
                            <input type="hidden" name="captcha_sid" value="<?= $arResult["capCode"] ?>">
                            <img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["capCode"] ?>" width="180" height="40"
                                 alt="CAPTCHA">
                            <div class="mf-text"><?= GetMessage("MFT_CAPTCHA_CODE") ?><span class="mf-req">*</span></div>
                            <input type="text" name="captcha_word" size="30" maxlength="50" value="">
                        </div>
                    <? endif; ?>
                    <input type="hidden" name="PARAMS_HASH" value="<?= $arResult["PARAMS_HASH"] ?>">
                    <input type="submit" name="submit" value="<?= GetMessage("MFT_SUBMIT") ?>">
                </div>
            </div>
        </div>
    </form>
</div>