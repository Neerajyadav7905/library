<div class="section">
    <div class="editpopupcontainer">
        <div class="editpopup">
            <div class="editpopupclosbtn"><button id="editclosebtn">x</button></div>
                <div class="edit-data-container">
                    <form method='POST' action='<?= current_url();?>'>
                        <table>
    <!-- Read data -->
                            <?php 
                            if(isset($admineditdata)){
                                $admin_update_id = $admineditdata->Adminid;
                                $admin_update_name = $admineditdata->adminname;
                            }
                            else{
                                $admin_update_id = '';
                                $admin_update_name = '';
                            }
                            ?>

                            <h3>Edit-Information</h3>
                                <tbody>
                                    <tr>
                                        <td>Admin Id :</td>
                                        <td>Admin Name :</td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="adminid_update" value="<?=$admin_update_id?>"></td>
                                        <td><input type="text" name="Admin_Name_update" value="<?=$admin_update_name?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Admin Email :</td>
                                        <!-- <td>Admin Password:</td> -->
                                    </tr>
                                    <tr>
                                        <td><input type="email" name= "adminemail_update" value="<?= set_value('admin_edit_email'); ?>" readonly></td>
                                    <!-- <td><input type="text" name="Create_password_update" value="<?=$admin_update_password?>"></td> -->
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><button type="submit" name="updateadmindata" value = "updateadmindata">Update</button></td>
                                    </tr>
                                </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>