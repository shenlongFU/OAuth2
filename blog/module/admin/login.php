<div class="container">
    <div class="card card-container">
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin" method="post" >
            <span id="reauth-email" class="reauth-email"></span>
            <input type="text"  class="form-control" placeholder="User name" name="username" required autofocus>
            <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
            <div id="remember" class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login">Sign in</button>
            <div class="noti" style="display: none;color: red; text-align: center;">Bạn Nhập sai tên hoặc mật khẩu!</div>
        </form><!-- /form -->
        <a href="#" class="forgot-password">
            Forgot the password?
        </a>
    </div>
</div>