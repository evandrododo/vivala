/*
  Funções de comentário dos Posts.
  Envia o comentario por ajax e atualiza o conteúdo da div,
  com todos os comentários do post.
*/

var bindaLikeComentario = function() {
    //ajax para like do comentario
    $(".like-btn-comentario").click(function(){
        var href = $(this).prop("hash"),
            link = href.substr(1),
            urlArray = link.split('/'),
            idComentario = urlArray[2];

        console.log(link);
        $.ajax({
                url: '/'+link,
                type: 'GET',
                dataType: 'json'
        })
        .done(function(data) {
          var msgQtdCurtidas,
              qtdLikes = data.qtdLikes,
              tipoLikeUser = data.tipoLikeUser;

          //Testar se like/unlike e setar o icone correto
          if(tipoLikeUser){
            $("#barra-comentario-"+idComentario+" .like-btn-comentario").addClass('liked');
            $("#barra-comentario-"+idComentario+" .like-btn-comentario i").removeClass('fa-heart-o').addClass('fa-heart');
          }
          else{
            $("#barra-comentario-"+idComentario+" .like-btn-comentario").removeClass('liked');
            $("#barra-comentario-"+idComentario+" .like-btn-comentario i").removeClass('fa-heart').addClass('fa-heart-o');
          }
          if(qtdLikes > 1)
            // Curtidas
            msgQtdCurtidas = qtdLikes + lingua[0];
          else if(qtdLikes == 1)
            // Curtida
            msgQtdCurtidas = qtdLikes + lingua[1];
          else
            // Curtir
            msgQtdCurtidas = lingua[2];
          //Atualiza a quantidade de likes no span logo depois
          $("#barra-comentario-"+idComentario).find(".like-btn-comentario+span.qtd-likes").html(msgQtdCurtidas);
        })
        .fail(function(data) {
           console.log('[ERRO]: Erro no ajax de like-comentário');
        });
    });
};

var commentPost = function(idPost) {
    $.ajax({
      url: "/postajax/"+idPost+"/comentarios"
    })
    .done(function(data) {
      document.getElementById("form-comentario-post-"+idPost).reset();
      var comentariosWrapper = $('li.post[data-id="'+idPost+'"] div.comentarios').parent();
      //console.log('li.post[data-id="'+idPost+'"]');
      comentariosWrapper.html(data);
      bindaLikeComentario();
    });
};

$(function() {
    bindaLikeComentario();
});
