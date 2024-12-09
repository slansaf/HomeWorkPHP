<?php

/*2. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), 
где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости 
от переданного значения операции выполнить одну из арифметических операций (использовать функции 
из пункта 3) и вернуть полученное значение (использовать switch). */

function addition($arg1, $arg2){
    return $arg1 + $arg2;
};

function subtraction($arg1, $arg2){
    return $arg1 - $arg2;
};

function multiplication($arg1, $arg2){
    return $arg1 * $arg2;
};

function division($arg1, $arg2){
    if ($arg2 === 0) {
        throw new DivisionByZeroError('Деление на 0!' . "\n");
    }
    return $arg1 / $arg2;
};


function mathOperation($arg1, $arg2, $operation){
    switch ($operation) {
        case 'addition':
            return addition($arg1, $arg2);

        case 'subtraction':
            return subtraction($arg1, $arg2);
                
        case 'multiplication':
            return multiplication($arg1, $arg2);
            
        case 'division':
            return division($arg1, $arg2);
                    
        default:
            throw new InvalidArgumentException('Ввели неверное выражение!');
            break;
    }
};

try {
    var_dump(mathOperation(12, 5,'addition'));
    var_dump(mathOperation(12, 5,'subtraction'));
    var_dump(mathOperation(12, 5,'multiplication'));
    var_dump(mathOperation(12, 0,'division'));
} catch(DivisionByZeroError $e){
    echo 'Ошибка: ' . $e->getMessage() . '\n';
} catch(InvalidArgumentException $e){
    echo 'Ошибка: ' . $e->getMessage() . '\n';
}
