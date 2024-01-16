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
                <form method="POST" action="<?= current_url();?>">
                    <tr>
                        <td>Email id:</td>
                    </tr>
                    <tr>
                        <td><input type="email" name = "User_email" value="<?= set_value('User_email'); ?>" placeholder="Enter The Email ID"></td>
                    </tr>
                    <tr>
                        <td><?php echo "<p>".form_error('User_email');"</p>"?></td>
                    </tr>
                    <tr>
                        <td>OTP :</td>
                    </tr>
                    <tr>
                        <td><input type="text" name = "User_otp" value="<?= set_value('User_otp'); ?>" placeholder="Enter The OTP"></td>
                    </tr>
                    <tr>
                        <td><?php echo "<p>".form_error('User_otp');"</p>"?></td>
                    </tr>
                    <tr>
                        <td><input type="Password" name = "New_password" value="<?= set_value('New_password'); ?>" placeholder="Create new Password"></td>
                    </tr>
                    <tr>
                        <td><?php echo "<p>".form_error('New_password');"</p>"?></td>
                    </tr>
                    <tr>
                        <td><input type="Text" name = "Confirm_New_password" value="<?= set_value('Confirm_New_password'); ?>" placeholder="Confirm Password"></td>
                    </tr>
                    <tr><td><?php echo "<p>".form_error('Confirm_New_password');"</p>"?></td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                        <td><button type="submit" name="new_password_submit"  value="new_password_submit">Submit</button></td>
                    <tr>
                </form>
            </tbody>
        </table>
    </div>
</div>