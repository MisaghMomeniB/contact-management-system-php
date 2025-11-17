<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Your Contacts</h3>
    <a href="add_contact.php" class="btn btn-primary">
        <i class="bi bi-plus"></i> Add Contact
    </a>
</div>


<div class="card shadow p-3">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th>Name</th>
                <th>Company</th>
                <th>Phones</th>
                <th>Emails</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $c): ?>
                <tr>
                    <td>
                        <strong><?= htmlspecialchars($c['first_name'] . ' ' . $c['last_name']) ?></strong>
                    </td>


                    <td><?= htmlspecialchars($c['company']) ?></td>


                    <!-- Phones -->
                    <td>
                        <?php foreach ($c['phones'] as $p): ?>
                            <span class="badge bg-secondary me-1">
                                <?= htmlspecialchars($p['type']) ?>: <?= htmlspecialchars($p['number']) ?>
                            </span>
                        <?php endforeach; ?>
                    </td>


                    <!-- Emails -->
                    <td>
                        <?php foreach ($c['emails'] as $e): ?>
                            <span class="badge bg-info me-1">
                                <?= htmlspecialchars($e['email']) ?>
                            </span>
                        <?php endforeach; ?>
                    </td>


                    <td>
                        <a href="view_contact.php?id=<?= $c['id'] ?>" class="btn btn-sm btn-outline-info">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="edit_contact.php?id=<?= $c['id'] ?>" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <a href="delete_contact.php?id=<?= $c['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this contact? ')">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>