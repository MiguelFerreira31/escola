

<div class="container my-5">
    <h2 class="text-center fw-bold py-3" style="background: #9a5c1fad; color: white; border-radius: 12px;">Contatos Recebidos</h2>

    <div class="table-responsive rounded-3 shadow-lg p-3" style="background: #ffffff;">
        <table class="table table-hover text-center align-middle">
            <thead style="background: #f0c9a9; color: #9a5c1fad;">
                <tr>
                  
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Assunto</th>
                    <th scope="col">Mensagem</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contatos as  $linha): ?>
                    <tr class="fw-semibold">
                      
                        <td><?php echo htmlspecialchars($linha['nomeContato']); ?></td>
                        <td><?php echo htmlspecialchars($linha['emailContato']); ?></td>
                        <td><?php echo ($linha['telContato']); ?></td>
                        <td><?php echo htmlspecialchars($linha['assuntoContato']); ?></td>                        
                        <td><?php echo htmlspecialchars($linha['mensContato']); ?></td>                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

 
</div>
