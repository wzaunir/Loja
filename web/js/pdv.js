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
                
                listagemItens();
                
            } else {

                $('#alerta-produto').removeClass('hide');
                
            }
            $('input[name="produto"]').val('').focus();

        });
    });
    $('#form-estorno').submit(function(e){
       e.preventDefault();
       var url = 'caixa/estorno/'+$('#item-numero').val();
       $.getJSON(url,function(retorno){
           
           if(retorno.status == 'OK'){
               
               listagemItens();
               $("#estornar").modal('hide');
           }
       })
    });
    
    $('#form-finalizar').submit(function(e){
       e.preventDefault();
       var url = 'caixa/finalizar';
       $.getJSON(url,function(retorno){
           
           if(retorno.status == 'OK'){
               
               listagemItens();
               $("#estornar").modal('hide');
           }
       })
    });


});
function listagemItens(){
    $.getJSON('/list-itens',function(retorno){
        $('.listagem').empty();
        var total = 0;
        for( idx in retorno){
            var produto = retorno[idx];
            
            var li = $('<li>'+produto.descricao+'<span class="pull-right">$'+produto.valor+'</span></li>');
            $('.listagem').append(li);
            
            total += parseFloat(produto.valor);
            
        } 
        
        $(".total-pagar").html("R$ "+total.toFixed(2));
      /*  $.each(retorno, function(idx, ret) {
            $('.listagem').append('<li>' + ret.codigo+' '+ret.valor + '</li>');
        });*/
        
    })
}