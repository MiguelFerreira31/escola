<?php

class Nota extends Model
{



    public function getListarNota($email)
    {

        $sql = "SELECT 
            a.tipo_avaliacao, 
             n.nota, 
                         n.id_nota, 
                n.data_avaliacao, 
             c.nome_curso, 
                p.nome_professor,
                 m.media_final  
                    FROM tbl_nota n
            JOIN tbl_avaliacao a ON n.id_avaliacao = a.id_avaliacao
            JOIN tbl_matricula m ON n.id_matricula = m.id_matricula
              JOIN tbl_curso c ON m.id_curso = c.id_curso
                JOIN tbl_professor p ON a.id_professor = p.id_professor
                JOIN tbl_aluno al ON m.id_aluno = al.id_aluno
             WHERE al.email_aluno = :email
                ORDER BY n.data_avaliacao DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getListarNotaAluno($id_aluno)
    {
        $sql = "SELECT 
            a.tipo_avaliacao, 
            n.nota,
            n.id_nota, 
            n.data_avaliacao, 
            c.nome_curso,
            c.id_curso, 
            p.nome_professor,
            m.media_final 
        FROM tbl_nota n
        JOIN tbl_avaliacao a ON n.id_avaliacao = a.id_avaliacao
        JOIN tbl_matricula m ON n.id_matricula = m.id_matricula
        JOIN tbl_curso c ON m.id_curso = c.id_curso
        JOIN tbl_professor p ON a.id_professor = p.id_professor
        JOIN tbl_aluno al ON m.id_aluno = al.id_aluno
        WHERE al.id_aluno = :id_aluno
        ORDER BY n.data_avaliacao DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_aluno', $id_aluno);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //  METODO DASHBOARD ADICONAR Curso 
    public function addNota($dados)
    {
        $sql = "INSERT INTO tbl_nota (id_matricula, id_avaliacao, nota, data_avaliacao) 
                VALUES (:id_matricula, :id_avaliacao, :nota, :data_avaliacao)";

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':id_matricula', $dados['id_matricula'], PDO::PARAM_INT);
            $stmt->bindValue(':id_avaliacao', $dados['id_avaliacao'], PDO::PARAM_INT);
            $stmt->bindValue(':nota', $dados['nota']);
            $stmt->bindValue(':data_avaliacao', $dados['data_avaliacao']);

            $stmt->execute();
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                return false;
            } else {
                throw $e;
            }
        }
    }



    public function calcularMediaFinal($id_matricula)
    {
        $sql = "SELECT SUM(n.nota * a.peso) / SUM(a.peso) AS media_final
                FROM tbl_nota n
                INNER JOIN tbl_avaliacao a ON n.id_avaliacao = a.id_avaliacao
                WHERE n.id_matricula = :id_matricula";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_matricula', $id_matricula, PDO::PARAM_INT);
        $stmt->execute();
        $media = $stmt->fetchColumn();

        if ($media !== null) {
            $sqlUpdate = "UPDATE tbl_matricula SET media_final = :media WHERE id_matricula = :id_matricula";
            $stmtUpdate = $this->db->prepare($sqlUpdate);
            $stmtUpdate->bindValue(':media', $media, PDO::PARAM_STR);
            $stmtUpdate->bindValue(':id_matricula', $id_matricula, PDO::PARAM_INT);
            $stmtUpdate->execute();
        }
    }




    public function getTipoAvaliacao()
    {
        $sql = "SELECT * FROM tbl_avaliacao;";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
