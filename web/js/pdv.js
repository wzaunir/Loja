$(document).ready(function() {

    $("#find-produto").submit(function(evento) {
        evento.preventDefault();
        var url = $(this).attr('action');
        var dados = {
            produto: $(this).find('input[name="produto"]').val()
        }
        $('#produto').addClass('hide');
        $('#alerta-produto').addClass('hide');
        $.post(url, dados, function(retorno) {
            if (retorno.nome != null) {
                $('#produto .nome').text(retorno.nome);
                $('#produto .preco').text(retorno.valor);
                $('#produto .marca').text(retorno.marca);
                $('#produto .tamanho').text(retorno.tamanho);
                $('#produto .imagem').attr('src','/produtos/'+retorno.imagem);
                $('#produto').removeClass('hide');
                
            } else {

                $('#alerta-produto').removeClass('hide');
                
            }
            $('input[name="produto"]').val('').focus();

        });
    });



});
