<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <title>Generateur de mot de passe</title>
    <link rel="stylesheet" href="style/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- Bibliothéque jquery -->
    <script src="style/js/style.js"></script>
</head>
<body>
    <h1>Générateur de mot de passe</h1>
    <div id="generator">
        <form action="index.php" method="post">
            <p>
                <span id="pass"></span>
            </p>
            <p>
                <button id="buttonGenerate"><span>Générer un nouveau mot de passe</span></button>
            </p>
            <p>
                <button id="buttonCopy" class="js-copy" data-target="#pass"><span>Copier</span></button>
            </p>
            <p id="blocLongueur">
                <label for="longueur" id="longueur">Longueur</label>
                <input type="number" name="longueur" id="longueurNumber" value="12" min="8" max="80">
                <input type="range" class="custom-slider custom-slider-bullet" id="longueurRange" name="longueur" value="12" min="8" max="80" required>
            </p>
            <fieldset>
                <p>
                    <label for="majuscules">A-Z</label>
                    <input type="checkbox" id="majuscules" name="majuscules" value="1" checked="checked">
                </p>
                <p>
                    <label for="minuscules">a-z</label>
                    <input type="checkbox" id="minuscules" name="minuscules" value="1" checked="checked">
                </p>
                <p>
                    <label for="chiffres">0-9</label>
                    <input type="checkbox" id="chiffres" name="chiffres" value="1" checked="checked">
                </p>
                <p>
                    <label for="speciaux">!@#$%^&*</label>
                    <input type="checkbox" id="speciaux" name="speciaux" value="1" checked="checked">
                </p>
                <p>
                    <label for="caractere_exclude">Éviter les caractères ambigus [ 0 O I 1 l ]</label>
                    <input type="checkbox" id="caractere_exclude" name="caractere_exclude" value="1" checked="checked">
                </p>
            </fieldset>
        </form>
    </div>
    <div id="message">
    </div>
</body>
</html>