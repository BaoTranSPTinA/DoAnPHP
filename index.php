!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA_Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cake website design</title>-->

        <!-- Font Awesome CDN link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">-->

        <!-- Custom CSS file link -->
        <link rel="stylesheet" href="public/CSS/style.css">
    </head>
<body>
        <!-- Header section -->
        <header class="header">
            <a href="index.php" class="logo"><i class="fas fa-shopping-basket"></i> Cake </a>

            <nav class="navbar">
                <a href="index.php">Home</a>
                <a href="#">Shop</a>
                <a href="#about-section">About</a>
                <a href="#">Review</a>
                <a href="#">Blog</a>
                <a href="#about-section1">Contact</a>
            </nav>

            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
                <div id="search-btn" class="fas fa-search"></div>
                <div id="cart-btn" class="fas fa-shopping-cart"></div>
                <a href="Model/signin.php"><div id="login-btn" class="fas fa-user"></div></a>
            </div>
        </header>

        <!-- Home section -->
        <section class="home" id="home">
            <div class="slides-container">

                <div class="slide active">
                    <div class="content">
                        <span>Have a Cake-A-Delicious</span>
                        <h3>Upto 50% Off</h3>
                        <a href="#" class="btn">Shop Now</a>
                    </div>
                    <div class="img">
                        <img src="Uploads/anh1.jpg" alt="Cake Image">
                    </div>
                </div>

                <div class="slide">
                    <div class="content">
                        <span>Have a Cake-A-Delicious</span>
                        <h3>Upto 50% Off</h3>
                        <a href="#" class="btn">Shop Now</a>
                    </div>
                    <div class="img">
                        <img src="Uploads/anh3.jpg" alt="Cake Image">
                    </div>
                </div>

                <div class="slide">
                    <div class="content">
                        <span>Have a Cake-A-Delicious</span>
                        <h3>Upto 50% Off</h3>
                        <a href="#" class="btn">Shop Now</a>
                    </div>
                    <div class="img">
                        <img src="Uploads/anh6.jpg" alt="Cake Image">
                    </div>
                </div>
            </div>

            <div id="next-slide" class="fas fa-angle-right" onclick="next()"></div>
            <div id="prev-slide" class="fas fa-angle-left" onclick="prev()"></div>
        </section>


        <section class="banner-container">

            <div class="banner">
                <img src="Uploads/anh7.jpg" alt="">
                <div class="content">
                <span>limited sales</span>
                <h3>upto 50% off</h3>
                <a href="#" class="btn">Shop Now</a>
            </div>
            </div>

            <div class="banner">
                <img src="Uploads/anh8.jpg" alt="">
                <div class="content">
                <span>limited sales</span>
                <h3>upto 50% off</h3>
                <a href="#" class="btn">Shop Now</a>
            </div>
            </div>

            <div class="banner">
                <img src="Uploads/anh9.jpeg" alt="">
                <div class="content">
                <span>limited sales</span>
                <h3>upto 50% off</h3>
                <a href="#" class="btn">Shop Now</a>
            </div>
            </div>
         </section>


        <!-- category start -->
         <div class="heading">
            <h1>Our Shop</h1>
         </div>
         
         <section class="category">

        <h1 class="title"> Our <span>Category</span> <a href="#">View All >> </a> </h1>

        <div class="box-container">

            <a href="#" class="box">
                <img src="Uploads/anh9.jpg" alt="">
                <h3>fresh cupcake</h3>
            </a>

            <a href="#" class="box">
                <img src="Uploads/anh10.jpg" alt="">
                <h3>cookies</h3>
            </a>

            <a href="#" class="box">
                <img src="Uploads/anh11.jpg" alt="">
                <h3>brown bread</h3>
            </a>

            <a href="#" class="box">
                <img src="Uploads/anh12.jpg" alt="">
                <h3>dark chocolate</h3>
            </a>

            <a href="#" class="box">
                <img src="Uploads/anh13.jpg" alt="">
                <h3>wheat</h3>
            </a>
            </div>
          </section>



          <!-- products section -->

          <section class="products">
            
            <h1 class="title"> Our <span>Products</span> <a href="#">View All >> </a> </h1>
    
            <div class="box-container">

            <div class="box">
                <div class="icons">
                    <a a href="#" class="fas fa-shopping-cart"></a>
                    <a a href="#" class="fas fa-heart"></a>
                    <a a href="#" class="fas fa-eye"></a>
                </div>
        

                <div class="img">
                    <img src="Uploads/anh23.jpg" alt="">
                </div>
                <div class="content">
                    <h3>berries citrus fruits apples</h3>
                    <div class="price">$19.99</div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="icons">
                    <a a href="#" class="fas fa-shopping-cart"></a>
                    <a a href="#" class="fas fa-heart"></a>
                    <a a href="#" class="fas fa-eye"></a>
                </div>


                <div class="img">
                    <img src="Uploads/anh15.jpg" alt="">
                </div>
                <div class="content">
                    <h3>resh mellow sp color ripe</h3>
                    <div class="price">$19.99</div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="icons">
                    <a a href="#" class="fas fa-shopping-cart"></a>
                    <a a href="#" class="fas fa-heart"></a>
                    <a a href="#" class="fas fa-eye"></a>
                </div>
        

                <div class="img">
                    <img src="Uploads/anh16.jpg" alt="">
                </div>
                <div class="content">
                    <h3>rose color sparkel cake</h3>
                    <div class="price">$19.99</div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="icons">
                    <a a href="#" class="fas fa-shopping-cart"></a>
                    <a a href="#" class="fas fa-heart"></a>
                    <a a href="#" class="fas fa-eye"></a>
                </div>
            

                <div class="img">
                    <img src="Uploads/anh17.jpg" alt="">
                </div>
                <div class="content">
                    <h3>strawberry nutella cake</h3>
                    <div class="price">$19.99</div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="icons">
                    <a a href="#" class="fas fa-shopping-cart"></a>
                    <a a href="#" class="fas fa-heart"></a>
                    <a a href="#" class="fas fa-eye"></a>
                </div>

                <div class="img">
                    <img src="Uploads/anh18.jpg" alt="">
                </div>
                <div class="content">
                    <h3>green bread spar cake</h3>
                    <div class="price">$19.99</div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="icons">
                    <a a href="#" class="fas fa-shopping-cart"></a>
                    <a a href="#" class="fas fa-heart"></a>
                    <a a href="#" class="fas fa-eye"></a>
                </div>

                <div class="img">
                    <img src="Uploads/anh19.jpg" alt="">
                </div>
                <div class="content">
                    <h3>red berries chocolate cake</h3>
                    <div class="price">$19.99</div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="icons">
                    <a a href="#" class="fas fa-shopping-cart"></a>
                    <a a href="#" class="fas fa-heart"></a>
                    <a a href="#" class="fas fa-eye"></a>
                </div>

                <div class="img">
                    <img src="Uploads/anh20.jpg" alt="">
                </div>
                <div class="content">
                    <h3>strawberry red spar cake</h3>
                    <div class="price">$19.99</div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="icons">
                    <a a href="#" class="fas fa-shopping-cart"></a>
                    <a a href="#" class="fas fa-heart"></a>
                    <a a href="#" class="fas fa-eye"></a>
                </div>

                <div class="img">
                    <img src="Uploads/anh21.jpg" alt="">
                </div>
                <div class="content">
                    <h3>dark chocolate nutella cake</h3>
                    <div class="price">$19.99</div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>

        </div>
        </section>


        <div id="about-section" class="heading"> 
            <h1>About Us</h1>
        </div>

        <section class="about">
            <div class="img">
                <img src="Uploads/anh22.jpg" alt="">
            </div>

            <div class="content">
                <span>Welcom To Our Products</span>
                <h3>Cake-A-Delicious Products</h3>
                <p>We are thrilled to introduce <strong>Cake-A-Delicious</strong>, where every cake is crafted with love using only the finest ingredients. Our creations are designed to delight your taste buds and turn every occasion into a celebration.</p>

<p><strong>Experience the Taste of Perfection</strong></p>

<p>At Cake-A-Delicious, we take pride in our unwavering commitment to quality. Each bite is guaranteed to be as fresh as it is delicious. Whether you crave something rich and indulgent or light and refreshing, we have the perfect treat for every palate.

We don't just bake cakes—we create moments of joy. With our passion for creativity and attention to detail, we invite you to explore our exquisite range of cakes, each carefully made to add a special touch to your celebrations.</p>

<p>Ready for a sweet indulgence? Let Cake-A-Delicious elevate your moments with our delectable offerings, making every bite a cherished memory.</p>

                <a href="#" class="btn">Read More</a>
            </div>
         </section>
        
         <section class="gallery">
            <h1 class="title"> Our <span>Gallery</span> <a href="#">View All >> </a> </h1>
            <div class="box-container">

                <div class="box">
                    <img src="Uploads/anh24.jpg" alt="" width="300">
                    <div class="icons">
                        <a href="#" class="fas fa-eye"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-share-alt"></a>
                    </div>
                </div>

                <div class="box">
                    <img src="Uploads/anh25.jpg" alt="" width="300">
                    <div class="icons">
                        <a href="#" class="fas fa-eye"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-share-alt"></a>
                    </div>
                </div>

                <div class="box">
                    <img src="Uploads/anh31.jpg" alt="" width="300">
                    <div class="icons">
                        <a href="#" class="fas fa-eye"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-share-alt"></a>
                    </div>
                </div>

                <div class="box">
                    <img src="Uploads/anh30.jpg" alt="" width="300">
                    <div class="icons">
                        <a href="#" class="fas fa-eye"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-share-alt"></a>
                    </div>
                </div>

                <div class="box">
                    <img src="Uploads/anh28.jpg" alt="" width="300">
                    <div class="icons">
                        <a href="#" class="fas fa-eye"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-share-alt"></a>
                    </div>
                </div>

                <div class="box">
                    <img src="Uploads/anh29.jpg" alt="" width="300">
                    <div class="icons">
                        <a href="#" class="fas fa-eye"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-share-alt"></a>
                    </div>
                </div>
            </div>
         </section>


         <div class="heading">
            <h1>Client's Review</h1>
         </div>

         <section class="info-container">

            <div class="info">
                <img src="Uploads/anh35.jpg" alt"" width="65">
                <div class="Content">
                    <h3>fast delivery</h3>
                    <span>within 30 minutes</span>
                </div>
            </div>

            <div class="info">
                <img src="Uploads/anh34.jpg" alt"" width="65">
                <div class="Content">
                    <h3>24 / 7 available</h3>
                    <span>call us anytime</span>
                </div>
            </div>

            <div class="info">
                <img src="Uploads/anh32.jpg" alt"" width="65">
                <div class="Content">
                    <h3>easy payments</h3>
                    <span>cash or credit</span>
                </div>
            </div>

        </section>


        <!--review section start-->

        <section class="review">
            <div class="box">
                <div class="user">
                    <img src="Uploads/daidien1.jpg" alt="" width="200">
                    <div class="info">
                        <h3>Thanh Hương</h3>
                        <span>happy client</span>
                    </div>
                </div>
                <p>Bánh tại Cake-A-Delicious thật sự tuyệt vời! Hương vị đậm đà, bánh mềm mịn, mỗi miếng bánh đều khiến tôi hài lòng. Rất đáng để thử!</p>
            </div>

            <div class="box">
                <div class="user">
                    <img src="Uploads/daidien2.jpg" alt="" width="200">
                    <div class="info">
                        <h3>Hữu Khánh</h3>
                        <span>happy client</span>
                    </div>
                </div>
                <p>Tôi đã đặt bánh cho sinh nhật con gái và nó vượt qua mong đợi của tôi. Trang trí đẹp mắt và hương vị cực kỳ ngon!</p>
            </div>

            <div class="box">
                <div class="user">
                    <img src="Uploads/daidien3.jpg" alt="" width="200">
                    <div class="info">
                        <h3>Bảo Trân</h3>
                        <span>happy client</span>
                    </div>
                </div>
                <p>Bánh tươi ngon, ngọt vừa phải, kem mịn và nhẹ. Nó đã làm buổi tiệc của chúng tôi thêm phần đặc biệt.</p>
            </div>

            <div class="box">
                <div class="user">
                    <img src="Uploads/daidien4.jpg" alt="" width="200">
                    <div class="info">
                        <h3>Nhật Hoan</h3>
                        <span>happy client</span>
                    </div>
                </div>
                <p>Tôi đã thử nhiều tiệm bánh, nhưng nơi này nổi bật cả về chất lượng lẫn dịch vụ. Chắc chắn sẽ quay lại.</p>
            </div>

        </section>


        <!-- blog section start -->
         <div class="heading">
            <h1> Our Blogs</h1>
         </div>

         <section class="blogs">
            <h1 class="title"> Our <span> Blogs</span> <a href="#"> View All>></a> </h1>
            <div class="box-container">

                <div class="box">
                    <div class="img">
                        <img src="Uploads/anh36.jpg" alt=""width="300">
                    </div>
                    <div class="content">
                    <div class="icons">
                        <a href="#"> <i class="fa fa-calendar"></i> 22 june, 2023 </a>
                        <a href="#"> <i class="fa fa-user"></i> by administrator </a>
                    </div>
                    <h3>blogs title</h3>
                     <p>Discover the secrets to baking the perfect chocolate cake, with simple tips to create a rich and moist dessert that everyone will love!</p>
                    <a href="#" class="btn">Read More...</a>
                    </div>
                </div>

                <div class="box">
                    <div class="img">
                        <img src="Uploads/anh37.jpg" alt=""width="300">
                    </div>
                    <div class="content">
                    <div class="icons">
                        <a href="#"> <i class="fa fa-calendar"></i> 22 june, 2023 </a>
                        <a href="#"> <i class="fa fa-user"></i> by administrator </a>
                    </div>
                    <h3>blogs title</h3>
                    <p>Discover the secrets to baking the perfect chocolate cake, with simple tips to create a rich and moist dessert that everyone will love!</p>
                    <a href="#" class="btn">Read More...</a>
                    </div>
                </div>

                <div class="box">
                    <div class="img">
                        <img src="Uploads/anh38.jpg" alt="" width="300">
                    </div>
                    <div class="content">
                    <div class="icons">
                        <a href="#"> <i class="fa fa-calendar"></i> 22 june, 2023 </a>
                        <a href="#"> <i class="fa fa-user"></i> by administrator </a>
                    </div>
                    <h3>blogs title</h3>
                    <p>Explore five creative ways to use seasonal fruits in your baking, making your cakes and pastries fresh and flavorful.</p>
                    <a href="#" class="btn">Read More...</a>
                    </div>
                </div>

                <div class="box">
                    <div class="img">
                        <img src="Uploads/anh39.jpg" alt="" width="300">
                    </div>
                    <div class="content">
                    <div class="icons">
                        <a href="#"> <i class="fa fa-calendar"></i> 22 june, 2023 </a>
                        <a href="#"> <i class="fa fa-user"></i> by administrator </a>
                    </div>
                    <h3>blogs title</h3>
                    <p>Learn how to make gluten-free desserts that taste just as good as traditional recipes. Perfect for anyone with dietary restrictions!</p>
                    <a href="#" class="btn">Read More...</a>
                    </div>
                </div>

                <div class="box">
                    <div class="img">
                        <img src="Uploads/anh40.jpg" alt="" width="300">
                    </div>
                    <div class="content">
                    <div class="icons">
                        <a href="#"> <i class="fa fa-calendar"></i> 22 june, 2023 </a>
                        <a href="#"> <i class="fa fa-user"></i> by administrator </a>
                    </div>
                    <h3>blogs title</h3>
                    <p>Planning a party? Check out our ultimate guide to creating beautiful, show-stopping cakes that will impress all your guests.</p>
                    <a href="#" class="btn">Read More...</a>
                    </div>
                </div>

                <div class="box">
                    <div class="img">
                        <img src="Uploads/anh41.jpg" alt="" width="300">
                    </div>
                    <div class="content">
                    <div class="icons">
                        <a href="#"> <i class="fa fa-calendar"></i> 22 june, 2023 </a>
                        <a href="#"> <i class="fa fa-user"></i> by administrator </a>
                    </div>
                    <h3>blogs title</h3>
                    <p>If you love cheesecakes, you won't want to miss this recipe! Follow along as we craft a creamy, smooth cheesecake with a crispy crust.</p>
                    <a href="#" class="btn">Read More...</a>
                    </div>
                </div>

            </div>
         </section>


         <!--contect section start-->
         <div id="about-section1" class="heading">
            <h1>Contact Us</h1>
         </div>

         <section class="contact">
            <div class="icons-container">

                <div class="icons">
                    <i class="fas fa-phone"></i>
                    <h3>Our Number</h3>
                    <p>+111-222-3333</p>
                    <p>+456-777-7890</p>
                </div>

                <div class="icons">
                    <i class="fas fa-envelope"></i>
                    <h3>Our Email</h3>
                    <p>cakedelicous@gmail.com</p>
                    <p>abccake123@gmail.com</p>
                </div>

                <div class="icons">
                    <i class="fas fa-map"></i>
                    <h3>Our Address</h3>
                    <p>30 Tân Thắng, P. Sơn Kì, Q. Tân Phú, Tp HCM</p>
                </div>

            </div>

            <div class="row">
                <form action="">
                    <h3> get in touch </h3>
                    <div class="inputBox">
                    <input type="text" placeholder="enter your name" class="box">
                    <input type="text" placeholder="enter your email" class="box">
                </div>
                
                <div class="inputBox">
                    <input type="number" placeholder="enter your number" class="box">
                    <input type="text" placeholder="enter your subject" class="box">
                </div>
                <textarea placeholder="your message" cols="30" rows="10"></textarea>
                <input type="submit" value="send message" class="btn">




                </form>

            <iframe class="map" src="<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1302037687947!2d106.6179585!3d10.801338399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752b9535b60699%3A0x4737f3be8bd41d5b!2zw4ZPTiBNQUxMIFTDom4gUGjDug!5e0!3m2!1svi!2s!4v1729833111322!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
         </section>

            <div class="space"></div>

            <script>
                // Hiển thị phần đăng nhập/đăng ký khi bấm vào icon người dùng
                document.querySelector('#login-btn').onclick = () => {
                    document.querySelector('#login-register').scrollIntoView({ behavior: 'smooth' });
                };
                // Chuyển hướng đến trang đăng nhập/đăng ký
                document.querySelector('#login-btn').onclick = () => {
                    window.location.href = 'login-register.html'; // Đường dẫn đến trang mới
                };

            </script>               


            <!--footer section start-->
        
        <!--<section class="footer">
            <div  class="box-container">
                <div class="box">
                    <h3>quick links</h3>
                    <a href="#"> <i class="fas fa-arrow-right"></i> Home</a>
                    <a href="#"> <i class="fas fa-arrow-right"></i> Shop</a>
                    <a href="#"> <i class="fas fa-arrow-right"></i> About</a>
                    <a href="#"> <i class="fas fa-arrow-right"></i> Review</a>
                    <a href="#"> <i class="fas fa-arrow-right"></i> Blog</a>
                    <a href="#"> <i class="fas fa-arrow-right"></i> Contact</a>
                </div>
                <div class="box">
                    <h3>extra links</h3>
                    <a href="#"> <i class="fas fa-arrow-right"></i> my oder </a>
                    <a href="#"> <i class="fas fa-arrow-right"></i> my favorite </a>
                    <a href="#"> <i class="fas fa-arrow-right"></i> my wishlist </a>
                    <a href="#"> <i class="fas fa-arrow-right"></i> my account </a>
                    <a href="#"> <i class="fas fa-arrow-right"></i> term or use </a>
                </div>

                <div class="box">
                    <h3>newsletter</h3>
                    <p>subscribe for latest update</p>
                    <form action="">
                    <input type="email" placeholder="enter your email address">
                    <input type="submit" value="subscribe" class="btn">
                    </form>
                    <img src="Uploads/thanhtoan.jpg" class="payments" alt="">
                </div>



            </div>
         </section>-->






        <!-- Custom JS file link -->
        <script src="public/JS/main.js"></script>
        
        <script>    
            // Toggle navbar on menu button click
            let navbar = document.querySelector('.navbar');
            document.querySelector('#menu-btn').onclick = () => {
                navbar.classList.toggle('active');
            }

            // Close navbar on scroll
            window.onscroll = () => {
                navbar.classList.remove('active');
            }

            // Slide functionality
            let slides = document.querySelectorAll('.home .slides-container .slide');
            let index = 0;

            // Show the first slide by default
            slides[index].classList.add('active');

            function next() {
                slides[index].classList.remove('active'); // Hide current slide
                index = (index + 1) % slides.length; // Move to the next slide (loop back to first if at last slide)
                slides[index].classList.add('active'); // Show the next slide
            }

            function prev() {
                slides[index].classList.remove('active'); // Hide current slide
                index = (index - 1 + slides.length) % slides.length; // Move to the previous slide (loop back to last if at first slide)
                slides[index].classList.add('active'); // Show the previous slide
            }
        </script>
    <?php
		include 'footer.php';
	?>
</body>
</html>
