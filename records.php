<?php

include("Model/dbFunctions.php");
include("Model/Subscriber.php");
include("views/1-records.php");

$db = new dbFunctions();
$emails_per_page = 10;

/////////////////////

if(!isset($_POST["submit"]) && !isset($_POST["filter"])){
  $subscribersList = $db->getSubsec("", "all");
}
else{
  if (isset($_POST["submit"]) && !empty($_POST["search"])) {
    $subscribersList = $db->getSubsec($_POST["search"], $_POST["filter"]);
  }

  if(isset($_POST["filter"])){
    $subscribersList = $db->getSubsec($_POST["search"], $_POST["filter"]);
  }
}
////////////////////

if(isset($_POST["name"])){
  usort($subscribersList, function ($Sub1, $Sub2) {
    return strcmp($Sub1->getEmail(), $Sub2->getEmail());
  });
}
else{
  if (isset($_POST["date"])) {
    usort($subscribersList, function ($Sub1, $Sub2) {
      return strcmp($Sub1->getdate(), $Sub2->getdate());
    });
  }
}
/////////////////////

if (isset($_POST["del"])) {
  $del = $_POST["del"];
  $db->deleteSubsec($del);
}

//////////////////////

if (isset($_POST["exportCSV"])) {
  if(!empty($_POST['exportCheck'])){
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="export.csv";');
    // clean output buffer
    ob_end_clean();
    $fp = fopen('php://output', 'w');
    foreach($_POST['exportCheck'] as $check){
      foreach($subscribersList as $list){
        if($check == $list->getId()){
          fputcsv($fp, array($list->getEmail(), $list->getdate()), "\t");
          break;
        }
      }
    }
    fclose($fp);
    // use exit to get rid of unexpected output afterward
    exit();
  }
}

///////////////////////

function performPagination ($results_per_page, $list) {
  if (!isset ($_POST['page']) ) {
      $page = 1;
  } else {
      $page = $_POST['page'];
  }
  $number_of_pages = ceil(count($list) / $results_per_page);
  $page_first_result = ($page-1) * $results_per_page;

  $i = $page_first_result;
  for($i = $page_first_result; $i<count($list) ; $i++){
    if($i< ($results_per_page*$page)){
      echo"
      <tr>
      <td><input type='checkbox' name='exportCheck[]' value=".$list[$i]->getId()."> </td>
      <td>".($i+1)."</td>
      <td>".$list[$i]->getEmail()."</td>
      <td>".$list[$i]->getdate()."</td>
      <td> <button type='submit' value=".$list[$i]->getId()." name='del' >delete</button></td>
      </tr>
      ";
    }
  }
  return $number_of_pages;
}

//////////////////////////

$number_of_pages= performPagination($emails_per_page, $subscribersList);

?>

</table>

<?php
for($page = 1; $page<= $number_of_pages; $page++) {
  echo '<button type="submit" name="page" value='.$page.'>'.$page.'</button>';
}
?>

<br><br>
<button type="submit" id="exportCSV" name="exportCSV">Export As CSV </button>
</form>
</div>
</body>
