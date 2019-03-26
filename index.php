<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HomeWork4_4</title>
</head>
<body>
<h2>Работа со строкой</h2>
<h4>Создание сокращенного варианта ФИО.</h4>
<p>Например, вводим: Иванов Иван Петрович, а в результате должны получить: Иванов И. П.</p>
<p><b>1 - с использованием только функций для работы со строками</b></p>
<?php
//Первый вариант для получения сокращенного ФИО с помощью строковых функций
$fioFull = "Иванов Иван Петрович";
list($lastName, $firstName, $secondName) = sscanf(trim($fioFull), "%s %s %s");
printf("%s %s %s", $lastName, mb_substr($firstName, 0, 1).".", mb_substr($secondName, 0, 1).".");
echo "<br>";

//Второй вариант для получения сокращенного ФИО с помощью строковых функций
$fioFullVariantTwo = "Первомайский Иван Петрович";
$secondNameVT = strrchr($fioFullVariantTwo, " ");
$fioFullVariantTwoPartLeft = str_replace($secondNameVT, "", $fioFullVariantTwo);
$firstNameVT = strrchr($fioFullVariantTwoPartLeft, " ");
$lastNameVT = str_replace($firstNameVT, "", $fioFullVariantTwoPartLeft);
printf("%s %s %s", $lastNameVT, mb_substr($firstNameVT, 1,1).".", mb_substr($secondNameVT, 1, 1).".");
echo "<br>";

//Третий вариант для получения сокращенного ФИО с помощью строковых функций
$fioFullVariantThree = "Волков Даниил Митрофанович";
$secondNameTh = mb_substr($fioFullVariantThree, mb_strrpos($fioFullVariantThree, " "), mb_strlen($fioFullVariantThree));
$fioFullVariantPathTh = str_replace($secondNameTh, "", $fioFullVariantThree);
$firstNameTh = mb_substr($fioFullVariantPathTh, mb_strrpos($fioFullVariantPathTh, " "), mb_strlen($fioFullVariantPathTh));
$lastNameTh = str_replace($firstNameTh, "", $fioFullVariantPathTh);
printf("%s %s %s", $lastNameTh, mb_substr(trim($firstNameTh), 0, 1).".", mb_substr(trim($secondNameTh), 0, 1).".");
echo "<br>";
?>
<p><b>2 - с использованием массивом</b></p>
<?php
$fioFullAr = "Иванов Иван Петрович";
$arFio = explode(" ", $fioFullAr);
$arFio[1] = mb_substr($arFio[1], 0, 1).".";
$arFio[2] = mb_substr($arFio[2], 0, 1).".";
$fioFullStr = implode(" ", $arFio);
echo $fioFullStr;
?>
</body>
</html>