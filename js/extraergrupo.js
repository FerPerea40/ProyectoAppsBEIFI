$(document).ready(function(){

    $.ajax({
        url: 'php/extraergrupo.php',
        type: 'GET',
        dataType: 'json'
    })
    .done(function(data){
        var $select = $('#grupo').selectpicker();
        $.each(data,function(i,item){
            $select.append($("<option></option>")
                .attr('value',item.idGrupo)
                .text(item.nombre))
        });
    });
});