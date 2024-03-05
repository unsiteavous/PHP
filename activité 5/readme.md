# Activité 5 : AJAX
Nous avons vu avec PHP comment récupérer les variables envoyées grâce à un formulaire, ou dans l'URL. Mais cela nous limite : nous sommes obligés de recharger la page, d'envoyer le formulaire, de changer de page, bref, de faire un appel au serveur de toute la page pour que le traitement s'exécute.

Il serait pourtant bienvenu de pouvoir demander au serveur juste une chose, par exemple de nous envoyer le prix de tel produit, ou d'enregistrer le nouveau mot de passe du compte, sans avoir à recharger toute la page. 

De cette manière, nous économiserions la bande passante (moins d'informations à recharger à chaque fois), le serveur (une seule requête est demandée et analysée), et l'utilisateur n'est pas redirigé ou ne doit pas attendre que la page soit rechargée pour continuer sa navigation, il est toujours sur le site.

Cette manière de faire existe ! Elle s'appelle AJAX. Elle va nous permettre de contacter le serveur depuis javascript, et de travailler en asynchrone. Ainsi, le serveur est appelé seulement lorsqu'une action le demande, et la réponse est lue et traitée par javascript.

## Partie 1 : XMLHttpRequest
Pour appeler le serveur avec Javascript, on va avoir plusieurs choses à faire. Rappelez-vous comment on écrivait dans un fichier CSV en PHP. on utilisait `fopen()`,`fgetcsv()` ou `fputcsv()` et `fopen()`. 

Ici, l'idée va être similaire :
- D'abord on va instancier un objet `XMLHttpRequest`
- On va ensuite dire grâce à `setRequestHeader` quel genre de connexion on veut établir
- En fonction de ce format, on construit nos données correctement (JSON, URL, ...)
- On envoie la requête avec `.send()`
- et on écoute le retour grâce à `onreadystatechange`
- Quand le `status` = 200 et le `readyState` = 4, alors on peut afficher la réponse, avec `.responseText`

## Exercice 1 : se connecter au serveur

Dans un premier temps, dans un fichier de traitement, vous affichez simplement "connexion réussie".

dans un fichier index, vous devez écouter le retour de traitement.
Construisez une requête AJAX, qui vous permet d'afficher la réponse, à chaque clic sur un bouton.

## Exercice 2 : envoyer des infos au serveur

Récupérez le fichier `index.php` et créez un fichier `traitement.php`.

envoyez le mot de passe à hasher en méthode POST, avec le bon content-type dans le header.

Dans le traitement, écoutez la variable `$_POST` pour récupérer le mot de passe.
Utilisez la méthode PHP de hashage des mots de passe, puis affichez le résultat.

Dans index.php, écoutez la réponse du serveur, et affichez-la au bon endroit.

## Exercice 2 : envoyer des infos au serveur en JSON

On va refaire le même exercice en changeant le mode d'envoi des données. Cette fois-ci on veut passer du JSON. le content-type change. 

Côté back, la réception change aussi. Si on n'envoie plus les données sous forme d'url encodée, les données ne peuvent pas être récupérées en $_POST ou $_GET. Il faut donc utiliser `file_get_contents('php://input')`.

Récupérez les données reçues, hashez le mot de passe.

Ensuite renvoyez-le sous format JSON. là aussi, il faut mettre un header avec le bon format, et encoder la réponse.

Enfin dans index.php, décomposer le JSON pour l'afficher.