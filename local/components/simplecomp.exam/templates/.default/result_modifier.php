<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

foreach ($arResult["NEWS"] as $key => $new) {
    foreach ($new["ITEMS"] as $key => $item) {
        if(!isset($arResult["MIN_PRICE"]))
        {
            $arResult["MAX_PRICE"] = $item["PROPERTY_PRICE_VALUE"];
            $arResult["MIN_PRICE"] = $item["PROPERTY_PRICE_VALUE"];
        }
        if($arResult["MIN_PRICE"] > $item["PROPERTY_PRICE_VALUE"])
        {
            $arResult["MIN_PRICE"] = $item["PROPERTY_PRICE_VALUE"];
        }
        if($arResult["MAX_PRICE"] < $item["PROPERTY_PRICE_VALUE"])
        {
            $arResult["MAX_PRICE"] = $item["PROPERTY_PRICE_VALUE"];
        }
    }
}

if(isset($arResult["MIN_PRICE"]) && isset($arResult["MAX_PRICE"]))
{
    $this->__component->setResultCacheKeys(["MIN_PRICE", "MAX_PRICE"]);
}
