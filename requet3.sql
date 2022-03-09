/* les jeux développés par une compagnie dont le nom contient 'Sony' */

SELECT * FROM game NATURAL JOIN company WHERE company.name LIKE '%Sony%';