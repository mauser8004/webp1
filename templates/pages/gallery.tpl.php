<div class="gallery-container">
    <h2>Képtár</h2>
    
    <?php
    session_start();
    $isLoggedIn = isset($_SESSION['login']);
    $imageDir = 'images/';
    $images = glob($imageDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
    
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
        <div class="empty-gallery">
            <p>Nincsenek képek a galériában.</p>
            <?php if($isLoggedIn): ?>
                <p>Tölts fel képeket a "Kép feltöltése" lehetőséggel!</p>
            <?php else: ?>
                <p>Jelentkezz be a képek feltöltéséhez!</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    
    <?php if ($isLoggedIn): ?>
        <div class="upload-section">
            <!-- Feltöltési űrlap változatlanul marad -->
        </div>
    <?php endif; ?>
</div>
