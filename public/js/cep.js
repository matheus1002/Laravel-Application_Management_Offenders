$(document).ready(function(){
    $("#cep").focusout(function(){
        var cep = $("#cep").val();
        cep = cep.replace("-", "");
     
        var urlStr = "https://viacep.com.br/ws/"+ cep +"/json/";
             
        $.ajax({
            url : urlStr,
            type : "get",
            dataType : "json",
            success : function(data){
                console.log(data);
                         
                $("#cidade").val(data.localidade);
                $("#estado").val(data.uf);
                $("#bairro").val(data.bairro);
                $("#rua").val(data.logradouro);
            },
            error : function(erro){
                console.log(erro);
            }
        });
    });
});