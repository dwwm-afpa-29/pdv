<?php

echo '<pre>';
    print_r($customerList);
echo '</pre>';

/*$i=0;
$j=0;
$customer;
echo '<table>';

echo '<thead>';
echo '<tr>';

foreach($customerList as $key => $value){

    $i++;

    if($i === 1){
        foreach($value as $caract => $valeur){
            
            echo '<th>'.$caract.'</th>';
            
        }
    }
}

echo '</tr>';
echo '</thead>';
echo '<tbody>';
echo '<tr>';

foreach($customerList as $key => $value){
    
    foreach($value as $customer){
        echo '<td>'.$customer.'</td>';
    }
    
} 
echo '</tr>';
echo '</tbody>';
echo '</table>';

print_r($j);

/*foreach($customerList as $customer){
    echo $customer['last_name'];
}*/