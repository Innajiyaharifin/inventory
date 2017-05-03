<?php require_once "header.php" ?>
<?php require_once "step.php" ?>
	<?php if($_GET['step'] == 1): ?>
		<?php require_once "step-01.php"; ?>
	<?php elseif($_GET['step'] == 2): ?>
		<?php require_once "step-02.php"; ?>
	<?php elseif($_GET['step'] == 3): ?>
		<?php require_once "step-03.php"; ?>
	<?php elseif($_GET['step'] == 4): ?>
		<?php require_once "step-4.php"; ?>
	<?php endif; ?>

<?php require_once "footer.php" ?>