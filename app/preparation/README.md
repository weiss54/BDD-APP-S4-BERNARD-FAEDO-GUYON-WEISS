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
Tout d'abord on se connecte à la base de donné ensuite, ensuite on active les log puis on éxecute les requêtes et enfin on affiche les log 

### Question 2.
Le problème quand on veut quelque chose pour chaque élément d'une table on doit faire une requête pour chaque element donc le N correspond à chaque élement de la table et le +1 qui est la première requête pour choisir les élements.