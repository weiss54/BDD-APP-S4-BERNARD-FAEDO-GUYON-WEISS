# TD4 PARTIE I
## Creation de la table SQL
```sql
CREATE TABLE `User` (
    email varchar(100) primary key,
    nom varchar(50),
    prenom varchar(50),
    adresse varchar(200),
    numTel varchar(15),
    dateNaissance date
);
CREATE TABLE `Comment` (
    id int(11) primary key AUTO_INCREMENT,
    titre varchar(100),
    contenu varchar(500),
    created_at date,
    updated_at date,
    idUser varchar(100) NOT NULL,
    idGame int(11) NOT NULL
);
```
