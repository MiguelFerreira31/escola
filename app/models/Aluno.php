<?php

class Aluno extends Model
{


    public function buscarAluno($email)
    {

        $sql = "SELECT tbl_aluno.*, tbl_estado.sigla_uf FROM tbl_aluno
                     INNER JOIN tbl_estado ON tbl_aluno.id_uf = tbl_estado.id_uf
                        WHERE  tbl_aluno.email_aluno = :email AND tbl_aluno.status = 'Ativo';";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function contarAluno()
    {

        $sql = "SELECT COUNT(*) AS total_alunos_ativos FROM tbl_aluno WHERE status = 'Ativo'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



    public function getListarAluno()
    {

        $sql = "SELECT * 
                FROM tbl_aluno AS a
                INNER JOIN tbl_estado AS e 
                ON a.id_uf = e.id_uf
                WHERE TRIM(a.status) = 'Ativo'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getListarAlunoDesativado()
    {

        $sql = "SELECT * 
                FROM tbl_aluno AS a
                INNER JOIN tbl_estado AS e 
                ON a.id_uf = e.id_uf
                WHERE TRIM(a.status) = 'Inativo'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }





    //Listar cursos em que o aluno está matriculado


    public function getAlunoMatriculado($email)
    {

        $sql = "SELECT c.id_curso, c.nome_curso, c.descricao_curso, c.preco_curso, c.tempo_estimado,c.status_curso, 
                    m.data_matricula, p.nome_professor,p.foto_professor 
                FROM tbl_matricula m
                JOIN tbl_curso c ON m.id_curso = c.id_curso
                JOIN tbl_professor_curso pc ON c.id_curso = pc.id_curso
                JOIN tbl_professor p ON pc.id_professor = p.id_professor
                JOIN tbl_aluno a ON m.id_aluno = a.id_aluno
            WHERE a.email_aluno = :email;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    // Consultar notas do aluno por curso


    public function getNotaAluno($id_aluno)
    {

        $sql = " SELECT c.nome_curso, a.tipo_avaliacao, n.nota, n.data_avaliacao
        FROM tbl_nota n
        JOIN tbl_matricula m ON n.id_matricula = m.id_matricula
        JOIN tbl_avaliacao a ON n.id_avaliacao = a.id_avaliacao
        JOIN tbl_curso c ON m.id_curso = c.id_curso
        WHERE m.id_aluno = ?
        ORDER BY c.nome_curso, n.data_avaliacao;";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $stmt->bindValue(':id_aluno', $id_aluno);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



    //  METODO DASHBOARD ADICONAR Curso 

    public function addAluno($dados)
    {
        $sql = "INSERT INTO tbl_aluno (nome_aluno,data_nascimento, email_aluno, senha_aluno,status,cpf_cnpj_aluno,foto_aluno,
                telefone_aluno,
                endereco_aluno,
                bairro_aluno,
                cidade_aluno,
                id_uf) 
                VALUES (
                :nome_aluno,
                :nasc_aluno,
                :email_aluno,
                :senha_aluno, 
                :status_aluno, :cpf_cnpj_aluno,:foto_aluno,:telefone_aluno,:endereco_aluno,:bairro_aluno,:cidade_aluno,:id_uf);";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nome_aluno', $dados['nome_aluno']);
        $stmt->bindValue(':nasc_aluno', $dados['nasc_aluno']);
        $stmt->bindValue(':email_aluno', $dados['email_aluno']);
        $stmt->bindValue(':senha_aluno', $dados['senha_aluno']);
        $stmt->bindValue(':status_aluno', $dados['status_aluno']);
        $stmt->bindValue(':cpf_cnpj_aluno', $dados['cpf_cnpj_aluno']);
        $stmt->bindValue(':foto_aluno', $dados['foto_aluno']);
        $stmt->bindValue(':telefone_aluno', $dados['telefone_aluno']);
        $stmt->bindValue(':endereco_aluno', $dados['endereco_aluno']);
        $stmt->bindValue(':bairro_aluno', $dados['bairro_aluno']);
        $stmt->bindValue(':cidade_aluno', $dados['cidade_aluno']);
        $stmt->bindValue(':id_uf', $dados['id_uf']);
        $stmt->execute();
        return $this->db->lastInsertId();
    }


    public function updateAluno($id, $dados)
    {
        $sql = "UPDATE tbl_aluno 
                 SET nome_aluno = :nome_aluno,
                    data_nascimento = :nasc_aluno,
                    email_aluno = :email_aluno,
                    senha_aluno = :senha_aluno,
                    status = :status_aluno,
                    cpf_cnpj_aluno = :cpf_cnpj_aluno,
                    foto_aluno = :foto_aluno,
                    telefone_aluno = :telefone_aluno,
                    endereco_aluno = :endereco_aluno,
                    bairro_aluno = :bairro_aluno,
                    cidade_aluno = :cidade_aluno,
                    id_uf = :id_uf
                WHERE id_aluno = :id_aluno";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':id_aluno', $id, PDO::PARAM_INT);
        $stmt->bindValue(':nome_aluno', $dados['nome_aluno']);
        $stmt->bindValue(':nasc_aluno', $dados['nasc_aluno']);
        $stmt->bindValue(':email_aluno', $dados['email_aluno']);
        $stmt->bindValue(':senha_aluno', $dados['senha_aluno']);
        $stmt->bindValue(':status_aluno', $dados['status_aluno']);
        $stmt->bindValue(':cpf_cnpj_aluno', $dados['cpf_cnpj_aluno']);
        $stmt->bindValue(':foto_aluno', $dados['foto_aluno']);
        $stmt->bindValue(':telefone_aluno', $dados['telefone_aluno']);
        $stmt->bindValue(':endereco_aluno', $dados['endereco_aluno']);
        $stmt->bindValue(':bairro_aluno', $dados['bairro_aluno']);
        $stmt->bindValue(':cidade_aluno', $dados['cidade_aluno']);
        $stmt->bindValue(':id_uf', $dados['id_uf']);

        return $stmt->execute();
    }




    public function getAlunoId($id)
    {

        $sql = "SELECT * FROM tbl_aluno WHERE id_aluno = :id_aluno";


        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_aluno', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }





    // 6 Método para add FOTO GALERIA 

    public function addFotoAluno($id, $arquivo, $nome_aluno)
    {
        $sql = "UPDATE tbl_aluno 
            SET foto_aluno = :foto_aluno, alt_foto_aluno = :alt_foto_aluno 
            WHERE id_aluno = :id_aluno";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':foto_aluno', $arquivo);
        $stmt->bindValue(':alt_foto_aluno', $nome_aluno);
        $stmt->bindValue(':id_aluno', $id);

        return $stmt->execute();
    }



    // Desativar Aluno 

    public function desativarAluno($id)
    {

        $sql = "UPDATE tbl_aluno SET status = 'Inativo'  WHERE id_aluno = :id_aluno ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_aluno', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // ativar Aluno 

    public function ativarAluno($id)
    {

        $sql = "UPDATE tbl_aluno SET status = 'Ativo'  WHERE id_aluno = :id_aluno ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_aluno', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
