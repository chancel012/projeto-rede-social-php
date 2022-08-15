<div class="conteudo">
    <section class="configuracoes">
       <form class="form_ajax" action="{$url_base}configuracao" method="POST" enctype="multpypart/form-data">
        <label for="campo-img">
            <img src="{$url_base}resources/imagens/icone_user.png" id="img-conf">
            <input type="file" id="campo-img" name="image"> 
        </label>
        <div class="nome">
            <input type="text" name="nome" placeholder="Nome">
            <input type="text" name="sobrenome" placeholder="Sobrenome">
        </div>
        <input type="email" name="email" placeholder="E-mail">
        <input type="tel" name="telefone" class="telefone_ddd" placeholder="Telefone">
        <input type="password" name="senha" placeholder="Senha">
        <input type="password" name="confirmar" placeholder="Confirmar Senha">
        
        <input type="submit" name="btn-salvar" class="btn" value="Salvar">
    </form>
    </section>
    
</div>