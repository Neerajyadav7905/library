
    <div class="section">
        <h3 class="mainheading">Return Book </h3>
        <div class="book">
            <div id="msg2">
                    <?php if (isset($_SESSION['add_msg'])) {
                        echo $_SESSION['add_msg'];
                    } ?>
            </div>

            <h3>Return Book</h3>
            <form class="book-form" method="POST" action="<?= current_url();?>">
                <label> Book Id : <input type="text" name="bookid" placeholder="Book Id" required></label>
                <button type="submit" name="Search_return_bookid" value="Search_return_bookid"> Search </button>
            </form>
        </div>
        <div class="book">
            <h3>Last Returned Books  <?php
                if(isset($issuebooklist)){
               echo "<p> Number of Record Found : ".count($issuebooklist)."</p>";
                }
                ?></h3>
            <div class="book-table">
                <table>
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Book ID</th>
                            <th>Book Image</th>
                            <th>Book Title</th>
                            <th>Issue Date</th>
                            <th>Return date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(isset($returendbooklist))
                                foreach($returendbooklist as $lists):
                            ?>
                            <tr>
                                <td><?= $lists->userid; ?></td>
                                <td><?= $lists->bookid; ?></td>
                                <td><img src="<?= base_url().'assets/files/img/'.$lists->bookimage;?>" height ="70px" width ="100px" alt="Book Image"></td>
                                <td><?= $lists->booktitle; ?></</td>
                                <td><?= $lists->issuedate; ?></</td>
                                <td><?= $lists->returndate; ?></</td>
                            </tr>
                            <?php endforeach ?>
                    </tbody>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>