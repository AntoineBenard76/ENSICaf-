$(document).ready(function () {
    setInterval(chargerNews(), 1000);
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
                    $('.col-md-10 col-lg-offset-1').load('ensicaf-/news.php');
                }
            });
        };
    });
});




var dernier_id;
function setId(id) {
    dernier_id = id;
}

 function chargerNews() {
   $.ajax({
        url: './news.php?id=' + dernier_id,
        success: function (data) {
            if (data !== '') {
                $('#news').prepend(data);
                $('#news li:last-child').remove();
            }
        }
    });
}




