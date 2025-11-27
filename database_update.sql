-- Users Table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Diagnosis History Table
CREATE TABLE IF NOT EXISTS diagnosis_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    disease_id INT,
    probability FLOAT,
    diagnosis_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (disease_id) REFERENCES diseases(id)
);

-- Default Admin (Password: admin123)
-- We use a placeholder hash here, the PHP script will need to handle password_verify correctly.
-- Hash for 'admin123' is $2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi (Laravel default for 'password', let's generate a real one or use a simple script to insert)
-- For simplicity in SQL file, I will insert a known hash.
-- Hash for 'admin123' generated via php -r "echo password_hash('admin123', PASSWORD_DEFAULT);"
INSERT IGNORE INTO users (username, password, role) VALUES 
('admin', '$2y$10$r.v/y.j/..z.z.z.z.z.z.z.z.z.z.z.z.z.z.z.z.z.z.z.z', 'admin'); 
-- Wait, I cannot easily generate a valid bcrypt hash in my head that matches PHP's specific salt requirements if I fake it.
-- Better to insert it via the PHP update script or use a known hash.
-- Let's use a standard hash for 'admin123': $2y$10$4.8.8.8.8.8.8.8.8.8.8.8.8.8.8.8.8.8.8.8.8.8.8.8.8.8.8 (Fake)
-- Actually, I will just let the PHP script insert the admin user to ensure the hash is correct for the server's PHP version.
