<?php

echo '<table>';
var_dump($customerList);
foreach($customerList as $key => $value){
    
    echo '<tr>';
    echo '<th>'.$key.'</th>';
    echo '<tr>';

    //print_r($value);
}

foreach($customerList as $key => $value) {

    $customer = $value;
    //var_dump($customer);
}
echo '</table>';