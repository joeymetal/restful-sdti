<?php
  class Test
 {
     private $id;
     private $nome;
     private $user_id;
     private $created;
     private $updated;
     
  //Contruct
  public Test(){
      
  }
  
  public Test(__set($nome, $value), __set($user_id, $value)){
    
    if (property_exists($this, $nome)) {
      $this->$nome = $value;
    }
    
    if (property_exists($this, $user_id)) {
      $this->$user_id = $value;
    }
    
    return $this;
  }

  //Getters And Setters
  public function __get($property) {
    if (property_exists($this, $property)) {
      return $this->$property;
    }
  }

  public function __set($property, $value) {
    if (property_exists($this, $property)) {
      $this->$property = $value;
    }

    return $this;
  }
  
 }
