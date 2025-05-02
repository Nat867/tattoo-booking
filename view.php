<?php
$file = 'bookings.json';
if (!file_exists($file)) {
    echo "ยังไม่มีข้อมูลการจอง";
    exit;
}

$bookings = json_decode(file_get_contents($file), true);
?>

<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>ตารางการจองคิว</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      border: 1px solid #aaa;
      padding: 8px;
      text-align: center;
    }
  </style>
</head>
<body>
  <h1>ตารางการจองคิว</h1>
  <table>
    <tr>
      <th>ชื่อ</th>
      <th>เบอร์โทร</th>
      <th>วันที่</th>
      <th>เวลา</th>
      <th>ดูสลิป</th>
    </tr>
    <?php foreach ($bookings as $b): ?>
    <tr>
      <td><?= htmlspecialchars($b['name']) ?></td>
      <td><?= htmlspecialchars($b['phone']) ?></td>
      <td><?= htmlspecialchars($b['date']) ?></td>
      <td><?= htmlspecialchars($b['time']) ?></td>
      <td><a href="<?= $b['slip'] ?>" target="_blank">ดูสลิป</a></td>
    </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>