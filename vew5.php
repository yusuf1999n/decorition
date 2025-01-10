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

// قراءة الصور من قاعدة البيانات
$photos = [];
$result = $conn->query("SELECT * FROM HomeGarden");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $photos[] = $row['GrdImgPath'];
    }
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>حدائق منزليه</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
        <style>
        /* تنسيقات هنا */
        .mySlides { display:none; }
        .active { display:block; }
    </style>
        <style>  
        /* تنسيقات هنا */
      
    
            .image-gallery {
                display: grid;
                grid-template-columns: repeat(3, 1fr); /* ثلاث أعمدة */
                gap: 10px; /* الفجوة بين الصور */
            }
            .image-gallery img {
                width: 300px; /* حجم موحد للعرض */
                height: 300px; /* حجم موحد للطول */
                border-radius: 10px; /* حواف دائرية */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* الظلال */
                cursor: pointer; /* مؤشر يدل على أن الصورة قابلة للنقر */
                transition: transform 0.3s ease;
            }
            .image-gallery img:hover {
                transform: scale(1.05); /* تكبير الصورة عند المرور عليها */
            }
            .modal {
                display: none; /* إخفاء النموذج */
                position: fixed;
                z-index: 1;
                padding-top: 60px;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0, 0, 0, 0.9);
            }
            .modal-content {
                margin: auto;
                display: block;
                width: 500px; /* عرض موحد */
                height: 500px; /* طول موحد */
                max-width: 100%;
                max-height: 100%;
            }
            .modal-content img {
                width: 100%;
                height: 100%;
            }
            .close {
                position: absolute;
                top: 15px;
                right: 35px;
                color: #fff;
                font-size: 40px;
                font-weight: bold;
                transition: 0.3s;
            }
            .close:hover,
            .close:focus {
                color: #bbb;
                text-decoration: none;
                cursor: pointer;
            }
            .prev,
            .next {
                cursor: pointer;
                position: absolute;
                top: 50%;
                width: auto;
                padding: 16px;
                margin-top: -22px;
                color: white;
                font-weight: bold;
                font-size: 20px;
                transition: 0.6s ease;
                border-radius: 0 3px 3px 0;
                user-select: none;
            }
            .next {
                right: 0;
                border-radius: 3px 0 0 3px;
            }
        </style>
    
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper" class="fade-in">

				<!-- Intro -->
					<div id="intro">
						<h1>معلم<br />
						ديكورات ودهانات الرياض</h1>
						<p><a href="tel:+0536306642" class="fa fa-phone"> اتصال </a>
							<br />
							<p><a href="https://wa.me/0536306642" class="fab fa-whatsapp">   واتساب</a>
							</p>
						<ul class="actions">
							<li><a href="#header" class="button icon solid solo fa-arrow-down scrolly">Continue</a></li>
						</ul>
					</div>

				<!-- Header -->
					<header id="header">
						<a href="index.html" class="logo"> حدائق منزليه</a>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links" >
							<li ><a href="index.php">الصفحة الرئيسيه</a></li>
							<li><a href="vew.php">ديكورات داخليه</a></li>
							<li><a href="vew2.php">واجهات خارجيه</a></li>
							<li><a href="vew3.php">دهانات داخليه</a></li>
							<li><a href="vew4.php"> دهانات خارجيه</a></li>
							<li class="active"><a href="vew5.php"> حدائق منزليه</a></li>

						</ul>
						<ul class="icons">
							<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
						</ul>
					</nav>

				<!-- Main -->
				<div id="main">

					<!-- Featured Post -->
						<br class="post featured">
							<header class="major">
								<h2>ديكورات داخليه							<br />
								 </h2>
							</header>
                            <div class="image-gallery">
                            <?php
        foreach ($photos as $HomeGarden) {
            echo "<img src='uploads/$HomeGarden' alt='HomeGarden' onclick=\"openModal();currentSlide(1)\">";
        }
        ?>
                                
                        
                            </div>
                        
                            <div id="myModal" class="modal"  style="display:none;">
                                <span class="close" onclick="closeModal()">&times;</span>
                                <div class="modal-content">
                                
                                <?php
    foreach ($photos as $index => $HomeGarden) {
        echo "<div class='mySlides' id='slide$index'>";
        echo "<img src='uploads/$HomeGarden' alt='HomeGarden' onclick=\"openModal();currentSlide(".($index+1).")\">";
        echo "</div>";
    }
    ?>



                                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                                </div>
                            </div>
                        
                            <script>
        

        
                                let slideIndex = 1;
                        
                                function openModal() {
            document.getElementById('myModal').style.display = 'block';
        }

                        
                                function closeModal() {
                                    document.getElementById("myModal").style.display = "none";
                                }
                        
                                function plusSlides(n) {
                                    showSlides(slideIndex += n);
                                }
                        
                                function currentSlide(n) {
            var slides = document.getElementsByClassName('mySlides');
            for (var i = 0; i < slides.length; i++) {
                slides[i].classList.remove('active');
            }
            slides[n-1].classList.add('active');
        }
    
                        
                                function showSlides(n) {
                                    let i;
                                    let slides = document.getElementsByClassName("mySlides");
                                    if (n > slides.length) {slideIndex = 1}
                                    if (n < 1) {slideIndex = slides.length}
                                    for (i = 0; i < slides.length; i++) {
                                        slides[i].style.display = "none";
                                    }
                                    slides[slideIndex-1].style.display = "block";
                                }
                        
                                // Initialize the slideshow
                                showSlides(slideIndex);
                            </script>
                        
                    
                        </div>	
                        <footer id="footer" dir="rtl" >
                            <section class="split contact"  >
                                <a  style="background-color: rgb(62, 63, 63);font-size: large;color: rgba(237, 242, 243, 0.886); display: flex;
                                justify-content: center; 
                                align-items: center;" >للتواصل</a>
                                <section class="alt">
                                    <h4>العنوان</h4>
                                    <p style="font-size: large;">شارع رقم <br />
                                    الرياض</p>
                                </section>
                                <section class="fa fa-phone">
                                    <h4></h4>
                                    <p><br href="tel:+1234567890">0536306642 <br><br> 0550747006 </br></br></a></p>
                                </section>
                                <section class="fa fa-envelope">
                                    <h3>  </h3>
                                    <p><a href="#"></a></p>
                                </section>
                                <section>
                                    <ul class="icons alt">
                                        <li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
                                        <li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
                                        <li><a href="https://www.instagram.com/y_11f/" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
                                    </ul>
                                </section>
                            </section>
                        </footer>
    
                    
                </div>
    
            <!-- Scripts -->
                <script src="assets/js/jquery.min.js"></script>
                <script src="assets/js/jquery.scrollex.min.js"></script>
                <script src="assets/js/jquery.scrolly.min.js"></script>
                <script src="assets/js/browser.min.js"></script>
                <script src="assets/js/breakpoints.min.js"></script>
                <script src="assets/js/util.js"></script>
                <script src="assets/js/main.js"></script>
    
        </body>
    </html>