### Preparation td5-6

## dans quels cas json_encode() retourne une chaine correspondant à un obejt ou un tableau JSON ?

# Si l'array php est associative alors la méthode renvoie un objet JSON
    ```php
    echo json_encode(array("Peter"=>35, "Ben"=>37, "Joe"=>43));
    ```

    Résultat:
    {"Peter":35,"Ben":37,"Joe":43}

# Sinon elle renvoie une array JSON
    ```php
    echo json_encode(array("Volvo", "BMW", "Peugeot"));
    ```

    Résultat:
    ["Volvo","BMW","Toyota"]

## Comment accède-t-on aux données transmises dans la requête ?

# Pour acceder au données du corps de la requete :
    ```php
    $rq->getParsedBodyParam('param');
    ```

# Pour acceder au données de l'url de la requete :
    ```php
    $args['param']
    ```
