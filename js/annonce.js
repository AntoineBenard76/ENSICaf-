$(document).ready(function () {
    setInterval(chargerAnnonce, 1000);
});

var dernier_id;
function setId(id) {
    dernier_id = id;
}

function chargerAnnonce() {
    $.ajax({
        url: './gestionAnnonce.php?id=' + dernier_id,
        success: function (data) {
            if (data !== '') {
                $('#annonce').prepend(data);
                $('#annonce li:last-child').remove();
            }
        }
    });
}