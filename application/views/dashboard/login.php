
<div id="form">
  <h3>Login</h3>
  <!--login page -->
    <form id="rform" method="POST" action="#">
      <div>
          <label> Email : <br><input type="text" id="email" name="login_email" Placeholder="Enter the Email">
        <!-- Email Error Message -->
              <small class="login-msg" id="login_msg_email">
              <?php if (isset($_SESSION['login_msg_email'])) {
                echo $_SESSION['login_msg_email'];
                } 
              ?>
        </small></label><br>
      </div>
        <br>
      <div>
        <label>Password : <br><input type="Password" id="password" name="login_password" Placeholder="Enter the Password">
        </label><br>
      </div>
      <button type="submit" name="login" value="login" id="submitbtn">Submit</button>
    </form>
    <a href="<?= base_url()?>forgetpassword/forgetpassword">Forget Password ?</a>
</div>

<!-- hide the message after 2 seconds and unset message session  -->
<script src='<?= base_url()?>assets/js/msg.js'></script>