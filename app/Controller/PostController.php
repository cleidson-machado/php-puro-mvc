<?php

	require_once 'app/EntityDao/PostagemDao.php';
	require_once 'app/EntityDao/ComentarioDao.php';
	require_once 'app/ControllerBusinessRules/PostBrController.php';

	class PostController
	{

		private static $postagemDaoInstance;
		private static $comentarioDaoInstance;
		private static $postBrController;

        public static function postagemDaoGetInstace() //CREATE FOR CODE REUSE PURPOSES ONLY..
        {
                if (!isset(self::$postagemDaoInstance))
                    self::$postagemDaoInstance = new PostagemDao;
            return self::$postagemDaoInstance;
		}

		public static function comentarioDaoGetInstace() //CREATE FOR CODE REUSE PURPOSES ONLY..
        {
                if (!isset(self::$comentarioDaoInstance))
                    self::$comentarioDaoInstance = new ComentarioDao;
            return self::$comentarioDaoInstance;
		}

		public static function comentarioRulesGetInstace() //CREATE FOR CODE REUSE PURPOSES ONLY..
        {
                if (!isset(self::$postBrController))
                    self::$postBrController = new PostBrController; //Bussines Rulers Controller
            return self::$postBrController;
		}
		
		
		public function index($params)
		{
            try {
				$postagem = PostController::postagemDaoGetInstace()->selecionaPorId($params);

				$loader = new \Twig\Loader\FilesystemLoader('app/View');
                $twig = new \Twig\Environment($loader);
				$viewTemplate = $twig->load('single.html');

				$dados = array();
				$dados['id'] = $postagem->id;
				$dados['titulo'] = $postagem->titulo;
				$dados['conteudo'] = $postagem->conteudo;
				$dados['comentarios'] = $postagem->comentarios;

				$viewDataCode = $viewTemplate->render($dados);
				echo $viewDataCode;

				// var_dump ($dados['comentarios'] );
				
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}
		
		// NEW METHOD NOT FINISHED YET!! FOR RULER CLASS.... OLD DEVELOPER PATTERN
		public function addComent_BKP()
		{
			try {
				// PostController::comentarioDaoGetInstace()->inserir($_POST);
				// PostController::comentarioRulesGetInstace()->insertRule($_POST);
				PostBrController::insertRule($_POST);
								
				header('Location: http://localhost/mvclabrebuild/?pagina=post&metodo=index&id='.$_POST['id']);

			} catch (Exception $e) {

				echo '<script>alert("'.$e->getMessage().'");</script>';
				echo '<script>location.href="http://localhost/mvclabrebuild/?pagina=post&metodo=index&id='.$_POST['id'].'"</script>';
			}

		}

		// PAREI AQUI.. EM 10/08/2021 AS 19:16 H... add try cath e redirecionamentos / avisos em caso erro aqui??
		public function addComent()
		{

		PostBrController::insertRule($_POST);			
		header('Location: http://localhost/mvclabrebuild/?pagina=post&metodo=index&id='.$_POST['id']);

		}
	}	
?>