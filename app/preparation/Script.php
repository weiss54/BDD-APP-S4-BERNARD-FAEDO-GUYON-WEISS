<?php
require_once '../vendor/autoload.php';

$faker = Faker\Factory::create();

echo "### QUESTION 2\n";

echo $faker->randomNumber(3, false) . " " . "Avenue " . $faker->name() . "\n" . $faker->name() . " " . $faker->randomNumber(5, false);

echo "\n\n### QUESTION 3\n"; 

$dateTime = DateTime::createFromFormat('Y/m/d (H:i)', "2017/02/16 (16:15)"); //Date écrite vers DateTime

echo "\ndate enonce : " . $dateTime->format('Y/m/d(H:i)');