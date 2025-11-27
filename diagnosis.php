<?php
require_once 'config/database.php';
require_once 'functions/bayes.php';
include 'includes/header.php';

$symptoms = getSymptoms($pdo);
?>

<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Formulir Diagnosa</h2>
                    <p class="text-muted">Pilih gejala yang Anda rasakan dalam 2 minggu terakhir.</p>
                </div>

                <div class="card shadow-lg border-0">
                    <div class="card-body p-5">
                        <form action="result.php" method="POST">
                            <div class="row g-3">
                                <?php foreach ($symptoms as $symptom): ?>
                                    <div class="col-12">
                                        <div class="form-check p-0">
                                            <input class="form-check-input symptom-checkbox" type="checkbox"
                                                name="symptoms[]" value="<?php echo $symptom['id']; ?>"
                                                id="symptom_<?php echo $symptom['id']; ?>">
                                            <label
                                                class="form-check-label d-flex align-items-center justify-content-between"
                                                for="symptom_<?php echo $symptom['id']; ?>">
                                                <span>
                                                    <span
                                                        class="badge bg-light text-dark border me-2"><?php echo $symptom['code']; ?></span>
                                                    <?php echo $symptom['name']; ?>
                                                </span>
                                                <i class="bi bi-check-circle-fill text-primary opacity-0 check-icon"></i>
                                            </label>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="mt-5 text-center">
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5 py-3 w-100">
                                    <i class="bi bi-search me-2"></i> Analisa Hasil
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Custom style for the check icon visibility */
    .symptom-checkbox:checked+.form-check-label .check-icon {
        opacity: 1 !important;
    }
</style>

<?php include 'includes/footer.php'; ?>