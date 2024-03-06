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

### Exercice 1 : se connecter au serveur

Dans un premier temps, dans un fichier de traitement, vous affichez simplement "connexion réussie".

dans un fichier index.php, vous devez écouter le retour de traitement.
Construisez une requête AJAX, qui vous permet d'afficher la réponse, à chaque clic sur un bouton.

### Exercice 2 : envoyer des infos au serveur

Maintenant que vous savez récupérer le retour du fichier traitement, on va tenter de lui passer des paramètres. Afin de rester en sécurité, la méthode à utiliser lors de l'ouverture de la connexion sera toujours POST.

Vous utiliserez comme content-type `application/x-www-form-urlencoded`.

Envoyez votre prénom au serveur. Le serveur vous renverra "Bonjour {prenom}".

Faites la même chose avec deux paramètres : le prénom et l'âge.

Le serveur vous répondra "Bonjour {prenom}, tu as {age} ans".

### Exercice 3 : Envoyer des infos en JSON

On va refaire le même exercice que le 2, mais en envoyant les infos en JSON. De cette manière, on peut envoyer un tableau, des objets, ... Et les récupérer en back, puis renvoyer du JSON depuis le back pour le récupérer en front. L'avantage du JSON, c'est qu'en back et en front il est lu de la même manière.

Il va falloir changer le header content-type : `application/json`.

Côté back, la réception change aussi. Si on n'envoie plus les données sous forme d'url encodée, les données ne peuvent pas être récupérées en $_POST ou $_GET. Il faut donc utiliser `file_get_contents('php://input')`.

Ensuite renvoyez-le sous format JSON. là aussi, il faut mettre un header avec le bon format, et encoder la réponse.

Enfin dans index.php, décomposer le JSON pour l'afficher.

### Exercice 4 : Chiffrer un mot de passe

Récupérez le fichier `index.php` et créez un fichier `traitement.php`.

envoyez le mot de passe à hasher en méthode POST, avec le bon content-type dans le header.

Dans le traitement, écoutez la variable `$_POST` pour récupérer le mot de passe.
Utilisez la méthode PHP de hashage des mots de passe, puis affichez le résultat.

Dans index.php, écoutez la réponse du serveur, et affichez-la au bon endroit.

### Exercice 5 : envoyer des infos au serveur en JSON

On va refaire le même exercice en changeant le mode d'envoi des données. Cette fois-ci on veut passer du JSON. le content-type change. 

Côté back, la réception change aussi. Si on n'envoie plus les données sous forme d'url encodée, les données ne peuvent pas être récupérées en $_POST ou $_GET. Il faut donc utiliser `file_get_contents('php://input')`.

Récupérez les données reçues, hashez le mot de passe.

Ensuite renvoyez-le sous format JSON. là aussi, il faut mettre un header avec le bon format, et encoder la réponse.

Enfin dans index.php, décomposer le JSON pour l'afficher.

## Partie 2 : fetch
Il existe une seconde manière de se connecter au serveur de manière asynchrone, `fetch`.
Elle existe seulement depuis ES6 (2015). La principale différence est la possibilité d'utiliser des Promises avec fetch. Elle est aussi un peu plus simple à utiliser.

Comme avec `XMLHttpRequest`, on va ouvrir une connexion en lui donnant des infos.
https://developer.mozilla.org/fr/docs/Web/API/fetch

On lui donnera le chemin d'accès au serveur, et en second paramètre (facultatif), les options de connexion.
Parmi les options intéressantes à connaître :
- `method` : on lui donnera GET, POST, ... 
- `headers` : on lui donnera content-type, ...
- `body` : on lui donnera les données à envoyer au serveur

Une fois que la requête est envoyée, on va utiliser le mot `then` pour écouter la suite.
On attend la réponse, et `then` va nous permettre de la recevoir.

On écoutera si la réponse est valide avec `response.ok`, puis on pourra récupérer la valeur en utilisant `.json()` par exemple, pour récupérer les données en json. 

### Exercice 1 : Récupérer les données du serveur

Dans un premier temps, dans un fichier de traitement, vous affichez simplement "connexion réussie".

dans un fichier index.php, vous devez écouter le retour de traitement.
Construisez une requête fetch, qui vous permet d'afficher la réponse, à chaque clic sur un bouton.
Dans la requête fetch, vous donnerez l'adresse du fichier de traitement en premier paramètre, puis un objet d'options, avec comme méthode, GET, et comme header `application/x-www-form-urlencoded`.

Vous écouterez ensuite (`then`) le retour du serveur, que vous transformerez en texte (`response.text()`).


### Exercice 2 : envoyer des infos au serveur

Maintenant que vous savez récupérer le retour du fichier traitement, on va tenter de lui passer des paramètres. Afin de rester en sécurité, la méthode à utiliser lors de l'ouverture de la connexion sera toujours POST.

Vous utiliserez comme content-type `application/x-www-form-urlencoded`.

Envoyez votre prénom au serveur. Le serveur vous renverra "Bonjour {prenom}".

Faites la même chose avec deux paramètres : le prénom et l'âge.

Le serveur vous répondra "Bonjour {prenom}, tu as {age} ans".

### Exercice 3 : Envoyer des infos en JSON

On va refaire le même exercice que le 2, mais en envoyant les infos en JSON. De cette manière, on peut envoyer un tableau, des objets, ... Et les récupérer en back, puis renvoyer du JSON depuis le back pour le récupérer en front. L'avantage du JSON, c'est qu'en back et en front il est lu de la même manière.

Il va falloir changer le header content-type : `application/json`.

Il faudra utiliser `stringify` pour préparer le body de la requête, et `response.json()` pour récupérer la réponse dans le bon format.

Côté back, la réception change aussi. Si on n'envoie plus les données sous forme d'url encodée, les données ne peuvent pas être récupérées en $_POST ou $_GET. Il faut donc utiliser `file_get_contents('php://input')`.

Ensuite renvoyez-le sous format JSON. là aussi, il faut mettre un header avec le bon format, et encoder la réponse.

Enfin dans index.php, décomposer le JSON pour l'afficher.

### Exercice 4 : Chiffrer un mot de passe

Récupérez le fichier `index.php` et créez un fichier `traitement.php`.

envoyez le mot de passe à hasher en méthode POST, avec le bon content-type dans le header.

Dans le traitement, écoutez la variable `$_POST` pour récupérer le mot de passe.
Utilisez la méthode PHP de hashage des mots de passe, puis affichez le résultat.

Dans index.php, écoutez la réponse du serveur, et affichez-la au bon endroit.

### Exercice 5 : envoyer des infos au serveur en JSON

On va refaire le même exercice en changeant le mode d'envoi des données. Cette fois-ci on veut passer du JSON. le content-type change. 

Récupérez les données reçues, hashez le mot de passe.

Ensuite renvoyez-le sous format JSON. là aussi, il faut mettre un header avec le bon format, et encoder la réponse.

Enfin dans index.php, décomposer le JSON pour l'afficher.