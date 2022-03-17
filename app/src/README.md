# TD3 PARTIE I
## Question 1
Lancer le script "ScriptTD2.php"
## Question 2
### Etude de la requête : "Lister les jeux dont le nom débute par \<valeur\>"
#### Avant la création de l'index
- Jeux commençant par Mario.
time : 3.8441281318665
- Jeux commençant par Sony.
time : 0.44359111785889
- Jeux commençant par Zelda.
time : 0.53718686103821
#### Creation de l'index dans phpMyAdmin
```sql
create index `indexGame` on `game` (`name`);
```
#### Après la création de l'index
- Jeux commençant par Mario.
time : 3.4755890369415
- Jeux commençant par Sony.
time : 0.0022220611572266
- Jeux commençant par Zelda.
time : 0.10484409332275