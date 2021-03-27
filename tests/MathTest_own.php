<?php
include __DIR__ . "/../services/Math.php";

$object = new \app\services\Math();
$errors = [];

/**
 * Тип возвращаемых данных
 * Значение соответсвует ожидаемому
 */

$a = 5;
$b = 7;

$result = $object->summ($a, $b);
if(!is_int($result)) {
    $errors[] = "Ожидалось целое число";
}

if($result != 12) {
    $errors[] = "Некорректный результат";
}

if(count($errors) > 0) {
    echo "test failed! \n";
    print_r($errors);
} else {
    echo "test successful";
}