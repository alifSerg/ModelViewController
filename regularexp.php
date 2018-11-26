<?php
//Regular expressions
//Preg_match & Preg_replace

/*
- Preg_match - функция для поиска соответствий, принимает несколько параметров
  1)Строка, в которой будет выполняться поиск
  2)Параметр, согласно которому будет выполняться поиск
- Возвращает True либо False
- $pattern - шаблон поиска, содержит регулярное выражение
*/
echo 'РЕГУЛЯРНЫЕ ВЫРАЖЕНИЯ, см.КОД.'.'<br>';
echo 'НЕ РАССМОТРЕНА ФУНКЦИЯ preg_replace';
die;
$string = 'Ученик сидит за партой.';
$pattern = '/Ученик/';

$result = preg_match($pattern, $string);

var_dump($result);

$string = 'Он закончил школу в 2000 году. Стал студентом в 2002.';
$pattern = '/2000/';

$result = preg_match($pattern, $string);

var_dump($result);

//Можно использовать диапазон чисел
//'/200[0-5]/' - поиск совпадения в последней цифре числа 2000 в диапазоне от 0 до 5
//Диапазон определяет значение только для одного символа
$string = 'Он закончил школу в 2000 году. Стал студентом в 2002.';
$pattern = '/200[0-5]/';

$result = preg_match($pattern, $string);

var_dump($result);

//Поиск по последней цифре числа 2000 (или 5 или 8 или 9)
//Регулярное выражение ищет такие значения: 2005, 2008, 2009
$string = 'Он закончил школу в 2000 году. Стал студентом в 2002.';
$pattern = '/200[5, 8, 9]/';

$result = preg_match($pattern, $string);

var_dump($result);

//поиск по каждой цифре чисел в диапазоне от 0 до 9
//каждый диапазон отвечает за один символ
$string = '0000, 9999.';
$pattern = '/[0-9][0-9][0-9][0-9]/';

$result = preg_match($pattern, $string);

var_dump($result);

//                             КВАНТИФИКАТОРЫ

//Необходимы для обработки повторяющихся символов в строке
// '/p/' Поиск соответсвия сивола 'p'
$string = 'Apples and oranges';
$pattern = '/p/';

$result = preg_match($pattern, $string);

var_dump($result);

//'/pp/' Такая запись означает что preg_match ищет соответствие повторяющегося в одном месте символа 'p'
$string = 'Apples and oranges';
$pattern = '/pp/';

$result = preg_match($pattern, $string);

var_dump($result);

//то же самое что '/pp/'
$string = 'Apples and oranges';
$pattern = '/p{2}/';

$result = preg_match($pattern, $string);

var_dump($result);

// '/p{3,5}/' - поиск от 3х до 5ти символов 'p' подряд
$string = 'Apples and oranges pppp';
$pattern = '/p{3,5}/';

$result = preg_match($pattern, $string);

var_dump($result);

// '/p{1,}/' - поиск от 1го или более символов 'p' подряд
$string = 'Apples and oranges pppp';
$pattern = '/p{3,5}/';

$result = preg_match($pattern, $string);

var_dump($result);

//Квантификаторы можно применять и к диапазону цифр
//Будет искать цифры состоящие из 2х знаков, например 22
$string = 'Apples and oranges pppp 22';
$pattern = '/[0-9]{1,2}/';

$result = preg_match($pattern, $string);

var_dump($result);

//Любое количество цифр от 0 до 9
$string = 'Apples and oranges pppp 22';
$pattern = '/[0-9]+/';

$result = preg_match($pattern, $string);

var_dump($result);
?>