
    <div class="section">
        <h3 class="mainheading">Manage Book - Add Book</h3>
        <div class="book">

    <!-- Status message  -->

        <div id="msg2">
                <?php if (isset($_SESSION['add_msg'])) {
                    echo $_SESSION['add_msg'];
                } ?>
            </div>

    <!-- book form -->

            <h3>Add Book</h3>
            <form class="book-form" id="drop3" method="post" action="<?= current_url();?>" enctype='multipart/form-data'>
                <label> Book Id : <input type="text" name="bookid" placeholder="Book Id">
                    <small class="small"><?php echo form_error('bookid');?></small>
                </label>
                <label> Title : <input type="text" name="booktitle" placeholder="Title">
                    <small class="small"><?php echo form_error('booktitle');?></small>
                </label>
                <label> Author : <input type="text" name="bookauthor" placeholder="Author">
                    <small class="small"><?php echo form_error('bookauthor');?></small>
                </label>
                <label> Category : <select name="bookcategory">
                        <option value="science">Science</option>
                        <option value="Comic">Comic</option>
                        <option value="Bio-graphy">Bio-Graphy</option>
                        <option value="drama">Drama</option>
                        <option value="poetry">Poetry</option>
                        <option value="others">others</option>
                    </select>
                </label>
                <label> Upload Image : <input type ="file" name="bookimage" style="border:none;"></label>
                <button type="submit" name="addbook" value="addbook"> Add Book</button>
            </form>
        </div>

    <!-- List of books -->

        <div class="book">
            <h3>Last Added Books</h3>
            <div class="book-table">
                <table>
                    <thead>
                        <tr>
                            <th>Book ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Added Date</th>
                        </tr>
                    </thead>
                    <tbody>
            <?php 
                if(isset($lastaddedbooks))
                foreach($lastaddedbooks as $row):
                ?>
                        <tr>
                            <td><?=$row->bookid ?></td>
                            <td><?=$row->booktitle ?></td>
                            <td><?=$row->bookauthor ?></td>
                            <td><?=$row->bookcategory ?></td>
                            <td><?=$row->bookadddate ?></td>
                        </tr>
                    </tbody>
                <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>
</div>
<script src='<?= base_url()?>assets/js/msg.js'></script>