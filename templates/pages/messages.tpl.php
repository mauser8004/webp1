<div class="message-container">
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
                    <strong>' . htmlspecialchars($row['sender']) . '</strong>
                    <small>' . $row['date'] . '</small>
                    <p>' . $shortened . '</p>
                </div>';
            }
        } else {
            echo '<div class="empty-message">Még nincsenek üzenetek</div>';
        }
    } catch (mysqli_sql_exception $e) {
        echo '<div class="error">Hiba az üzenetek betöltésekor: ' . $e->getMessage() . '</div>';
    }
    ?>
</div>
