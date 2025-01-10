<?php
// الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DecorMaster";  // اسم قاعدة البيانات المحدث

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}
// رفع الصور الى جدول الديكورات الداخليه IntDecor
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['IntDecor'])) {
        $uploadDir = 'uploads/';
        $fileNames = $_FILES['IntDecor']['name'];
        $fileTmpNames = $_FILES['IntDecor']['tmp_name'];

        foreach ($fileNames as $index => $IntImgPath) {
            $uploadFile = $uploadDir . basename($IntImgPath);
            if (move_uploaded_file($fileTmpNames[$index], $uploadFile)) {
                // إضافة الصورة إلى قاعدة البيانات
                $stmt = $conn->prepare("INSERT INTO IntDecor (IntImgPath) VALUES (?)");
                $photoName = basename($IntImgPath); // تم استخدام متغير لتمرير القيمة بالمرجع
                $stmt->bind_param("s", $photoName);
                $stmt->execute();
                echo "تم إضافة الصورة " . basename($IntImgPath) . " بنجاح.\n";
            } else {
                echo "حدث خطأ أثناء رفع الصورة " . basename($IntImgPath) . ".\n";
            }
        }
    }
}// رفع الصور الى جدول الديكورات الخارجيه ExtDecor

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['ExtDecor'])) {
        $uploadDir = 'uploads/';
        $fileNames = $_FILES['ExtDecor']['name'];
        $fileTmpNames = $_FILES['ExtDecor']['tmp_name'];

        foreach ($fileNames as $index => $ExtImgPath) {
            $uploadFile = $uploadDir . basename($ExtImgPath);
            if (move_uploaded_file($fileTmpNames[$index], $uploadFile)) {
                // إضافة الصورة إلى قاعدة البيانات
                $stmt = $conn->prepare("INSERT INTO ExtDecor (ExtImgPath) VALUES (?)");
                $photoName = basename($ExtImgPath); // تم استخدام متغير لتمرير القيمة بالمرجع
                $stmt->bind_param("s", $photoName);
                $stmt->execute();
                echo "تم إضافة الصورة " . basename($ExtImgPath) . " بنجاح.\n";
            } else {
                echo "حدث خطأ أثناء رفع الصورة " . basename($ExtImgPath) . ".\n";
            }
        }
    }
}// رفع الصور الى جدول الدهانات الداخليه IntPaint

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['IntPaint'])) {
        $uploadDir = 'uploads/';
        $fileNames = $_FILES['IntPaint']['name'];
        $fileTmpNames = $_FILES['IntPaint']['tmp_name'];

        foreach ($fileNames as $index => $IntPntPath) {
            $uploadFile = $uploadDir . basename($IntPntPath);
            if (move_uploaded_file($fileTmpNames[$index], $uploadFile)) {
                // إضافة الصورة إلى قاعدة البيانات
                $stmt = $conn->prepare("INSERT INTO IntPaint (IntPntPath) VALUES (?)");
                $photoName = basename($IntPntPath); // تم استخدام متغير لتمرير القيمة بالمرجع
                $stmt->bind_param("s", $photoName);
                $stmt->execute();
                echo "تم إضافة الصورة " . basename($IntPntPath) . " بنجاح.\n";
            } else {
                echo "حدث خطأ أثناء رفع الصورة " . basename($IntPntPath) . ".\n";
            }
        }
    }
}//جدول الدهانات الخارجية ExtPaint
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['ExtPaint'])) {
        $uploadDir = 'uploads/';
        $fileNames = $_FILES['ExtPaint']['name'];
        $fileTmpNames = $_FILES['ExtPaint']['tmp_name'];

        foreach ($fileNames as $index => $ExtPntPath) {
            $uploadFile = $uploadDir . basename($ExtPntPath);
            if (move_uploaded_file($fileTmpNames[$index], $uploadFile)) {
                // إضافة الصورة إلى قاعدة البيانات
                $stmt = $conn->prepare("INSERT INTO ExtPaint (ExtPntPath) VALUES (?)");
                $photoName = basename($ExtPntPath); // تم استخدام متغير لتمرير القيمة بالمرجع
                $stmt->bind_param("s", $photoName);
                $stmt->execute();
                echo "تم إضافة الصورة " . basename($ExtPntPath) . " بنجاح.\n";
            } else {
                echo "حدث خطأ أثناء رفع الصورة " . basename($ExtPntPath) . ".\n";
            }
        }
    }
}// جدول الحدائق المنزلية HomeGarden
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['HomeGarden'])) {
        $uploadDir = 'uploads/';
        $fileNames = $_FILES['HomeGarden']['name'];
        $fileTmpNames = $_FILES['HomeGarden']['tmp_name'];

        foreach ($fileNames as $index => $GrdImgPath) {
            $uploadFile = $uploadDir . basename($GrdImgPath);
            if (move_uploaded_file($fileTmpNames[$index], $uploadFile)) {
                // إضافة الصورة إلى قاعدة البيانات
                $stmt = $conn->prepare("INSERT INTO HomeGarden (GrdImgPath) VALUES (?)");
                $photoName = basename($GrdImgPath); // تم استخدام متغير لتمرير القيمة بالمرجع
                $stmt->bind_param("s", $photoName);
                $stmt->execute();
                echo "تم إضافة الصورة " . basename($GrdImgPath) . " بنجاح.\n";
            } else {
                echo "حدث خطأ أثناء رفع الصورة " . basename($GrdImgPath) . ".\n";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
<title>معلم ديكور الرياض</title>
		<meta charset="utf-8" />

		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta charset="UTF-8">
    <title>رفع الصور</title>
    <style>
        /* نفس الجزء الخاص بالأنماط كما في الكود السابق */
    </style>
</head>
<body>
    
    <h1> رفع الصور الى الديكورات داخليه تصميم وتنفيذ</h1>
    <form method="POST" enctype="multipart/form-data">
        <label>اختر صورًا لإضافتها:</label>
        <input type="file" name="IntDecor[]" multiple>
        <button type="submit\">إضافة الصور</button>
    </form>



    <h1>رفع الصور الديكورات الخارجيه</h1>
    <form method="POST" enctype="multipart/form-data">
        <label>اختر صورًا لإضافتها:</label>
        <input type="file" name="ExtDecor[]" multiple>
        <button type="submit\">إضافة الصور</button>
    </form>
    <h1>رفع الصور دهانات داخلبه</h1>
    <form method="POST" enctype="multipart/form-data">
        <label>اختر صورًا لإضافتها:</label>
        <input type="file" name="IntPaint[]" multiple>
        <button type="submit\">إضافة الصور</button>
    </form>
    <h1>رفع الصور دهانات خارجيه</h1>
    <form method="POST" enctype="multipart/form-data">
        <label>اختر صورًا لإضافتها:</label>
        <input type="file" name="ExtPaint[]" multiple>
        <button type="submit\">إضافة الصور</button>
    </form>
    <h1>رفع الصورحدائق منزليه</h1>
    <form method="POST" enctype="multipart/form-data">
        <label>اختر صورًا لإضافتها:</label>
        <input type="file" name="HomeGarden[]" multiple>
        <button type="submit\">إضافة الصور</button>
    </form>
    <a href="gallery.php">عرض الصور</a>
</body>
</html>
