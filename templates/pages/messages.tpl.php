<div class="card">
    <h2>Üzenetek</h2>
    
    <?php
    try {
        $dbh = new mysqli("localhost", "webp1db", "J3grvN7YjfVtBGwD2RxzdS", "webp1db");
        $dbh->set_charset("utf8");
        
        $query = $dbh->query("SELECT sender, mess, date FROM mess ORDER BY date DESC");
        
        if ($query->num_rows > 0): ?>
            <div style="max-height: 400px; overflow-y: auto;">
                <?php while ($row = $query->fetch_assoc()): ?>
                    <div style="padding: 12px; border-bottom: 1px solid #eee; margin-bottom: 10px;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                            <strong><?= htmlspecialchars($row['sender']) ?></strong>
                            <small style="color: #666;"><?= $row['date'] ?></small>
                        </div>
                        <p><?= strlen($row['mess']) > 50 ? substr(htmlspecialchars($row['mess']), 0, 50) . '...' : htmlspecialchars($row['mess']) ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p style="color: #668;">Még nincsenek üzenetek</p>
        <?php endif;
        
    } catch (mysqli_sql_exception $e) {
        echo '<p style="color: red;">Hiba az üzenetek betöltésekor</p>';
    }
    ?>
</div>
