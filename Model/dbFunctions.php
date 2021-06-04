<?php
include('./app/DataBase.php');


class dbFunctions
{
  private $cnxn;

  function __construct()
  {
    $instance = DataBase::getInstance();
    $this->cnxn = $instance->getCnxn();
  }

  public function insertSubscriber ($email, $date)
  {
    echo $date;
    $email = mysqli_real_escape_string($this->cnxn, $email);
    $email = strtolower($email);
    $query = "INSERT INTO subscribers(sub_email, sub_date) VALUES ('$email', '$date')";
    if(!mysqli_query($this->cnxn, $query))
    {
      echo "failed to add";
      return 0;
    }
    else return 1;
  }

  public function deleteSubsec ($del)
  {
    $delSql  = "DELETE FROM subscribers WHERE sub_id='$del' ";
    if(mysqli_query($this->cnxn, $delSql)){
      header("Refresh:0");
    }
    else return 0;
  }

  public function getSubsec ($search, $filter)
  {
    $search = mysqli_real_escape_string($this->cnxn, $search);

    $sql= 'SELECT * FROM subscribers ORDER BY sub_date';
    $res = mysqli_query($this->cnxn, $sql);
    $subscribersList = array();

    if($filter != 'all' )  $filter = '/@'.$filter.'\./i';
    if($filter == 'all' ){
      if($search){
        while($row = mysqli_fetch_array($res)){
          if (str_contains(strtolower($row['sub_email']), strtolower($_POST["search"]))) {
            array_push($subscribersList, new Subscriber($row['sub_id'], $row['sub_email'], $row['sub_date']));
          }
        }
      }else{
        /* then we didn't search for anything*/
        while($row = mysqli_fetch_array($res)){
          array_push($subscribersList, new Subscriber($row['sub_id'], $row['sub_email'], $row['sub_date']));
        }
      }
    }
    /* */
    else{
      if($search){
        while($row = mysqli_fetch_array($res)){
          if (str_contains(strtolower($row['sub_email']), strtolower($_POST["search"])) && preg_match($filter, $row['sub_email']) ) {
            array_push($subscribersList, new Subscriber($row['sub_id'], $row['sub_email'], $row['sub_date']));
          }
        }
      }
      else{
        while($row = mysqli_fetch_array($res)){
          if(preg_match($filter, $row['sub_email'])){
            array_push($subscribersList, new Subscriber($row['sub_id'], $row['sub_email'], $row['sub_date']));
          }
        }
      }
    }
    return $subscribersList;
  }



}
