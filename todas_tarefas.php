<?php
	$acao = 'recuperar';
	$pagina = 'todas_tarefas';
	require 'tarefa_controller.php';
?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<script src="js/script.js"></script>

	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista Tarefas
				</a>
			</div>
		</nav>

		<!--ALERTA DE atualização-->
		<?php if(isset($_GET['atualizacao']) && $_GET['atualizacao']== 1){?>
			<div class="bg-success pt-2 text-white d-flex justify-content-center">
					<h5>Tarefa atualizada com sucesso!</h5>
			</div>
		<?php } ?>
		<!---------------------->

		<!--ALERTA DE  ERRO DE atualização-->
		<?php if(isset($_GET['atualizacao']) && $_GET['atualizacao']== 2){?>
			<div class="bg-warning pt-2 text-white d-flex justify-content-center">
					<h5>Erro! tente novamente mais tarde.</h5>
			</div>
		<?php } ?>
		<!---------------------->

		<!--ALERTA DE remoção-->
		<?php if(isset($_GET['atualizacao']) && $_GET['atualizacao']== 3){?>
			<div class="bg-success pt-2 text-white d-flex justify-content-center">
					<h5>Tarefa excluída com sucesso!</h5>
			</div>
		<?php } ?>
		<!---------------------->

		<!--ALERTA DE check-->
		<?php if(isset($_GET['atualizacao']) && $_GET['atualizacao']== 4){?>
			<div class="bg-success pt-2 text-white d-flex justify-content-center">
					<h5>Tarefa marcada como Realizada!</h5>
			</div>
		<?php } ?>
		<!---------------------->

		<div class="container app">
			<div class="row">
				<div class="col-sm-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
						<li class="list-group-item active"><a href="#">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Todas tarefas</h4>
								<hr />

								<?php foreach ($tarefas as $indice => $tarefa) {?>

								<div class="row mb-3 d-flex align-items-center tarefa">
									<div class="col-sm-9" id="tarefa_<?= $tarefa->id?>">
										<?= $tarefa->tarefa?> (<?= $tarefa->status?>)
									</div>
									<div class="col-sm-2 mt-3 d-flex justify-content-between">
										<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover('<?= $pagina?>', <?= $tarefa->id?>)" id="remover_<?= $tarefa->id?>"></i>
									
									<?php if($tarefa->status == 1 || $tarefa->status == 'pendente'){ ?>
									
										<i class="fas fa-edit fa-lg text-info" onclick="editar('<?= $pagina?>', <?= $tarefa->id?>, '<?= $tarefa->tarefa?>')" id="atualizar_<?= $tarefa->id?>"></i>
										<i class="fas fa-check-square fa-lg text-success" onclick="check('<?= $pagina?>', <?= $tarefa->id?>)" id="check_<?= $tarefa->id?>"></i>
									
									<?php } ?>
									
									</div>
								</div>

								<?php } ?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>