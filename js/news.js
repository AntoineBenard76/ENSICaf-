$(document).ready(function () {
    setInterval(function(){
        $.ajax({
            url:'./news.php',
            success:
            function(retour){
            //$('.col-md-10 col-lg-offset-1').html(retour); // rafraichi toute ta DIV "bien sur il lui faut un id "
            $('.col-md-10 col-lg-offset-1').load(retour);
            }
        });
    }, 5000);
    //Fonction executée lors du click sur poster
    $('body').on('click','#poster',function (e){
        e.preventDefault(); 
 
        var $this = $(this);    // L'objet jQuery du formulaire
        var type = $('#btn-publication').val();
        var contenu =$("#contenu").val();
        if(type === '' || contenu === '') {
            alert('Les champs doivent êtres remplis');
        } else {
            $.ajax({
                url: $this.attr('action'), // Le nom du fichier indiqué dans le formulaire
                type: $this.attr('method'), // La méthode indiquée dans le formulaire (get ou post)
                data: $this.serialize(), // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                success: function(html) {
                    $('.col-md-10 col-lg-offset-1').load('./news.php');
                }
            });
        };
    });
});



/*
var dernier_id;
function setId(id) {
    dernier_id = id;
}

function chargerNews() {
    //alert('chargernews');
    //$('.col-md-10 col-lg-offset-1').load('./news.php');
    /*$.ajax({
        url: './news.php?id=' + dernier_id,
        success: function (data) {
            if (data !== '') {
                $('.col-md-10 col-lg-offset-1').prepend(data);
                $('.panel-body:last-child').remove();
            }
        }
    });*/

 /*   $.ajax({
        url: './news.php', 
        success:
            function(retour){
                alert('news');
            //$('.col-md-10 col-lg-offset-1').html(retour); // rafraichi toute ta DIV "bien sur il lui faut un id "
            $('.col-md-10 col-lg-offset-1').load(retour);
        }
    });
 

}
*/



