<?php

function cleanXss($value)
{
    return trim(strip_tags($value));
}

function debug($tableau)
{
    echo '<pre>';
    print_r($tableau);
    echo '</pre>';
}
function validationText($errors, $data, $key, $min, $max)
{
    if (!empty($data)) {
        if (mb_strlen($data) < $min) {
            $errors[$key] = 'Minimum ' . $min . ' caractères.';
        } elseif (mb_strlen($data) > $max) {
            $errors[$key] = 'Maximum ' . $max . ' caractères.';
        } else {
            // no error sur ce champ
        }
    } else {
        $errors[$key] = 'Veuillez renseigner ce champ.';
    }

    return $errors;
}

function pagination($page, $num, $count)
{ ?>
    <ul>
        <?php if ($page > 1) { ?>
            <li><a href="index.php?page=<?php echo ($page - 1); ?>">Précédent</a></li>
        <?php } ?>
        <?php if ($page * $num < $count) { ?>
            <li><a href="index.php?page=<?php echo ($page + 1); ?>">Suivant</a></li>
        <?php } ?>
    </ul>
<?php }

function formatageDate($valueDate)
{
    return date('d/m/Y à H:i', strtotime($valueDate));
}

function formatageDate2($valueDate)
{
    return date('d/m/Y', strtotime($valueDate));
}

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function isLogged()
{
    if (!empty($_SESSION['user'])) {
        if (!empty($_SESSION['user']['id']) && is_numeric($_SESSION['user']['id'])) {
            if (!empty($_SESSION['user']['prenom'])) {
                if (!empty($_SESSION['user']['role'])) {
                    if ($_SESSION['user']['role'] == 'abonne' || $_SESSION['user']['role'] == 'admin') {
                        if (!empty($_SESSION['user']['avatar'])) {
                            if (!empty($_SESSION['user']['ip']) && $_SESSION['user']['ip'] == $_SERVER['REMOTE_ADDR']) {
                                return true;
                            }
                        }
                    }
                }
            }
        }
    }
    return false;
}

// if (!isLogged()) {
//     header('Location: connexion.php');
// }
function ipConvert($ip)
{
    $resultbrut = '';
    for ($i = 0; $i <= 6; $i += 2) {

        $dizaine = substr($ip, $i, 1);
        $u = $i + 1;
        $unite = substr($ip, $u, 1);
        switch ($dizaine) {
            case '0':
                $dizaine = 0 * 16;
                break;
            case '1':
                $dizaine = 1 * 16;
                break;
            case '2':
                $dizaine = 2 * 16;
                break;
            case '3':
                $dizaine = 3 * 16;
                break;
            case '4':
                $dizaine = 4 * 16;
                break;
            case '5':
                $dizaine = 5 * 16;
                break;
            case '6':
                $dizaine = 6 * 16;
                break;
            case '7':
                $dizaine = 7 * 16;
                break;
            case '8':
                $dizaine = 8 * 16;
                break;
            case '9':
                $dizaine = 9 * 16;
                break;
            case 'a' || 'A':
                $dizaine = 10 * 16;
                break;
            case 'b' || 'B':
                $dizaine = 11 * 16;
                break;
            case 'c' || 'C':
                $dizaine = 12 * 16;
                break;
            case 'd' || 'D':
                $dizaine = 13 * 16;
                break;
            case 'e' || 'E':
                $dizaine = 14 * 16;
                break;
            case 'f' || 'F':
                $dizaine = 15 * 16;
                break;
        }
        switch ($unite) {
            case '0':
                $unite = 0;
                break;
            case '1':
                $unite = 1;
                break;
            case '2':
                $unite = 2;
                break;
            case '3':
                $unite = 3;
                break;
            case '4':
                $unite = 4;
                break;
            case '5':
                $unite = 5;
                break;
            case '6':
                $unite = 6;
                break;
            case '7':
                $unite = 7;
                break;
            case '8':
                $unite = 8;
                break;
            case '9':
                $unite = 9;
                break;
            case 'a' || 'A':
                $unite = 10;
                break;
            case 'b' || 'B':
                $unite = 11;
                break;
            case 'c' || 'C':
                $unite = 12;
                break;
            case 'd' || 'D':
                $unite = 13;
                break;
            case 'e' || 'E':
                $unite = 14;
                break;
            case 'f' || 'F':
                $unite = 15;
                break;
        }
        $res = $dizaine + $unite;
        if ($res < 10) {
            $res = '00' . $res;
        } elseif ($res < 100) {
            $res = '0' . $res;
        }
        $resultbrut = $resultbrut . $res;
    }
    $result = substr($resultbrut, 0, 3) . '.' . substr($resultbrut, 3, 3) . '.' . substr($resultbrut, 6, 3) . '.' . substr($resultbrut, 9, 3);
    return $result;
}

function showJson($data)
{
    header("content-type: application/json");
    $json = json_encode($data, JSON_PRETTY_PRINT);
    if ($json) {
        die($json);
    } else {
        die('error in json encoding');
    }
}

/*function insert()
{

}*/

/*function update()
{

}*/

/*function select($what = '*', $table,$nameCond, $condition,$type = "STR")
{
    require('inc/pdo.php');
    $requete = 'SELECT ' . $what . ' FROM ' . $table . ' WHERE ' . $nameCond . ' = :' . $nameCond;
    $sql = $requete;
    $var = $pdo->prepare($sql);
    $param = 'PDO::PARAM_' . $type;
    $var->bindValue(':' . $nameCond,$condition,$param);
    $var->execute();
    $result = $var->fetchAll();
    return $result;
}*/