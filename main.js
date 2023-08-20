$(document).ready(function() {
    //Récupère l'id du dropmenu
    $('#fetchval').on('change', function() {
        var value = $(this).val();
        $.ajax({
            //"Génère" un form qui renvoie au fichier filtre.php pour filtrer selon l'id de la catégorie

            url: 'filtre.php',
            type: 'POST',
            data: 'request=' + value,
            success: function(data) {
                $(".list-produit").html(data);
            }
        });
    });
});