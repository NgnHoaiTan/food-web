<?php
include "../connectDb.php";
$accountadmin;
$admininfo;
session_start();
if(isset($_SESSION['admin'])){
    $adminname = $_SESSION['admin'];
    $admininfo = getFullInfoAdmin($adminname);
    
}
else{
    header("location:../../login.php");
}
if(!empty($_GET['orderid'])){
    $orderid = $_GET['orderid'];
    $order = getOrderById($orderid);
    $orderDetail = getOrderDetailById($orderid);
    
    $customer = getCustomerById($order['MSKH']);
    $product = getProductByIdWithImage($orderDetail['MSHH']);
    
    $address  = getAddressOrder($orderDetail['MaDC']);
    $staff = array();
    if(!empty($order['MSNV'])){
        $staff = GetAdminById($order['MSNV']); 
    }
    
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
     <!-- FONT -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500;600&display=swap" rel="stylesheet">

    <!-- FONT ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- SCRIPT -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- STYLE -->
    <link rel="stylesheet" href="../../assets/base.css">
    <link rel="stylesheet" href="../../assets/styles.css">
</head>
<body>
<div class="container row">
        <div class="navbar--side">
            <div class="navbar-side-container">
                <h2>Admin</h2>
                <ul class="navbar--list">
                    <li class="navbar--items">
                        <a href="../../index.php" class="nav-items-link"><i class="fas fa-home"></i>Trang chủ</a>
                    </li>
                    <li class="navbar--items">
                        <a href="../product/listProduct.php" class="nav-items-link"><i class="fas fa-tshirt product-logo"></i>Quản lí sản phẩm</a>
                    </li>
                    <li class="navbar--items">
                        <a href="listOrder.php"class="nav-items-link"><i class='bx bx-shopping-bag'></i>Quản lí đơn đặt hàng</a>
                    </li>
                    <li class="navbar--items">
                        <a href="../category/category.php"class="nav-items-link"><i class="fas fa-tasks"></i>Danh mục thể loại</a>
                    </li>
                    <li class="navbar--items">
                        <a href="../customer/listCustomer.php"class="nav-items-link"><i class='bx bx-group'></i>Khách hàng</a>
                    </li>
                    <?php if(!empty($_SESSION['admin']) && isset($_SESSION['admin'])) {?>
                    <li class="navbar--items">
                        <a href="../../logout.php"class="nav-items-link"><i class='bx bx-group'></i>Logout</a>
                    </li>
                    <?php }else { ?>
                    <li class="navbar--items">
                        <a href="../../login.php"class="nav-items-link"><i class='bx bx-group'></i>Login</a>
                    </li>
                    <?php } ?>
                    
                </ul>
            </div>
    </div>
    
    <div class="wrapper">
        <div class="top--wrapper">
            <div class="navbar--top">
                
                <div class="navbar--top__admin">
                    <?php if(!empty($admininfo)) { ?>
                        <p><?php echo $admininfo['HoTenNV'] ?></p>    
                    <?php  } else{ ?> 
                        <p>Nguyen Hoai Tan</p>    
                    <?php  } ?>  
                    <div class="wrapper_avtadmin">
                        <img src="../../image/background/admin.png" class="avtadmin"alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="main-wrapper">
            <?php if(!empty($_GET['orderid'])){ ?>
            <div class="grid-display-order">
                <div class="grid-col-customer">
                    <h3>Khách hàng</h3>
                    <p>Họ và tên: <?php echo $customer['HoTenKH'] ?> - Số điện thoại giao hàng: <?php echo $orderDetail['SoDienThoai'] ?></p>
                    <p>Địa chỉ giao hàng: <?php 
                        if(!empty($address['DiaChi'])){
                            echo $address['DiaChi'] ;
                        }else{
                            echo "Trống";
                        }
                        ?>
                        
                    </p>
                </div>
                <div class="grid-col-staff">
                    <h3>Nhân viên duyệt</h3>
                    <p>Họ và tên: <?php if(!empty($staff)){     
                            echo $staff['HoTenNV'];
                        }else{
                            echo "Chưa xác định";
                        }
                        
                       ?></p>
                    <p>Số điện thoại: <?php if(!empty($staff)){
                        echo $staff['SoDienThoai'];
                     }else{
                         echo "Chưa xác định";
                     } ?></p>

                    
                </div>

            </div>
            <div class="grid-row-product">
                    <h3>Thông tin sản phẩm đặt</h3>
                    <div class="row">
                        <div class="wrapper-img-product_order">
                            <img src="../../image/upload/<?php echo $product['TenHinh'] ?>" alt="">
                        </div>
                        <div class="description-product_order">
                            <p>Tên sản phẩm: <?php echo $product['MSHH'] ?></p>
                            <p>Mã đơn: <?php echo $order['SoDonDH'] ?></p>
                            <p>Số lượng đặt: <?php echo $orderDetail['SoLuong'] ?></p>
                            <p>Đơn giá: <?php echo $product['Gia'] ?></p>
                            <p>Giảm giá: <?php echo $orderDetail['GiamGia'] ?>%</p>
                            <p>Tổng thanh toán: <?php echo $orderDetail['GiaDatHang'] ?></p>
                            <p>Trạng thái: 
                                <?php  
                                    if($order['TrangThaiDH']){
                                        echo "Đã duyệt";
                                    }
                                    else{
                                        echo "Chưa duyệt";
                                    }
                                ?></p>
                            <p>Ngày đặt hàng: 
                                <?php 
                                    if(!empty($order['NgayDH'])){
                                        echo $order['NgayDH'];
                                    }
                                ?>

                            </p>
                            <p>Ngày giao hàng: 
                                <?php 
                                    if(!empty($order['NgayGH'])){
                                        echo $order['NgayGH'];

                                    }
                                    else{
                                        echo "Chưa duyệt đơn";
                                    }
                                ?>

                            </p>
                        </div>
                    </div>
                    
            </div>
            <div>
                <div class="approve-orderdetail">
                    <?php if(!$order['TrangThaiDH']) {?>
                        <button class="approve-order-detail approvebtn" id="<?php echo $order['SoDonDH'] ?>" staff="<?php echo $admininfo['MSNV'] ?>">Duyệt đơn</button>
                    <?php }else{ ?>
                        <button class="approve-order-detail">Đã duyệt</button>
                    <?php } ?>
                </div>
            </div>
            
            
            <?php }else{ ?>

            <?php } ?>


        </div>
        <script>
             $(document).on('click','.approvebtn',function(){
                var id_order = $(this).attr('id');
                var staff = $(this).attr('staff');
                console.log(staff);
                $.ajax({
                    url:'fetch_order.php',
                    type:"post",
                    data:{
                        'id-order':id_order,
                        'btnApprove':'approve',
                        'staff':staff,
                    },
                    success:function(){
                        window.location.reload();
                    },
                })
            })  
        </script>
</body>
</html>