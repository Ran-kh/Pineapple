<!DOCTYPE html>
<html lang="en">
 <head>
   <title> Records </title>
   <link rel="stylesheet" href="./views/scss/styles.min.css">
   <script type="text/javascript" src="./views/task2.js"></script>
   <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
 </head>
 <body>
   <div id="tablerec">
     <form id="recForm" method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
       <input type="text" id="search" name="search" placeholder="Search" value=<?= isset($_POST['search'])? $_POST["search"] : ''?>>
       <label>Filter</label>
       <select id="filter" name="filter">
         <option value="all" selected>all</option>
         <?php
         $db = DataBase::getInstance();
         $query = "SELECT sub_email from subscribers";
         $res = mysqli_query($db->getCnxn(), $query);
         if(mysqli_num_rows($res)>0){
           $options = array();
           while ($row = mysqli_fetch_array($res)){
             if(preg_match('/@{1}[a-zA-Z]+.{1}/i', $row['sub_email'], $match)){
               $option = strtoupper(substr($match[0],1,-1));
               if(!in_array($option, $options))
               {
                 array_push($options, $option);
                 ?>
                 <option value='<?=$option?>' <?php if(isset($_POST['filter']) && $_POST['filter']== $option) echo "selected"; ?>> <?=strtoupper($option)?></option>
                 <?php
               }
             }
           }
         }
         ?>
       </select>
       <br><br>
       <button type="submit" name="submit" id="submit" value="">APPLY</button>

       <table id="RecTable">
         <tr>
           <th></th>
           <th></th>
           <th><button type="submit" id="name" name="name" value=<?= isset($_POST['name'])? $_POST["name"] : ''?>>name</button></th>
           <th><button type="submit" id="date" name="date" value=<?= isset($_POST['date'])? $_POST["date"] : ''?>>date</button></th>
           <th></th>
         </tr>
