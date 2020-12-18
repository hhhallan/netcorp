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
        //echo $_SESSION['user']['id'];
        if (!empty($_SESSION['user']['id']) && is_numeric($_SESSION['user']['id'])) {
           
            if (!empty($_SESSION['user']['prenom'])) {
                if (!empty($_SESSION['user']['ip']) && $_SESSION['user']['ip'] == $_SERVER['REMOTE_ADDR']) {
                    
                    return true;
                }
            }
        
        }
    }
}

function showJson($data)
{
    header("Content-type: application/json");
    $json = json_encode($data, JSON_PRETTY_PRINT);
    if ($json) {
        die($json);
    } else {
        die('error in json encoding');
    }
}

// if (!isLogged()) {
//     header('Location: connexion.php');
// }

// FUNCTIONS PHP - MYSQL
// function selectWhere($many = '*',$table,$propriete,$pdoconst = PDO::PARAM_STR,$switch,$pdo)
// {
//     $sql = "SELECT $many FROM $table WHERE $propriete = :$propriete";
//     $var = $pdo->prepare($sql);
//     $var->bindValue(':$propriete',$propriete,$pdoconst);
//     $var->execute();
//     $result = $var->$switch;
//     return $result;
// };