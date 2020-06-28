		<?php if (isset($_SESSION['Mysqli_Error'])): ?>
				<hr>
				<div class="row">
					<div class="col-sm-12 text-center alert alert-danger">
						<?= $_SESSION['Mysqli_Error']; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>		
					</div>
				</div>
		<?php endif ?>
		<?php if (isset($_SESSION['smstrue1'])): ?>
				<hr>
				<div class="row">
					<div class="col-sm-12 text-center alert alert-success">
						<?= $_SESSION['smstrue1']; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
		<?php endif ?>
		<?php if (isset($_SESSION['smstrue2'])): ?>
				<hr>
				<div class="row">
					<div class="col-sm-12 text-center alert alert-success">
						<?= $_SESSION['smstrue2']; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
		<?php endif ?>
		<?php if (isset($_SESSION['smsfalse1'])): ?>
				<hr>
				<div class="row">
					<div class="col-sm-12 text-center alert alert-danger">
						<?= $_SESSION['smsfalse1']; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
		<?php endif ?>
		<?php if (isset($_SESSION['smsfalse2'])): ?>
				<hr>
				<div class="row">
					<div class="col-sm-12 text-center alert alert-danger">
						<?= $_SESSION['smsfalse2']; ?>						
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
		<?php endif ?>
		<?php if (isset($_SESSION['smsnull1'])): ?>
				<hr>
				<div class="row">
					<div class="col-sm-12 text-center alert alert-warning">
						<?= $_SESSION['smsnull1']; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
		<?php endif ?>
		<?php if (isset($_SESSION['smsnull2'])): ?>
				<hr>
				<div class="row">
					<div class="col-sm-12 text-center alert alert-warning">
						<?= $_SESSION['smsnull2']; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
		<?php endif ?>