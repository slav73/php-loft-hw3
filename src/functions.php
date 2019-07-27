<?php
function task1 ($xmlFilePath) {
    $xml = simplexml_load_file($xmlFilePath); 
   
    showAttributes($xml);
}

function showAttributes($xml) {
    $attributes = iterator_to_array($xml->attributes());
    if (count($attributes) > 0) {
        foreach($attributes as $attributeKey => $attributeValue) {
            echo "$attributeKey: $attributeValue", PHP_EOL;
        }
    } 
    foreach($xml as $key => $value) {
            echo "    $key: $value", PHP_EOL;
            showAttributes($value);
    } 
}

function task2 ($array) {
    $jsonFile = json_encode($array);
    file_put_contents("output.json", $jsonFile);

    if(rand(0, 1) == 0) {
        $newArray = array_merge(json_decode(file_get_contents("output.json")), [10, 11]);
        file_put_contents("output2.json", json_encode($newArray));    
    }

    $diff1 = array_diff(json_decode(file_get_contents("output.json")), json_decode(file_get_contents("output2.json")));
    $diff2 = array_diff(json_decode(file_get_contents("output2.json")), json_decode(file_get_contents("output.json")));
    $diffArray = $diff1 + $diff2;
    foreach ($diffArray as $value) {
        echo "$value";
    }
}

function task3() {
    $array = [];
    for ($i = 0; $i < 50; $i++) {
        array_push($array, rand(1, 100));
    }
    
    $fp = fopen('randomNumbers.csv', 'w');
    fputcsv($fp, $array);
    fclose($fp);

    $sum = 0;
    if (($handle = fopen('randomNumbers.csv', 'r')) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
            foreach($data as $value) {
                if ($value % 2 == 0) {
                    $sum += $value;
                }
            }
        }
        fclose($handle);
    }        
    echo $sum;
}

function task4($url) {
    $contents = json_decode(file_get_contents($url));

    var_dump($contents->warnings->main);
}


