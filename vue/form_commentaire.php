								
			<div id="form_commentaire" >
					<div class="container">
					
						<form class="form-horizontal"  action="index.php?uc=forum&action=add_commentaire&billet=<?PHP echo $_GET['billet'] ;?>" method="post">
						<div class="row">
							<div class="col-xs-6">
							<div class="form-group">
							<textarea class="form-control" name="commentaire" placeholder="Ajouter un commentaire"></textarea>
							</div>
							<button type="submit" class="btn">Envoyer</button>
							</div>
						</div>
						</form>
					</div>	
			</div>