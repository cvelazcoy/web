<?php
include('lib/DataSource.php');
ini_set("display_errors", 1);
$database = new DataSource();

$name = "";
$code = "";

$queryCondition = "";
$paramType = "";
$paramValue = [];



session_start();  // démarrage d'une session

$post_string = implode(",", $_POST);
$listPOST = explode(",",$post_string);

//print_r($listPOST);

// on vérifie que les données du formulaire sont présentes
if (isset($_POST['Matricule']) && isset($_POST['MdP'])) {

    if (!empty($_POST["Matricule"])) {
        foreach ($listPOST as $k => $v) {
            
            if (!empty($v)) {
                $queryCases = ["0","1"];
                if (in_array($k, $queryCases)) {
                    $queryCondition .= empty($queryCondition) ? " WHERE " : " AND ";
                }
                switch ($k) {
                    case "0":
                        $name = $v;
                        $queryCondition .= "USER_USERNAME = ? ";
                        $paramType .= "s"; // 's' for string
                        $paramValue[] = $v  ; // Partial match
                        break;
                    case "1":
                        $code = $v;
                        $queryCondition .= "USER_USERNAME = ? ";
                        $paramType .= "s";
                        $paramValue[] =  $v  ; // Partial match
                        break;
                }
            }
        }
    }

    // cette requête permet de récupérer l'utilisateur depuis la BD
    $query = "SELECT * FROM bt_bd.user_acti ". $queryCondition;

    //echo($query);

    $login = $_POST['Matricule'];
    $mdp = $_POST['MdP'];

    $result = $database->select($query, $paramType, $paramValue);

    //print_r($result);

    if (! empty($result)) {
        // l'utilisateur existe dans la table
        // on ajoute ses infos en tant que variables de session
        $_SESSION['Matricule'] = $login;
        $_SESSION['MdP'] = $mdp;
        $_SESSION['USER_EMAIL'] = $result[0]['USER_EMAIL'];
        // cette variable indique que l'authentification a réussi
        $authOK = true;
    }
}

function escape($valeur)
{
    // Convertit les caractères spéciaux en entités HTML
    return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8', false);
}

if($authOK) {
	header("Location: navCondor.php");
    exit;
} else {
    header("Location: login-form-5.html");
}

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Résultat de l'authentification</title>
</head>
<body>
    <h1>Résultat de l'authentification</h1>
    <?php
    if (isset($authOK)) {
        echo "<p>Vous avez été reconnu(e) en tant que " . escape($login) . "</p>";
        echo '<a href="index.php">Poursuivre vers la page d\'accueil</a>';
    }
    else { ?>
        <p>Vous n'avez pas été reconnu(e)</p>
        <p><a href="login.php">Nouvel essai</p>
    <?php } ?>
</body>
</html>