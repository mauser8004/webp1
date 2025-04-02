<div style="border: 1px solid #ccc; padding: 15px; margin: 20px 0; border-radius: 5px; max-height: 400px; overflow-y: auto;">
    <h3 style="margin-top: 0;">Üzenetek</h3>
    
    <?php
    try {
        $dbh = new mysqli("localhost", "webp1db", "J3grvN7YjfVtBGwD2RxzdS", "webp1db");
        $dbh->set_charset("utf8");
        
        // Üzenetek lekérdezése (a legújabbak legfelül)
        $query = $dbh->query("SELECT sender, mess, date FROM mess ORDER BY date DESC");
        
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $message = htmlspecialchars($row['mess']);
                $shortened = (strlen($message) > 50) ? substr($message, 0, 50) . '...' : $message;
                
                echo '<div style="padding: 8px; border-bottom: 1px dashed #eee; margin-bottom: 8px;">';
                echo '<strong>' . htmlspecialchars($row['sender']) . '</strong> ';
                echo '<small style="color: #666;">' . $row['date'] . '</small><br>';
                echo $shortened;
                echo '</div>';
            }
        } else {
            echo '<p style="color: #666;">Még nincsenek üzenetek</p>';
        }
        
    } catch (mysqli_sql_exception $e) {
        echo '<p style="color: red;">Hiba az üzenetek betöltésekor</p>';
    }
    ?>
</div>
