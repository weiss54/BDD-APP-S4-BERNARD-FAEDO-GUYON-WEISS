# TD3 PARTIE I
## Question 1
Lancer le script "ScriptTD3.php"
## Question 2
### Etude de la requête : "Lister les jeux dont le nom débute par \<valeur\>"
#### Avant la création de l'index
```
- Jeux commençant par Mario.
    time : 3.8441281318665
- Jeux commençant par Sony.
    time : 0.44359111785889
- Jeux commençant par Zelda.
    time : 0.53718686103821
```
#### Creation de l'index dans phpMyAdmin
```sql
create index `indexGame` on `game` (`name`);
```
#### Après la création de l'index
```
- Jeux commençant par Mario.
    time : 3.4755890369415
- Jeux commençant par Sony.
    time : 0.0022220611572266
- Jeux commençant par Zelda.
    time : 0.10484409332275
```
#### Ce qu'on remarque
On remarque que grâce à l'index, la vitesse d'exécution des trois requêtes au-dessus on étaient plus rapide.
### Etude de la requête : "Lister les jeux dont le nom contenant par \<valeur\>"
#### Avant la création de l'index
```
- Jeux contenant Mario.
    time : 6.827999830246
- Jeux contenant Sony.
    time : 0.45991086959839
- Jeux contenant Zelda.
    time : 1.8339908123016
```
#### Creation de l'index dans phpMyAdmin
```sql
create index `indexGame` on `game` (`name`);
```
#### Après la création de l'index
```
- Jeux contenant Mario.
    time : 6.8776450157166
- Jeux contenant Sony.
    time : 0.51633405685425
- Jeux contenant Zelda.
    time : 1.8050620555878
```
#### Ce qu'on remarque
On remarque que l'index n'a pas d'impact dans la vitesse d'exécution.
En effet, à cause du fait que la clause where de la requête est sur le contenu du nom d'un jeu et non sur le début du nom d'un jeu, l'index ne sers pas et donc, le temps d'exécution n'a pas pu être diminué.
### Etude de la requête : "Liste des compagnies d'un pays(location_country)"
#### Avant la création de l'index
```
- Compagnies au Japan.
        time : 0.059952974319458
- Compagnies au Vietnam.
        time : 0.012576103210449
- Compagnies au USA.
        time : 0.014940977096558
```
#### Creation de l'index dans phpMyAdmin
```sql
create index `indexCompany` on `company` (`location_country`);
```
#### Après la création de l'index
```
- Compagnies au Japan.
        time : 0.039494037628174
- Compagnies au Vietnam.
        time : 0.00077414512634277
- Compagnies au USA.
        time : 0.00077414512634277
```
#### Ce qu'on remarque
On remarque qu'avec l'index, le temps d'exécution a beaucoup diminué. On constate donc que l'index sur les pays a grandement accéléré le temps d'exécution.
Cependant, à cause d'une mauvaise manipulation, on avait créer l'index sur le nom d'une company, et le constat nous avais montré que le temps d'exécution des requêtes n'avais pas varié, car l'index n'avait pas d'utilité pour simplifier le select.