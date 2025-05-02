<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>จองคิวร้านสัก | Nowornever tattoo studio</title>
</head>
<body>
  <h1 style="color:#222;">Nowornever tattoo studio</h1>
  <h2 style="color:#444;">ระบบจองคิวร้านสัก</h2>

  <form action="booking.php" method="POST" enctype="multipart/form-data">
    ชื่อ: <input type="text" name="name" required><br>
    เบอร์โทร: <input type="text" name="phone" required><br>
    วันที่ต้องการสัก: <input type="date" name="date" required><br>
    เวลา:
    <select name="time" required>
      <option value="11:30">11:30</option>
      <option value="17:00">17:00</option>
    </select><br>
    แนบสลิปการโอนเงิน: 
    <input type="file" name="slip" accept=".jpg,.jpeg,.png" required><br><br>

    <p>
      <strong>บัญชีสำหรับโอนเงินมัดจำ:</strong><br>
      เลขบัญชี: <strong>042-8-62482-3</strong><br>
      ธนาคาร: <strong>กสิกรไทย</strong><br>
      ชื่อบัญชี: <strong>ชานนท์ นิ่มน้อย</strong>
    </p>

    <button type="submit">ยืนยันการจอง</button>
  </form>
</body>
</html>