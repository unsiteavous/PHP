<?php

class User {
  private $_id;
  private $_nom;
  private $_prenom;
  private $_mail;
  private $_password;

  /**
   * Création d'un nouvel utilisateur
   * @param string $nom      Le nom de l'utilisateur
   * @param string $prenom   Le prénom de l'utilisateur
   * @param string $mail     Le mail de l'utilisateur
   * @param string $password Le mot de passe chiffré de l'utilisateur
   * @param int $id       L'id de l'utilisateur si on le connait, sinon rien.
   */
  function __construct(string $nom, string $prenom,string $mail,string $password,int|string $id = "à créer"){
    $this->setId($id);
    $this->setNom($nom);
    $this->setPrenom($prenom);
    $this->setMail($mail);
    $this->setPassword($password);
  }

  function getId(): int {
    return $this->_id;
  }
  function setId(int|string $id){
    if (is_string($id) && $id === "à créer") {
      $this->_id = $this->CreerNouvelId();
    }else {
      $this->_id = $id;
    }

  }
  function getNom(): string {
    return $this->_nom;
  }
  function setNom(string $nom){
    $this->_nom = $nom;
  }
  function getPrenom(): string {
    return $this->_prenom;
  }
  function setPrenom(string $prenom){
    $this->_prenom = $prenom;
  }
  function getMail(): string {
    return $this->_mail;
  }
  function setMail(string $mail){
    $this->_mail = $mail;
  }
  function getPassword(): string {
    return $this->_password;
  }
  function setPassword(string $password){
    $this->_password = $password;
  }

  private function CreerNouvelId(){
    $Database = new Database();
    $utilisateurs = $Database->getAllUtilisateurs();

    // On crée un tableau dans lequel on stockera tous les ids existants.
    $IDs = [];

    foreach($utilisateurs as $utilisateur){
      $IDs[] = $utilisateur->getId();
    }

    // Ensuite, on regarde si un chiffre existe dans le tableau, et si non, on l'incrémente
    $i = 0;
    $unique = false;
    while ($unique === false) {
      if (in_array($i, $IDs)) {
        $i ++;
      } else {
        $unique = true;
      }
    }
    return $i;
  }

  public function getObjectToArray(): array {
    return [
      "id" => $this->getId(),
      "nom" => $this->getNom(),
      "prenom" => $this->getPrenom(),
      "mail" => $this->getMail(),
      "password" => $this->getPassword()
    ];
  }
}
