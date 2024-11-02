<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
---
<br>
<p><b><?= GetMessage("SIMPLECOMP_EXAM2_CAT_TITLE") ?>:</b></p>
<? if (count($arResult["NEWS"])) { ?>
    <ul>
        <? foreach ($arResult["NEWS"] as $key => $new) { ?>
            <li>
                <b><?= $new["NAME"] ?></b> - <?= $new["ACTIVE_FROM"] ?> (
                <? foreach ($new["SECTIONS"] as $sec) {
                    echo $sec["NAME"];
                    if (end($new["SECTIONS"]) != $sec) echo ", ";
                } ?>
                )
                <? if (count($new["ITEMS"])) {?>
                    <ul>
                    <?foreach ($new["ITEMS"] as $itemKey => $item) {?>
                        <li>
                            <?=$item["NAME"]?> -
                            <?=$item["PROPERTY_PRICE_VALUE"]?> -
                            <?=$item["PROPERTY_MATERIAL_VALUE"]?> -
                            <?=$item["PROPERTY_ARTNUMBER_VALUE"]?> 
                        </li>
                    <?}?>
                    </ul>
                <?}
                ?>
            </li>

        <? } ?>
    </ul>



<? } ?>