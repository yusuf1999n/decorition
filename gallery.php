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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        $IntImgPath = $_POST['delete'];
        // حذف الصورة من قاعدة البيانات
        $stmt = $conn->prepare("DELETE FROM IntDecor WHERE IntImgPath = ?");
        $stmt->bind_param("s", $IntImgPath);
        $stmt->execute();
        // حذف الملف من الخادم
        $fileToDelete = 'uploads/' . $IntImgPath;
        if (file_exists($fileToDelete)) {
            unlink($fileToDelete);
            echo "تم حذف الصورة بنجاح.\n";
        } else {
            echo "لم يتم العثور على الصورة.\n";
        }
    }
}

// قراءة الصور من قاعدة البيانات
$IntDecor = [];
$result = $conn->query("SELECT * FROM IntDecor");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $IntDecor[] = $row['IntImgPath'];
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        $ExtImgPath = $_POST['delete'];
        // حذف الصورة من قاعدة البيانات
        $stmt = $conn->prepare("DELETE FROM ExtDecor WHERE ExtImgPath = ?");
        $stmt->bind_param("s", $ExtImgPath);
        $stmt->execute();
        // حذف الملف من الخادم
        $fileToDelete = 'uploads/' . $ExtImgPath;
        if (file_exists($fileToDelete)) {
            unlink($fileToDelete);
            echo "تم حذف الصورة بنجاح.\n";
        } else {
            echo "لم يتم العثور على الصورة.\n";
        }
    }
}

// قراءة الصور من قاعدة البيانات
$ExtDecor = [];
$result = $conn->query("SELECT * FROM ExtDecor");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $ExtDecor[] = $row['ExtImgPath'];
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        $IntPntPath = $_POST['delete'];
        // حذف الصورة من قاعدة البيانات
        $stmt = $conn->prepare("DELETE FROM IntPaint WHERE IntPntPath = ?");
        $stmt->bind_param("s", $IntPntPath);
        $stmt->execute();
        // حذف الملف من الخادم
        $fileToDelete = 'uploads/' . $IntPntPath;
        if (file_exists($fileToDelete)) {
            unlink($fileToDelete);
            echo "تم حذف الصورة بنجاح.\n";
        } else {
            echo "لم يتم العثور على الصورة.\n";
        }
    }
}

// قراءة الصور من قاعدة البيانات
$IntPaint = [];
$result = $conn->query("SELECT * FROM IntPaint");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $IntPaint[] = $row['IntPntPath'];
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        $ExtPntPath = $_POST['delete'];
        // حذف الصورة من قاعدة البيانات
        $stmt = $conn->prepare("DELETE FROM ExtPaint WHERE ExtPntPath = ?");
        $stmt->bind_param("s", $ExtPntPath);
        $stmt->execute();
        // حذف الملف من الخادم
        $fileToDelete = 'uploads/' . $ExtPntPath;
        if (file_exists($fileToDelete)) {
            unlink($fileToDelete);
            echo "تم حذف الصورة بنجاح.\n";
        } else {
            echo "لم يتم العثور على الصورة.\n";
        }
    }
}

// قراءة الصور من قاعدة البيانات
$ExtPaint = [];
$result = $conn->query("SELECT * FROM ExtPaint");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $ExtPaint[] = $row['ExtPntPath'];
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        $GrdImgPath = $_POST['delete'];
        // حذف الصورة من قاعدة البيانات
        $stmt = $conn->prepare("DELETE FROM HomeGarden WHERE GrdImgPath = ?");
        $stmt->bind_param("s", $GrdImgPath);
        $stmt->execute();
        // حذف الملف من الخادم
        $fileToDelete = 'uploads/' . $GrdImgPath;
        if (file_exists($fileToDelete)) {
            unlink($fileToDelete);
            echo "تم حذف الصورة بنجاح.\n";
        } else {
            echo "لم يتم العثور على الصورة.\n";
        }
    }
}

// قراءة الصور من قاعدة البيانات
$HomeGarden = [];
$result = $conn->query("SELECT * FROM HomeGarden");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $HomeGarden[] = $row['GrdImgPath'];
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>معرض الصور</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr);  /* تحديد ثلاث أعمدة */
            gap: 10px;
        }
        .photo {
            position: relative;
            width: 100%;
            padding-top: 100%; /* نسبة عرض إلى ارتفاع 1:1 للحفاظ على الصورة مربعة */
            overflow: hidden;
        }
        .photo img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .delete-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: red;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <h1>معرض الصور</h1>
    <div class="gallery" id="gallery">
        <?php
                echo '<h3>صور الديكور الداخلي</h3>';
           echo '<br>';
         foreach ( $IntDecor as $photo) {
            echo "<div class='photo'>";
            echo "<img src='uploads/$photo' alt='Photo'>";
            echo "<form method='POST' onsubmit='return confirm(\"هل أنت متأكد من الحذف؟\")'>";
            echo "<input type='hidden' name='delete' value='$photo'>";
            echo "<button type='submit' class='delete-btn'>حذف</button>";
            echo "</form>";
            echo "</div>";
        }
        echo '<br>';
        echo '<h3>صور الديكور الخارجي</h3>';
        
        echo '<br>';
        foreach ( $ExtDecor as $photo) {
            echo "<div class='photo'>";
            echo "<img src='uploads/$photo' alt='Photo'>";
            echo "<form method='POST' onsubmit='return confirm(\"هل أنت متأكد من الحذف؟\")'>";
            echo "<input type='hidden' name='delete' value='$photo'>";
            echo "<button type='submit' class='delete-btn'>حذف</button>";
            echo "</form>";
            echo "</div>";
        }
        echo '<br>';
        echo '<h3>صور دهان داخلي</h3>';
        
        echo '<br>';
        foreach ( $IntPaint as $photo) {
            echo "<div class='photo'>";
            echo "<img src='uploads/$photo' alt='Photo'>";
            echo "<form method='POST' onsubmit='return confirm(\"هل أنت متأكد من الحذف؟\")'>";
            echo "<input type='hidden' name='delete' value='$photo'>";
            echo "<button type='submit' class='delete-btn'>حذف</button>";
            echo "</form>";
            echo "</div>";
        }
        echo '<br>';
        echo '<h3>صور دهان الخارجي</h3>';
        
        echo '<br>';
        foreach ( $ExtPaint as $photo) {
            echo "<div class='photo'>";
            echo "<img src='uploads/$photo' alt='Photo'>";
            echo "<form method='POST' onsubmit='return confirm(\"هل أنت متأكد من الحذف؟\")'>";
            echo "<input type='hidden' name='delete' value='$photo'>";
            echo "<button type='submit' class='delete-btn'>حذف</button>";
            echo "</form>";
            echo "</div>";
        }
        echo '<br>';
        echo '<h3>صور حدائق كنزليه</h3>';
        
        echo '<br>';
        foreach ( $HomeGarden as $photo) {
            echo "<div class='photo'>";
            echo "<img src='uploads/$photo' alt='Photo'>";
            echo "<form method='POST' onsubmit='return confirm(\"هل أنت متأكد من الحذف؟\")'>";
            echo "<input type='hidden' name='delete' value='$photo'>";
            echo "<button type='submit' class='delete-btn'>حذف</button>";
            echo "</form>";
            echo "</div>";
        }
        ?>
    </div>
    <a href="add.php">عودة لرفع الصور</a>
</body>
</html>
