<?php
//require_once __DIR__ . '../lib/DataSource.php';
require('../lib/DataSource.php');
$database = new DataSource();

//$sql = "DELETE FROM toy WHERE id=?";
//$paramType = 'i';
//$paramValue = array(
//    $_GET["id"]
//);

//$database->delete($sql, $paramType, $paramValue);

if (isset($_POST["action"])) {
    $sql = "insert bt_bd.bt_flag_risque(WORKPACK_BARCODE,WORKSCOPE_BARCODE,FLAG_INT,DATE_FLAG,UTILISATEUR) values(?,?,?,current_timestamp(),?)";

    $paramType = 'ssis';
    $paramValue = array(
        $_POST['visite'],
        $_POST['tache'],
        1,
        $_POST['utilisateur']
    );
    $result = $database->insert($sql, $paramType, $paramValue);
    if (! $result) {
        $message = "problem in Adding to database. Please Retry.";
    } else {
        //header("Location:index.php");f
    }
}

//header("Location:002_frm_workscopeBT.php");

if($_POST['action'] == 'call_this') {
    // call removeday() here
    echo('call_this');
  }

//exit();
?>