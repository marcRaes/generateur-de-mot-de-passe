<?php
echo generateMDP();
function generateMDP () {
    $_GET = json_decode($_GET['arguments']);

    if(!isset($_GET->longueur) || $_GET->longueur < 8 || $_GET->longueur > 130) {
        $_GET->longueur = 12;
    }

    // $chars contient les caractères autorisés
    $charsMajuscules = "ABCDEFGHJKLMNPQRSTUVWXYZ";
    $charsMinuscules = "abcdefghijkmnopqrstuvwxyz";
    $charsChiffres = "23456789";
    $charsSpeciaux = "!@#$%^&*-=+/:?'`~{}()\"[]|_\\;.,^";
    $charsSimilaires = "0OI1l";

    $chars = 0;

    if($_GET->majuscules === true) {
        $chars .= $charsMajuscules;
    }
    if($_GET->minuscules === true) {
        $chars .= $charsMinuscules;
    }
    if($_GET->chiffres === true) {
        $chars .= $charsChiffres;
    }
    if($_GET->speciaux === true) {
        $chars .= $charsSpeciaux;
    }
    if($_GET->caractere_exclude === false) {
        $chars .= $charsSimilaires;
    }

    // $pass contiendra le mot de passe généré
    $pass = '';

    for ($nbchars = 0; $nbchars < $_GET->longueur; $nbchars++) {
        $caractere = $chars[rand(0, strlen($chars) - 1)];
        if($_GET->longueur < strlen($chars)) {
            if (strpos($pass, $caractere) === false) {
                $pass .= $caractere;
            } else {
                $nbchars--;
            }
        } else {
            $pass .= $caractere;
        }
    }

    return str_shuffle($pass);
}
?>