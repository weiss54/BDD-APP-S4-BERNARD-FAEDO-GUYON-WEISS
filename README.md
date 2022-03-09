# BDD-APP-S4-BERNARD-FAEDO-GUYON-WEISS
## Partie 1
### 1) Voir image "modele_UML.png"
### 2) Modele relationniel
* Jeu (idJeu, nom, dateSortieAttendue, dateSortieInit, decriptionLongue, descriptionCourte,
* Genre (idGenre, nom, descriptionCourte, descriptionLongue)
* Theme (idTheme, nom)
* JeuGenre (#idJeu, #idGenre)
* JeuTheme (#idJeu, #idTheme)
* Plateforme (idPlateforme, nom, alias, descriptionCourte, descriptionLongue, dateSortie, decompteBase, #idCompagnie)
* JeuPlateforme (#idJeu, #idPlateforme)
* JeuPlateformeDeveloppement(#idJeu, #idCompagnie)
* JeuPlateformePublication(#idJeu, #idCompagnie)
* Compagnie (idCompagnie, nom, alias, abreviation, descriptionCourte, descriptionLongue, adresse, dateCreation, numTelephone, urlSite)
* JeuClassement (#idJeu, #idClasement)
* Classement  (idClassement, nom, #idOrganismeClassement)
* OrganismeClassement (idOrganismeClassement, nom, descriptionCourte, descriptionLongue)
* Personnage (idPersonnage, nom, alias, nomReel, nomFamille, dateNaissance, genre, descriptionCourte, descriptionLongue, #idPremierJeu)
* JeuPersonnage (#idJeu, #idPersonnage)
* RelationPersonnage(#idPersonnage1, #idPersonnage2, relation)
## 3) réaliser en localhost
## Partie 2
### Voir le fichier Requete.php