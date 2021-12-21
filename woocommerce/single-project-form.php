<form class="projectForm">
	<div class="alert alert-success d-none">Projeto enviado com sucesso, obrigado!</div>
	<div class="alert alert-danger d-none">Ocorreu um erro, tente novamente mais tarde</div>
	<div class="row">
		<div class="col-md-12 mb-3">
			<label>Dê um título ao seu projeto</label>
			<input type="text" name="title" class='form-control' required/>
		</div>
		<div class="col-md-12 mb-3">
			<label>Descreva o processo do seu trabalho</label>
			<textarea name='desc' rows="8" class='form-control' required></textarea>
		</div>
		<div class="col-md-12 mb-3">
			<label>Escola sua imagem de capa</label>
			<input type="file" name="imagem" class='form-control' required accept=".jpg,.png"/>
		</div>
		<div class="col-md-12 mb-3">
			<label>Adicione outras imagens do seu projeto (.zip)</label>
			<input type="file" name="arquivo" class='form-control' accept=".zip"/>
		</div>
		<div class="col-md-12 mb-3">
			<button type="submit" class="btn btn-warning w-100">Enviar projeto</button>
		</div>
		<input type="hidden" name="curso" value="<?php echo get_query_var( 'productId' )?>"/>
		<input type="hidden" name="action" value="addProject"/>
		<input type="hidden" name="user" value="<?php if ( is_user_logged_in() ) {echo get_current_user_id();}?>"/>
	</div>
</form>
<script type="text/javascript">
			var $ = jQuery; 		
	$(document).ready(function(){
			var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
            $('.projectForm').submit(function(e){
                e.preventDefault();
                var form = $(this)[0];
                var formData = new FormData(form);
                $(this).find('button').attr('disabled','disabled');
                $.ajax({
                    url: ajaxurl,
                    type: 'post',
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    data:formData,
                    success: function(response) {
                        $(".projectForm input").val('');
                        $(".projectForm select").val('');
                        $(".projectForm textarea").val('');
                        $('.projectForm .alert-success').removeClass('d-none');
                        $('.projectForm button').removeAttr('disabled');
                    },
                    error: function(xhr, status) {
                        $('.projectForm .alert-danger').removeClass('d-none');
                        $('.projectForm button').removeAttr('disabled');
                    }
                });
            });
	});
</script>