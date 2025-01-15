<?php

class User {
  // propriétés
  private ?string $prenom;
  private ?string $nom;
  private ?string $email;
  private ?string $password;
  // constructeur

  public function __construct(string $prenom, string $nom, string $mail, string $password) {
    $this->prenom = $prenom;
    $this->nom = $nom;
    $this->email = $mail;
    $this->password = $password;
  }
  // methodes

	/**
	 * Get the value of prenom
	 *
	 * @return  string
	 */
	public function getPrenom(): string
	{
		return $this->prenom;
	}
  
	/**
	 * Set the value of prenom
	 *
	 * @param   string  $prenom  
	 *
   * @return void
	 */
	public function setPrenom(string $prenom): void
	{
		$this->prenom = $prenom;
	}

	/**
	 * Get the value of nom
	 *
	 * @return  string
	 */
	public function getNom(): string
	{
		return $this->nom;
	}
  
	/**
	 * Set the value of nom
	 *
	 * @param   string  $nom  
	 *
   * @return void
	 */
	public function setNom(string $nom): void
	{
		$this->nom = $nom;
	}

	/**
	 * Get the value of email
	 *
	 * @return  string
	 */
	public function getEmail(): string
	{
		return $this->email;
	}
  
	/**
	 * Set the value of email
	 *
	 * @param   string  $email  
	 *
   * @return void
	 */
	public function setEmail(string $email): void
	{
		$this->email = $email;
	}

	/**
	 * Get the value of password
	 *
	 * @return  string
	 */
	public function getPassword(): string
	{
		return $this->password;
	}
  
	/**
	 * Set the value of password
	 *
	 * @param   string  $password  
	 *
   * @return void
	 */
	public function setPassword(string $password): void
	{
		$this->password = $password;
	}
  }