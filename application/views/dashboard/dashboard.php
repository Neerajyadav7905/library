<!-- fetch data for dashboard  -->
    <div class="section">
        <h3 class="mainheading">Dashboard</h3>
        <div class="dashboard-section">
            <div class="dashboard-section-divide">
                <h3>Total Books</h3>
                <p><?php if(isset($total_books)){ echo $total_books; } else {echo 0;}?></P>
            </div>
            <div class="dashboard-section-divide">
                <h3>Availible Books</h3>
                <p><?php if(isset($Available_books)){ echo $Available_books; } else {echo 0;}?></P>
            </div>
            <div class="dashboard-section-divide">
                <h3>Issued Books</h3>
                <p><?php if(isset($Available_books)){ echo $total_books - $Available_books; } else {echo 0;}?></P>
            </div>
        </div>
    </div>