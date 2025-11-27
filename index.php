<?php include 'includes/header.php'; ?>

<!-- Hero Section -->
<section class="hero-section d-flex align-items-center">
    <div class="container position-relative z-1">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <span
                    class="badge bg-light text-primary mb-3 px-3 py-2 rounded-pill fw-semibold border border-primary-subtle">
                    <i class="bi bi-stars me-1"></i> AI-Powered Mental Health
                </span>
                <h1 class="display-4 fw-bold mb-4 lh-tight">
                    Pahami Kesehatan Mentalmu dengan <span class="text-primary">Lebih Baik</span>
                </h1>
                <p class="lead text-muted mb-5">
                    Deteksi dini tingkat depresi menggunakan metode ilmiah Teorema Bayes.
                    Cepat, akurat, dan privasi terjaga 100%.
                </p>
                <div class="d-flex gap-3">
                    <a href="diagnosis.php" class="btn btn-primary btn-lg rounded-pill px-5 py-3 fw-semibold">
                        Mulai Diagnosa Sekarang
                    </a>
                    <a href="#features" class="btn btn-outline-secondary btn-lg rounded-pill px-4 py-3">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
                <div class="mt-5 d-flex align-items-center gap-4 text-muted">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-check-circle-fill text-success me-2"></i> Gratis
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-check-circle-fill text-success me-2"></i> Anonim
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-check-circle-fill text-success me-2"></i> Terpercaya
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img src="https://img.freepik.com/free-vector/mental-health-awareness-concept_23-2148514643.jpg"
                    alt="Mental Health Illustration" class="img-fluid rounded-4 shadow-lg" style="max-width: 80%;">
                <!-- Note: Using a placeholder image from Freepik for demo purposes. -->
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-5 bg-white">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Mengapa Mendadak Depresi?</h2>
            <p class="text-muted">Kami menggabungkan teknologi dan psikologi untuk Anda.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 p-4">
                    <div class="card-body">
                        <div class="feature-icon">
                            <i class="bi bi-calculator"></i>
                        </div>
                        <h4 class="card-title fw-bold mb-3">Metode Teorema Bayes</h4>
                        <p class="card-text text-muted">
                            Menggunakan algoritma probabilitas yang terbukti akurat dalam sistem pakar untuk menentukan
                            kemungkinan diagnosa berdasarkan gejala yang dialami.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 p-4">
                    <div class="card-body">
                        <div class="feature-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        <h4 class="card-title fw-bold mb-3">Privasi Terjamin</h4>
                        <p class="card-text text-muted">
                            Data Anda tidak disimpan secara permanen. Kami menghargai privasi Anda sehingga Anda bisa
                            bercerita dengan tenang tanpa rasa takut.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 p-4">
                    <div class="card-body">
                        <div class="feature-icon">
                            <i class="bi bi-lightbulb"></i>
                        </div>
                        <h4 class="card-title fw-bold mb-3">Solusi Praktis</h4>
                        <p class="card-text text-muted">
                            Tidak hanya mendiagnosa, kami juga memberikan saran solusi awal yang dapat Anda lakukan
                            sebelum berkonsultasi dengan profesional.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-primary text-white text-center">
    <div class="container py-5">
        <h2 class="fw-bold mb-4">Jangan Biarkan Sendiri</h2>
        <p class="lead mb-5 opacity-75">Kesehatan mental sama pentingnya dengan kesehatan fisik. Cek kondisimu sekarang.
        </p>
        <a href="diagnosis.php" class="btn btn-light btn-lg rounded-pill px-5 py-3 text-primary fw-bold">
            Cek Kondisi Saya
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>