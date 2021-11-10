<?php
  class Member{
    private $id;
    private $lastname;
    private $firstname;
    private $email;
    private $password;
    public function __construct($id, $lastname, $firstname, $email, $password){
      $this->setId($id);
      $this->setLastname($lastname);
      $this->setFirstname($firstname);
      $this->setEmail($email);
      $this->setPassword($password);
    }
    public function getId(){
      return $this->id;
    }
    public function setId($id){
      $this->id = $id;
    }
    public function getLastname(){
      return $this->lastname;
    }
    public function setLastname($lastname){
      $this->lastname = $lastname;
    }
    public function getFirstname(){
      return $this->firstname;
    }
    public function setFirstname($firstname){
      $this->firstname = $firstname;
    }
    public function getEmail(){
      return $this->email;
    }
    public function setEmail($email){
      $this->email = $email;
    }
    public function getPassword(){
      return $this->password;
    }
    public function setPassword($password){
      $this->password = $password;
    }
  }?>
