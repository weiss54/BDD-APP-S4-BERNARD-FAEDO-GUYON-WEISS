# Préparation au TD3 - Urbanisation
## Partie I
### Question 1.
```php
<php
$time_start = microtime(true);
/** code dont on teste le temps d'execution */
$time_end = microtime(true);
echo $time_end - $time_start;
```
### Question 2.
Le principe d'un index sur une ou plusieur colonnes de la table permet dans des tables conenant énormement de données de simplifier une requête SELECT. En effet, l'index crée des pointeurs au sein de la table afin de diminuer l'espace de recherche lorsqu'il y a une ou plusieurs clauses where.
## Partie II
### Question 1.