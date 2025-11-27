<?php
require_once 'config/database.php';
require_once 'functions/bayes.php';
include 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['symptoms'])) {
    // Redirect if accessed directly or no symptoms selected
    echo "<script>alert('Silakan pilih setidaknya satu gejala.'); window.location.href='diagnosis.php';</script>";
    exit;
}

$selected_symptoms = $_POST['symptoms'];
$results = calculateBayes($selected_symptoms, $pdo);

// Get the highest probability result
$top_result = $results[0];
?>

<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Hasil Diagnosa</h2>
                    <p class="text-muted">Berdasarkan gejala yang Anda pilih, berikut adalah hasil analisanya.</p>
                </div>

                <!-- Main Result Card -->
                <div class="card result-card shadow-lg border-0 mb-5">
                    <div class="card-body p-5 text-center">
                        <h5 class="text-muted mb-3">Kemungkinan Terbesar</h5>
                        <h1 class="display-4 fw-bold text-primary mb-3">
                            <?php echo $top_result['disease_name']; ?>
                        </h1>
                        <div class="display-6 fw-bold mb-4">
                            <?php echo number_format($top_result['probability'], 1); ?>%
                        </div>

                        <div class="alert alert-info border-0 bg-opacity-10 bg-primary text-dark text-start">
                            <h5 class="fw-bold"><i class="bi bi-info-circle-fill me-2"></i>Deskripsi</h5>
                            <p class="mb-0"><?php echo $top_result['disease_desc']; ?></p>
                        </div>

                        <div class="alert alert-success border-0 bg-opacity-10 bg-success text-dark text-start mt-3">
                            <h5 class="fw-bold"><i class="bi bi-lightbulb-fill me-2"></i>Saran Solusi</h5>
                            <p class="mb-0"><?php echo $top_result['solution']; ?></p>
                        </div>
                    </div>
                </div>

                <!-- Detailed Breakdown -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h5 class="fw-bold mb-0">Rincian Probabilitas Lainnya</h5>
                    </div>
                    <div class="card-body p-4">
                        <?php foreach ($results as $result): ?>
                            <?php if ($result['disease_name'] !== $top_result['disease_name']): ?>
                                <div class="mb-4">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="fw-semibold"><?php echo $result['disease_name']; ?></span>
                                        <span
                                            class="fw-bold text-muted"><?php echo number_format($result['probability'], 1); ?>%</span>
                                    </div>
                                    <div class="progress-bar-custom w-100">
                                        <div class="progress-fill" style="width: <?php echo $result['probability']; ?>%;"></div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <a href="diagnosis.php" class="btn btn-outline-primary rounded-pill px-4 me-2">
                        <i class="bi bi-arrow-repeat me-2"></i>Diagnosa Ulang
                    </a>
                    <a href="index.php" class="btn btn-primary rounded-pill px-4">
                        <i class="bi bi-house-door me-2"></i>Kembali ke Beranda
                    </a>
                </div>

                <div class="alert alert-warning mt-5 text-center">
                    <small>
                        <strong>Disclaimer:</strong> Hasil ini merupakan diagnosa awal berdasarkan sistem pakar.
                        Untuk diagnosa medis yang pasti, silakan konsultasikan dengan dokter atau psikolog profesional.
                    </small>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>