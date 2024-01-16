
<div class="section">
    <h3 class="mainheading">Issue Book </h3>
    <div class="book">
        <!-- display message -->
            <div id="msg2">
                <?php if (isset($_SESSION['add_msg'])) {
                    echo $_SESSION['add_msg'];
                } ?>
            </div>

        <!-- issue book form -->
            <h3>Issue Book</h3>
            <form class="book-form" method="POST" action="<?=current_url();?>">
                <label> Book Id : <input type="text" name="issue_book_id" placeholder="Book Id" required></label>
                <label> User ID : <input type="text" name="issue_user_id" placeholder="User Id" required></label>
                <button type="submit" name="issuebook" value="issuebook"> Issue Book </button>
            </form>
    </div>
    <div class="book">
        <h3>Last Issued Books <?php
                if(isset($issuebooklist)){
               echo "<p> Number of Record Found : ".count($issuebooklist)."</p>";
                }
                ?>
        </h3>
            <div class="book-table">
                <table>
                    <thead>
                        <tr>
                            <th>Book ID</th>
                            <th>Book Image</th>
                            <th>Book Title</th>
                            <th>User ID</th>
                            <th>Issue Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($issuebooklist))
                            foreach($issuebooklist as $lists):
                        ?>
                        <tr>
                            <td><?= $lists->bookid; ?></td>
                            <td><img src="<?= base_url().'assets/files/img/'.$lists->bookimage;?>" height ="70px" width ="100px" alt="Book Image"></td>
                            <td><?= $lists->booktitle; ?></</td>
                            <td><?= $lists->userid; ?></</td>
                            <td><?= $lists->issuedate; ?></</td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
    </div>
</div>