###Preparation td4

# Comment installer faker ?
    On peut l'installer avec composer grace à la commande : composer require fakerphp/faker

# Donnez un exemple de code pour générer une adresse américaine en utilisant faker
    echo $faker->randomNumber(3, false) . " " . "Avenue " . $faker->name() . "\n" . $faker->name() . " " . $faker->randomNumber(5, false)

