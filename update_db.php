<?php
require_once 'config/database.php';

try {
    // 1. Create Users Table
    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        role ENUM('admin', 'user') DEFAULT 'user',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    // 2. Create Diagnosis History Table
    $pdo->exec("CREATE TABLE IF NOT EXISTS diagnosis_history (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT,
        disease_id INT,
        probability FLOAT,
        diagnosis_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
        FOREIGN KEY (disease_id) REFERENCES diseases(id) ON DELETE CASCADE
    )");

    // 3. Create Default Admin User
    $username = 'admin';
    $password = 'admin123';
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $role = 'admin';

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetchColumn() == 0) {
        $stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
        $stmt->execute([$username, $hash, $role]);
        echo "<p>✅ Admin user created (User: admin, Pass: admin123)</p>";
    } else {
        echo "<p>ℹ️ Admin user already exists.</p>";
    }

    echo "<div style='font-family: sans-serif; padding: 20px; text-align: center; background: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 5px; margin: 20px;'>";
    echo "<h1>✅ Database Updated!</h1>";
    echo "<p>Tabel Users dan History berhasil ditambahkan.</p>";
    echo "<p><a href='login.php' style='background: #155724; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Login Sekarang</a></p>";
    echo "</div>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>