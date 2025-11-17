<div class="card shadow p-4">
    <i class="bi bi-trash"></i> Delete
    </a>
</div>
</div>


<hr>


<h4><?= htmlspecialchars($contact['first_name'] . ' ' . $contact['last_name']) ?></h4>
<p class="text-muted">Company: <?= htmlspecialchars($contact['company']) ?></p>
<p><?= nl2br(htmlspecialchars($contact['notes'])) ?></p>


<hr>
<h5>Phone Numbers</h5>
<?php if (!empty($contact['phones'])): ?>
    <?php foreach ($contact['phones'] as $p): ?>
        <p>
            <span class="badge bg-secondary"> <?= htmlspecialchars($p['type']) ?> </span>
            <?= htmlspecialchars($p['number']) ?>
        </p>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-muted">No phone numbers</p>
<?php endif; ?>


<hr>
<h5>Emails</h5>
<?php if (!empty($contact['emails'])): ?>
    <?php foreach ($contact['emails'] as $e): ?>
        <p>
            <i class="bi bi-envelope"></i> <?= htmlspecialchars($e['email']) ?>
        </p>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-muted">No emails</p>
<?php endif; ?>


<hr>


<a href="index.php" class="btn btn-outline-secondary mt-3">
    <i class="bi bi-arrow-left"></i> Back to list
</a>
</div>