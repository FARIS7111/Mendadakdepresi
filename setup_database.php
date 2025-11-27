<?php
require_once 'config/database.php';

try {
    // Read the SQL file
    $sql = file_get_contents(__DIR__ . '/database.sql');

    // Execute the SQL commands
    // Note: PDO might not support multiple statements in one go depending on configuration, 
    // but for simple imports it often works. If not, we might need to split.
    // Let's try executing it directly first.

    $pdo->exec($sql);

    echo "<div style='font-family: sans-serif; padding: 20px; text-align: center; background: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 5px; margin: 20px;'>";
    echo "<h1>✅ Database Berhasil Di-import!</h1>";
    echo "<p>Tabel dan data telah berhasil dibuat.</p>";
    echo "<p><a href='index.php' style='background: #155724; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Kembali ke Beranda</a></p>";
    echo "</div>";

} catch (PDOException $e) {
    echo "<div style='font-family: sans-serif; padding: 20px; text-align: center; background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px; margin: 20px;'>";
    echo "<h1>❌ Gagal Import Database</h1>";
    echo "<p>Error: " . $e->getMessage() . "</p>";
    echo "</div>";
}
?>