<?php

class Professor extends Model
{

    public function buscarProfessor($email)
    {
        $sql = "SELECT tbl_professor.*, tbl_estado.sigla_uf FROM tbl_professor
                     INNER JOIN tbl_estado ON tbl_professor.id_uf = tbl_estado.id_uf
                        WHERE  tbl_professor.email_professor = :email AND tbl_professor.status = 'Ativo';";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function contarProfessor()
    {

        $sql = "SELECT COUNT(*) AS total_professores_ativos FROM tbl_professor WHERE status = 'Ativo'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



    public function getTodosProfessor()
    {

        $sql = "SELECT * FROM tbl_professor 
                    WHERE status = 'Ativo' 
                    ";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function getTodosProfessorDesativado()
    {

        $sql = "SELECT * FROM tbl_professor 
                    WHERE status = 'Inativo' 
                   ";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }




    //  METODO DASHBOARD ADICONAR Curso 

    public function addProfessor($dados)
    {

        $sql = "INSERT INTO tbl_professor (nome_professor,data_admissao_professor, email_professor, senha_professor,status,foto_professor,
                telefone_professor,
                endereco_professor,
                 id_uf ) VALUES (
                :nome_professor,
                :data_adm_professor,
                 :email_professor,
                :senha_professor, 
                :status_professor, :foto_professor,:telefone_professor,:endereco_professor,:id_uf);";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':nome_professor', $dados['nome_professor']);
        $stmt->bindValue(':data_adm_professor', $dados['data_adm_professor']);
        $stmt->bindValue(':email_professor', $dados['email_professor']);
        $stmt->bindValue(':senha_professor', $dados['senha_professor']);
        $stmt->bindValue(':status_professor', $dados['status_professor']);
        $stmt->bindValue(':foto_professor', $dados['foto_professor']);
        $stmt->bindValue(':telefone_professor', $dados['telefone_professor']);
        $stmt->bindValue(':endereco_professor', $dados['endereco_professor']);
        $stmt->bindValue(':id_uf', $dados['id_uf']);

        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function updateProfessor($id, $dados)
    {
        $sql = "UPDATE tbl_professor 
                SET nome_professor = :nome_professor,
                    data_admissao_professor = :data_adm_professor,
                    email_professor = :email_professor,
                    senha_professor = :senha_professor,
                    status = :status_professor,
                    foto_professor = :foto_professor,
                    telefone_professor = :telefone_professor,
                    endereco_professor = :endereco_professor,
                    id_uf = :id_uf
                WHERE id_professor = :id_professor";
    
        $stmt = $this->db->prepare($sql);
    
        $stmt->bindValue(':id_professor', $id, PDO::PARAM_INT);
        $stmt->bindValue(':nome_professor', $dados['nome_professor']);
        $stmt->bindValue(':data_adm_professor', $dados['data_adm_professor']);
        $stmt->bindValue(':email_professor', $dados['email_professor']);
        $stmt->bindValue(':senha_professor', $dados['senha_professor']);
        $stmt->bindValue(':status_professor', $dados['status_professor']);
        $stmt->bindValue(':foto_professor', $dados['foto_professor']);
        $stmt->bindValue(':telefone_professor', $dados['telefone_professor']);
        $stmt->bindValue(':endereco_professor', $dados['endereco_professor']);
        $stmt->bindValue(':id_uf', $dados['id_uf']);
    
        return $stmt->execute();
    }
    

    public function getProfessorId($id)
    {

        $sql = "SELECT * FROM tbl_professor WHERE id_professor = :id_professor";


        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_professor', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);


    }


    // 6 Método para add FOTO Professor 

    public function addFotoProfessor($id_professor, $arquivo)
    {
        $sql = "UPDATE tbl_professor 
            SET foto_professor = :foto_professor
            WHERE id_professor = :id_professor";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':foto_professor', $arquivo);
        $stmt->bindValue(':id_professor', $id_professor);

        return $stmt->execute();
    }


   // Desativar 

   public function desativarProfessor($id)
   {

       $sql = "UPDATE tbl_professor SET status = 'Inativo'  WHERE id_professor = :id_professor ";
       $stmt = $this->db->prepare($sql);
       $stmt->bindValue(':id_professor', $id, PDO::PARAM_INT);
       return $stmt->execute();
   }


   // ativar

   public function ativarProfessor($id)
   {

       $sql = "UPDATE tbl_professor SET status = 'Ativo'  WHERE id_professor = :id_professor ";
       $stmt = $this->db->prepare($sql);
       $stmt->bindValue(':id_professor', $id, PDO::PARAM_INT);
       return $stmt->execute();
   }






}
