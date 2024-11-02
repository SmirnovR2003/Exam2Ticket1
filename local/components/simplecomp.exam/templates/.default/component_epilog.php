<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (isset($arResult["MIN_PRICE"]) && isset($arResult["MAX_PRICE"])) {
    $sideText = GetMessage("SIMPLECOMP_EXAM2_SIDE_TEXT_MIN_PRICE", ["#PRICE#" => $arResult["MIN_PRICE"]])
        . "</br>" 
        . GetMessage("SIMPLECOMP_EXAM2_SIDE_TEXT_MAX_PRICE", ["#PRICE#" => $arResult["MAX_PRICE"]]);


    $sideText = GetMessage("SIMPLECOMP_EXAM2_SIDE_TEXT", ["#TEXT#" => $sideText]);

    $APPLICATION->AddViewContent("MIN_MAX_PRICE", $sideText);
}
