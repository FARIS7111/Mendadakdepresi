<?php
$host = 'localhost';
$username = 'root';
$password = ''; // Default XAMPP password is empty. Change if yours is different.
$dbname = 'depression_expert_system';

echo "<h2>🔍 Cek Koneksi Database</h2>";

// 1. Test Raw Connection (No DB selected)
try {
    $conn = new PDO("mysql:host=$host", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<div style='color: green;'>✅ Koneksi ke MySQL Server (localhost) BERHASIL.</div>";
} catch (PDOException $e) {
    echo "<div style='color: red;'>❌ Gagal koneksi ke MySQL Server: " . $e->getMessage() . "</div>";
    echo "<p>Tips: Pastikan XAMPP/MySQL sudah Start. Cek apakah password root Anda kosong atau ada isinya.</p>";
    exit;
}

// 2. Check if Database Exists
try {
    $conn->query("USE $dbname");
    echo "<div style='color: green;'>✅ Database '$dbname' DITEMUKAN.</div>";
} catch (PDOException $e) {
    echo "<div style='color: red;'>❌ Database '$dbname' TIDAK DITEMUKAN.</div>";
    echo "<p>Sedang mencoba membuat database...</p>";
    try {
        $conn->exec("CREATE DATABASE IF NOT EXISTS $dbname");
        echo "<div style='color: green;'>✅ Database '$dbname' BERHASIL DIBUAT.</div>";
        $conn->query("USE $dbname");
    } catch (PDOException $ex) {
        echo "<div style='color: red;'>❌ Gagal membuat database: " . $ex->getMessage() . "</div>";
        exit;
    }
}

// 3. Check Tables
$tables = ['diseases', 'symptoms', 'knowledge_base', 'users', 'diagnosis_history'];
echo "<h3>Cek Tabel:</h3><ul>";

foreach ($tables as $table) {
    try {
        $result = $conn->query("SELECT COUNT(*) FROM $table");
        $count = $result->fetchColumn();
        echo "<li>✅ Tabel <b>$table</b> ada ($count data).</li>";
    } catch (PDOException $e) {
        echo "<li>❌ Tabel <b>$table</b> BELUM ADA. <a href='update_db.php'>Klik disini untuk buat tabel</a></li>";
    }
}
echo "</ul>";

echo "<hr>";
echo "<p>Jika semua centang hijau, berarti aplikasi sudah terhubung ke phpMyAdmin Anda dengan benar.</p>";
echo "<p><b>Info Server:</b> " . $_SERVER['SERVER_SOFTWARE'] . "</p>";
?>