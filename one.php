<?php
 
/**
 * ������� ���������� ������ ����������� ���������� �������
 * @param int $limit - ���������� ��������� �������
 * @param int $min - ����������� �������� �������� �������
 * @param int $max - ������������ ��������
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
 * ������� ��������� ������ �� ������ �� ��� ��������,
   ������  ������ �������������� � ������,
   ������ ���������� � ������.
 * array - �������� ���������� ������
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
 * ������� ������� ���������� ������ �� 
 * ������� ����� (������ �� 3-� ���������)
 * array - �������� ������
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
// ������ �� N ��������� ���������
$N = 10;
$A = array_fill_rand($N, 1, 5);
 
$s = div_array_3($A);
 
//����������
sort($s, SORT_STRING); 
 
print_r("�������� ������:\n");
print_r($A);
 
$rez = con_array_3($s);
 
//���������� ���������, ������ �� �������� ������
$dn = $N % 3;
//�������� �� ��������� ������� � ���������������, �������
while ($dn)
{
    $rez[$N - $dn] = $A[$N - $dn];
    $dn--;
}
print_r("��������������� ������:\n");
print_r($rez); 

?>
