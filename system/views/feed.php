<div class="conteudo">
    <section class="publicar">
        <div class="exibir">
            <span>Nova publicação</span>
            <button class="btn">Publicar</button>
        </div>
        <div class="ligthbox">
            <span class="close"></span>
            <form action="{$url_base}publicar" method="POST" class="form_ajax" enctype="multipart/form-data">
                <textarea name="mensagem" placeholder="Nova publicação"></textarea>
               <label for="imagem">
                <span>Imagem</span>
                    <input type="file" name="imagem[]" id="imagem" multiple="multiple" accept="image/*">
                </label>

                <input type="submit" value="publicar">
            </form>

        </div>
    </section>

    <section class="publicacoes">
        <div class="item">
            <div class="topo">
                <a href="{$url_base}feed/chancel">
                <img src="{$url_base}resources/imagens/icone_user.png">
                </a>

                <a href="{$url_base}feed/chancel">
                     <span>Fulano de Tal</span>
                </a>
            </div>

            <div class="info">
                <div class="texto">
                    Egestas cursus dui sapien nec cubEgestas cursus dui sapien nec cubilia sit etiam
                    dictum cras,aliquam in sceler isque curabitur massa lobortis nunc class sed augue,
                    tempus tem ivamus praesent ultrices etiam morbi.amassa amet quis nam tempus
                    consectetur aptent odio,purus ac magna varius netus euismod gravida himenaeos,duis
                    imperdiet felis vivamus ut dapibus eleifend.nec vehicula at ipsum dui egestas
                    turpis bibendum scelerisque est luctus,cras sem porta libero lacus ullamcorper
                    dolor nullam.ornare nulla libero eget mauris dictumst aptent commodo justo,fusce
                    in dolor placerat libero sagittis fermentum vivamus nibh,inceptos integer cursus
                    inceptos adipiscing ultrices varius.
                </div>
                <div class="galeria">
                    <img src="{$url_base}resources/imagens/placeholder.png">
                </div>
            </div>
        </div>
    </section>

</div>


