$(document).ready(function(){
    $(function(){
        $("#lista").sortable({update : function(){
            var ordem_atual = $(this).sortable("serialize");
            $.post("ordem.php", ordem_atual, function(retorno){
                $("#msg").html(retorno);
                $("#msg").slideDown('slow');
                retirarMgs();
            });
        }});
    });

    function retirarMgs(){
        setTimeout(function(){
            $("#msg").slideUp('slow', function(){});
        }, 950);
    };
});

var popup = document.querySelector('.popup-container')

function openPopup(){
    popup.classList.add('active')
}

function closePopup(){
    popup.classList.remove('active')
}

