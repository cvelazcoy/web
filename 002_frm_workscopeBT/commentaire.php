<?php
//require_once __DIR__ . '/lib/DataSource.php';
require('../lib/DataSource.php');

$username=shell_exec("echo %username%" );

$database = new DataSource();
if (! empty($_POST["submit"])) {
    $sql = "INSERT INTO bt_bd.bt_historique
(WORKPACK_BARCODE, WORKSCOPE_BARCODE, WORKSCOPE_STATUS, VIC_STATUS, STATUS_AP_BT, IMPACT_CHANTIER, RAISON_BT, COMMENTAIRE, UTILISATEUR, DATE_ACTION)
VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?,CURRENT_TIMESTAMP())";
    $paramType = 'sssssssss';
    $paramValue = array(
        $_POST["WORKPACK_BARCODE_VALUE"],
        $_POST["WORKSCOPE_BARCODE_VALUE"],
        $_POST["WORKSCOPE_STATUS_VALUE"],
        $_POST["VIC_STATUS_VALUE"],
        $_POST["STATUT-AP-BT"],
        $_POST["IMPACT-CHANTIER"],
        $_POST["RAISON-AP-BT"],
        $_POST["COMMENTAIRE"],
        trim($username)
    );
    $result = $database->insert($sql, $paramType, $paramValue);
    if (!$result) {
        $message = "Erreur! Please Retry!";
    } else {
        $message = "Ligne enregistr&eacute;e!";
        //header("Location:index.php");
    }
}
$sql = "SELECT * FROM bugtracker.workscope_bt WHERE WORKSCOPE_BARCODE=?";
$paramType = 's';
$paramValue = array(
    $_GET["WORKSCOPE_BARCODE"]
);
$result = $database->select($sql, $paramType, $paramValue);
?>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/form.css" />
    <link rel="stylesheet" type="text/css" href="https://ebri.airfrance.com/app/css/Site.min.css">
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="../js/validation.js" type="text/javascript"></script>
</head>

<style>
        .btnFermerIframe {
            border: none;
    display: inline-block;
    padding: 8px 16px;
    vertical-align: middle;
    overflow: hidden;
    text-decoration: none;
    color: inherit;
    background-color: inherit;
    text-align: center;
    cursor: pointer;
    white-space: nowrap;
    position: absolute;
    right: 0;
    top: 0;
        }
</style>

<script>
function model_close(){
        //alert("rerer");
        frmCommenter.style.display = "none";
 };
</script>

<body>
    <div class="phppot-container text-center">
        <form name="frmCommenter" method="post" accept-charset="UTF-8" action="" id="frmCommenter"
            onClick="return validate();">
            <?php if (! empty($message)) { ?>
                <div class="error">
                    <?php echo $message; ?>
                </div><?php } ?>
        
                <span onclick="window.parent.closeIframe();" class="btnFermerIframe">&times;</span>
        <h4>Commenter</h4>

            <div class="row">
                <label class="text-left">WORKPACK_BARCODE [<?php echo $result[0]["WORKPACK_BARCODE"]; ?>] : <span id="name-info"
                ></span></label> <input
                    type="text" name="WORKPACK_BARCODE" id="WORKPACK_BARCODE" class="full-width"
                    value="<?php echo $result[0]["WORKPACK"]; ?>" disabled>
                    <input type="hidden" name="WORKPACK_BARCODE_VALUE" id="WORKPACK_BARCODE_VALUE"
                    value="<?php echo $result[0]["WORKPACK_BARCODE"]; ?>">
            </div>
            <div class="row">
                <label class="text-left">TASK DETAIL [<?php echo $result[0]["WORKSCOPE_BARCODE"]; ?>] :</label> <input
                    type="text" name="WORKSCOPE_BARCODE" id="WORKSCOPE_BARCODE" class="full-width"
                    value="<?php echo $result[0]["WORKSCOPE"]; ?>" disabled>
                    <input type="hidden" name="WORKSCOPE_BARCODE_VALUE" id="WORKSCOPE_BARCODE_VALUE"
                    value="<?php echo $result[0]["WORKSCOPE_BARCODE"]; ?>">
            </div>
            <div class="row">
                <label class="text-left">WORKSCOPE_STATUS: </label> <input
                    type="text" name="WORKSCOPE_STATUS" id="WORKSCOPE_STATUS"
                    class="full-width"
                    value="<?php echo $result[0]["WORKSCOPE_STATUS"]; ?>" disabled>
                    <input type="hidden" name="WORKSCOPE_STATUS_VALUE" id="WORKSCOPE_STATUS_VALUE"
                    value="<?php echo $result[0]["WORKSCOPE_STATUS"]; ?>">
            </div>
            <div class="row">
                <label class="text-left">VIC_STATUS:</label><input
                    type="text" name="VIC_STATUS" id="VIC_STATUS"
                    class="full-width"
                    value="<?php echo $result[0]["VIC_STATUS"]; ?>" disabled>
                    <input type="hidden" name="VIC_STATUS_VALUE" id="VIC_STATUS_VALUE"
                    value="<?php echo $result[0]["VIC_STATUS"]; ?>">
            </div>
            <div class="row">
                <label class="text-left">STATUT AP BT : <span
                        id="STATUT-AP-BT-info" class="validation-message"></span></label>
                    <select name="STATUT-AP-BT" id="STATUT-AP-BT" class="full-width">
  <option selected value></option>
  <option value="1-Prise en main BT">Prise en main BT</option>
  <option value="2-Attente retour production">Attente retour production</option>
  <option value="3-Attente reponse constructeur">Attente r&eacute;ponse constructeur</option>
  <option value="4-Solde BT">Sold&eacute; BT</option>
</select>
            </div>
            <div class="row">
                <label class="text-left">IMPACT CHANTIER / TAT : <span
                        id="IMPACT-CHANTIER-info" class="validation-message"></span></label>
                    <select name="IMPACT-CHANTIER" id="IMPACT-CHANTIER" class="full-width">
  <option selected value></option>
  <option value="1-Fort-Impact sur le chemin critique">Fort : Impact sur le chemin critique</option>
  <option value="2-Moyen-Impact probable sur le chemin critique">Moyen : Impact probable sur le chemin critique</option>
  <option value="3-Faible-Impact peu probable sur le chemin critique">Faible : Impact peu probable sur le chemin critique</option>
  <option value="4-Nul-Aucun impact sur le chemin critique">Nul : Aucun impact sur le chemin critique</option>
</select>
            </div>

            <div class="row">
                <label class="text-left">RAISON AP BT: <span
                        id="RAISON-AP-BT-info" class="validation-message"></span></label>
                    <select name="RAISON-AP-BT" id="RAISON-AP-BT" class="full-width">
  <option selected value></option>
  <option value="1-Injustifie">Injustifi&eacute;</option>
  <option value="2-Mal redige">Mal r&eacute;dig&eacute;</option>
  <option value="3-Non qualite">Non qualit&eacute;</option>
  <option value="4-Logistique">Logistique</option>
  <option value="5-Late Finding">Late Finding</option>
  <option value="6-Solicitation exterieur">Sollicitation ext&eacute;rieure</option>
</select>
            </div>
            <div class="row">
                <label class="text-left">COMMENTAIRE BT: <span
                        id="stock-count-info" class="validation-message"></span></label><input 
                    type="text" name="COMMENTAIRE" id="COMMENTAIRE"
                    class="full-width"
                    value="">
            </div>
            <div class="row">
                <input type="submit" name="submit" id="btnAddAction"
                    class="full-width " value="Enregistrer" />
            </div>
        </form>
    </div>
</body>

</html>