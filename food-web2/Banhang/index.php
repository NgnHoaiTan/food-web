<?php
    include "./controller/connectDb.php";
    session_start();
    $count=0;
    if(isset($_SESSION['cart'])){
        $count = count($_SESSION['cart']);
    }
    else{
        $count = 0;
    }
    $user = array();
    if(isset($_SESSION['user'])||!empty($_SESSION['user'])){
        $user = GetFullInfoUser($_SESSION['user']);
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Food</title>
    <!-- FONTICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- STYLE -->
    <link rel="stylesheet" href="./assets/base.css">
    <link rel="stylesheet" href="./assets/styles.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- SCRIPT -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body class="">
    <header>
        <div class="hero-image">
        <div class="navbar-top row-justify-between" id="navbar-top">
                <div class="row">
                    <div class="brand">
                        <img src="./image/Brando.png" alt="">
                    </div>
                   

                    <h1 id="brand-shop">GLAMOROUS</h1>
                    <ul class="navbar-list">
                        <li class="navbar-list-item">
                            <a href="index.php">Homepage</a>
                        </li>
                        <li class="navbar-list-item">
                            <a href="product.php">Food</a>
                        </li>
                        
                    </ul>
                </div>
                <div class="right-navbar">
                    <a id="addcart-nav" href="shoppingCart.php">
                        <p><i class="fas fa-shopping-bag icon-bag"></i><span style="font-size: 18px;">Cart</span></p>
                        <div id="notification-add-cart">
                            <p><?php echo $count ?></p>
                        </div>
                    </a>
                    <div class="user-navbar">
                        <?php if(!empty($user)){ ?>
                            <div class="avartar-user">
                                <div class="wrapper-avt">
                                    <img src="./image/user/<?php echo $user['Avatar'] ?>" alt="">
                                </div>
                                <i class="fas fa-sort-down"></i>
                                <ul class="list-option-user">
                                    <li><a href="profile.php">Profile</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </div>

                        <?php }else{ ?>
                            <a href="login.php" class="logout-option">Login</a>
                        <?php  }?>
                    </div>
                </div>
                
                
            </div>
            
            <div class="heroimage">
                <!-- <p class="text-in-heroimg">"Fashion is very important.
                     <br>It is life-enhancing and, like everything
                 <br> that gives pleasure, 
                     <br>it is worth doing well."
                    <br><span class="author-quote">– Vivienne Westwood</span>
                </p> -->
                <img src="./image/background/heroimage.jpg" alt="">
            </div>
            
        </div>
    </header>
    <div id="main">
       
        <div class="container body-main-padding">
        <div class="new-arrival">
                <div class="new-arrival-wrapper">
                    
                    <div class="slider-arrival">
                            <div class="slicker-item-arrival">
                                <img src="./image/sliderSlicker/slick1.jpg" alt="">
                            </div>
                            <div class="slicker-item-arrival">
                                <img src="./image/sliderSlicker/slick2.jpg" alt="">
                            </div>
                            <div class="slicker-item-arrival">
                                <img src="./image/sliderSlicker/slick3.jpg" alt="">
                            </div>
                            <div class="slicker-item-arrival">
                                <img src="./image/sliderSlicker/slick4.jpg" alt="">
                            </div>
                            
                            <div class="slicker-item-arrival">
                                <img src="./image/sliderSlicker/slick6.jpg" alt="">
                            </div>
                            <div class="slicker-item-arrival">
                                <img src="./image/sliderSlicker/slick7.jpg" alt="">
                            </div>
                            <div class="slicker-item-arrival">
                                <img src="./image/sliderSlicker/slick8.jpg" alt="">
                            </div> 
                            <div class="slicker-item-arrival">
                                <img src="./image/sliderSlicker/slick9.jpg" alt="">
                            </div>
                            
                        </div>
                    <button class="prev-item-arrival"><i class="fas fa-chevron-circle-left"></i></button>
                    <button class="next-item-arrival"><i class="fas fa-chevron-circle-right"></i></button>
                    <div class="arrival-title">
                        <h2>New Arrival</h2>
                    </div>
                   
                    <p>Explore the latest products in our collection</p>
                    <button class="btn-shop-now">
                        <div class="icon-btn-shopnow"><i class="fas fa-chevron-right"></i></div>
                        <span><a href="product.php?option=newarrival">Let's Go</a></span>
                    </button>
                    </div>
            </div>
            <div class="womens-fashion row" id="women-fashion">
                <div class="image-wrapper">
                    <img src="./image/background/burger.jpg" alt="">
                </div>
                <div class="blog-wrapper">
                    <p class="title-blog-women">Hamburger</p>
                    <p class="quote-women-fashion">Food for us comes from our relatives, whether they have wings or fins or roots. That is how we consider food. Food has a culture. It has a history. It has a story. It has relationships.</p>
                    <button class="btn-shop-now">
                        <div class="icon-btn-shopnow"><i class="fas fa-chevron-right"></i></div>
                        <span><a href="product.php?option=burger">Buy now</a></span>
                    </button>      
                </div>
                

            </div>
            <div class="men-fashion row" id="men-fashion">
                <div class="blog-wrapper">
                    <p class="title-blog-women">KFC</p>
                    <p class="quote-women-fashion">A recipe has no soul. You, as the cook, must bring soul to the recipe.</p>
                    <button class="btn-shop-now">
                        <div class="icon-btn-shopnow"><i class="fas fa-chevron-right"></i></div>
                        <span><a href="product.php?option=kfc">Buy now</a></span>
                    </button>    
                </div>
                <div class="image-wrapper image-wrapper-men">
                    <img src="./image/background/kfc.jpg" alt="">
                </div>
                
            </div>
            <div class="womens-fashion row" id="women-fashion">
                <div class="image-wrapper">
                    <img src="./image/background/subfood.jpg" alt="">
                </div>
                <div class="blog-wrapper">
                    <p class="title-blog-women">Side dishes</p>
                    <p class="quote-women-fashion">My weaknesses have always been food and men – in that order.</p>
                    <button class="btn-shop-now">
                        <div class="icon-btn-shopnow"><i class="fas fa-chevron-right"></i></div>
                        <span><a href="product.php?option=sidedishes">Buy now</a></span>
                    </button>      
                </div>
            </div>
            <div class="men-fashion row" id="men-fashion">
                <div class="blog-wrapper">
                    <p class="title-blog-women">Drink</p>
                    <p class="quote-women-fashion">I know once people get connected to real food, they never change back.</p>
                    <button class="btn-shop-now">
                        <div class="icon-btn-shopnow"><i class="fas fa-chevron-right"></i></div>
                        <span><a href="product.php?option=drink">Buy now</a></span>
                    </button>    
                </div>
                <div class="image-wrapper image-wrapper-men">
                    <img src="./image/background/milo.jpg" alt="">
                </div>
                
            </div>
        </div>
       
        <?php if(!isset($_SESSION['user'])||empty($_SESSION['user'])){ ?>
        <div class="modal-popup-login hidden-modal" id="modal-login">

            <div class="heroimg-modal">
                <img src="./image/background/modal_food.jpg" alt="">
            </div>
            <div class="info-modal">
                <h2 class="title-info-modal">Don't Miss Out</h2>
                <p class="des-info-modal">Signup to receive <br>Take 20% off your first purchase</p>
                <div class="cirle-sale">
                    <p>10%<br> 
                    <span>Sale Off</span></p>
                </div>
                <button class="btn-redirect-signup"><a href="register.php">SIGN UP NOW</a></button>
                <p class="des-info-modal">Has an account ?</p>
                <button class="btn-redirect-login">
                    <a href="login.php">LOGIN NOW</a>                  
                </button>
            </div>
            <div class="close-modal">
                <i class="far fa-times-circle" id="close-modal"></i>
            </div>
        </div>
        <?php } ?>
        
        <script>
             window.onload = function(){
                    setTimeout(function(){
                    var modal = document.getElementById('modal-login');
                    modal.className = modal.className.replace("hidden-modal","");
                    modal.className +=" show-modal";
                    modal.style.display="grid";
                    document.body.style.display="hidden";         
                    var closeModal = document.getElementById('close-modal');
                    closeModal.onclick = function(){
                        var modalTarget = closeModal.closest('.modal-popup-login');
                        modalTarget.className = modalTarget.className.replace("show-modal","");
                        modalTarget.className+=" hidden-modal";
                        modalTarget.style.display="none";
                        document.body.style.display="initial";
                        
                        }
                    },3000)
                }
                               
                    
            
        </script>
        
    </div>
    <footer class="footer">
        <div class="brand-footer">
            <div class="wrapper-brand-footer">
                <img src="./image/Brando.png" alt="">
            </div>  
        </div>
        
    </footer>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js">       
    </script>
    
    <script type="text/javascript">
        $('.slider-arrival').slick({
            autoplay: true,
            autoplaySpeed: 3000,
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 5,
            arrows: true,
            prevArrow:$('.prev-item-arrival'),
            nextArrow:$('.next-item-arrival')
           
        });
    </script>
    <script>
        const navbar = document.getElementById('navbar-top')
        let lastScroll = 0;
        window.addEventListener('scroll',function(){
            const currentScroll = window.pageYOffset;
            if(currentScroll <=0){

            }
            if(currentScroll > lastScroll && !navbar.classList.contains('scroll-down')){
                navbar.classList.remove('scroll-up');
                navbar.classList.add('scroll-down');
            }
            if(currentScroll < lastScroll && !navbar.classList.contains('scroll-up')){
                navbar.classList.remove('scroll-down');
                navbar.classList.add('scroll-up');
            }
            lastScroll = currentScroll;
        })
    </script>
    <script>
        const menfashion = document.getElementById('men-fashion');
        const womenfashion = document.getElementById('women-fashion');
        window.addEventListener('scroll',function(){
            const currentScroll = window.pageYOffset;
            const menfashionY = menfashion.offsetTop;
            const womenfashionY = womenfashion.offsetTop;

            const menfashionheight = menfashion.offsetHeight;
            const womenfashionheight = womenfashion.offsetHeight;
            
            const positionMen = menfashionY - menfashionheight;
            const positionWomen = womenfashionY  - womenfashionheight;
            if(currentScroll >= positionMen - 150){
                menfashion.classList.add('appear-scroll');
            }
            
            if(currentScroll >= positionWomen - 80){
                //console.log(positionWomen)
                womenfashion.classList.remove('hide');
                womenfashion.classList.add('appear-scroll');
            }
            else{
                womenfashion.classList.add('hide');
            }
        })
    </script>
</body>
</html>