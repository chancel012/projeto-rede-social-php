<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="lateral_esquerda">
    <div class="topo">
        <img src="<?php echo htmlspecialchars( $url_base, ENT_COMPAT, 'UTF-8', FALSE ); ?>resources/imagens/icone_user.png"> 
        <div class="info">
            <p>Fulano de Tal</p>
            <button class="btn-seguir">Seguir</button>
        </div>
    </div>
    <div class="links">
        <ul>
            <li><a href="#">Mensagens <spam>(2)</spam></a></li>
        </ul>
    </div>
    <div class="form_quem_sou">
        <form action="#" method="post">
            <textarea placeholder="Quem sou eu" maxlength="160"></textarea>
            <input type="submit" name="btn" value="Salvar">
        </form>

    </div>
</section>

