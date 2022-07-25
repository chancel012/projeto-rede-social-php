<?php
namespace DEV\Controllers;

use Rain\Tpl;

class HomeController
{
	private $tpl;
	private $default = array(
		'footer' => true ,
		'header_login' => false
	);

	function __construct()
	{
		$config = array(
			'base_url' => __DIR_PRINCIPAL__,
			'tpl_dir' => $_SERVER['DOCUMENT_ROOT'].__DIR_PRINCIPAL__."/system/views/",
			'cache_dir' => $_SERVER['DOCUMENT_ROOT'].__DIR_PRINCIPAL__.'/cache/',
			'tpl_ext' => 'php',
			'debug' => true
		);

		/*var_dump($config);
		die();*/

		Tpl::configure($config);

		$this->tpl = new Tpl;

		
		
	}

	function __destruct()
	{
		if ($this->default['footer'] === true){
			$this->setTpl("footer");
		}
		
		$this->setTpl("fimHTML");

	}

	 public function setTpl($template, $data=array(), $returnHtml = false)
	 {
	 	$this->setData($data);

	 	return $this->tpl->draw($template, $returnHtml);
	 }

	 public function setData($data= array())
	 {
	 	foreach ($data as $key => $value) {
	 		$this->tpl->assign($key, $value);
	 	}
	 }

	public function login()
	{
		$info = array(
			'title_pagina' => 'Pagina de Login',
			'header_login' => true,
		);
		$this->setTpl("header", $info);
		$this->setTpl("login");
	}

	public function feed()
	{
		$info = array(
			'title_pagina' => 'Seu feed',
			'header_login' => $this->default['header_login']
		);
		$this->default['footer'] = false;
		$this->setTpl("header", $info);
		$this->setTpl("inicioCentral", array('classPrincipal' => 'feed'));
		$this->setTpl("lateralEsqueda");
		$this->setTpl("feed");
		$this->setTpl("lateralDireita");
		$this->setTpl("finalCentral");
	}

	public function feed_usuario($request, $response, $args) 
	{
		$info = array(
			'title_pagina' => ' Feed de '.$nome,
			'header_login' => $this->default['header_login']
		);
		$nome = $args['usuario'];
		$this->setTpl("header", $info);
		$this->setTpl('feed_usuario' , array('nome_usuario' => $nome));
	}
	public function configuracao()
	{
		$info = array(
			'title_pagina' => ' Configurações',
			'header_login' => $this->default['header_login']
		);
		$this->setTpl("header", $info);
		$this->setTpl("configuracao");	
	}
	public function pesquisa()
	{
		$info = array(
			'title_pagina' => 'Pesquisa',
			'header_login' => $this->default['header_login']
		);
		$this->setTpl("header", $info);
		$this->setTpl("pesquisa");
	}
	public function mensagens()
	{
		$info = array(
			'title_pagina' => ' Minhas mensagens',
			'header_login' => $this->default['header_login']
		);
		$this->setTpl("header", $info);
		$this->setTpl("mensagens");
	}
	public function fotos()
	{
		$info = array(
			'title_pagina' => ' Minhas fotos',
			'header_login' => $this->default['header_login']
		);
		$this->setTpl("header",$info);
		$this->setTpl("fotos");
	}
}
?>