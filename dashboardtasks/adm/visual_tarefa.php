<?php
	$id = $_GET['id'];
	//Executa consulta
	$result = mysql_query("SELECT * FROM tarefas WHERE id = '$id' LIMIT 1");
	$resultado = mysql_fetch_assoc($result);
?>
<div class="container theme-showcase" role="main">      
	<div class="page-header">
		<h1>Visualizar Tarefa</h1>
	</div>
	
	<div class="row">
		<div class="pull-right">
			<a href='administrativo.php?link=10'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>
							
			<a href='administrativo.php?link=13&id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
			
			<a href='processa/proc_apagar_tarefa.php?id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
		</div>
	</div>
	<table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tarefa</th>
                  <th>Prioridade</th>
                  <th>Usuário</th>
                <th>Situação</th>
                    <th>Anexo</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td><?php echo $resultado['nome']; ?></td>
                  <td><?php echo $resultado['prioridade']; ?></td>
                  <td><?php 
                      $result =mysql_query("SELECT * FROM usuarios WHERE id=4");
                      $dados = mysql_fetch_assoc($result);
                     echo $dados['nome']; ?></td>
                    <td><?php 
                        if($resultado['situacao']==1){
                            echo "<button type='button' class='btn btn-sm btn-warning'>Processada</button>";
                        }else{
                            echo "<button type='button' class='btn btn-success'>Done</button>";
                        }  
                        ?></td>
                    <td><?php $foto = $resultado['anexo']; ?></td>
                </tr>
        </tbody>
    </table>
    <h2>Descrição: </h2>
    <h3><?php echo $resultado['descricao']; ?>
    </h3>
</div> <!-- /container -->

