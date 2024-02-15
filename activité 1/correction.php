<?php

$prenom = "Théophile";

if ($prenom === "Théophile") {
  echo "Bonjour Créateur ! <br>";
} else {
  echo "Bonjour $prenom ! <br>";
}

$tableau = ["Tonie","Elodie","Raphael","Sanaa","Amal","Laurent","Dimitri","Salomé","Aubin","Killian","Bruno","Yoan","Sara","Clément","Rodrigo"];

$prenom = "Dimitri";

if (in_array($prenom,$tableau)) {
  echo "Bonjour $prenom ! <br>";
}else {
  echo "Bonjour bel(le) inconnu(e) <br>";
}

echo "<h3>Boucle foreach : </h3>";

foreach($tableau as $clef => $valeur){
  echo "Bonjour $valeur <br>";
}

echo "<h3>Boucle while : </h3>";

$i = 0;
while ($i < sizeof($tableau)) {
  echo "Bonjour $tableau[$i] <br>";
  $i ++;
}

echo "<h3>Boucle while avec arrêt : </h3>";

$i = 0;
while ($tableau[$i] !== "Bruno") {
  echo "Bonjour $tableau[$i] <br>";
  $i ++;
}

echo "<h3>Boucle for jusqu'à : </h3>";

for ($i=0; $i < 5; $i++) {
  echo "Bonjour $tableau[$i] <br>";
}

echo "<h3>Boucle for avec arrêt : </h3>";
for ($i=0; $i < sizeof($tableau); $i++) {
  if ($i > 5) {
    break;
  }
  echo "Bonjour $tableau[$i] <br>";
}


?>
