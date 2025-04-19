<div class="message-box">
    <h3>Üzenetek</h3>
    
    <?php
    try {
        $dbh = new mysqli("localhost", "webp1db", "J3grvN7YjfVtBGwD2RxzdS", "webp1db");
        $dbh->set_charset("utf8");
        
        $query = $dbh->query("SELECT sender, mess, date FROM mess ORDER BY date DESC");
        
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $message = htmlspecialchars($row['mess']);
                $shortened = (strlen($message) > 50) ? substr($message, 0, 50) . '...' : $message;
                echo '
                <div class="message-item">
                    <span class="message-sender">' . htmlspecialchars($row['sender']) . '</span>
                    <span class="message-date">' . $row['date'] . '</span><br>
                    ' . $shortened . '
                </div>';
            }
        } else {
            echo '<p class="no-messages">Még nincsenek üzenetek</p>';
        }
    } catch (mysqli_sql_exception $e) {
        echo '<p class="error-message">Hiba az üzenetek betöltésekor</p>';
    }
    ?>
</div>
