# BDD-APP-S4-BERNARD-FAEDO-GUYON-WEISS
## 1) Schéma SQL -> Voir dans le dossier documents
## 2) Voir les fichiers php: Annonce et Photo
## 3) Voir le fichier Requete.php
## 4) insert into Photo values (99, 'file99.png', to_date('09/03/22'), 22);
## 5) Voir les requetes qui suit
* insert into CategorieAnnonce values (42, 22);
* insert into CategorieAnnonce values (73, 22);

# CORRECTION

## 3)3) Annonce::has('photos', '>', 3)->get()
## 3)4) Annonce::whereHas('photos', function($q){$q->where('totale_octet', '>', '100000');})->get();