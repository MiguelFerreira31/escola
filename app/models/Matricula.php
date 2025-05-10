<?php

class Matricula extends Model
{

    public function getMatriculaAluno()
    {

        $sql = "SELECT c.id_curso, c.nome_curso, c.descricao_curso, c.preco_curso, c.tempo_estimado, 
                m.data_matricula, p.nome_professor 
            FROM tbl_matricula m
            JOIN tbl_curso c ON m.id_curso = c.id_curso
            JOIN tbl_professor_curso pc ON c.id_curso = pc.id_curso
            JOIN tbl_professor p ON pc.id_professor = p.id_professor
            JOIN tbl_aluno a ON m.id_aluno = a.id_aluno
            WHERE a.email_aluno = :email;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    //  METODO DASHBOARD ADICONAR Curso 

    public function addMatricula($dados)
    {
        try {
            $sql = "INSERT INTO tbl_matricula (
                id_aluno,
                id_curso,
                data_matricula,
                media_final,
                id_professor
            ) 
            VALUES (
                :id_aluno,
                :id_curso,
                :data_matricula,
                :media_final,
                :id_professor
            )";

            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(':id_aluno', $dados['id_aluno']);
            $stmt->bindValue(':id_curso', $dados['id_curso']);
            $stmt->bindValue(':data_matricula', $dados['data_matricula']);
            $stmt->bindValue(':media_final', $dados['media_final']);
            $stmt->bindValue(':id_professor', $dados['id_professor']);

            $stmt->execute();
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            // Verifica se o erro é de duplicidade (código 23000)
            if ($e->getCode() == 23000) {
                return false;
            } else {
                throw $e; // Se for outro erro, lança a exceção
            }
        }
    }


    public function verificarDuplicidade($id_aluno, $id_curso, $id_professor)
    {
        $sql = "SELECT COUNT(*) FROM tbl_matricula WHERE id_aluno = :id_aluno AND id_curso = :id_curso AND id_professor = :id_professor";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_aluno', $id_aluno);
        $stmt->bindValue(':id_curso', $id_curso);
        $stmt->bindValue(':id_professor', $id_professor);
        $stmt->execute();

        return $stmt->fetchColumn() > 0;
    }


    // Desativar Matricula

    public function desativarMatricula($id)
    {

        $sql = "DELETE FROM tbl_matricula WHERE id_matricula = :id_matricula;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_matricula', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
