<!-- Error message labels are hidden by navbar.js -->
<h1>Sign In!</h1>
<label for="username">User Name</label>
<label id="username_error" class="error" for="username">This field is required.</label> 
<input id="username" class="text-input" name="username" type="text" placeholder="User Name" />

<label for="password">Password</label>
<label id="password_error" class="error" for="password">This field is required.</label> 
<input id="password" class="text-input" name="password" type="password" placeholder="********" />

<!-- Ajax submit that posts to account/login -->
<a id="login_submit" class="button radius">Log In</a>

<a class="close-reveal-modal">&#215;</a>