<div class="card shadow p-4">


    <div class="mb-3">
        <label class="form-label">Notes</label>
        <textarea name="notes" class="form-control" rows="3"><?= htmlspecialchars($contact['notes']) ?></textarea>
    </div>


    <hr>


    <!-- Phones -->
    <h5>Phone Numbers</h5>
    <div id="phone-container">
        <?php foreach ($contact['phones'] as $p): ?>
            <div class="row mb-2 phone-row">
                <div class="col-md-4">
                    <select name="phone_type[]" class="form-select">
                        <option value="mobile" <?= $p['type'] === 'mobile' ? 'selected' : '' ?>>Mobile</option>
                        <option value="home" <?= $p['type'] === 'home' ? 'selected' : '' ?>>Home</option>
                        <option value="work" <?= $p['type'] === 'work' ? 'selected' : '' ?>>Work</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <input type="text" name="phone_number[]" value="<?= htmlspecialchars($p['number']) ?>" class="form-control">
                </div>
                <div class="col-md-2 d-flex">
                    <button type="button" class="btn btn-danger w-100 remove-phone"><i class="bi bi-x"></i></button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <button type="button" id="add-phone" class="btn btn-outline-primary mb-3"><i class="bi bi-plus"></i> Add Phone</button>


    <hr>


    <!-- Emails -->
    <h5>Emails</h5>
    <div id="email-container">
        <?php foreach ($contact['emails'] as $e): ?>
            <div class="row mb-2 email-row">
                <div class="col-md-10">
                    <input type="email" name="email[]" value="<?= htmlspecialchars($e['email']) ?>" class="form-control">
                </div>
                <div class="col-md-2 d-flex">
                    <button type="button" class="btn btn-danger w-100 remove-email"><i class="bi bi-x"></i></button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <button type="button" id="add-email" class="btn btn-outline-primary mb-3"><i class="bi bi-plus"></i> Add Email</button>


    <button class="btn btn-success w-100">Save Changes</button>
    </form>


    <a href="index.php" class="btn btn-outline-secondary mt-3"><i class="bi bi-arrow-left"></i> Back</a>
</div>