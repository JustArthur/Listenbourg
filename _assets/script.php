<script>
    //script qui permet de changer le thème du site
    $( ".change" ).on("click", function() {
        //Si le body a la class body-black, il l'enlève pour ne pas mettre de class (la page devient blanche avec texte noir)
        if( $( "body" ).hasClass( "body-black" )) {
            $( "body" ).removeClass( "body-black" );
        } 
        //Sinon il ajoute dans la class body, body-dark (la page devient gris foncé avec texte blanc)
        else {
            $( "body" ).addClass( "body-black" );
        }
    });
</script>