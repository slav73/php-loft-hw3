<?php
require ('src/functions.php');

task1('data.xml');

$array = [1, 2, [3, 4], 5, [6, 7]];

task2($array);

task3();

task4('https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json');