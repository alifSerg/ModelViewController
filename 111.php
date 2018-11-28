<?php

$string = 'Марсоки обоссаные петухи. А слюдер верблюдок. По этому стратежка пижже';
$pattern = '/[^.-п]/';

$result = preg_match($pattern, $string);

var_dump($result);

?>
