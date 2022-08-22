<section class="lateral_direita">
{if="$links == false && $usuario_logado['id'] != $usuario['id']"}    
        <div class="form_nova_mensagens">
             <form class="form_ajax" action="{$url_base}nova_mensagem" method="post">
                <textarea placeholder="Nova Mensagens"></textarea>
                      <input type="submit" name="btn" value="Enviar">
           </form>
        </div>
{/if}
  <div class="fotos">
    <a href="{$url_base}feed/chancel">
        <p>fotos</p>
    </a>
    
    <ul>
        <li>
            <a href="{$url_base}feed/chancel">
                <img src="{$url_base}resources/imagens/placeholder.png">
            </a>
        </li>
        <li>
            <a href="{$url_base}feed/chancel">
                <img src="{$url_base}resources/imagens/placeholder.png">
            </a>
        </li>
        <li>
            <a href="{$url_base}feed/chancel">
                <img src="{$url_base}resources/imagens/placeholder.png">
            </a>
        </li>
        <li>
            <a href="{$url_base}feed/chancel">
                <img src="{$url_base}resources/imagens/placeholder.png">
            </a>
        </li>
        <li>
            <a href="{$url_base}feed/chancel">
                <img src="{$url_base}resources/imagens/placeholder.png">
            </a>
        </li>
        <li>
            <a href="{$url_base}feed/chancel">
                <img src="{$url_base}resources/imagens/placeholder.png">
            </a>
        </li>
        <li>
            <a href="{$url_base}feed/chancel">
                <img src="{$url_base}resources/imagens/placeholder.png">
            </a>
        </li>
        <li>
            <a href="{$url_base}feed/chancel">
                <img src="{$url_base}resources/imagens/placeholder.png">
            </a>
        </li>
        <li>
            <a href="{$url_base}feed/chancel">
                <img src="{$url_base}resources/imagens/placeholder.png">
            </a>
        </li>
    </ul>
</div>
<div class="seguindo">
<p>seguindo</p>
    <ul>
        <li>
            <a href="{$url_base}feed/chancel">
                <img src="{$url_base}resources/imagens/placeholder.png">
            </a>

        </li>
        <li>
            <a href="{$url_base}feed/chancel">
                <img src="{$url_base}resources/imagens/placeholder.png">
            </a>

        </li>
        <li>
            <a href="{$url_base}feed/chancel">
                <img src="{$url_base}resources/imagens/placeholder.png">
            </a>

        </li>
        <li>
            <a href="{$url_base}feed/chancel">
                <img src="{$url_base}resources/imagens/placeholder.png">
            </a>

        </li>
        <li>
            <a href="{$url_base}feed/chancel">
                <img src="{$url_base}resources/imagens/placeholder.png">
            </a>

        </li>
        <li>
            <a href="{$url_base}feed/chancel">
                <img src="{$url_base}resources/imagens/placeholder.png">
            </a>

        </li>
        <li>
            <a href="{$url_base}feed/chancel">
                <img src="{$url_base}resources/imagens/placeholder.png">
            </a>

        </li>
        <li>
            <a href="{$url_base}feed/chancel">
                <img src="{$url_base}resources/imagens/placeholder.png">
            </a>

        </li>
        <li>
            <a href="{$url_base}feed/chancel">
                <img src="{$url_base}resources/imagens/placeholder.png">
            </a>

        </li>
    </ul>
</div>
<div class="footer">
         <div class="content">
            <p>Todos os Direitos Reservados {function="date('Y')"}</p>
        </div>
    </div>
</section>