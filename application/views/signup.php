<div id="signup">

<h1>Sign Up </h1>

<fieldset>
	<?php echo validation_errors('<p class="error">'); ?>
	<legend>Company Information</legend>

	<?php 
	
	echo form_open('signup/signup_validate');
	$data = array(
		  'name'        => 'company',
		  'placeholder' => 'Company Name',
		  'onfocus'		=> "this.placeholder=''",
		  'onblur' 		=> "this.placeholder='Company Name'"
		);
	echo form_input($data, set_value('company'));
	
	$data = array(
		  'name'        => 'email',
		  'placeholder' => 'Email Address',
		  'onfocus'		=> "this.placeholder=''",
		  'onblur' 		=> "this.placeholder='Email Address'"
		);
	echo form_input($data, set_value('email'));	
	
	$data = array(
		  'name'        => 'tel',
		  'placeholder' => 'Telephone Number',
		  'onfocus'		=> "this.placeholder=''",
		  'onblur' 		=> "this.placeholder='Telephone Number'"
		);
	echo form_input($data, set_value('tel'));
	
	$data = array(
		  'type'        => 'submit',
		  'value' 		=> 'Send',
		  'id'			=> 'submit_button'
		);
	
	echo form_submit($data);
	?>
	
	
	
	
</fieldset>

</div>


























