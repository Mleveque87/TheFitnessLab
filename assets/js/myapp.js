// Scrolling Effect NAVBAR
$(window).on('scroll', function () {
    if ($(window).scrollTop() > 86) {
        $('#HomeNavbar').addClass('shrink');
    } else {
        $('#HomeNavbar').removeClass('shrink');
    }
})

//function qui vérifie l'email 
$(function () {
    $('#mailRegister').blur(function () {
        //Mon appel AJAX
        //$.post prend en paramètre la page PHP qui va effectuer le traitement, la variable que l'on communique au PHP, et la fonction de traitement avec la réponse de PHP.
        $.post('controller/formRegisterController.php', {mailTest: $(this).val()}, function (data) {
            //dans data se trouve ce que le PHP a envoyé via son echo
            if(data == 0){
                //Le .html permet d'écrire du contenu HTML dans un élément. Ici dans la div qui a la classe mailMessage
                $('.mailMessage').html('<p class="text-success">L\'adresse mail est disponible</p>');
            }else{
                $('.mailMessage').html('<p class="text-danger">L\'adresse mail est déjà utilisée</p>');
            }
        });
    });
})

// fonction qui permet de cibler le select exercices en fonction du selec bodytarget
$(function () {
    $('#bodytarget').change(function () { //appel AJAX
         // $.post prend en paramètre la page PHP qui va effectuer le traitement, la variable que l'on communique au PHP,
        // et la fonction de traitement avec la réponse de PHP.
        $.post('controller/formCreateProgramController.php',
                {idBody: $("option:selected", this).val()},
                // dans data se trouve ce que le PHP a envoyé via son echo
                // EXEMPLE À TOI DE RECTIFIER SELON UN APPEL DU JSON DANS L'INSPECT ÉLÉMENENT
                // exemple : [{"id":"1","exercice1":"Pour bras","id_dex_bras":"1"},
                // {"id":"2","exercice1":"Pour bras","id_dex_bras":"1"},
                // {"id":"3","exercice1":"Pour bras","id_dex_bras":"1"},
                // {"id":"4","exercice1":"Pour bras","id_dex_bras":"1"}] <=======> EXEMPLE À TOI DE RECTIFIER
                function (data) {
                // On vide la liste exercice pour ne pas superposer les exercice récupérées et crées
                // à chaque changement de la liste bodytarget
                    $('#exercice1').empty();
                    $('#exercice2').empty();
                    $('#exercice3').empty();
                    $('#exercice4').empty();
                    //On convertit en tableau javascript le json récupérer avec la liste des exercices que le php a renvoyé avec le echo json_encode dans le contrôleur
                    // EXEMPLE À TOI DE RECTIFIER SELON UN APPEL DU JSON DANS L'INSPECT ÉLÉMENENT
                    // exemple : [{"id":"1","exercice":"Pour bras","id_dex_bras":"1"},{"id":"2","exercice":"Pour bras","id_dex_bras":"1"},
                    // {"id":"3","exercice":"Pour bras","id_dex_bras":"1"},{"id":"4","exercice":"Pour bras","id_dex_bras":"1"}]  <=======> EXEMPLE À TOI DE RECTIFIER
                    // devient : 0 => {"id":"1","exercice":"Pour bras","id_dex_bras":"1"}
                //           1 => {"id":"2","exercice":"Pour bras","id_dex_bras":"1"}
                //           etc ...
                    var dataArray = $.parseJSON(data);
                     // On fait une boucle avec $.each (comme un foreach) avec le tableau que l'on a créé juste au-dessus,
                    // on donne une fonction qui sera exécutée en boucle
                    // pour chaque élément dans le tableau. C'est un tableau d'objets qui a un attribut id,
                    // un attribut exercice et un attribut id_dex_exercice
                    // exemple : key = 0, value = {"id":"1","exercice":"Pour bras","id_dex_bras":"1"}
                    // On doit laisser key, sinon ça ne fonctionne pas ATTENTION À CA !!!!
                    $.each(dataArray, function (key, value) {
                    // En javascript, on affiche l'attribut d'un objet avec objet.attribut
                    // exemple : value.id
                    // Ensuite on lance notre boucle du select
                        var dataDisplay = '<option value="' + value.id + '">' + value.type + '</option>';
                        $('#exercice1').append(dataDisplay);
                        $('#exercice2').append(dataDisplay);
                        $('#exercice3').append(dataDisplay);
                        $('#exercice4').append(dataDisplay);
                    });
                });
    });
});
