<div class="layout">
<div class="sidebar">
    <h3>Menu</h3>
    <ul>
        <li> <a href="<?= base_url() ?>managedashboard/dashboard">Dashboard</a></li>
        <li> <a href="#">Manage Books <button class="dropdown" id="dropdown1">&#x25BC</button></a>
            <div class='drop' id='drop1'>
                <ul>
                    <li> <a href="<?= base_url() ?>managebook/addbook">Add Book</a></li>
             
                </ul>
            </div>
        <li> <a href="<?= base_url() ?>ManageBook/issuebook">Issue Book</a></li>
        <li> <a href="<?= base_url() ?>ManageBook/returnbook">Return Book</a></li>
        <li> <a href="#"> Manage user <button class="dropdown" id="dropdown2">&#x25BC</button></a>
            <div class='drop' id='drop2'>
                <ul>
                    <li> <a href="<?= base_url() ?>ManageAdmin/add_admin">Manage Admin</a></li>
                    <li> <a href="<?= base_url() ?>ManageUser/add_user">Manage User</a></li>
                </ul>
            </div>
        </li>
        <li> <a href="<?= base_url() ?>login/logout">Logout</a></li>
    </ul>
</div>