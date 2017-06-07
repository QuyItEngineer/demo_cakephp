<br>
<div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns">
	<div class="panel">
		<h2 class="text-center">Please Register</h2>
		<?= $this->Form->create($user); ?>
			<?= $this->Form->input('username'); ?>
			<?= $this->Form->input('email'); ?>
			<?= $this->Form->input('password', array('type' => 'password')); ?>
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<?= $this->Form->submit('Register', array('class' => 'button')); ?>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<button type="button" class="btn btn-default login-form">
						<?= $this->Html->link('Login', ['controller' => 'users', 'action' => 'login'])?>
					</button>
				</div>
			</div>
		<?= $this->Form->end(); ?>
	</div>
</div>