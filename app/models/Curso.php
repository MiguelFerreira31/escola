<?php

class Curso extends Model
{
    public function getTodosCursos($limite = 3)
    {

        $sql = "SELECT * FROM tbl_curso ORDER BY RAND() LIMIT :limite";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getListarCursos()
    {

        $sql = "SELECT * FROM tbl_curso WHERE status_curso = 'Ativo'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getListarCursoDesativados()
    {

        $sql = "SELECT * FROM tbl_curso WHERE status_curso = 'Inativo'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function contarCurso()
    {

        $sql = "SELECT COUNT(*) AS total_cursos_ativos FROM tbl_curso WHERE status_curso = 'Ativo';";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



    //  METODO DASHBOARD ADICONAR Curso 

    public function addCurso($dados)
    {

        $sql = "INSERT INTO tbl_curso (
           nome_curso,
           descricao_curso,
           preco_curso,
           tempo_estimado,
           status_curso
       ) 
       VALUES (
           :nome_curso,
           :descricao_curso,
           :preco_curso,
           :tempo_estimado,
           :status_curso
       )";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':nome_curso', $dados['nome_curso']);
        $stmt->bindValue(':descricao_curso', $dados['descricao_curso']);
        $stmt->bindValue(':preco_curso', $dados['preco_curso']);
        $stmt->bindValue(':tempo_estimado', $dados['tempo_estimado']);
        $stmt->bindValue(':status_curso', $dados['status_curso']);

        $stmt->execute();
        return $this->db->lastInsertId();
    }


    public function updateCurso($id, $dados)
    {
        $sql = "UPDATE tbl_curso SET nome_curso = :nome_curso,
                   descricao_curso = :descricao_curso,
                   preco_curso = :preco_curso,
                   tempo_estimado = :tempo_estimado,
                   status_curso = :status_curso
               WHERE id_curso = :id_curso";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':id_curso', $id, PDO::PARAM_INT);
        $stmt->bindValue(':nome_curso', $dados['nome_curso']);
        $stmt->bindValue(':descricao_curso', $dados['descricao_curso']);
        $stmt->bindValue(':preco_curso', $dados['preco_curso']);
        $stmt->bindValue(':tempo_estimado', $dados['tempo_estimado']);
        $stmt->bindValue(':status_curso', $dados['status_curso']);

        return $stmt->execute();
    }



    public function getCursoId($id)
    {

        $sql = "SELECT * FROM tbl_curso WHERE id_curso = :id_curso";


        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_curso', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Desativar curso 

    public function desativarCurso($id)
    {

        $sql = "UPDATE tbl_curso SET status_curso = 'Inativo'  WHERE id_curso = :id_curso ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_curso', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }


    public function ativarCurso($id)
    {

        $sql = "UPDATE tbl_curso SET status_curso = 'Ativo'  WHERE id_curso = :id_curso ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_curso', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }




}
