<?php
    include "../connectDb.php";
    $listproducts = getListAllProduct();
    if(!empty($_POST['sort-by-all'])){
        $listproducts = getListAllProduct();
    }
    
    if(!empty($_POST['sort-by-price'])){
        $listproducts = getListAllProductOrderByPrice();
    }
    if(!empty($_POST['sort-by-new']) || (!empty($_POST['optionParams'])&&$_POST['optionParams']=='newarrival')){
        
        $listproducts = getListAllProductOrderByNewest();
    }
    if(!empty($_POST['searchStr'])){
        $listproducts = getListAllProductBySearching($_POST['searchStr']);
    }
    if(!empty($_POST['optionParams'])&& $_POST['optionParams']=='burger'){
        $listproducts = getListAllProductByBurger();
    }
    else if(!empty($_POST['optionParams'])&& $_POST['optionParams']=='drink'){
        $listproducts = getListAllProductByDrink();
    }
    else if(!empty($_POST['optionParams'])&& $_POST['optionParams']=='kfc'){
        $listproducts = getListAllProductByKFC();
    }
    else if(!empty($_POST['optionParams'])&& $_POST['optionParams']=='sidedishes'){
        $listproducts = getListAllProductBySideDishes();
    }


?>
            
            <div class="products--list grid-product" >
             <?php if(!empty($listproducts)){
                    foreach($listproducts as $item){
                     ?>
                <div class="product--info">
                    <div class="img-product-review">
                        <a href="./productDetail.php?id=<?php echo $item['MSHH']?>">
                            <img src="../../../../PTPMTN/food-web2/Admin/image/upload/<?php echo $item['TenHinh'] ?>" alt="image"> 
                        </a>
                        
                                                     
                        <button class="btn_buy-product"><a href="checkout.php?id=<?php echo $item['MSHH'] ?>">Mua hàng</a></button>
                        <button class="btn_add-to-cart add-cart" onclick="ShowSuccessToast()" id-product="<?php echo $item['MSHH'] ?>"><i class="fas fa-cart-plus"></i></button> 
                    </div>
                        
                    <p class="name-product"><?php echo $item['TenHH'] ?></p>
                    <p>Giá: <span class="price-product-review"><?php echo $item['Gia'] ?> vnđ</span></p>
                </div>
            <?php  }} ?>
                
            </div>