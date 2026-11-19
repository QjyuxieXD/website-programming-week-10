<?php
declare(strict_types=1);

require __DIR__ . "/database.php";

$stmt = $pdo->query(
    "SELECT id, title, content, created_at
     FROM posts
     ORDER BY id DESC"
);

$posts = $stmt->fetchAll();
?>

<h1>Daftar Catatan</h1>

<form action="create.php" method="post">
  <label for="title">Judul</label>
  <input id="title" name="title" type="text" maxlength="150" required>

  <label for="content">Isi</label>
  <textarea id="content" name="content" required></textarea>

  <button type="submit">Simpan Catatan</button>
</form>

<?php if ($posts === []): ?>
  <p>Belum ada catatan.</p>
<?php else: ?>
  <?php foreach ($posts as $post): ?>
    <article>
      <h2><?= htmlspecialchars($post["title"], ENT_QUOTES, "UTF-8") ?></h2>
      <p><?= nl2br(htmlspecialchars($post["content"], ENT_QUOTES, "UTF-8")) ?></p>
    </article>
  <?php endforeach; ?>
<?php endif; ?>