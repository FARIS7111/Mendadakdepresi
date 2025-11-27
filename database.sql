CREATE DATABASE IF NOT EXISTS depression_expert_system;
USE depression_expert_system;

CREATE TABLE IF NOT EXISTS diseases (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(10) NOT NULL,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    solution TEXT,
    prior_probability FLOAT NOT NULL DEFAULT 0
);

CREATE TABLE IF NOT EXISTS symptoms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(10) NOT NULL,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS knowledge_base (
    id INT AUTO_INCREMENT PRIMARY KEY,
    disease_id INT,
    symptom_id INT,
    probability FLOAT NOT NULL, -- P(E|H)
    FOREIGN KEY (disease_id) REFERENCES diseases(id),
    FOREIGN KEY (symptom_id) REFERENCES symptoms(id)
);

-- Seed Data (Only insert if empty to avoid duplicates on re-run, though simple INSERTs here for demo)
-- Clear tables for clean state in this demo script
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE knowledge_base;
TRUNCATE TABLE symptoms;
TRUNCATE TABLE diseases;
SET FOREIGN_KEY_CHECKS = 1;

INSERT INTO diseases (code, name, description, solution, prior_probability) VALUES
('D01', 'Depresi Ringan', 'Gangguan suasana hati ringan yang bersifat sementara. Biasanya dipicu oleh stresor tertentu.', 'Istirahat yang cukup, rutin berolahraga, melakukan hobi yang menyenangkan, dan bercerita kepada orang terpercaya.', 0.4),
('D02', 'Depresi Sedang', 'Gejala depresi yang mulai mengganggu aktivitas sehari-hari dan pekerjaan.', 'Konsultasi dengan psikolog, pertimbangkan terapi perilaku kognitif (CBT), dan perbaiki pola hidup.', 0.3),
('D03', 'Depresi Berat', 'Gangguan serius yang sangat mengganggu fungsi hidup, pekerjaan, dan hubungan sosial.', 'Segera hubungi psikiater. Diperlukan penanganan medis intensif, kemungkinan obat antidepresan, dan dukungan keluarga yang kuat.', 0.3);

INSERT INTO symptoms (code, name) VALUES
('G01', 'Perasaan sedih, cemas, atau "kosong" yang menetap'),
('G02', 'Kehilangan minat atau kesenangan pada hobi dan aktivitas'),
('G03', 'Perubahan nafsu makan (penurunan atau kenaikan berat badan yang signifikan)'),
('G04', 'Gangguan tidur (insomnia atau terlalu banyak tidur)'),
('G05', 'Kelelahan fisik, penurunan energi, atau merasa lamban'),
('G06', 'Perasaan tidak berharga, rasa bersalah yang berlebihan, atau tidak berdaya'),
('G07', 'Kesulitan berkonsentrasi, mengingat, atau mengambil keputusan'),
('G08', 'Pikiran berulang tentang kematian atau bunuh diri');

-- Example Probabilities P(E|H)
-- D01 (Ringan)
INSERT INTO knowledge_base (disease_id, symptom_id, probability) VALUES
(1, 1, 0.6), (1, 2, 0.5), (1, 5, 0.4), (1, 7, 0.3);

-- D02 (Sedang)
INSERT INTO knowledge_base (disease_id, symptom_id, probability) VALUES
(2, 1, 0.8), (2, 2, 0.7), (2, 3, 0.5), (2, 4, 0.6), (2, 5, 0.7), (2, 6, 0.4), (2, 7, 0.5);

-- D03 (Berat)
INSERT INTO knowledge_base (disease_id, symptom_id, probability) VALUES
(3, 1, 0.95), (3, 2, 0.9), (3, 3, 0.8), (3, 4, 0.9), (3, 5, 0.9), (3, 6, 0.8), (3, 7, 0.8), (3, 8, 0.9);
