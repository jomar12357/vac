<?php
	if (isset($_SESSION['Mysqli_Error'])) {
		?>
			<script type="text/javascript">
				toastr.error(`<?= $_SESSION['Mysqli_Error']; ?>`);
			</script>
		<?php
	}

	//true1 y true2
	if (isset($_SESSION['smstrue1'])) {
		?>
			<script type="text/javascript">
				toastr.success(`<?= $_SESSION['smstrue1']; ?>`);
			</script>
		<?php
		unset($_SESSION['smstrue1']);
	}
	if (isset($_SESSION['smstrue2'])) {
		?>
			<script type="text/javascript">
				toastr.success(`<?= $_SESSION['smstrue2']; ?>`);
			</script>
		<?php
		unset($_SESSION['smstrue2']);
	}

	//false1 y false2
	if (isset($_SESSION['smsfalse1'])) {
		?>
			<script type="text/javascript">
				toastr.error(`<?= $_SESSION['smsfalse1']; ?>`);
			</script>
		<?php
		unset($_SESSION['smsfalse1']);
	}
	if (isset($_SESSION['smsfalse2'])) {
		?>
			<script type="text/javascript">
				toastr.error(`<?= $_SESSION['smsfalse2']; ?>`);
			</script>
		<?php
		unset($_SESSION['smsfalse2']);
	}

	//null1 y null2
	if (isset($_SESSION['smsnull1'])) {
		?>
			<script type="text/javascript">
				toastr.warning(`<?= $_SESSION['smsnull1']; ?>`);
			</script>
		<?php
		unset($_SESSION['smsnull1']);
	}
	if (isset($_SESSION['smsnull2'])) {
		?>
			<script type="text/javascript">
				toastr.warning(`<?= $_SESSION['smsnull2']; ?>`);
			</script>
		<?php
		unset($_SESSION['smsnull2']);
	}
?>