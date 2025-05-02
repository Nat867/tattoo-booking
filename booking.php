<?php
// ตรวจสอบว่าแนบสลิปมาหรือยัง
if (!isset($_FILES['slip']) || $_FILES['slip']['error'] !== 0) {
    echo "กรุณาแนบสลิปการโอนเงิน";
    exit;
}

// โหลดข้อมูลเดิม
$file = 'bookings.json';
$bookings = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

// รับค่าจากฟอร์ม
$name = $_POST['name'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];

// เช็กว่าคิวนั้นมีคนจองไปแล้วไหม
foreach ($bookings as $b) {
    if ($b['date'] === $date && $b['time'] === $time) {
        echo "ขออภัย คิวเวลา $time ของวันที่ $date ถูกจองไปแล้วค่ะ";
        exit;
    }
}

// สร้างโฟลเดอร์เก็บสลิป
if (!is_dir("slips")) {
    mkdir("slips");
}

// บันทึกไฟล์สลิป
$slipName = "slips/" . time() . "_" . basename($_FILES["slip"]["name"]);
move_uploaded_file($_FILES["slip"]["tmp_name"], $slipName);

// บันทึกข้อมูลลงไฟล์
$bookings[] = [
    'name' => $name,
    'phone' => $phone,
    'date' => $date,
    'time' => $time,
    'slip' => $slipName
];
file_put_contents($file, json_encode($bookings, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

// แสดงผลลัพธ์
echo "จองคิวเรียบร้อยแล้ว!<br>";
echo "ชื่อ: $name<br>เบอร์: $phone<br>วันที่: $date เวลา: $time<br>";
echo "<a href='$slipName' target='_blank'>ดูสลิป</a>";

// ส่งอีเมลแจ้งเตือน
$to = "chanomyen0@gmail.com";
$subject = "มีผู้จองคิวใหม่";
$message = "ชื่อ: $name\nเบอร์โทร: $phone\nวันที่: $date\nเวลา: $time\nดูสลิป: $slipName";
$headers = "From: booking@yourdomain.com";

mail($to, $subject, $message, $headers);
?>