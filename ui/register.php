<div class="page-header">
    <div class="page-header-content">
        <h1>
            Register
            <small>Register here to use this site</small>
        </h1>
        <a class="back-button big page-back" href="javascript:history.back()"></a>
    </div>
</div>
<div class="page-region">
    <div class="page-region-content">
        <div class="grid">
            <div class="grid">
                <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <div class="span5">
                        <h2>First Name</h2>
                        <div class="input-control text">
                            <input name="firstname" type="text" placeholder="Enter first name">
                            <button class="btn-clear" onclick="return false;" tabindex="-1" type="button"></button>
                        </div>
                        <h2>Last Name</h2>
                        <div class="input-control text">
                            <input name="lastname" type="text" placeholder="Enter last name">
                            <button class="btn-clear" onclick="return false;" tabindex="-1" type="button"></button>
                        </div>
                        <h2>Email</h2>
                        <div class="input-control text">
                            <input name="email" type="text" placeholder="Enter email">
                            <button class="btn-clear" onclick="return false;" tabindex="-1" type="button"></button>
                        </div>
                        <h2>Password</h2>
                        <div class="input-control password">
                            <input name="password" type="password" placeholder="Enter password" style="display: inline;">
                            <button class="btn-reveal" tabindex="-1" type="button"></button>
                        </div>
                        <h2>Retype Password</h2>
                        <div class="input-control password">
                            <input name="retypedpassword" type="password" placeholder="Retype password" style="display: inline;">
                            <button class="btn-reveal" tabindex="-1" type="button"></button>
                        </div>
                    </div>
                    <button type="submit" name="register">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>

