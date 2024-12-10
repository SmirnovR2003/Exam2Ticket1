<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader,
	Bitrix\Iblock;

if (!Loader::includeModule("iblock")) {
	ShowError(GetMessage("SIMPLECOMP_EXAM2_IBLOCK_MODULE_NONE"));
	return;
}

if (
	intval($arParams["PRODUCTS_IBLOCK_ID"]) > 0
	&& intval($arParams["NEWS_IBLOCK_ID"]) > 0
	&& isset($arParams["UF_LINK"])
) {
	if ($this->StartResultCache()) {

		$arResult["NEWS"] = [];
		$newsIds = [];
		$rsElements = CIBlockElement::GetList(
			[],
			[
				"IBLOCK_ID" => $arParams["NEWS_IBLOCK_ID"],
				"ACTIVE" => "Y"
			],
			false,
			false,
			[
				"ID",
				"NAME",
				"ACTIVE_FROM"
			],
		);
		while ($arElement = $rsElements->GetNext()) {
			$arResult["NEWS"][$arElement["ID"]] = $arElement;
			$newsIds[] = $arElement["ID"];
		}


		$sectionsIds = [];
		$rsSections = CIBlockSection::GetList(
			[], 
			[
				"IBLOCK_ID" => $arParams["PRODUCTS_IBLOCK_ID"],
				$arParams["UF_LINK"] => $newsIds,
				"ACTIVE" => "Y"
			], 
			false, 
			[
				"ID",
				"NAME",
				$arParams["UF_LINK"]
			], 
			false
		);
		while ($arSection = $rsSections->GetNext()) {
			foreach($arSection[$arParams["UF_LINK"]] as $key => $value)
			{
				$arResult["NEWS"][$value]["SECTIONS"][$arSection["ID"]] = $arSection;
				$sectionsIds[] = $arSection["ID"];
			}
		}

		$productsIds = [];
		$rsElements = CIBlockElement::GetList(
			[],
			[
				"IBLOCK_ID" => $arParams["PRODUCTS_IBLOCK_ID"],
				"IBLOCK_SECTION_ID" => $sectionsIds,
				"ACTIVE" => "Y"
			],
			false,
			false,
			[
				"ID",
				"NAME",
				"IBLOCK_SECTION_ID",
				"PROPERTY_MATERIAL",
				"PROPERTY_PRICE",
				"PROPERTY_ARTNUMBER",
			],
		);
		while ($arElement = $rsElements->GetNext()) {

			foreach ($arResult["NEWS"] as $key => $new) {
				foreach ($new["SECTIONS"] as $secKey => $sec) {
					if($arElement["IBLOCK_SECTION_ID"] == $secKey)
					{
						$arResult["NEWS"][$key]["ITEMS"][] = $arElement;
					}
				}
			}
			$productsIds[] = $arElement["ID"];

		}

		$arResult["PRODUCTS_COUNT"] = count($productsIds);

		$this->SetResultCacheKeys(["PRODUCTS_COUNT"]);
		$this->includeComponentTemplate();
	}
}


$APPLICATION->SetTitle(GetMessage("SIMPLECOMP_EXAM2_PRODUCTS_COUNT",["#COUNT#" => $arResult["PRODUCTS_COUNT"]]));