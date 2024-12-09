<?php
// 1. Реализовать основные 4 арифметические операции в виде функции 
// с тремя параметрами – два параметра это числа, третий – операция. 
// Обязательно использовать оператор return.

function mathOperathon($num1, $num2, $operation){
    switch ($operation) {
    case '+':
        return $num1 + $num2;
    case '-':
        return $num1 - $num2;
    case '*':
        return $num1 * $num2;
    case '/':
        return ($num2 !=  0) ? $num1 / $num2 : "Делить на ноль нельзя";
    default:
        echo 'Введен неверный тип операции!';
    break;
}
}
$choise = mathOperathon(16,4,'/');
var_dump($choise);