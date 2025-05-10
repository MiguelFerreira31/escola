<?php

class Turma extends Model
{



    public function getListarSalas($email)
    {

        $sql = "SELECT c.id_curso, c.nome_curso, c.descricao_curso, COUNT(m.id_matricula) AS total_alunos
                FROM tbl_professor_curso pc
                JOIN tbl_curso c ON pc.id_curso = c.id_curso
                LEFT JOIN tbl_matricula m ON c.id_curso = m.id_curso
                JOIN tbl_professor p ON pc.id_professor = p.id_professor
                WHERE p.email_professor = :email
                GROUP BY c.id_curso, c.nome_curso, c.descricao_curso;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }





    public function getListarTurma($id_curso)
    {
        // SQL para buscar os detalhes da turma (alunos matriculados)
        $sql = "SELECT 
                c.id_curso,
                c.nome_curso,
                c.descricao_curso,
                a.id_aluno,
                a.nome_aluno,
                a.email_aluno,
                a.foto_aluno,
                a.telefone_aluno,
                m.id_matricula
                    FROM tbl_curso c
                    JOIN tbl_matricula m ON c.id_curso = m.id_curso
                    JOIN tbl_aluno a ON m.id_aluno = a.id_aluno
                    WHERE c.id_curso = :id_curso;";

        // Preparar e executar a consulta
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_curso', $id_curso, PDO::PARAM_INT);  // Usar bindValue para garantir o tipo correto
        $stmt->execute();

        // Retornar os dados encontrados
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
