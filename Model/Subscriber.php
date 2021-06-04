<?php

/**
 *
 */
class Subscriber
{
  private $id;
  private $email;
  private $date;

  function __construct($id, $email, $date)
  {
    $this->id = $id;
    $this->email = $email;
    $this->date = $date;
  }

  function getId(){
    return $this->id;
  }

  function getEmail(){
    return $this->email;
  }

  function getDate(){
    return $this->date;
  }

}
