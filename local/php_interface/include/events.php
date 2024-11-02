<?
//Обработчик в файле /bitrix/php_interface/init.php
AddEventHandler("main", "OnBeforeEventAdd", array("MyClass", "OnBeforeEventAddHandler"));
class MyClass
{
	public static function OnBeforeEventAddHandler(&$event, &$lid, &$arFields)
	{
        if($event == "FEEDBACK_FORM")
        {
            global $USER;
            if($USER->IsAuthorized())
            {
                $arFields["AUTHOR"] = GetMessage(
                    "USER_AUTHORIZED", 
                    [
                        "#ID#"=>$USER->GetID(),
                        "#LOGIN#"=>$USER->GetLogin(),
                        "#FULL_NAME#"=>$USER->GetFullName(),
                        "#NAME#"=>$arFields["AUTHOR"],
                    ]);
            }
            else
            {
                $arFields["AUTHOR"] = GetMessage("USER_NOT_AUTHORIZED", ["#NAME#"=>$arFields["AUTHOR"]]);

            }

            CEventLog::Add(array(
                'SEVERITY' => 'INFO',
                'AUDIT_TYPE_ID' => 'FEEDBACK_FORM',
                'MODULE_ID' => 'main',
                'DESCRIPTION' =>  GetMessage("FEEDDBACK_LOG", ["#AUTHOR#"=>$arFields["AUTHOR"]]),
            )
            );
        }
	}
}
?>