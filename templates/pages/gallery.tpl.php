<div class="gallery-container">
    <h2>Képtár</h2>
    
    <?php
    session_start();
    $isLoggedIn = isset($_SESSION['login']);
    $uploadDir = 'images/';
    
    // Képek feltöltése
    if ($isLoggedIn && isset($_FILES['kepfeltoltes'])) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $filename = basename($_FILES['kepfeltoltes']['name']);
        $targetFile = $uploadDir . $filename;
        
        if (in_array($_FILES['kepfeltoltes']['type'], $allowedTypes)) {
            if (move_uploaded_file($_FILES['kepfeltoltes']['tmp_name'], $targetFile)) {
                echo '<p class="success-msg">Kép sikeresen feltöltve!</p>';
            } else {
                echo '<p class="error-msg">Hiba a feltöltés során!</p>';
            }
        } else {
            echo '<p class="error-msg">Csak JPG, PNG vagy GIF formátumú képek tölthetők fel!</p>';
        }
    }
    
    // Képek listázása
    $images = glob($uploadDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
    
    if (!empty($images)): ?>
        <div class="image-gallery">
            <?php foreach ($images as $image): ?>
                <div class="image-item">
                    <img src="<?= $image ?>" alt="<?= basename($image) ?>">
                    <p class="image-filename"><?= basename($image) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="empty-gallery">
            <p>Nincsenek képek a galériában.</p>
            <?php if ($isLoggedIn): ?>
                <p>Használd a "Kép feltöltése" gombot az első kép feltöltéséhez!</p>
            <?php else: ?>
                <p>Jelentkezz be a képek feltöltéséhez!</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    
    <?php if ($isLoggedIn): ?>
        <div class="upload-section">
            <h3>Kép feltöltése</h3>
            <form method="post" enctype="multipart/form-data">
                <input type="file" name="kepfeltoltes" accept="image/jpeg, image/png, image/gif" required>
                <button type="submit" class="upload-button">Feltöltés</button>
            </form>
            <p class="upload-hint">Maximális méret: 2MB, Formátumok: JPG, PNG, GIF</p>
        </div>
    <?php endif; ?>
</div>
