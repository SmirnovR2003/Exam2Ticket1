<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Экзамен2");
?><?$APPLICATION->IncludeComponent(
	"simplecomp.exam",
	"",
	Array(
		"CACHE_TIME" => "360000",
		"CACHE_TYPE" => "A",
		"NEWS_IBLOCK_ID" => "1",
		"PRODUCTS_IBLOCK_ID" => "2",
		"UF_LINK" => "UF_NEWS_LINK"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>