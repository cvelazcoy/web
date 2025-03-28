<?php
//require_once __DIR__ . '/lib/perpage.php';
//require_once __DIR__ . '/lib/DataSource.php';
require('../lib/perpage.php');
require('../lib/DataSource.php');

header('Content-Type: application/json');


$database = new DataSource();
$name = "";
$code = "";
//echo $_GET['WORKPACK_BARCODE'];
$queryCondition = "";
$paramType = "";
$paramValue = [];

if(!empty($_GET['WORKPACK_BARCODE'])){
    $queryCondition .= empty($queryCondition) ? " WHERE " : " AND ";
    $name = $_GET['WORKPACK_BARCODE'];
    $queryCondition .= "WORKPACK_BARCODE LIKE ? ";
    $paramType .= "s"; // 's' for string
    $paramValue[] =  $_GET['WORKPACK_BARCODE']. "%"; // Partial match
}

if (!empty($_POST["search"])) {
    foreach ($_POST["search"] as $k => $v) {
        if (!empty($v)) {
            $queryCases = ["WORKPACK_ID", "WORKPACK"];
            if (in_array($k, $queryCases)) {
                $queryCondition .= empty($queryCondition) ? " WHERE " : " AND ";
            }
            switch ($k) {
                case "WORKPACK_ID":
                    $name = $v;
                    $queryCondition .= "WORKPACK_BARCODE LIKE ? ";
                    $paramType .= "s"; // 's' for string
                    $paramValue[] = $v . "%"; // Partial match
                    break;
                case "WORKPACK":
                    $code = $v;
                    $queryCondition .= "WORKSCOPE_BARCODE LIKE ? ";
                    $paramType .= "s";
                    $paramValue[] = $v . "%"; // Partial match
                    break;
            }
        }
    }
}

$orderby = " ORDER BY WORKPACKAGE_LINENB ASC";
$sql = "select WORKPACKAGE_LINENB as id,WORKPACK_BARCODE, WORKSCOPE_BARCODE as name, WORKSCOPE,WORKSCOPE_STATUS,WORKSCOPE_PRIORITY, WORKSCOPE_TYPE, VIC_STATUS, COMMENT, FLAG_INT, LABOR_SKILL_LIST, STATUS_AP_BT, COUNT_HISTO as price, JOURS_DESP_PRISE  from bt_bd.vw_workscope_bt" . $queryCondition . $orderby;
$href = '002_frm_workscopeBT.php';



$result = $database->select($sql, $paramType, $paramValue);

class Visite {

}


$visite = new Visite();

$visite->visite_trfx = $_GET['WORKPACK_BARCODE'];

$visite->rows = $result;

$visite->total = 800;

$visite->totalNotFiltered = 800;


$jsonData = json_encode($visite);

echo $jsonData;

?>
