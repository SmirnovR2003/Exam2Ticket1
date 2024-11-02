<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$arComponentParameters = array(
	"PARAMETERS" => array(
		"PRODUCTS_IBLOCK_ID" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("SIMPLECOMP_EXAM2_CAT_IBLOCK_ID"),
			"TYPE" => "STRING",
		),
		"NEWS_IBLOCK_ID" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("SIMPLECOMP_EXAM2_NEWS_IBLOCK_ID"),
			"TYPE" => "STRING",
		),
		"UF_LINK" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("SIMPLECOMP_EXAM2_UF_LINK"),
			"TYPE" => "STRING",
		),
		"CACHE_TIME"  =>  Array("DEFAULT"=>360000),
	),
);