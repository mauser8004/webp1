<div class="image-gallery-container">
    <h2>Képtár</h2>
    
    <?php
    session_start();
    $isLoggedIn = isset($_SESSION['login']);
    
    if ($isLoggedIn && isset($_FILES['kepfeltoltes'])) {
        // ... (PHP kód változatlan) ...
    }
    
    if (!empty($images)): ?>
        <div class="image-gallery">
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
        <div class="upload-section">
            <h3>Kép feltöltése</h3>
            <form method="post" enctype="multipart/form-data">
                <input type="file" name="kepfeltoltes" accept="image/jpeg, image/png, image/gif" required>
                <button type="submit">Feltöltés</button>
            </form>
        </div>
    <?php endif; ?>
</div>
