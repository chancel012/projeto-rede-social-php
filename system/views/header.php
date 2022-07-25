<!DOCTYPE HTML>

<html lang=“pt-br”>
<head>
     <meta charset=“utf-8”/>
     <meta content=“width=device-width, initial-scale=1, maximum-scale=1” name=“viewport”>
     <title>{$title_pagina}</title>
     <link href="resources/css/css.css" rel="stylesheet"/>
     <script src="resources/js/jquery/jquery.min.js"></script>
     <script src="resources/js/jquery.mask/jquery.mask.min.js"></script>
     <script src="resources/js/js.min.js"></script>
</head>
<body>
     <header>
          <div class="content">

               <div class="logo">
                    <img src="resources/imagens/logo_principal.png">
               </div>
               {if="$header_login == true"}
               <div class="login">
                    <form action="login" method= "POST">
                         <input type="email" name="email" placeholder="E-mail" >
                         <input type="password" name="senha" placeholder="Senha">
                         <input type="submit" name="btn" value="Entrar">
                    </form>
               </div>
               {else}
                    <div class="left">
                         <div class="pesquisa">
                              <form accept="pesquisa" method="GET">
                                   <input type="text" name="q" placeholder="pesquisar">
                                   <input type="submit" value="?">
                              </form>

                         </div>
                              <div class="pessoal">
                                   <div class="menu">
                                        <img src="resources/imagens/icone_menu.png">
                                        <ul>
                                             <li><a href="#">Configurações</a></li>
                                             <li><a href="#">Sair</a></li>
                                        </ul>
                                   </div>
                              <img src="resources/imagens/icone_user.png">
                         </div>
                    </div>
                    
               {/if}
          </div>     
     </header>
 