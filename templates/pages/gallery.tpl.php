<div style="border: 1px solid #ddd; padding: 20px; margin: 20px 0; background: #f9f9f9; border-radius: 5px;">
    <h2 style="margin-top: 0;">Képtár</h2>
    
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
    
    if (!empty($images)) {
        echo '<div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 15px; margin-top: 20px;">';
        foreach ($images as $image) {
            echo '<div style="border: 1px solid #eee; padding: 10px; border-radius: 5px; text-align: center;">';
            echo '<img src="' . $image . '" style="max-width: 100%; height: 150px; object-fit: cover; border-radius: 3px;">';
            echo '<p style="margin: 5px 0 0; font-size: 12px; word-break: break-all;">' . basename($image) . '</p>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<p>Nincsenek képek a galériában.</p>';
    }
    
    // Feltöltés űrlap (csak bejelentkezett felhasználóknak)
    if ($isLoggedIn) {
        echo '
        <div style="margin-top: 30px; border-top: 1px solid #eee; padding-top: 20px;">
            <h3>Kép feltöltése</h3>
            <form method="post" enctype="multipart/form-data" style="display: flex; gap: 10px; align-items: center;">
                <input type="file" name="kepfeltoltes" accept="image/jpeg, image/png, image/gif" required>
                <button type="submit" style="padding: 8px 15px; background: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">Feltöltés</button>
            </form>
            <p style="font-size: 12px; color: #666;">Maximális méret: 2MB, Formátumok: JPG, PNG, GIF</p>
        </div>';
    }
    ?>
</div>
