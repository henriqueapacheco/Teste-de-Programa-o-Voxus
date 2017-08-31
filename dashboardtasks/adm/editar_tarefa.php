<?php
	$id = $_GET['id'];
	//Executa consulta
	$result = mysql_query("SELECT * FROM tarefas WHERE id = '$id' LIMIT 1");
	$resultado = mysql_fetch_assoc($result);
	$id_produto = $resultado['id'];
?>
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Editar Produto</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href='administrativo.php?link=10&id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>
			
			<a href='processa/proc_apagar_tarefa.php?id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <form class="form-horizontal" method="POST" action="processa/proc_edit_tarefa.php" enctype="multipart/form-data">
	  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="nome" placeholder="Nome Tarefa" value="<?php echo $resultado['nome']; ?>">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Descrição</label>
			<div class="col-sm-10">
				<textarea class="form-control ckeditor" rows="5" name="descricao" placeholder="Descrição curta do produto"><?php echo $resultado['descricao']; ?></textarea>
			</div>
		  </div>
		  
		      <div class="form-group">
			     <label for="inputPassword3" class="col-sm-2 control-label">Prioridade</label>
			     <div class="col-sm-10">
			         <select class="form-control" name="prioridade">
                        <option value="1">1</option>
				        <option value="2">2</option>
                        <option value="3">3</option>
				        <option value="4">4</option>
                        <option value="5">5</option>
				    </select>
			     </div>
		      </div>
          
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Usuário</label>
			<div class="col-sm-10">
			  <select class="form-control" name="usuario">
				  <!--<option>Selecione</option>-->
				  <?php 
						$resultado =mysql_query("SELECT * FROM usuarios");
						while($dados = mysql_fetch_assoc($resultado)){
							?>
								<option value="<?php echo $dados["id"]; ?>"><?php echo $dados["nome"];?></option>
							<?php
						}
					?>
				</select>
			</div>
		  </div>
          
          <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Situação da Tarefa</label>
			     <div class="col-sm-10">
			         <select class="form-control" name="situacao">
                        <option value="1">Processada</option>
				        <option value="2">Done</option>
				    </select>
			     </div>
		  </div>
          <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Anexos</label>
				<div class="col-sm-10">
					<input name="arquivo" type="file"/>	
				</div>
		  </div>
		  <input type="hidden" name="id" value="<?php echo $id_produto;?>">
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-success">Editar</button>
			</div>
		  </div>
		</form>
	</div>
	</div>
</div> <!-- /container -->

