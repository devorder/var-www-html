
<?php if($this->session->userdata('logged_in')): ?>

    <p>logged in as <b><?php echo $this->session->userdata('username'); ?></b></p>
    <?php echo form_open('UsersController/logout'); ?>
        <?php echo form_submit([ 'value' => 'Logout', 'class' => 'btn btn-outline-primary']); ?>
    <?php echo form_close(); ?>


<?php else: ?>

<h2>Login Form</h2>
<?php $attr = [ 'id' => 'login_form', 'class' => 'form form_horizontal'] ?>

<?php if($this->session->flashdata('errors')):?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('errors');?>
    </div>
<?php endif?>

<!-- login form starts here-->
<?php echo form_open('UsersController/login', $attr);?>
<!-- username -->
<div class="form-group" >
    <?php echo form_label('Username') ?>
    <?php $data = ['class' => 'form-control', 'name' => 'username', 'placeholder' => 'Enter Username'];?>
    <?php echo form_input($data) ?>
</div>
<!-- password -->
<div class="form-group" >
    <?php echo form_label('Password') ?>
    <?php $data = ['class' => 'form-control', 'name' => 'password', 'placeholder' => 'Enter Password'];?>
    <?php echo form_password($data) ?>
</div>
<!-- submit button -->
<div class="form-group" >
    <?php echo form_submit(['value' => 'Login', 'class' => 'btn btn-primary pull-right']) ?>
</div>
<?php echo form_close();?>
<!-- login form ends here -->
<?php endif; ?>