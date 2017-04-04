<!-- <link rel="stylesheet" href="../webroot/css/quy.css" /> -->
 <?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
	<div class="form_login_quy">
	    <?php echo $this->Form->create('BoostCake',array(
			'inputDefaults' => array(
				'div' => 'form-group',
				'label' => false,
				'wrapInput' => false,
				'class' => 'form-control'
				 ),

				 'class' => 'well form-inline'
				  ));
		 ?>
		 <?php  echo $this->Form->input('email', array(
		 	'placeholder' => 'Email' , ));
		  ?>
		  <?php echo $this->Form->input('password', array(
		  	'placeholder' => 'Password',  ));
		  ?>
		 <!--  <?php echo $this->Form->input('remember', array(
				'wrapInput' => 'col col-md-9 col-md-offset-3',
				'label' => 'Remember me',
				'class' => false
			)); ?> -->
		 <?php echo $this->Form->submit('Sign in',array(
		  	'div' => 'form-group',
		  	'class' => 'btn btn-default' ));
		 ?>
		 <?php echo $this->Form->end(); ?>
	</div>
</div>


