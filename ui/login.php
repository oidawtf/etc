<div class="page-header">
    <div class="page-header-content">
        <h1>
            Login
            <small>Already a member?</small>
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
                        <h2>Email</h2>
                        <div class="input-control text">
                            <input name="email" type="text" value="maxhotko@hotmail.com" placeholder="Enter email">
                            <button class="btn-clear" onclick="return false;" tabindex="-1" type="button"></button>
                        </div>
                        <h2>Password</h2>
                        <div class="input-control password">
                            <input name="password" type="password" value="123456" placeholder="Enter password" style="display: inline;">
                            <button class="btn-reveal" tabindex="-1" type="button"></button>
                        </div>
                        <button type="submit" name="login">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
