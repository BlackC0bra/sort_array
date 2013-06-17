<?php
 
/**
 * Функция генерирует массив заполненный случайными числами
 * @param int $limit - количество элементов массива
 * @param int $min - минимальное значение элемента массива
 * @param int $max - максимальное значение
 * @return $array
 */
 
function array_fill_rand($limit, $min = false, $max = false)
{
    $limit = (int)$limit;
    $array = array();
    
    if ($min !== false && $max !== false)
    {
        $min = (int)$min;
        $max = (int)$max;
        for ($i=0; $i < $limit; $i++)
        {
            $array[$i] = rand($min, $max);
        }
    }
    else
    {
        for ($i=0; $i < $limit; $i++)
        {
            $array[$i] = rand();
        }
    }
    
    return $array;
}
/**
 * Функция разбивает массив на группы по три элемента,
   каждая  группа конвертируется в строку,
   строки собираются в массив.
 * array - исходный одномерный массив
 *@return str_array
*/
function div_array_3($array)
{
    $str_array = array();
    $n = count($array);
    $k = 0;
    for($i = 2; $i < $n; $i += 3)
    {
        $str_array[$k]  = (string)$array[$i];
        $str_array[$k] .= (string)$array[$i - 1];
        $str_array[$k] .= (string)$array[$i - 2];
        $k++;
    }  
    return $str_array;
}
/**
 * Функция создает одномерный массив из 
 * массива строк (строка из 3-х элементов)
 * array - исходный массив
 * @return out_array
*/
 
function con_array_3($array)
{
    $out_array = array();
    $k = 0;
    foreach($array as $a)
    {
        $out_array[$k] = (int)$a[2]; 
        $out_array[$k + 1] = (int)$a[1]; 
        $out_array[$k + 2] = (int)$a[0];
        $k += 3;
    }
    return $out_array;
}
// Массив из N случайных элементов
$N = 10;
$A = array_fill_rand($N, 1, 5);
 
$s = div_array_3($A);
 
//сортировка
sort($s, SORT_STRING); 
 
print_r("Исходный массив:\n");
print_r($A);
 
$rez = con_array_3($s);
 
//количество элементов, котрые не образуют тройку
$dn = $N % 3;
//копируем из исходного массива в отсортированный, остатки
while ($dn)
{
    $rez[$N - $dn] = $A[$N - $dn];
    $dn--;
}
print_r("Отсортированный массив:\n");
print_r($rez); 

?>
