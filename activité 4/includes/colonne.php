<div id="colonne">
  <h2>Bonjour <?= $user->getPrenom() ?> !</h2>
  <ul>
    <li class="compte <?= $section == "compte" ? "actif" : "" ?>" onclick="location.href='tableau-de-bord?section=compte'">Mon compte</li>
    <li class="abonnements <?= $section == "abonnements" ? "actif" : "" ?>" onclick="location.href='tableau-de-bord?section=abonnements'">Mes abonnements</li>
  </ul>
</div>
