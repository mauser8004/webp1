<div class="message-container">
    <h3>Üzenetek</h3>
    <?php
    try {
        // ... (PHP kód változatlan) ...
        while ($row = $query->fetch_assoc()): ?>
            <div class="message-item">
                <strong><?= htmlspecialchars($row['sender']) ?></strong>
                <small><?= $row['date'] ?></small>
                <p><?= strlen($row['mess']) > 50 ? substr(htmlspecialchars($row['mess']), 0, 50) . '...' : htmlspecialchars($row['mess']) ?></p>
            </div>
        <?php endwhile;
    } catch (mysqli_sql_exception $e) {
        echo '<p class="error">Hiba az üzenetek betöltésekor</p>';
    }
    ?>
</div>
