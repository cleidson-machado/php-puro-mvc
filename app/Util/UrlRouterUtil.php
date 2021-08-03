<?php

	// DEFALT URL UTIL TOLL TO ALL WEB SITE / ANTIGA CORE!!
	class UrlRouterUtil
	{
		
		public function redirectAndResolver($urlGet)
		{
			if (isset($urlGet['metodo'])) {
				$acao = $urlGet['metodo'];
			} else {
				$acao = 'index';
			}

			if (isset($urlGet['pagina'])) {
				$controller = ucfirst($urlGet['pagina'].'Controller');
			} else {
				$controller = 'HomeController';
			}
			

			if (!class_exists($controller)) {
				$controller = 'ErroController';
			}


			if (isset($urlGet['id']) && $urlGet['id'] != null) {
				$id = $urlGet['id'];
			} else {
				$id = null;
			}

			call_user_func_array(array(new $controller, $acao), array('id' => $id));

		}
	}