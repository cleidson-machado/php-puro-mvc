<?php

require_once 'app/EntityDao/ComentarioDao.php';

// NO EXTENDS COMENTARIO DAO CLASS...
class PostBrController
{
    // UMA REGRA SIMPLES.. ATERANDO TUDO PARA MAIUSCULO ANTES DE SALVAR NO BANCO
    // SIMPLE RULE TEST.. CHANGE TO UPPERCASE BEFORE SAVE DATA
    public static function insertRule($reqPost)
    {
    
       $nameUpperCase = strtoupper($reqPost['nome']);
       $msnUpperCase = strtoupper($reqPost['msg']);

       $modelDao = new ComentarioEntity;

       $modelDao->setId($reqPost['id']);
       $modelDao->setNome($nameUpperCase);
       $modelDao->setMensagem($msnUpperCase);

       ComentarioDao::inserirComoObjeto($modelDao);

    }

}


?>