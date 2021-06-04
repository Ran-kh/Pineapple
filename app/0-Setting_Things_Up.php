<?php

//can be modified but modify them in DataBase.php as well//
//////////////////
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'pineapple';

/////////////////


function CreateDB ($DBName)
{
	global $host, $user, $pass;
  $connect = mysqli_connect($host, $user, $pass);
  if(!$connect)
    die("Connection failed: ". mysqli_connect_error());

  $sql = "CREATE DATABASE $DBName ";
  if (mysqli_query($connect, $sql))
    echo "DB Created";
  else
    echo "Failed to Create:". mysqli_error($connect);
}


function CreatetableSubscriber ()
{
	global $host, $user, $pass, $dbname;
  $connect = mysqli_connect($host, $user, $pass, $dbname);
  if(!$connect)
    die("Connection failed: ". mysqli_connect_error());
  $sql = " CREATE TABLE subscribers(
    sub_id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    sub_email VARCHAR(255) NOT NULL,
    sub_date DateTime NOT NULL
  )";
  if (mysqli_query($connect, $sql))
  echo "The Table is created";
  else
  echo "Failed to Create: " . mysqli_error($db->getCnxn());
}


function insertSubscriber ($email, $date)
{
	global $host, $user, $pass, $dbname;
  $connect = mysqli_connect($host, $user, $pass, $dbname);
  if(!$connect)
    die("Connection failed: ". mysqli_connect_error());

  $email = strtolower($email);
  $query = "INSERT INTO subscribers(sub_email, sub_date) VALUES ('$email', '$date')";
  if(!mysqli_query($connect, $query))
    echo "failed to add";
}



////////////////////////////----main---------///////////////////////////////

CreateDB($dbname);
CreatetableSubscriber('subscribers');

/*
insertSubscriber ('email1@gmail.com', '2005-03-02 01:20:53');
insertSubscriber ('another@gmail.com', '2012-04-02 11:20:53');
insertSubscriber ('zz@outlook.com', '2020-06-02 01:20:53');
insertSubscriber ('yahoo@yahoo.com', '2020-06-02 01:26:53');
*/
