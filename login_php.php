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
replaceArrayKey($listPOST, '0', 'USER_USERNAME');
replaceArrayKey($listPOST, '1', 'PASSWORD');

print_r($listPOST);

// on vérifie que les données du formulaire sont présentes
if (isset($_POST['Matricule']) && isset($_POST['MdP'])) {

    if (!empty($_POST["Matricule"])) {
        foreach ($listPOST as $k => $v) {
            
            if (!empty($v)) {
                $queryCases = ["USER_USERNAME","PASSWORD"];
                if (in_array($k, $queryCases)) {
                    $queryCondition .= empty($queryCondition) ? " WHERE " : " AND ";
                }
                switch ($k) {
                    case "USER_USERNAME":
                        $name = $v;
                        $queryCondition .= "USER_USERNAME = ? ";
                        $paramType .= "s"; // 's' for string
                        $paramValue[] = $v  ; // Partial match
                        break;
                    case "PASSWORD":
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
    $query = "SELECT * FROM bt_bd.user_acti where ". $queryCondition;

    echo($query);

    $login = $_POST['Matricule'];
    $mdp = $_POST['MdP'];

    $result = $database->select($query, $paramType, $paramValue);

    echo($result);

    if ($result->rowCount() == 1) {
        // l'utilisateur existe dans la table
        // on ajoute ses infos en tant que variables de session
        $_SESSION['Matricule'] = $login;
        $_SESSION['MdP'] = $mdp;
        // cette variable indique que l'authentification a réussi
        $authOK = true;
    }
}

function escape($valeur)
{
    // Convertit les caractères spéciaux en entités HTML
    return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8', false);
}

function replaceArrayKey($array, $oldKey, $newKey){
    //If the old key doesn't exist, we can't replace it...
    if(!isset($array[$oldKey])){
        return $array;
    }
    //Get a list of all keys in the array.
    $arrayKeys = array_keys($array);
    //Replace the key in our $arrayKeys array.
    $oldKeyIndex = array_search($oldKey, $arrayKeys);
    $arrayKeys[$oldKeyIndex] = $newKey;
    //Combine them back into one array.
    $newArray =  array_combine($arrayKeys, $array);
    return $newArray;
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