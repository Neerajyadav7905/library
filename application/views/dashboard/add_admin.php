
<!--  content  -->
<div class="section">
    <h3 class="mainheading">Manage Users - Admins</h3>

        <div class="book">
            <!-- display the message -->
            <div id="msg2">
                <?php if (isset($_SESSION['add_msg'])) {
                    echo $_SESSION['add_msg'];
                } ?>
            </div>
            <!-- Heading and file uplaad section -->
            <h3>Add Admins <div class="book-search">
                                <form method="POST" action="<?= base_url();?>csv/csvupload"; enctype='multipart/form-data'>
                                        <input type="file" name="admincsvfile" style="border:none">
                                        <button type="submit" name='uploadfile' value='uploadfile'>Import CSV File</button>
                                </form>
                            </div>
            </h3>

        
            <!-- 
            current_url submit the form to current controller
            set_value prevent the field data untill form is succesfullly submitted
            -->

            <form class="book-form" id="drop3" method="POST" action="<?= current_url(); ?>">
                <label> Admin Id : <input type="text" id="adminid" name="adminid" value="<?= set_value('adminid'); ?>"
                        placeholder="Admin Id"/><small class="small"><?php echo form_error('adminid');?></small></label>
                <label> Admin Name :<input type="text" id="admin_name" name="Admin_Name" value="<?= set_value('Admin_Name'); ?>"
                        placeholder=" Enter the Name"><small  class="small"><?= form_error('Admin_Name');?></small></label>
                <label> Email : <input type="Email" id="admin_email" name="adminemail" value="<?= set_value('adminemail'); ?>"
                        placeholder="Enter the email"><small  class="small"><?= form_error('adminemail');?></small></label>
                <label> Create Password :<input type="Password" id="create_password" name="Create_password"
                        placeholder="Create a Password"><small  class="small"><?= form_error('Create_password');?></small></label>
                <label> Conform Password :<input type="Password" id="confirm_password" name="Conform_password" 
                        placeholder="Conform Password"><small  class="small"><?= form_error('Conform_password');?></small></label>
                <label><button type="submit" name='submit' value='submit'> Add Admin </button></label>
            </form>
        </div>

        <div class="book">
            <h3>Admin List <div class="book-search">
                                <form method="post" action="<?= base_url();?>csv/csvdownload";>
                                <button type="submit" name='csvfile' value='csvfile'>Export CSV File</button>
                                </form>
                            </div>  
                    <?php
                            if(isset($adminlist)){
                             echo "<p> Number of Record Found : ".count($adminlist)."</p>";
                             }
                    ?>
            </h3>

            <!-- list all the admin  -->

            <div class="book-table">
                <table>
                    <thead>
                        <tr>
                            <th>Admin ID</th>
                            <th>Name</th>
                            <th>Email </th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($adminlist))
                        foreach($adminlist as $admin):
                        $email = $admin->adminemail; ?>
                        <tr>
                            <td><?= $admin->adminid ?></td>
                            <td><?= $admin->adminname ?></td>
                            <td><?= $admin->adminemail ?></td>
                            <td>
                                <form method='POST' action='<?= current_url();?>'>
                                <!-- set value of admin email to fetch all data of admin for edit -->
                                <input type = 'hidden' name = 'admin_edit_email' value = '<?=$email;?>' />
                                <button type='submit' class='editbtn' name="fetchadmindata" value="fetchadmindata">Edit</button></form></td>
                            <td>
                                <form method='POST' action='<?= current_url();?>'>
                                    <input type = 'hidden' name = 'admin_email' value = '<?=$email;?>' />
                                    <button type='submit' class='delbtn' name='deladmin' value='deladmin'>Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
</div>

<!-- include js file to toggle edit button -->

<script src='<?= base_url()?>assets/js/editbtn.js'></script>