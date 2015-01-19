<body id="loginbody">

<div class="login_form">
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
    ?>
	<p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Remember me on this computer
          </label>
		  
        </p>
	<p class="submit">
	<?php
		echo form_submit('submit', 'Login');?>
	</p>
	
</div>
<div class="login-help">
      <p>Forgot your password? <?php echo anchor('login/resetpassword', 'Click here to reset.') ?></p>
	<p><?php
	    echo 'New Company? ' . anchor('login/signup', 'Sign Up Here!');
	?>
	</p>
</div>
	
</body>