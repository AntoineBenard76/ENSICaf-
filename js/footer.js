// GENERAL: gère l'ouverture et la fermeture du menu gauche
function toggleMenu(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    $("#menu-toggle").find('span').toggleClass('glyphicon-forward').toggleClass('glyphicon-backward');
}

// ROTATION: change l'icône des chevrons
function toggleChatbox(e) {
    $(".toggle-chatbox").toggleClass('glyphicon-chevron-up').toggleClass('glyphicon-chevron-down');
}

// PUBLICATION: change l'icône des chevrons
function togglePublication(e) {
    $(".toggle-publication").toggleClass('glyphicon-chevron-up').toggleClass('glyphicon-chevron-down');
}

        // accueil.php : fait disparaître la publication lorsqu'on clique sur la croix
        $(".close").click(function () {
            $(this).closest('.panel-custom').fadeOut();
        });

        // accueil.php : déroule automatiquement les news ('interval' en ms)
        $(document).ready(function() {
            $('#carousel-news').carousel({
                pause: true,
                interval: 10000,
            });
        });

        // accueil.php : fait apparaître la fenêtre pour commenter (publication)
        $(function () {
             $('.panel-custom > .panel-body > .pull-left > .input-placeholder, .panel-custom > .panel-comment > .panel-custom-textarea > button[type="reset"]').on('click', function(event) {
                var $panel = $(this).closest('.panel-custom');
                $comment = $panel.find('.panel-comment');
                
                $comment.find('.btn:first-child').addClass('disabled');
                $comment.find('textarea').val('');

                $panel.toggleClass('panel-custom-show-comment');

                if ($panel.hasClass('panel-custom-show-comment')) {
                    $comment.find('textarea').focus();
                }
            });

             $('.panel-comment > .panel-custom-textarea > textarea').on('keyup', function(event) {
                var $comment = $(this).closest('.panel-comment');

                $comment.find('button[type="submit"]').addClass('disabled');
                if ($(this).val().length >= 1) {
                    $comment.find('button[type="submit"]').removeClass('disabled');
                }
            });

        });

        // accueil.php + settings.php : upload de fichier
        $(function() {
        // "Annuler"
        $('.preview-clear').click(function(){
        $('.preview-filename').val("");
        $('.preview-clear').hide();
        $('.preview-input input:file').val("");
        $(".preview-input-title").text("Image"); 
        }); 

        // Montre le nom du fichier à upload
        $(".preview-input input:file").change(function (){     
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function (e) {
                $(".preview-input-title").text("Autre");
                $(".preview-clear").show();
                $(".preview-filename").val(file.name);
            }  
            reader.readAsDataURL(file);
            });  
        });