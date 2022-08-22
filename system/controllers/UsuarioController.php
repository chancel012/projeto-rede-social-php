<?php 
namespace DEV\Controllers;

use DEV\Usuario;

if(!isset($_SESSION)){
    session_start();
}

class UsuarioController
{
    private $usuario;

    function __construct()
    {
        $this->usuario = new Usuario;

    }
    public function login_usuario($request, $response, $args)
    {
        $email = $request->getParsedBodyParam('email');
        $senha = $request->getParsedBodyParam('senha');
        
        $campos = array(
            'id',
            'email_usuario'
        );

        $where = array(
            'email_usuario' => $email
        );
        $resultado = $this->usuario->selectUsuario($campos, $where);

        if($resultado){

            $retorno = $this->login($email, $senha);
            
            if($retorno) {
                $resposta_retorno['status'] = '1';
                $resposta_retorno['redirecionar_pagina'] = URL_BASE.'feed';
                echo "<pre>";
                var_dump($resposta_retorno);
                return $response->withJson($resposta_retorno);
                    
            }else{
                $resposta_retorno['status'] = '0';
                $resposta_retorno['msg'] = 'Erro ao fazer login apos o seu cadastro na Rede Social';
                return $response->withJson($resposta_retorno);
            }
        }else{
            $resposta_retorno['status'] = '0';
            $resposta_retorno['msg'] = 'E-mail ou senha inválidos';
            return $response->withJson($resposta_retorno);
        }

    }
    public function cadastrar($request, $response, $args)
    {
        $nome = $request ->getParsedBodyParam('nome');
        $email = $request ->getParsedBodyParam('email');
        $telefone = $request ->getParsedBodyParam('telefone');
        $senha = $request ->getParsedBodyParam('senha');

        $campos = array(
            'id',
             'email_usuario'
        );

        $where = array(
            'email_usuario' => $email
        );
        $resultado = $this->usuario->selectUsuario($campos, $where);

        if ($resultado) {
            echo "";
            $resposta_retorno['status'] = '0';
            $resposta_retorno['msg'] = 'já existe uma conta cadastrada nesse e-mail, por favor, utilizar outro';
            return $response->withJson($resposta_retorno);
        }
        else{
            
        $campos = array(
            'nome_usuario' =>  $nome,
            'email_usuario'=> $email,
            'telefone_usuario'=>  $telefone,
            'senha_usuario' => password_hash($senha, PASSWORD_DEFAULT,["cost"=>12])
        );
        $this->usuario->insertUsuario($campos);

        $retorno = $this->login($email, $senha);

        $urlPerfil = $this->usuario->gerarUrlPerfil($nome, $_SESSION['usuario_logado']['id']);

        $valores = array(
            'url_usuario' =>  $urlPerfil
        );

        $where = array(
            'id' =>(int)$_SESSION['usuario_logado']['id']
        );
            $this->usuario->updateUsuario($valores, $where);

           if($retorno) {
                    $resposta_retorno['status'] = '1';
                    $resposta_retorno['redirecionnar_pagina'] = URL_BASE.'feed';
                    return $response->withJson($resposta_retorno);
           }else{
            
                    $resposta_retorno['status'] = '0';
                    $resposta_retorno['msg'] = 'Erro ao fazer login após o seu cadastro na Rede Social';
                    $resposta_retorno['resetar_form'] = true;
                    return $response->withJson($resposta_retorno);
           }
           
       
        }

    
    }
    function login($email='', $senha='')
    {
        if($email !== '' && $senha !== ''){
            
            $campos = array(
                'id', 
                "url_usuario",          
                "nome_usuario",
                "sobrenome_usuario",
                "email_usuario",
                "telefone_usuario",
                "foto_usuario",
                "descricao_usuario",
                "data_cadastrado",
                "senha_usuario"
            );

            $where = array(
                'email_usuario' => $email
            );
            $resultado = $this->usuario->selectUsuario($campos, $where);
            
            if (password_verify($senha, $resultado[0]['senha_usuario'])) {
                
                $this->usuario->setData($resultado[0]);

                $_SESSION['usuario_logado'] = $this->usuario->getValues();

                return true;

            } else{
                return false;
            }
        }else{
            return false;
        }
    }

    public static function verifyLogin()
    {
        if(!isset($_SESSION['usuario_logado']) || $_SESSION['usuario_logado'] == NULL){
            header("location:".URL_BASE);
            exit();
        }
    }
    public function logout()
	{
		if (isset($_SESSION['usuario_logado'])){
			$_SESSION['usuario_logado'] = NULL;
			unset($_SESSION['usuario_logado']);
		}

		header("Location: ".URL_BASE);
		exit();
	}
    public function quem_sou_eu($request, $response, $args)
    {
        $bio = $request ->getParsedBodyParam('quem_sou_eu');
        if ($bio != "" && $bio != NULL)
        {
            $valores = array(
                'descricao_usuario' =>  $bio
            );
    
            $where = array(
                'id' =>(int)$_SESSION['usuario_logado']['id']
            );
                $this->usuario->updateUsuario($valores, $where);

                $resposta_retorno['status'] = '1';
                $resposta_retorno['msg'] = 'Atualizado com sucesso!';
                return $response->withJson($resposta_retorno);
    
        }else{
            $resposta_retorno['status'] = '0';
            $resposta_retorno['msg'] = 'Digite a sua Biografia com até 160 caracteres';
            return $response->withJson($resposta_retorno);
        }
    }
}

 ?>