<?php

	class PostController
	{

        private static $instance;

        public static function daoGetInstace()
        {
                if (!isset(self::$instance))
                    self::$instance = new PostagemDao;
            return self::$instance;
        }

        public function index($params)
		{
            try {
				$postagem = HomeController::daoGetInstace()->selecionaPorId($params);

				$loader = new \Twig\Loader\FilesystemLoader('app/View');
                
                $twig = new \Twig\Environment($loader);
				$viewTemplate = $twig->load('single.html');

				$dados = array();
				$dados['id'] = $postagem->id;
				$dados['titulo'] = $postagem->titulo;
				$dados['conteudo'] = $postagem->conteudo;

				$viewDataCode = $viewTemplate->render($dados);
				echo $viewDataCode;
				
			} catch (Exception $e) {
				echo $e->getMessage();
			}
        }
    }
?>