<?php
//require_once __DIR__ . '/lib/DataSource.php';
require('../lib/DataSource.php');

$database = new DataSource();
if (! empty($_POST["submit"])) {
    $sql = "UPDATE toy SET name=?, code=?, category=?, price=?, stock_count=? WHERE id=?";
    $paramType = 'sssdii';
    $paramValue = array(
        $_POST["name"],
        $_POST["code"],
        $_POST["category"],
        $_POST["price"],
        $_POST["stock_count"],
        $_GET["id"]
    );
    $result = $database->execute($sql, $paramType, $paramValue);
    if (! $result) {
        $message = "problem in Editing! Please Retry!";
    } else {
        header("Location:index.php");
    }
}
$orderby = " ORDER BY DATE_ACTION DESC";
$sql = "SELECT rs.*, usr.user_username as USERNAME, 
CONCAT(CONCAT(UPPER(usr.USER_LASTNAME),' '),usr.USER_FIRSTNAME) as NOM,
usr.USER_EMAIL as MAIL FROM bt_bd.bt_historique rs left join bt_bd.user_acti usr on usr.user_username = rs.UTILISATEUR WHERE WORKSCOPE_BARCODE=?".$orderby;

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
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"
        type="text/javascript"></script>
    <script src="../js/validation.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/tutorials/timelines/timeline-1/assets/css/timeline-1.css">
    <link rel="stylesheet" type="text/css" href="https://ebri.airfrance.com/app/css/Site.min.css">

    <style>
        .btnFermerIframe{
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

<meta charset="utf-8">

</head>

<body>
    <!--
    <div class="phppot-container text-center">
        <form name="frmCommenter" method="post" action="" id="frmToy"
            onClick="return validate();">
            <?php if (! empty($message)) { ?>
                <div class="error">
                    <?php echo $message; ?>
                </div><?php } ?>
            <h1>Historique</h1>
            <div class="row">
                <label class="text-left">WORKPACK_BARCODE: <span id="name-info"
                        class="validation-message"></span></label> <input
                    type="text" name="WORKPACK_BARCODE" id="WORKPACK_BARCODE" class="full-width"
                    value="<?php echo $result[0]["WORKPACK_BARCODE"]; ?>">
            </div>
            <div class="row">
                <label class="text-left">WORKSCOPE_BARCODE: <span id="code-info"
                        class="validation-message"></span></label> <input
                    type="text" name="WORKSCOPE_BARCODE" id="WORKSCOPE_BARCODE" class="full-width"
                    value="<?php echo $result[0]["WORKSCOPE_BARCODE"]; ?>">
            </div>
            <div class="row">
                <label class="text-left">WORKSCOPE: <span
                        id="category-info" class="validation-message"></span></label><input
                    type="text" name="WORKSCOPE" id="WORKSCOPE"
                    class="full-width"
                    value="<?php echo $result[0]["WORKSCOPE"]; ?>">
            </div>
            <div class="row">
                <label class="text-left">WORKSCOPE_STATUS: <span id="price-info"
                        class="validation-message"></span></label> <input
                    type="text" name="WORKSCOPE_STATUS" id="WORKSCOPE_STATUS"
                    class="full-width"
                    value="<?php echo $result[0]["WORKSCOPE_STATUS"]; ?>">
            </div>
            <div class="row">
                <label class="text-left">VIC_STATUS: <span
                        id="stock-count-info" class="validation-message"></span></label><input
                    type="text" name="VIC_STATUS" id="VIC_STATUS"
                    class="full-width"
                    value="<?php echo $result[0]["VIC_STATUS"]; ?>">
            </div>
            <div class="row">
                <label class="text-left">CATEGORIE BT: <span
                        id="CATEGORIE" class="validation-message"></span></label>
                    <select name="CATEGORIE" class="full-width">
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="-">Other</option>
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
-->
<div class="phppot-container text-center">
<span onclick="window.parent.closeIframe();" class="btnFermerIframe">&times;</span>
<h4>Historique</h4>
</div>

    <!-- Timeline 1 - Bootstrap Brain Component -->
<section class="bsb-timeline-1 py-5 py-xl-8">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-10 col-md-8 col-xl-6">

        <ul class="timeline">
    
        <?php
                        if (! empty($result)) {
                            foreach ($result as $key => $value) {
                                if (is_numeric($key)) {
                        ?>

        <!-- Appliquer boucle -->

          <li class="timeline-item">
            <div class="timeline-body">
              <div class="timeline-content">
                <div class="card border-0">
                  <div class="card-body p-0">
                    <h5 class="card-subtitle text-secondary mb-0"><?php echo $result[$key]['DATE_ACTION']; ?></h5>
                    <p class="card-title mb-0"><strong><?php echo $result[$key]['UTILISATEUR']; ?></strong> (<a href="mailto:<?php echo $result[$key]['MAIL']; ?>"><?php echo $result[$key]['NOM']; ?></a>)</p>
                    <p class="card-text m-0"><strong>VIC_STATUS : </strong><?php echo $result[$key]['VIC_STATUS']; ?></p>
                    <p class="card-text m-0"><strong>WORKSCOPE_STATUS : </strong><?php echo $result[$key]['WORKSCOPE_STATUS']; ?></p>
                    <p class="card-text m-0"><?php echo(!Empty($result[$key]['STATUS_AP_BT'])?'<strong>STATUS_AP_BT : </strong>'.$result[$key]['STATUS_AP_BT']:null); ?></p>
                    <p class="card-text m-0"><?php echo(!Empty($result[$key]['IMPACT_CHANTIER'])?'<strong>IMPACT_CHANTIER : </strong>'.$result[$key]['IMPACT_CHANTIER']:null); ?></p>
                    <p class="card-text m-0"><?php echo(!Empty($result[$key]['RAISON_BT'])?'<strong>RAISON_BT : </strong>'.$result[$key]['RAISON_BT']:null); ?></p>
                    <p class="card-text m-0"><?php echo(!Empty($result[$key]['COMMENTAIRE'])?'<strong>COMMENTAIRE : </strong>'.$result[$key]['COMMENTAIRE']:null); ?></p>                    
                  </div>
                </div>
              </div>
            </div>
          </li>
          
        <!-- Appliquer boucle -->

        <?php
                                }
                            }
                        }?>
    

        </ul>

      </div>
    </div>
  </div>
</section>
</body>

</html>