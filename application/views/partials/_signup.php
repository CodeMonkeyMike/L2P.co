<!-- Error message labels are hidden by navbar.js -->
<h1>Sign up!</h1>
<label for="signup_username">User Name</label>
<label id="username_error" class="error" for="signup_username">This field is required.</label> 
<input id="signup_username" class="text-input" name="signup_username" type="text" placeholder="User Name" />

<label for="email">Email</label>
<label id="email_error" class="error" for="email">This field is required.</label> 
<input id="email" class="text-input" name="email" type="text" placeholder="Joe@Schmo.com" />

<label for="signup_password">Password</label>
<label id="password_error" class="error" for="signup_password">This field is required.</label> 
<input id="signup_password" class="text-input" name="signup_password" type="password" placeholder="********" />

<label for="verify_password">Verify Password</label>
<label id="vp_error" class="error" for="verify_password">This field is required.</label> 
<input id="verify_password" class="text-input" name="verify_password" type="password" placeholder="********" />

<!-- Ajax submit that posts to account/signup -->
<a id="signup_submit" class="button radius">Create Account</a>

<a class="close-reveal-modal">&#215;</a>