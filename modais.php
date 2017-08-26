<div class="modal fade" id="modalNovaPergunta">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="transform:translateY(5px);">
		          <span aria-hidden="true" style="font-size:130%;">&times;</span>
		        </button>
				<h3 class="modal-title">
					Nova Pergunta
				</h3>
			</div>
			<div class="modal-body">
				<form action="confirma-pergunta.php" method="post">
					<div class="form-group">
						<label for="pergunta">Pergunta</label>
						<input type="text" name="pergunta" class="form-control" placeholder="Nova Pergunta" required autofocus>
					</div>
					<div class="form-group">
						<label for="">Alternativa 1</label>
						<input type="text"  name="alternativa1" class="form-control" placeholder="Alternativa Falsa" required>
					</div>
					<div class="form-group">
						<label for="">Alternativa 2</label>
						<input type="text"  name="alternativa2" class="form-control" placeholder="Alternativa Falsa" required>
					</div>
					<div class="form-group">
						<label for="">Alternativa 3</label>
						<input type="text"  name="alternativa3" class="form-control" placeholder="Alternativa Falsa" required>
					</div>
					<div class="form-group">
						<label for=""><strong><span class="glyphicon glyphicon-asterisk"></span> Resposta Correta</strong></label>
						<input type="text" name="respostaCorreta" class="form-control bg-success" placeholder="Alternativa Verdadeira" required>
					</div>
					<div class="form-group">
						<label for="dificuldade">Dificuldade</label>
						<select class="form-control" id="dificuldade" name="dificuldade">
							<option value="Fácil">Fácil</option>
							<option value="Normal">Normal</option>
							<option value="Difícil">Difícil</option>
						</select>
					</div>
					<button class="btn btn-danger btn-block"><strong>Enviar</strong></button>
				</form>
			</div>
			<div class="modal-footer">
				<div class="text-center">
					<small>Adicione apenas perguntas sobre o <strong>Java</strong></small>
				</div>	
			</div>
		</div>
	</div>
</div>