<div class="card">
    <h2>Képtár</h2>
    
    <?php
    session_start();
    $isLoggedIn = isset($_SESSION['login']);
    
    // Képek feltöltése
    if ($isLoggedIn && isset($_FILES['kepfeltoltes'])) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $uploadDir = 'images/';
        $filename = basename($_FILES['kepfeltoltes']['name']);
        $targetFile = $uploadDir . $filename;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        
        if (in_array($_FILES['kepfeltoltes']['type'], $allowedTypes)) {
            if (move_uploaded_file($_FILES['kepfeltoltes']['tmp_name'], $targetFile)) {
                echo '<p style="color: green;">Kép sikeresen feltöltve!</p>';
            } else {
                echo '<p style="color: red;">Hiba a feltöltés során!</p>';
            }
        } else {
            echo '<p style="color: red;">Csak JPG, PNG vagy GIF formátumú képek tölthetők fel!</p>';
        }
    }
    
    // Képek listázása
    $imageDir = 'images/';
    $images = glob($imageDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
    
    if (!empty($images)): ?>
        <div class="grid-container">
            <?php foreach ($images as $image): ?>
                <div class="image-item">
                    <img src="<?= $image ?>" alt="<?= basename($image) ?>">
                    <p><?= basename($image) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Nincsenek képek a galériában.</p>
    <?php endif; ?>
    
    <?php if ($isLoggedIn): ?>
        <div style="margin-top: 30px; border-top: 1px solid #eee; padding-top: 20px;">
            <h3>Kép feltöltése</h3>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="file" class="form-control" name="kepfeltoltes" accept="image/jpeg, image/png, image/gif" required>
                </div>
                <button type="submit" class="btn">Feltöltés</button>
            </form>
            <p style="font-size: 12px; color: #666;">Maximális méret: 2MB, Formátumok: JPG, PNG, GIF</p>
        </div>
    <?php endif; ?>
</div>
