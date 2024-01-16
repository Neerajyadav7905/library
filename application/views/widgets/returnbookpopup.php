<div class="section">
    <div class="editpopupcontainer">
        <div class="editpopup">
            <div class="editpopupclosbtn"><button id="editclosebtn">x</button></div>
                <div class="edit-data-container">
                    <form method='POST' action='<?= current_url();?>'>
                        <table>
    <!-- Read data -->
                            <?php 
                                    if(isset($userid)):
                            ?>

                            <h3>Edit-Information</h3>
                            <tbody>
                                <tr>
                                    <td>User ID :</td>
                                    <td><?=$userid?></td>
                                </tr>
                                <tr>
                                <td>User Name :</td>
                                </tr>
                                <tr>
                                    <td>Book ID :</td>
                                    <td><?=$bookid?></td>
                                </tr>
                                <tr>
                                    <td>Book Title :</td>
                                </tr>
                                <tr>
                                    <td>Issue Date :</td>
                                    <td><?=$issuedate?></td>
                                </tr>
                                <tr>
                                </tr>
                                <tr>
                                    <td><input type="hidden" name="book_id"  value="<?=$bookid?>"></td>
                                    <td><button type="submit" name="retunbook" value ="returnbook">Return Book</button></td>
                                </tr>
                            </tbody>
                            <?php endif; ?>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- close popup  -->
<script>
    let editclosebtn = document.getElementById('editclosebtn').addEventListener('click',function(){
        let edit_btn_popup = document.getElementsByClassName('editpopupcontainer');
        edit_btn_popup[0].style.display="none";  
    });
</script>