<?

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>
<?=$arResult["FORM_NOTE"]?>
<?if ($arResult["isFormNote"] != "Y")
{
?>
<?=$arResult["FORM_HEADER"]?>
<div class="contact-form">
    <div class="contact-form__head">
		<div class="contact-form__head-title">
		<?
		if ($arResult["isFormTitle"])
		{
		?>
			<?=$arResult["FORM_TITLE"]?>
		<?
		} 

		?>
		  </div>
		
		<div class="contact-form__head-text">
			<?=$arResult["FORM_DESCRIPTION"]?>
		</div>

	
	</div>
<br />
<div class="contact-form__form" >
	<div class="contact-form__form-inputs">

	<?
	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
	{
		
		
	?>
		  <div class="input contact-form__input">
				<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
				<span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>"></span>
				<?endif;?>
				<? if($FIELD_SID!='medicine_message'):?>

					<label class="input__label" for="<?echo $FIELD_SID?>">
						<div class="input__label-text"><?=$arQuestion["CAPTION"]?>*</div>
						<?=$arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />".$arQuestion["IMAGE"]["HTML_CODE"] : ""?>
						<input class="input__input" type="text" id="<?echo $FIELD_SID?>" name="form_<?$arQuestion['STRUCTURE'][0]['FIELD_TYPE']?>_<?$arQuestion['STRUCTURE'][0]['ID']?>" value=""
						required="">
					</label>
				<?endif;?>
				
			
		</div>
		
	<?
		}
	} //endwhile
	?>
	</div>	
	<?
	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
	{
		
		
	?>
		<div class="contact-form__form-message">
            <div class="input">
				<? if($FIELD_SID=='medicine_message'):?>

					<label class="input__label" for="<?echo $FIELD_SID?>">
						<div class="input__label-text"><?=$arQuestion["CAPTION"]?></div>
						<?=$arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />".$arQuestion["IMAGE"]["HTML_CODE"] : ""?>
						<textarea class="input__input" type="text" id="<?echo $FIELD_SID?>" name="form_<?$arQuestion['STRUCTURE'][0]['FIELD_TYPE']?>_<?$arQuestion['STRUCTURE'][0]['ID']?>" value=""
						required=""></textarea>
					</label>
				<?endif;?>

                
        </div>
		<?
	}

	?>


	<div class="contact-form__bottom">
            <div class="contact-form__bottom-policy">Нажимая &laquo;Отправить&raquo;, Вы&nbsp;подтверждаете, что
                ознакомлены, полностью согласны и&nbsp;принимаете условия &laquo;Согласия на&nbsp;обработку персональных
                данных&raquo;.
            </div>
			<button <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" class="form-button contact-form__bottom-button" data-success="Отправлено"
                    data-error="Ошибка отправки">
                <div class="form-button__title">Оставить заявку</div>
            </button>
				
	</div>			
				
	</div>	

<?=$arResult["FORM_FOOTER"]?>
</div>




