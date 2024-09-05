<?php
//$capitals_states = array("Ohio", "New York", "Colorado");
//array_push($capitals_states, "California", "Texas");
//rsort($capitals_states);  // Сортировка массива в обратном порядке
//foreach ($capitals_states AS $state) {
//    echo $state . "<br />";
//}
//$customer_age = 45;
//if ($customer_age < 18) {
//    header("Location: ToyCatalog.php");
//} else {
//    header("Location: ElectronicsCatalog.php");
//}


$pswd = "secretPassword";
if (strlen($pswd) < 10) {
    echo "Слишком короткий пароль!"; }
else{
echo "Правильный пароль!";}


$counter = 1;