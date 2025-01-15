<?php

class Database
{
  private string $userDatabase = __DIR__ . "/../csv/users.csv";

  public function createUser(User $user): bool
  {
    try {
      $connexion = fopen($this->userDatabase, 'ab');
      fputcsv($connexion, $user->getObjectToArray());
      fclose($connexion);
      return true;
    } catch (Exception $exception) {
      echo "Une erreur est survenue lors de l'enregistrement de l'utilisateur : " . $exception->getMessage() . ' : ' . $exception->getLine();
      return false;
    }
  }
}
