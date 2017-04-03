<?php

require realpath(__DIR__).'/vendor/autoload.php';

$reportForm = array(

    'name' => array(
        'max' => 55,
        'about' => 'nombre del reporte'
    ),

    'date_begin' => array(
        'use' => 'datefield',
        'default' => date('Y-m-d'),
        'about' => 'fecha inicio'
    ),

    'date_end' => array(
        'use' => 'datefield',
        'default' => date('Y-m-d'),
        'about' => 'fecha fin'
    ),

    'email' => array(
        'about' => 'correo electronico a notificar'
    ),

    'option_employers' => array(
        'max' => '1',
        'about' => 'incluir empleados con baja'
    ),

);

use lib\Render;

$templates_path = realpath(__DIR__) . '/templates';
$render = new Render($templates_path);
echo $render->compile($reportForm);
?>

<style>
html,body {
    font-family: "Open Sans", sans-serif;
}
label {
    font-weight: bolder;
}
input {
    width: 400px;
    margin: 5px 0 30px;
    padding: 5px 10px;
    font-size:16px;
}
</style>
