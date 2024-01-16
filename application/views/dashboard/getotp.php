<div class="forgetpassword">
    <!-- display message  -->
            <div id="msg2">
                <?php if (isset($_SESSION['add_msg'])) {
                    echo $_SESSION['add_msg'];
                } ?>
            </div>
    <div class="centerdiv">
        <table>
            <caption>Forget Password ?</caption>
            <tbody>
                <form method="POST" action="<?= base_url()?>emailsend/resetpasswordsemail">
                    <tr>
                        <td>Email id:</td>
                    </tr>
                    <tr>
                    <td><input type="email" name = "User_email"  placeholder="Enter The Email ID" required></td>
                    <td><button type="submit" name="forget_get_email" value="forget_get_email">Send OTP</button></td>
                    </tr>
                </form>
            </tbody>
        </table>

        <a href="<?= base_url()?>forgetpassword/resetpassword">Already Have OTP ?</a>
    </div>
</div>