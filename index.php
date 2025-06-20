<?php
$submitted = false;
$found = false;
$text = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $submitted = true;
    $code = trim($_POST['code'] ?? '');
    $filename = __DIR__ . "/data/$code.txt";

    if (!preg_match('/^[a-zA-Z0-9]{6}$/', $code)) {
        $error = "❌ کد نامعتبر است.";
    } elseif (!file_exists($filename)) {
        $error = "⛔ این کد وجود ندارد یا منقضی شده.";
    } else {
        $data = json_decode(file_get_contents($filename), true);
        if (time() > $data['expire_at']) {
            unlink($filename); // حذف فایل منقضی‌شده
            $error = "⏰ این متن منقضی شده.";
        } else {
            $text = $data['text'];
            $found = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ورود کد | VanishLink</title>
</head>
<body style="direction: rtl; font-family: sans-serif; padding: 50px; text-align: center;">

<?php if (!$submitted || !$found): ?>
    <h2>🔐 لطفاً کد خود را وارد کنید</h2>
    <form method="POST">
        <input type="text" name="code" placeholder="مثلاً abc123" required>
        <br><br>
        <button type="submit">نمایش متن</button>
    </form>
    <br>
    <?php if ($error): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
<?php else: ?>
    <h3>📄 متن شما:</h3>
    <pre style="white-space: pre-wrap; text-align: left; direction: ltr; background: #f0f0f0; padding: 15px; border-radius: 5px;">
<?= htmlspecialchars($text) ?>
    </pre>
<?php endif; ?>

</body>
</html>
