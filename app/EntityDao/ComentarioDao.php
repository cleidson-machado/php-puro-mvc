<?php

require_once 'app/Entity/ComentarioEntity.php';

class ComentarioDao extends ComentarioEntity
{
    // public static function selecionarComentarios_TEST($idPost)
	// 	{
    //         echo "Passei aqui! kkk: " . $idPost;
    //     }

    public static function selecionarComentarios($idPost)
    {
        // $con = Connection::getConn();
        $dataBase = ConnexDbConstruct::openLinkConnection();

        $sql = "SELECT * FROM comentario WHERE id_postagem = :id";
        $sql = $dataBase->prepare($sql);
        $sql->bindValue(':id', $idPost, PDO::PARAM_INT);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('ComentarioDao')) {
            $resultado[] = $row;
        }

        return $resultado;
    }
}

?>