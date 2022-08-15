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
$(document).ready(function() {
  if (!jQuery().ajaxForm)
  return;

  if ($('form.form_ajax').length) {
      $('form.form_ajax').on("submit", function(e){
        e.preventDefault();
        var form = $(this);

        form.ajaxSubmit({
          dataType:'json'
          ,success: function(response) {
            if (response.msg){
              alerta.html(response.msg);
            }
            if (response.status != '0') {
              alerta.addClass('sucesso');
            }else {
              alerta.addClass('erro');
            }
            if (response.redirectionar_pagina){
              window.location = response.redirectionar_pagina;
            }
            if (response.resetar_form){
              form[0].reset();
            }
          }
        });
        return false;
      });
  }
});