<div class="section">
    <h3 class="mainheading">Manage Users - Users </h3>
        <div class="book">

        <!-- display message  -->

            <div id="msg2">
                <?php if (isset($_SESSION['add_msg'])) {
                    echo $_SESSION['add_msg'];
                } ?>
            </div>

            <!-- add user -->

            <h3>Add User <div class="book-search"></div></h3>
                <form class="book-form" id="drop3" method="POST" action="<?=current_url()?>">
                    <label> User Id : <input type="text" name="user_id" placeholder="UserId" value="<?= set_value('user_id'); ?>">
                            <small class="small"><?php echo form_error('user_id');?></small>
                    </label>
                    <label> User Name :<input type="text" name="user_Name" placeholder=" Enter the Name" value="<?=set_value('user_Name');?>">
                        <small class="small"><?php echo form_error('user_Name');?></small>
                    </label>
                    <label> Email : <input type="Email" name="user_email" placeholder="Enter the email" value="<?= set_value('user_email'); ?>">
                        <small class="small"><?php echo form_error('user_email');?></small>
                    </label>
                    <label> Mob. Number :<input type="text" name="user_mob_number" placeholder="Enter the Mobile Number" value="<?= set_value('user_mob_number'); ?>">
                        <small class="small"><?php echo form_error('user_mob_number');?></small>
                    </label>
                    <label> Present Address :<input type="text" name="User_Address"
                            placeholder=" Enter the Address"></label>
                    <label><button type="submit" name = "adduser" value ="adduser"> Add User </button></label>
                </form>
        </div>
        
        <div class="book">
            <h3> User List  <?php
                if(isset($userslist)){
                    echo "<p> Number of Record Found : ".count($userslist)."</p>";
                }
                ?>
            </h3>
            <div class="book-table">
                <table>
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email </th>
                            <th>Mobile No.</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($userslist))
                        foreach($userslist as $user):
                        $email =$user->useremail;
                        ?>
                        <tr>
                        <td><?= $user->userid?></td>
                        <td><?= $user->username?></td>
                        <td><?= $user->useremail?></td>
                        <td><?= $user->usermobnumber?></td>
                        <td><form>
                        <input type = 'hidden' name = 'user_email_edit' value = '<?=$email;?>' />
                        <button type='submit' class='editbtn'>Edit</button></form></td>
                        <td><form method="POST" action="<?= current_url();?>">
                        <input type = 'hidden' name = 'user_email_del' value = '<?=$email;?>' />
                        <button type='submit' class='delbtn' name="deluser" value="deluser">Delete</button></form></td>
                        </tr> 
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>
<script src='<?= base_url()?>assets/js/msg.js'></script>