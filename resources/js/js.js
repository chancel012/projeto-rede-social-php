$(document).ready(function(){
    $('.data').mask('11/11/1111');
    $('.tempo').mask('00:00:00');
    $('.data_tempo').mask('00/00/0000 00:00:00');
    $('.cep').mask('00000-000');
    $('.telefone').mask('0 0000-0000');
    $('.telefone_ddd').mask('(00) 0 0000-0000');
    $('.telefone_us').mask('(000) 000-0000');
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.dinheiro_br').mask('000.000.000.000.000,00', {reverse: true});

    var reader = new FileReader();
    reader.onload = function (e) {
      $('#img-conf').css('background-image', "url("+e.target.result+")");
      $('#img-conf').attr('src', "");
    }

    function readURL(input) {
      if (input.files && input.files[0]) {
        reader.readAsDataURL(input.files[0]);

      }
    }
      $("campo.img").change(function(){
        readURL(this);
      });

      $(".img_thamb") .on ('click', function (){
        var cover=$('.img_cover');
        var thumb = $(this).attr('src');

        if (cover.attr('src') !==thumb) {
        cover.fadeTo('200', '0', function (){
        cover.attr('src', thumb);
        cover.fadeTo('150', '1');
        });
        $(".img_thamb.active").removeClass('active');
        $(this).addClass('active');
      }
  });

    $('.publicar.exibir').on('click',function(){
      $(this).next().addClass('active');
      $('body').addClass('active-lightbox');
    });

    $('.lightbox.close').on('click',function(){
      $(this).parent().removeClass('active');
      $('body').removeClass('active-lightbox');
    });
});
// $(document).ready(function() {
//   if (!jQuery().ajaxForm)
//   return;

//   if ($('form.form_ajax').length) {
//       $('form.form_ajax').on("submit", function(e){
//         e.preventDefault();
//         var form = $(this);
//         var alerta = form.children('.alerta');

//         //var alerta = $('form.form_ajax').Children('.alerta');

//         form.ajaxSubmit({
//           dataType:'json'
//           ,success: function(response) {
//             console.log(response);

//             if (response.msg){
//               alerta.html(response.msg);
//             }
//             if (response.status != '0') {
//               alerta.addClass('sucesso');
//             }else {
//               alerta.addClass('erro');
//             }
//             if (response.redirecionar_pagina){
//               // alert(response.redirecionar_pagina);
//               // window.location = response.redirecionar_pagina;
//             }
//             if (response.resetar_form){
//               form[0].reset();
//             }
//           }
//         });
//         return false;
//       });
//   }
// });

// Form ajax
$(document).ready(function() {
  if(!jQuery().ajaxForm) {
    return;
  }
  
  if($('form.form_ajax').length) {
    $('form.form_ajax').on("submit", function(e) {
      e.preventDefault();
      var form = $(this);
  
      var alerta = form.children('.alerta');
  
      form.ajaxSubmit({
        dataType:'json'
        ,success: function(response) {
          alert(response)
          if(response.msg) {
            alerta.html(response.msg);
          }
          if(response.status != '0') {
            alerta.addClass('success');
          } else {
            alerta.addClass('error');
          }
          if(response.page_redirect) {
            alert(response.page_redirect);
            // window.location = response.page_redirect;
          }
          if(response.reset_form) {
            form[0].reset();
          }
          if(response.alert_hidden) {
            setTimeout(() => { 
              alerta.html("");
              alerta.removeClass('success');
              alerta.removeClass('error');
            }, 1500);
          }
        }
      });
      return false;
    });
  }
  });

// Willi
// $(document).ready(function(){
//   //Tratamento de mascaras
//   $('.date').mask('11/11/1111');
//   $('.time').mask('00:00:00');
//   $('.date_time').mask('00/00/0000 00:00:00');
//   $('.cep').mask('00000-000');
//   $('.phone').mask('0000-0000');
//   $('.phone_with_ddd').mask('(00) 00000-0000');
//   $('.phone_us').mask('(000) 000-0000');
//   $('.mixed').mask('AAA 000-S0S');
//   $('.cpf').mask('000.000.000-00', {reverse: true});
//   $('.money').mask('000.000.000.000.000,00', {reverse: true});

// //Alterar imagem no upload de imagem em configuração
// var reader = new FileReader();
// reader.onload = function (e) {
//   $('#img-config').css('background-image', "url("+e.target.result+")");
//   $('#img-config').attr('src',"");
//  };

// function readURL(input) {
//   if (input.files && input.files[0]) {
//     reader.readAsDataURL(input.files[0]);
//   };
// }

// //Alterar imagem pagina fotos na seleção das miniaturas
// $("#campo-img").change(function(){
//   readURL(this);
// });

// // Setar pagina fotos 
// $(".img_thumb").on('click', function() {
//   var cover = $('.img_cover');
//   var thumb = $(this).attr('src');

//   if(cover.attr('src') !== thumb) {
//     cover.fadeTo('200', '0', function() {
//       cover.attr('src', thumb);
//       cover.fadeTo('150', '1');
//     });
//   }
//   $(".img_thumb.active").removeClass('active');
//   $(this).addClass('active');
// });

// //Ativar/desativar lightbox de nova postagem
// $('.publicar .exibir').on('click', function(){
//   $(this).next().addClass('active');
//   $('body').addClass('active-lightbox')
// });

// // LightBox close
// $('.lightbox .close').on('click', function(){
//   $(this).parent().removeClass('active');
//   $('body').removeClass('active-lightbox');
// });

// // set slider gallery
// if($('.content.feed').length) {
//   var page_index = $('#page_index').val();
//   var user_id = $('#user_id').val();
//   var feed = $('#feed').val();

//   function setSliderGallery(){
//     // countGalleries setado antes da função scroll para evitar que o slider fosse chamado no mesmo id mais de uma vez.
//     if($('.gallery.slider').length){
//       var galleries = $('.gallery.slider');
      
//       for(countGalleries; countGalleries < galleries.length; countGalleries++){
//           var id_gallery = $('.gallery.slider')[countGalleries].id;
//           $("#"+id_gallery).slick({
//             infinite: false
//           });  
//       } 
//     }
//   };


//   function getPublishes(page_index, user_id, feed=true) {
//     var url_base = "http://localhost/rede_social/";

//     $.ajax({
//       url: `${url_base}getPublishes`,
//       dataType: 'json',
//       method: 'POST',
//       data: {page_index: page_index, user_id: user_id, feed: feed},
//       success: function(response){

//         var html = "";

//         $.each(response.publishes, function(i, pub){
//             html += '<div class="item" id="' + pub.id + '">';
//                       if(pub.user_lastName != null) {
//                         html += '<div class="topo">'+
//                             '<a href="' + url_base + 'feed/'+pub.profile_url+'">'+
//                                 '<img src="' + url_base + pub.user_avatar + '" alt="Foto de ' + pub.user_name + ' ' + pub.user_lastName + '">'+
//                             '</a>'+
//                             '<a href="' + url_base + 'feed/' + pub.profile_url + '">'+
//                                 '<span>'+ pub.user_name +' '+ pub.user_lastName +'</span>'+
//                             '</a>'+
//                         '</div>'+

//                         '<div class="info">';

//                       } else {
//                         html += '<div class="topo">'+
//                             '<a href="' + url_base + 'feed/'+pub.profile_url+'">'+
//                                 '<img src="' + url_base + pub.user_avatar + '" alt="Foto de ' + pub.user_name + '">'+
//                             '</a>'+
//                             '<a href="' + url_base + 'feed/' + pub.profile_url + '">'+
//                                 '<span>'+ pub.user_name +'</span>'+
//                             '</a>'+
//                         '</div>'+

//                         '<div class="info">';
//                       }
//                       if(pub.text != null){
//                         html += '<div class="text">'+
//                                   pub.text +
//                                 '</div>';
//                       }
//                       if(pub.fotos != false){
//                         if(pub.fotos.length > 1) {
//                           html += '<div class="gallery slider" id="gallery_'+pub.id+'">';
//                         } else {
//                           html += '<div class="gallery">';
//                         }
//                         $.each(pub.fotos, function(f, foto){
//                           html += '<img src="' + url_base + foto.foto_path + '" alt="">';
//                         });
//                         html += '</div>';
//                       }
                        
//                 html += '</div>'+
//                       '</div>';
//         });

//         $('.publicacoes').append(html);
//         if (response.next_page != null) {
//           $('#page_index').val(response.next_page);
//         } else {
//           $('#page_index').remove();
//         }
//         setSliderGallery();

//       }
//     });
//   };
//   getPublishes(page_index, user_id, feed);
//   // alert(user_id);

//   var countGalleries = 0
//   $(window).scroll(function(){
//     var position = $(window).scrollTop();
//     var bottom = $(document).height() - $(window).height();

//     if(position == bottom) {
//       var page_index = $('#page_index').val();
//       var user_id = $('#user_id').val();
//       var feed = $('#feed').val();
//       getPublishes(page_index, user_id, feed);
//     }
//   })
// }

// // get mensagens chat
// var messages = []
// if ($('.lista_mensagens').length){
//   function getChat() {
//     setInterval(function(){
//       $('.lista_mensagens .item.active').click();
//     }, 1000)
//   }
  
//   $('.lista_mensagens .item').on('click', function (){
//     $('.content.mensagens .conteudo.oculto').removeClass('oculto');

//     var ids = $(this).attr('id');
//     $('.item.active').removeClass('active');
//     $(this).addClass('active')

//     $.ajax({
//       url: 'getMessages',
//       dataType: 'json',
//       method: 'POST',
//       data: {ids:ids},
//       success: function(response){
//         $('.conteudo_mensagem .topo a img').attr('src', response.user_avatar);
//         $('.conteudo_mensagem .topo a .nome').html(response.user_name);
//         $('.conteudo_mensagem .topo a').attr('href', response.profile_url);
//         $('.content.mensagens .conteudo .msgs .form_ajax .id_user_receive').val(response.id_otherUser);

//         var html = "";
//         messages = response.messages;
//         console.log(messages)

//         $.each(response.messages, function(i, msg){
//           if(msg.id_sender == response.id_logedIn) {
//             html += '<div class="mine message">'
//           } else {
//             html += '<div class="his message">'
//           }
//           html += msg.message;
//           html += '</div>'
//         });

//         $('.conteudo_mensagem .lista_msg').html(html);

//         $('.conteudo_mensagem .lista_msg').click($('.conteudo_mensagem .lista_msg').animate({scrollTop: response.messages.length * 50}, '1000'));
//       }
//     });
//   });

//   if ($('.lateral_esquerda .lista_mensagens .item').length) {
//     $('.lateral_esquerda .lista_mensagens .item:eq(0)').click();
//     getChat();
//   }
// }

// // Setar botao seguir
// $(".btn-seguir").on('click', function(){

//   var id_user = $(this).next().val();
//   var id_user_logedIn = $(this).next().next().val();

//   $.ajax({
//     url: '../setFriendship',
//     dataType: 'json',
//     method: 'POST',
//     data: {id_user: id_user, id_user_logedIn: id_user_logedIn},
//     success: function(response){
//         if (response.status == '1') {
//           $(".btn-seguir").html(response.text_html);
//         }
//       }
//   });
// });
// });


// Form ajax
$(document).ready(function() {
if(!jQuery().ajaxForm) {
  return;
}

if($('form.form_ajax').length) {
  $('form.form_ajax').on("submit", function(e) {
    e.preventDefault();
    var form = $(this);

    var alerta = form.children('.alerta');

    form.ajaxSubmit({
      dataType:'json'
      ,success: function(res) {
        alert(res)
        if(res.msg) {
          alerta.html(res.msg);
        }
        if(res.status != '0') {
          alerta.addClass('success');
        } else {
          alerta.addClass('error');
        }
        if(res.page_redirect) {
          alert(res.page_redirect);
          // window.location = res.page_redirect;
        }
        if(res.reset_form) {
          form[0].reset();
        }
        if(res.alert_hidden) {
          setTimeout(() => { 
            alerta.html("");
            alerta.removeClass('success');
            alerta.removeClass('error');
          }, 1500);
        }
      }
    });
    return false;
  });
}
});