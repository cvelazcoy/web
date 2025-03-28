<?php
//require_once __DIR__ . '/lib/perpage.php';
//require_once __DIR__ . '/lib/DataSource.php';
require('../lib/perpage.php');
require('../lib/DataSource.php');

$username=shell_exec("echo %username%" );
echo ("username : $username" );
echo ("HTTP_X_FORWARDED_FOR :" );
echo (getenv("HTTP_X_FORWARDED_FOR"));
echo ("REMOTE_ADDR:" );
echo (getenv('REMOTE_ADDR'));
echo ("REMOTE_HOST:" );
echo (getenv('REMOTE_HOST'));

ini_set("display_errors", 1);

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
$sql = "select WORKPACKAGE_LINENB,WORKPACK_BARCODE, WORKSCOPE_BARCODE, WORKSCOPE,WORKSCOPE_STATUS,WORKSCOPE_PRIORITY, WORKSCOPE_TYPE, VIC_STATUS, COMMENT, FLAG_INT, LABOR_SKILL_LIST, STATUS_AP_BT, COUNT_HISTO, JOURS_DESP_PRISE  from bt_bd.vw_workscope_bt" . $queryCondition . $orderby;
$href = '002_frm_workscopeBT.php';



$result = $database->select($sql, $paramType, $paramValue);


?>
<html>

<head>
    <title>Test Formulaire</title>
    <!--<link rel="stylesheet" type="text/css" href="css/style.css" />-->
    <!--<link rel="stylesheet" type="text/css" href="css/table.css" /> -->
   <!-- <link rel="stylesheet" type="text/css" href="css/form.css" /> -->
   <!-- <link rel="stylesheet" type="text/css" media="screen" href="https://cei-airfrance.moneweb.fr/themes/AirFranceIndustrieClient/Content/combined.76ALEZYQ5.css">-->
   
   <!--<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> -->
   <!--<script src="../bootstrap/js/bootstrap.min.js"></script>-->
   
   <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>-->
   <!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> --> 
   <link rel="stylesheet" type="text/css" href="../bootstrap/css/style.css">

  <!--<link rel="stylesheet" type="text/css" href="https://ebri.airfrance.com/app/css/Site.min.css"> --> 

   
  
  <script>



function var_code(trfx){
   

    modal = document.getElementById("myIframe");
    modal.style.display = "block";
    document.getElementById('myIframe').src = "commentaire.php?WORKSCOPE_BARCODE="+trfx;
    
};




function histo_code(trfx){
    modal = document.getElementById("myIframe");
    modal.style.display = "block";
    document.getElementById('myIframe').src = "historique.php?WORKSCOPE_BARCODE="+trfx;
};

function closeIframe() {
    //var iframe = document.getElementById('myIframe');
    //if (iframe) {
    //    iframe.parentNode.removeChild(iframe);
    //}
            //alert("rerer");
            document.getElementById('myIframe').style.display = "none";
            modal.style.display = "none";
            //location.reload();
            //window.location.reload();
}

   </script>

 <style>
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

#myIframe {
  display: none;
  position: fixed;
  left: 10%;
  top: 10vh;
  height: 80%;
  width: 50%;
  background-color: white;
    z-index: 1;
}

#myIframe.show {
  align-items: center;
  display: flex;
  flex-direction: column;
}

    </style>

 <!--HEAD table-->
 <meta charset="UTF-8">
 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script> 
 <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
 <!--<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css'>-->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.24.1/dist/bootstrap-table.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.24.1/dist/bootstrap-table.min.js"></script>

<link rel='stylesheet' href='https://rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css'>
<!--<script src="https://raw.githubusercontent.com/wenzhixin/bootstrap-table/refs/heads/master/src/locale/bootstrap-table-fr-FR.js"></script>-->
<link rel='stylesheet' href='https://raw.githubusercontent.com/wenzhixin/bootstrap-table/refs/heads/develop/dist/extensions/sticky-header/bootstrap-table-sticky-header.css'>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.2/css/all.min.css'>



  <script>
  window.console = window.console || function(t) {};
</script>

 <!-- FIN HEAD table-->
   
</head>

<body>

<!-- gkkgkg --->
<!-- fjdjfjd-->


<div class="text-center">
                            <h2 class="redLine redLine--center">
                                Pilotage BT
                            </h2>
</div>



        <!--<h1 class="edito__chapo pdfHidden">Test </h1>-->

                <div>
                    <a class="btn btn-large btn-info" href="../001_frm_workpackBT/001_frm_workpackBT.php">Visites</a>
                </div>
                <div>
                    <a class="btn btn-large btn-info" href="add.php">Ajouter Nouvelle Ligne</a>
                </div>
                <div>
                    <a class="btn btn-large btn-info" href="https://app.powerbi.com/reportEmbed?reportId=2853be91-900a-4259-9d22-7de4505dbd09&autoAuth=true&ctid=9b802d8b-33fa-40fb-acb7-9ffdbd1919eb">Tableau de bord</a>
                </div>
                <br>

    
    <div id="modal">

    <iframe id="myIframe" src="" width="50%" src="#" height="100%"></iframe>

    </div>

<!--============================DEBUT TABLE==============================!-->
<!--<div class="container">-->
<div>

<div id="toolbar">
		<select class="form-control">
				<option value="">Export Basic</option>
				<option value="all">Export All</option>
				<option value="selected">Export Selected</option>
		</select>
</div>

<table id="table" 
			 data-toggle="table"
			 data-search="true"
			 data-filter-control="true" 
			 data-show-export="true"
			 data-click-to-select="true"
			 data-toolbar="#toolbar"
			 data-show-columns="true"
			 data-pagination = "true"
			 data-locale="fr"
             data-sticky-header="true"
             data-show-search-clear-button="true"
             data-show-pagination-switch="true"
      data-show-refresh="true"
      data-auto-refresh="true"
       class="table-responsive">
	<thead>
		<tr>
			<!--<th data-field="state" data-checkbox="true"></th>
			<th data-field="prenom" data-filter-control="input" data-sortable="true">First Name</th>
			<th data-field="date" data-filter-control="select" data-sortable="true">Date</th>
			<th data-field="examen" data-filter-control="select" data-sortable="true">Examination</th>
			<th data-field="note" data-sortable="true">Note</th>-->
            <th width="1%" data-sortable="true">Nro</th><!--<th>ACF_ASSMBL_NAME</th>-->
            <th width="2%">VIC status</th><!--<th>ACF_REGCOD_NOSPACE</th>-->
            <th width="8%" data-filter-control="input"  data-sortable="true">Barcode WP</th><!--<th>ACF_REGCOD_NOSPACE</th>-->
            <th width="15%">Work Package</th><!--<th>WORKPACK</th>-->
            <th width="6%" data-field="WORKSCOPE_BARCODE"  data-filter-control="input" data-formatter="LinkFormatter" data-sortable="true">Barcode TSK</th><!--<th>WORKPACK_BARCODE</th>-->
            <th width="5%">Labors</th><!--<th>WORKPACK_BARCODE</th>-->
            <!--<th width="5%">Risque BT</th> <th>WORKPACK_BARCODE</th>-->
            <th  width="15%">Comment VIC</th><!--<th>WORKPACK_BARCODE</th>-->
            <th  width="10%" data-field="Status_BT" data-filter-control="select">Status BT</th><!--<th>WORKPACK_BARCODE</th>-->
            <th  width="8%" data-formatter="ChampsHistoBT" data-sortable="true">Histo BT</th><!--<th>WORKPACK_BARCODE</th>-->
            <th  width="8%" data-field="Jours_pris"  data-sortable="true" data-filter-control="select">Jours pris par BT</th><!--<th>WORKPACK_BARCODE</th>-->
            <th data-formatter="ChampsActionCommentaire">Action</th><!--<th>TEST</th>-->
            <!--<th>Test</th> <th>TEST</th>-->
		</tr>
	</thead>
	<tbody>
        <!--
		<tr>
			<td class="bs-checkbox "><input data-index="0" name="btSelectItem" type="checkbox"></td>
			<td>Jitender</td>
			<td>01/09/2015</td>
			<td>Français</td>
			<td>12/20</td>
		</tr>
        -->
		<?php
                        if (! empty($result)) {
                            foreach ($result as $key => $value) {
                                if (is_numeric($key)) {
                        ?>
                                    <tr>
                                        <td><?php echo $result[$key]['WORKPACKAGE_LINENB']; ?></td>
                                        <td><?php echo $result[$key]['VIC_STATUS']; ?></td>
                                        <td><?php echo $result[$key]['WORKPACK_BARCODE']; ?></td>
                                        <td><?php echo $result[$key]['WORKSCOPE']; ?></td>
                                        <td><?php echo $result[$key]['WORKSCOPE_BARCODE']; ?></td>
                                        <td><?php echo $result[$key]['LABOR_SKILL_LIST']; ?></td>
                                        <!--<td><a href="#" onclick="myAjax('<?php echo $result[$key]["WORKPACK_BARCODE"]; ?>','<?php echo $result[$key]["WORKSCOPE_BARCODE"]; ?>','<?php echo trim($username); ?>');">Marquer</a></td> -->
                                        <td><?php echo $result[$key]['COMMENT']; ?></td>
                                        <td><?php echo $result[$key]['STATUS_AP_BT']; ?></td>
                                        <td><?php echo $result[$key]['COUNT_HISTO']; ?></td>
                                        <td><?php echo $result[$key]['JOURS_DESP_PRISE']; ?></td>
                                        <td></td>

                                        <!--<td>-->
                                            <!--<a class="mr-20" href="commentaire.php?WORKSCOPE_BARCODE=<?php echo $result[$key]["WORKSCOPE_BARCODE"]; ?>">Commenter</a>-->
                                            <!--<a  href="#" onclick="model_frm()">Historique2</a> -->
                                            <!--<a  href="commentaire.php?WORKSCOPE_BARCODE=<?php echo $result[$key]["WORKSCOPE_BARCODE"]; ?>" class='ls-modal'>Historique1</a>-->
                                            <!--<a id="commentaire"  href="#" onclick="var_code('<?php echo $result[$key]["WORKSCOPE_BARCODE"]; ?>')">Commenter</a>-->
                                            <!--<a id="historique" href="#" onclick="histo_code('<?php echo $result[$key]["WORKSCOPE_BARCODE"]; ?>')">Historique</a>-->

                                            <!--<a href="delete.php?action=delete&WORKPACK_ID=<?php //echo $result[$key]["WORKPACK_ID"]; ?>">Delete</a>-->
                                        <!--</td>-->
                                    </tr>
                                    
                            <?php
                                }
                            }
                        }?>
	</tbody>
</table>
</div>

<!--<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.js'></script>-->
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/editable/bootstrap-table-editable.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/export/bootstrap-table-export.js'></script>
<script src='https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/filter-control/bootstrap-table-filter-control.js'></script>
<script src='https://unpkg.com/bootstrap-table@1.9.1/dist/locale/bootstrap-table-fr-FR.js'></script>
<!--<script src='https://unpkg.com/bootstrap-table@1.9.1/dist/extensions/multiple-search/bootstrap-table-multiple-search.js'></script>
<script src='https://raw.githubusercontent.com/wenzhixin/bootstrap-table/refs/heads/develop/dist/extensions/sticky-header/bootstrap-table-sticky-header.js'></script>-->




      <script id="rendered-js" >
//exporte les données sélectionnées
var $table = $('#table');
$(function () {
  $('#toolbar').find('select').change(function () {
    $table.bootstrapTable('refreshOptions', {
      exportDataType: $(this).val() });

  });
});

var trBoldBlue = $("table");

$(trBoldBlue).on("click", "tr", function () {
  $(this).toggleClass("bold-blue");
});
//# sourceURL=pen.js



function LinkFormatter(value, row) {
    //var icon = row.id % 2 === 0 ? 'fa-star' : 'fa-star-and-crescent'
    return '<a href=http://mtx.af-klm.com/maintenix/servlet/ScanBarcode?aBarcodeScan=' + value + ' target=_blank>'+ value +'</a>'
  }

  function ChampsHistoBT(value, row) {
    var WORKSCOPE_BARCODE = row.WORKSCOPE_BARCODE;
    return '<a id=historique href=# onclick="histo_code(\''+ WORKSCOPE_BARCODE+'\'); return false;">' + value + '</a>'
  }

  function ChampsActionCommentaire(value, row) {
    var WORKSCOPE_BARCODE = row.WORKSCOPE_BARCODE;
    return '<a id=commentaire href=# onclick="var_code(\''+WORKSCOPE_BARCODE+'\'); return false;" title="Commenter"><i class="fa fa-book"></i></a> '+
    '<a id=commentaire href=# onclick="showDialog(); return false;" title="Commenter"><i class="fa fa-bullhorn"></i></a> '
  }

    </script>


<!--==============================FIN TABLE============================!-->

<div id='dialog'>
  <span>Oh wow, modal! We can close this now.</span>
  <button id='close' onClick='closeDialog()'>Close Dialog</button>
</div>

<style>
    #dialog {
  display: none;
  position: fixed;
  top: 10vh;
  left: 10vw;
  width: 80vw;
  height: 80vw;
  border: 1px solid #eee;
  border-radius: 4px;
  padding: 10px;
  text-align: center;
  z-index: 1;
  background-color: #444;
  color: #fff;
}
#dialog.show {
  align-items: center;
  display: flex;
  flex-direction: column;
}
</style>

<script>
    const showDialog = () => {
  document.getElementById('dialog').classList.add('show')
  const scrollY = document.documentElement.style.getPropertyValue('--scroll-y');
  const body = document.body;
};
const closeDialog = () => {
  const body = document.body;
  const scrollY = body.style.top;
  body.style.position = '';
  body.style.top = '';
  //window.scrollTo(0, parseInt(scrollY || '0') * -1);
  document.getElementById('dialog').classList.remove('show');
}
window.addEventListener('scroll', () => {
  document.documentElement.style.setProperty('--scroll-y', `${window.scrollY}px`);
});
</script>

<!--LAST VERSION-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.24.1/dist/bootstrap-table.min.css">

<script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.24.1/dist/bootstrap-table.min.js"></script>

<table
  id="table"
  data-toggle="table"
  data-url="json/data1.json"
>
  <thead>
    <tr>
      <th data-field="id">
        ID
      </th>
      <th data-field="name">
        Item Name
      </th>
      <th data-field="price">
        Item Price
      </th>
    </tr>
  </thead>
</table>
<!--LAST VERSION-->

</body>

</html>