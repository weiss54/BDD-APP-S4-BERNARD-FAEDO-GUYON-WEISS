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
On remarque que l'index n'a pas d'impact dans la vitesse d'éxecution
