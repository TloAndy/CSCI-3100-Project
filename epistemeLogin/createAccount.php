<form id='register' action='createAccountResult.php' method='post' 
    accept-charset='UTF-8'>

<fieldset >
<legend>Register</legend>

<div>
    <label for='uid' >Student ID*:</label>
    <input type='text' name='uid' id='uid' maxlength="50" />
</div>

<div>
    <label for='username' >Username*:</label>
    <input type='text' name='username' id='username' maxlength="50" />
</div>

<div>
    <label for='password' >Password*:</label>
    <input type='password' name='password' id='password' maxlength="50" />
</div>

<div>
    <label for='cPassword' >Confirm Password*:</label>
    <input type='password' name='cPassword' id='cPassword' maxlength="50" />
</div>

<div>
    <input type='submit' name='Submit' value='Submit' />
</div>

</fieldset>
</form>

<?php
    function registerUser(){
        
    }
?>