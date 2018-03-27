<?php
// Nhánh kết nối thành công
try {
    // Kết nối
    // $conn = new PDO("mysql:host=localhost;dbname=test1", 'root', '');
    $conn = new PDO("mysql:host=104.197.174.172;dbname=my_icsse", 'kiet', '0000');
     
    // Thiết lập chế độ lỗi
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Thông báo thành công
    echo "kết nối thành công";
} 
// Nhánh kết nối thất bại
catch (PDOException $e) {
    echo "Kết nối thất bại: " . $e->getMessage();
}
?>