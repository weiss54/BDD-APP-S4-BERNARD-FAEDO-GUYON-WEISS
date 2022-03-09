/* les jeux dont le nom débute par Mario et ayant plus de 3 personnages */

SELECT * FROM game where name like 'Mario%' and count(character) >= 3;