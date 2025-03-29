<?php
//require_once __DIR__ . '../lib/perpage.php';
include('../lib/perpage.php');
//require_once __DIR__ . '../lib/DataSource.php';
include('../lib/DataSource.php');
ini_set("display_errors", 1);
$database = new DataSource();

$name = "";
$code = "";

$queryCondition = "";
$paramType = "";
$paramValue = [];

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
                    $queryCondition .= "WORKPACK_ID LIKE ? ";
                    $paramType .= "s"; // 's' for string
                    $paramValue[] = $v . "%"; // Partial match
                    break;
                case "WORKPACK":
                    $code = $v;
                    $queryCondition .= "WORKPACK LIKE ? ";
                    $paramType .= "s";
                    $paramValue[] = $v . "%"; // Partial match
                    break;
            }
        }
    }
}

$orderby = " ORDER BY 1 DESC";
$sql = "SELECT * FROM bt_bd.workpackage" . $queryCondition . $orderby;
$href = 'index.php';

$perPage = 2;
$page = 1;
if (isset($_POST['page'])) {
    $page = $_POST['page'];
}
$start = ($page - 1) * $perPage;
if ($start < 0)
    $start = 0;

$query = $sql . " limit " . $start . "," . $perPage;
$result = $database->select($query, $paramType, $paramValue);


if (! empty($result)) {
    $result["perpage"] = showperpage($sql, $perPage, $href, $paramType, $paramValue);
}
?>
<html>

<head>
    <title>Test Formulaire</title>
    <!--<link rel="stylesheet" type="text/css" href="css/style.css" />-->
    <!--<link rel="stylesheet" type="text/css" href="css/table.css" /> -->
   <!-- <link rel="stylesheet" type="text/css" href="css/form.css" /> -->
   <!-- <link rel="stylesheet" type="text/css" media="screen" href="https://cei-airfrance.moneweb.fr/themes/AirFranceIndustrieClient/Content/combined.76ALEZYQ5.css">-->
   <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
   <link rel="stylesheet" type="text/css" href="../bootstrap/css/style.css">
   <script src="../bootstrap/js/bootstrap.min.js"></script>
   <!-- <style>
        button,
        input[type=submit].btnSearch {
            width: 140px;
            font-size: 14px;
            margin: 10px 0px 0px 10px;
        }

        .btnReset {
            width: 140px;
            padding: 8px 0px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 25px;
            color: #000000;
            border: 2px solid #d2d6dd;
            margin-top: 10px;
        }
-->
 <style>
        button,
        input[type=submit].perpage-link {
            position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #337ab7;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd
        }
  
 

        .current-page {
            position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #fff;
    text-decoration: none;
    background-color: #337ab7;
    border-color: #337ab7
        }

    /* style.css */
* {
   font-size: 12px;
   line-height: 2;
}
    </style>
   
</head>

<body>
    <div >
        <h1>Test </h1>

        <div>
            <form name="frmSearch" method="post" action="">
                <div>
                    <p>
                        <input type="text" placeholder="Name"
                            name="search[WORKPACK_ID]"
                            value="<?php echo $name; ?>" /> <input
                            type="text" placeholder="Code"
                            name="search[WORKPACK]"
                            value="<?php echo $code; ?>" /> <input
                            type="submit" name="go" class="btnSearch"
                            value="Search"> <input type="reset"
                            class="btnReset" value="Reset"
                            onclick="window.location='index.php'">
                    </p>
                </div>
                <div>
                    <a class="btn btn-large btn-info" href="add.php">Add
                        New</a>
                       
                </div>
                <br>
                <div >
                <table class='table table-bordered  table-responsive'>
                    <thead>
                        <tr>
                        <th>Aircraft</th><!--<th>ACF_ASSMBL_NAME</th>-->
                        <th>Immatriculation</th><!--<th>ACF_REGCOD_NOSPACE</th>-->
                            <th>Work Package</th><!--<th>WORKPACK</th>-->
                            <th>Barcode</th><!--<th>WORKPACK_BARCODE</th>-->
                            <th>Start Date</th><!--<th>WORKPACK_ACTSTDT</th>-->
                            <th>End Date</th><!--<th>WORK_PACKAGE_EST_END_DATE</th>-->
                            <th>Status</th><!--<th>WORKPACK_STATUS</th>-->
                            <th>Work Location</th><!--<th>WORKPACK_LOC_CD</th>-->
                            <th>Work Package Number</th><!--<th>WORKPACK_NUMBER</th>-->
                            <th>Test</th><!--<th>TEST</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (! empty($result)) {
                            foreach ($result as $key => $value) {
                                if (is_numeric($key)) {
                        ?>
                                    <tr>
                                        <td><?php echo $result[$key]['ACF_ASSMBL_NAME']; ?></td>
                                        <td><?php echo $result[$key]['ACF_REGCOD_NOSPACE']; ?></td>
                                        <td><?php echo $result[$key]['WORKPACK']; ?></td>
                                        <td><a href="../002_frm_workscopeBT/002_frm_workscopeBT.php?WORKPACK_BARCODE=<?php echo $result[$key]['WORKPACK_BARCODE']; ?>"><?php echo $result[$key]['WORKPACK_BARCODE']; ?></a></td>
                                        <td><?php echo $result[$key]['WORKPACK_ACTSTDT']; ?></td>
                                        <td><?php echo $result[$key]['WORK_PACKAGE_EST_END_DATE']; ?></td>
                                        <td><?php echo $result[$key]['WORKPACK_STATUS']; ?></td>
                                        <td><?php echo $result[$key]['WORKPACK_LOC_CD']; ?></td>
                                        <td><?php echo $result[$key]['WORKPACK_NUMBER']; ?></td>

                                        <td><a class="mr-20"
                                                href="edit.php?WORKPACK_ID=<?php //echo $result[$key]["WORKPACK_ID"]; ?>">Edit</a>
                                            <a
                                                href="delete.php?action=delete&WORKPACK_ID=<?php //echo $result[$key]["WORKPACK_ID"]; ?>">Delete</a>
                                        </td>
                                    </tr>
                                    
                            <?php
                                }
                            }
                        }?>
                        </tbody>
                                </table>
                    </div>
                        <?php
                        if (isset($result["perpage"])) {
                            ?>
                         <div align="center">
                         <ul class="pagination pagination-sm"><?php echo $result["perpage"]; ?></ul>
                        </div>

                        <?php } ?>
                    
            </form>
        </div>
    </div>
</body>

</html>