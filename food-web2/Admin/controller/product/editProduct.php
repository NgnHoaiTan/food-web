<?php
    require ("../connectDb.php");
    $accountadmin;
    $admininfo;
    session_start();
    if(isset($_SESSION['admin'])){
        $adminname = $_SESSION['admin'];
        $admininfo = getFullInfoAdmin($adminname);
        
    }
    else{
        header("location:login.php");
    }
    
    $data = array();
    $product;
    $categories = getAllCategories();
    $Main_Images;
    $Images;
    if(!empty($_GET['edit_product'])){
        $data['id_product'] = isset($_GET['id_product']) ? $_GET['id_product'] : "";
        $product = getProductById($data['id_product']);
        $Images = getAnotherImage($data['id_product']);
        $Main_Images = getImageMain($data['id_product']);
        
    }


?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <!-- FONT ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- STYLE -->
    <link rel="stylesheet" href="../../assets/base.css">
    <link rel="stylesheet" href="../../assets/styles.css">
    <!-- SCRIPT -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- <script src="../src/ckeditor.js"></script> -->
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
</head>
<body>
<div class="container row">
        <div class="navbar--side">
            <div class="navbar-side-container">
                <h2>Admin</h2>
                <ul class="navbar--list">
                    <li class="navbar--items">
                        <a href="../../index.php" class="nav-items-link"><i class="fas fa-home"></i>Trang ch???</a>
                    </li>
                    <li class="navbar--items">
                        <a href="" class="nav-items-link"><i class="fas fa-tshirt product-logo"></i>Qu???n l?? s???n ph???m</a>
                    </li>
                    <li class="navbar--items">
                        <a href="../product/listProduct.php"class="nav-items-link"><i class='bx bx-shopping-bag'></i>Qu???n l?? ????n ?????t h??ng</a>
                    </li>
                    <li class="navbar--items">
                        <a href="../category/category.php"class="nav-items-link"><i class="fas fa-tasks"></i>Danh m???c th??? lo???i</a>
                    </li>
                    <li class="navbar--items">
                        <a href="../customer/listCustomer.php"class="nav-items-link"><i class='bx bx-group'></i>Kh??ch h??ng</a>
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
        <!-- <div class="top--wrapper">
            <div class="navbar--top">
                 <div class="navbar--top__search">
                    <input type="text" name="search" id="search">
                    <button class="btn btn--search">T??m t??n s???n ph???m</button>
                </div> -->
                <!-- <div class="navbar--top__admin">
                    <p>Nguyen Hoai Tan</p>     
                    <i class="fas fa-user-tie logo-admin"></i>
                </div>
            </div>
        </div> -->
        <div class="main--wrapper__editproduct">
            <div id="result-edit-product">
            <form action="editProduct.php" method="POST" class="form--addproduct" id="form-edit-product" enctype="multipart/form-data">
                <h2>C???p nh???t s???n ph???m</h2>
                
                <div class="row-spacing">
                    <label for="">M?? s???n ph???m</label>
                    <input type="text" name="idproduct" id="idproduct" value="<?php echo $product['MSHH'] ?>" class="input--addproduct" readonly>
                </div>
                <div class="row-spacing">
                    <label for="">T??n s???n ph???m</label>
                    <input type="text" name="nameproduct" value="<?php echo $product['TenHH'] ?>" id="nameproduct" class="input--addproduct" >
                </div>
                <div class="row-spacing">
                    <label for="">Th??? lo???i</label>             
                    <select name="category" id="category">
                        <?php foreach($categories as $category) { ?>
                            <option value="<?php echo $category['MaLoaiHang'] ?>"><?php echo $category['TenLoaiHang'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <!-- <div class="row-spacing">
                    <label for="">H??ng s???n xu???t</label>                
                    <select name="brand" id="brand">
                        <option value="H??ng 1">H??ng 1</option>
                        <option value="H??ng 2">H??ng 2</option>
                        <option value="H??ng 3">H??ng 3</option>
                        <option value="H??ng Kh??c">Kh??c</option>
                    </select>
                </div> -->
                <div class="row-spacing">
                    <label for="">Gi??</label>
                    <input type="text" name="price" id="price"value="<?php echo $product['Gia'] ?>"  class="input--addproduct" >
                </div>
                <div class="row-spacing">
                    <label for="">Gi???m gi??</label>
                    <input type="text" name="discount" id="discount" class="input--addproduct" >
                </div>
                <div class="row-spacing">
                    <label for="">S??? l?????ng h??ng</label>
                    <input type="text" name="quantity" id="quantity"value="<?php echo $product['SoLuongHang'] ?>" >
                </div>
                
                <div class="row-spacing">
                    <label for="description">M?? t??? s???n ph???m</label>
                    <textarea name="description" id="description" cols="30" rows="10"><?php echo $product['QuyCach'] ?></textarea>
                </div>
                <div class="row-spacing ">
                    <label for="">???nh ?????i di???n s???n ph???m</label>
                    <div class="main-img-product ">
                        <?php foreach($Main_Images as $mimg){ ?>
                            <div class="show-main-img">
                                <img src="../../image/upload/<?php echo $mimg['TenHinh'] ?>" Mahinh="<?php echo $mimg['MaHinh'] ?>" class="img-product-review">
                                <button class="btn-deleteimg" name="deleteimg" trigger="X??a" id-image="<?php echo $mimg['MaHinh'] ?>" id-product="<?php echo $product['MSHH'] ?>">X??a</button>
                            </div>
                            
                        <?php } ?>
                    </div>
                </div>


                <div class="row-spacing img-product-bgcolor">
                    <label for="">M???t s??? ???nh s???n ph???m kh??c</label>
                    <div class="img-product grid-container ">
                        <?php foreach($Images as $img){ ?>
                            <div class="show-img">
                                <img src="../../image/upload/<?php echo $img['TenHinh'] ?>" Mahinh="<?php echo $img['MaHinh'] ?>" class="img-product-review">
                                <button class="btn-deleteimg" name="deleteimg" trigger="X??a" id-image="<?php echo $img['MaHinh'] ?>" id-product="<?php echo $product['MSHH'] ?>">X??a</button>
                
                            </div>
                            
                            
                        <?php } ?>
                    </div>
                </div>

                
                <div class="row-spacing img-product-bgcolor">
                    <label for="updatefileavt">Th??m ???nh ?????i di???n</label>
                    <input type="file" name="updatefileavt" id="editMImage" >
                    
                </div>
                <div class="row-spacing img-product-bgcolor">
                    <label for="updatefileimg[]">Th??m ???nh s???n ph???m</label>
                    <input type="file" name="updatefileimg[]" id="editImage" multiple>
                </div>
                <br>  
                <button class="goback-btn" onclick="goBack()">Tr??? v???</button>
                <input type="submit" class="submit-edit-product" name='submit-edit-product'value="L??u">
                 
            </form>
            </div>
            <script>
                function goBack(){
                    window.history.back();
                }
            </script>
           
            
        </div>
        <script>
                ClassicEditor
                    .create( document.querySelector( '#description' )
                    , {
					
                    toolbar: {
                        items: [
                            'heading',
                            '|',
                            'bold',
                            'italic',
                            'link',
                            'bulletedList',
                            'numberedList',
                            '|',
                            'outdent',
                            'indent',
                            '|',
                            'imageUpload',
                            'blockQuote',
                            'insertTable',
                            'mediaEmbed',
                            'undo',
                            'redo'
                        ]
                    },
                    language: 'vi',
                    image: {
                        toolbar: [
                            'imageTextAlternative',
                            'imageStyle:inline',
                            'imageStyle:block',
                            'imageStyle:side'
                        ]
                    },
                    table: {
                        contentToolbar: [
                            'tableColumn',
                            'tableRow',
                            'mergeTableCells'
                        ]
                    },
                        licenseKey: '',    
                    } )
                    .then( editor => {
                        window.editor = editor;    
                    }
                    )                   
                    .catch( error => {
                        console.error( error );
                } );
               
            </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(document).on('click','.submit-edit-product',function(e){
                    e.preventDefault();
                    var formData = new FormData($('#form-edit-product')[0])
                    $.ajax({
                        url:"./ajaxHandle/ajax_edit.php",
                        type:"POST",                       
                        data: formData,
                        contentType:false,
                        processData:false,
                        success: function(result){    
                            $('#result-edit-product').html(result);
                            console.log('success edit');                           
                        }
                    })
                })
                $(document).on('click','.btn-deleteimg',function(e){
                    e.preventDefault();
                    var id_image = $(this).attr('id-image');
                    var id_product = $(this).attr('id-product');
                    var deletebtn = $(this).attr('trigger');
                    console.log('delete image '+id_image);
                    console.log(deletebtn);
                    $.ajax({
                        url:'./ajaxHandle/ajax_edit.php',
                        type:'post',
                        data:{
                            'id_image':id_image,
                            'triggerDel':deletebtn,
                            'id_product--delimg':id_product,
                        },
                        success:function(result){
                            $('#result-edit-product').html(result);
                        }
                    })
                })

            })
        </script>
        
    </div>
    </div>
</body>

</html>