$(function() {
    // Génération du mot de passe
    genereMdp();

    // Empeche de décoché toutes les cases à coché
    $('input[type=checkbox]').on('click', function() {
        let genere = true;
        let nb_checkbox_coche = $( "input:checked" ).length;
        if(nb_checkbox_coche === 0) {
            $(this).prop('checked', true);
            genere = false;
        }
        if(genere) {
            // Génération du mot de passe
            genereMdp();
        }
    });

    // La valeur de l'input "range" sera affiché dans le input "number"
    $('input[type=range]#longueurRange').on('input', function() {
        let valRange = parseInt($(this).val());
        $('input[type=number]#longueurNumber').val(valRange);
        // Génération du mot de passe
        genereMdp();
    });

    // La valeur de l'input "number" sera affiché dans le input "range"
    $('input[type=number]#longueurNumber').on('input', function() {
        let valNumber = $(this).val();
        $('input[type=range]#longueurRange').val(valNumber);
        // Génération du mot de passe
        genereMdp();
    });

    // Click sur le bouton
    $("#buttonGenerate").on('click', function(e) {
        e.preventDefault();
        // Génération du mot de passe
        genereMdp();
    });

    // Copie du mot de passe
    $('#buttonCopy').on('click', function(e) {
        e.preventDefault();
        let idelementcopy = $(this).attr('data-target');
        if(!idelementcopy) {
            return false;
        }
        idelementcopy = $(idelementcopy).text();
        // Crée un element input temporaire afin de pouvoir copier le mot de passe
        let inputTemp = $("<input>");
        $("body").append(inputTemp);
        inputTemp.val(idelementcopy).select();
        let resultatCopy = document.execCommand("copy");
        // Supprime le input créer
        inputTemp.remove();
        // Fait apparaître le message de copy selon le résultat
        let divMessage = $("#message");
        if(resultatCopy) {
            divMessage.append("<p>Mot de passe copié avec succés</p>");
        } else {
            divMessage.append("<p>Une erreur s'est produite lors de la copie du mot de passe</p>");
        }
        // Fait apparaitre le message pour une durée de 4 secondes
        divMessage.fadeIn(600).delay(6000).fadeOut(400);
    });
});

function genereMdp() {
    // Récupére les valeurs du formulaire
    let longueur = parseInt($("#longueurNumber").val());
    let majuscules = $("#majuscules").is(':checked');
    let minuscules = $("#minuscules").is(':checked');
    let chiffres = $("#chiffres").is(':checked');
    let speciaux = $("#speciaux").is(':checked');
    let caractere_exclude = $("#caractere_exclude").is(':checked');

    let arguments = {
        'longueur' : longueur,
        'majuscules' : majuscules,
        'minuscules' : minuscules,
        'chiffres' : chiffres,
        'speciaux' : speciaux,
        'caractere_exclude' : caractere_exclude
    };

    $.ajax({
        url : 'generateMdp.php?arguments=' + JSON.stringify(arguments),
        type : 'GET',
        dataType : 'text',
        success : function(code_html){
            $("#pass").text(code_html);
        }
    });
}