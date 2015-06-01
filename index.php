<!DOCTYPE>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    </head>
<body>
<?php

function autoload($name)
{
    $name = str_replace("FrameworkWidget\\", "", str_replace("\\", DIRECTORY_SEPARATOR, $name));
    require_once('.'.DIRECTORY_SEPARATOR.$name.'.php');
}

spl_autoload_register('autoload');

use FrameworkWidget\Widgets\WidgetsText\WidgetEmail;
use FrameworkWidget\Widgets\WidgetsText\WidgetTel;
use FrameworkWidget\Form;


use FrameworkWidget\Widgets\WidgetAdress;

use \Exception;

$_form = new Form("index.php", "Post");

$_widgetEmail = new WidgetEmail("Email", "Email : ");
$_widgetPhone = new WidgetTel("Phone", "Téléphone : ");
$_widgetCellPhone = new WidgetTel("CellPhone", "Téléphone portable : ");

$_widgetAdress = new WidgetAdress("Adresse", "Adresse : ");

$_form->add($_widgetEmail);
$_form->add($_widgetPhone);
$_form->add($_widgetCellPhone);
$_form->add($_widgetAdress);

if($_POST!=null)
{
    $_form->bind($_POST);
    $_form->isValid();
}

echo $_form->render();

    
?>
</body></html>