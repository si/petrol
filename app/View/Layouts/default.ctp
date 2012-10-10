<!DOCTYPE html>
<html lang="en">
<?php
  echo $this->element('head');
?>

<body>

  <?php echo $this->element('header'); ?>

  <div class="container-fluid">
  
    <div class="row-fluid">
      <?php echo $content_for_layout; ?>
		</div>

    <?php echo $this->element('footer'); ?>

	</div><!-- container -->

  <?php echo $this->element('scripts'); ?>

	</body>
</html>