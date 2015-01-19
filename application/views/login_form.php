<body id="loginbody">
<div id="login_form">
	<h1>Login</h1>
	<?php 	
		echo form_open('login/validate_credentials');
		$data = array(
		  'name'        => 'username',
		  'placeholder' => 'Username',
		  'onfocus'		=> "this.placeholder=''",
		  'onblur' 		=> "this.placeholder='Username'"
		);
		echo form_input($data, set_value('username'));
		$data = array(
		  'name'        => 'password',
		  'placeholder' => 'Password',
		  'onfocus'		=> "this.placeholder=''",
		  'onblur' 		=> "this.placeholder='Password'"
		);
		echo form_password($data);
		$data = array(
		  'name'        => 'submit',
		  'value'	 	=> 'Submit'
		);
		echo form_submit($data);
	    echo anchor('login/signup', 'Create Account');
	?>
</div>
</body>