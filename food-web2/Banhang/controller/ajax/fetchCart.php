<?php  
    include "../connectDb.php";
    session_start();
    $result=false;
    $array_listproduct=array();
    $remove_result = false;
    function DeleteFormCart($position){
        for($i=$position;$i<count($_SESSION['cart'])-1;$i++){
            $_SESSION['cart'][$i] = $_SESSION['cart'][$i+1];
        }
        unset($_SESSION['cart'][count($_SESSION['cart'])-1]);
    }
    if(!empty($_GET['removeBtn'])&&isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $key => $value){
            $s1 = $value['id_product'];
            $s2 = $_GET['product_remove'];
            $cmp = strcmp($s1,$s2);
            if($cmp==0)
            {
                DeleteFormCart($key);
                // for($i=$key;$i<count($_SESSION['cart'])-1;$i++){
                //     $_SESSION['cart'][$i] = $_SESSION['cart'][$i+1];
                // }
                // unset($_SESSION['cart'][count($_SESSION['cart'])-1]);
            }
        }
    }
    $user = array();
    $addressfetch = array();
    if(isset($_SESSION['user'])||!empty($_SESSION['user'])){
        $user = GetFullInfoUser($_SESSION['user']);
        $addressfetch = getAddressByUser($user['MSKH']);
    }

?>
        <?php if(!isset($_POST['CheckoutTrigger']) || $remove_result==true) { ?>
            <table class="table--cart">
                <tr class="table--cart__row">
                    <th class="header--table w-product">Product</th>
                    <th class="header--table cart-product-w-quantity">Quantity</th>
                    
                    <th class="header--table">Price</th>
                    <th class="header--table">SubTotal</th>
                    <th class="header--table">Choose</th>
                </tr>
                <?php if(!empty($_SESSION['cart'])){
                foreach($_SESSION['cart'] as $cart_item){ 
                    if($cart_item['id_product']!=null){
                    $id_product = $cart_item['id_product']; 
                    $product = getProductToFetchCart($id_product);
                    
                    ?>
                <tr>
                    <td class="cart--product">
                        <div class="cart--product__img">
                            <img src="../../../../PTPMTN/food-web2/Admin/image/upload/<?php echo $product[0]['TenHinh']?>" alt="" >
                        </div>
                        
                        <div class="cart--product__desc">
                            <p><?php echo $product[0]['TenHH'] ?></p>
                            <button href="#" class="remove-from-cart"trigger-remove="remove" id-product="<?php echo $product[0]['MSHH'] ?>">Remove</button>
                           
                        </div>
                    </td>
                    <td class="cart--quantity table-data-cart">
                            
                        <input type="number" value="1" name="quantity" id="quantity-<?php echo $product[0]['MSHH']?>" 
                                class="quantity-product-cart" id-product-number="<?php echo $product[0]['MSHH']?>" autocomplete = "off" min="1" max="<?php echo $product[0]['SoLuongHang']?>"value="1" > 
                        <p>C??n l???i: <?php echo $product[0]['SoLuongHang'] ?></p>
                    </td>
                    
                    <td class="cart--price table-data-cart">
                        <p id="price-<?php echo $product[0]['MSHH']?>" value="<?php echo $product[0]['Gia']?>"><?php echo $product[0]['Gia']?></p>
                    </td>
                    <td class="cart--subtotal table-data-cart">
                        <p type="number" class="subtotal" id="subtotal-<?php echo $product[0]['MSHH']?>" id-product-subtotal="<?php echo $product[0]['MSHH']?>"><?php echo $product[0]['Gia']?> </p>
                    </td>
                    <td class="cart--choose table-data-cart">
                        <input type="checkbox" value="1" class="check-cart" name="choose" id="choose" id-product-check="<?php echo $product[0]['MSHH']?>" checked="checked" >
                    </td>
                </tr>
                <?php }} ?>
                    <tr>
                        <td colspan="6">
                            <button class="checkout-all-in-cart btn-checkout-cart color-9" value="Thanh to??n">Thanh to??n</button>
                        </td>
                        
                    </tr>
                <?php }else if(empty($_SESSION['cart'])){ ?>
                    <tr>
                        <td rowspan="10" colspan="6" style="position: relative;">
                            <div class="emptycart-option">
                                <h3>B???n ch??a c?? s???n ph???m n??o trong gi???!</h3>
                                <button><a href="product.php">Shopping now!</a></button>
                            </div>
                            
                            <img src="./image/background/emptycart.jpg" alt="empty cart image">
                        </td>
                    </tr>

            <?php }?>

                
            </table>
            
            <div class="checkout" id="fetch-checkout-result">
                <div id="checkout">
                    
                    <div class="title-checkout">Thanh to??n</div>
                    <h3>Th??ng tin kh??ch h??ng</h3>
                    <form action="shoppingCart.php" method="POST"  name="cartform">
                    <?php if(empty($user)) {?>
                        <div class="form-row-checkout">
                            <label for="namecustomer">H??? t??n</label>
                            <input type="text" name="namecustomer" class="form-info-input-cart" required>
                        </div>
                        <br>
                        <div class="form-row-checkout">
                            <label for="phonenumber">S??? ??i???n tho???i</label required>
                            <input type="text" name="phonenumber"  class="form-info-input-cart">
                        </div>
                        <br>
                        <div class="form-row-checkout">
                            <label for="company">C??ng ty</label>
                            <input type="text" name="company"  class="form-info-input-cart">
                        </div>
                        <br>
                        <div class="form-row-checkout">
                            <label for="fax">s??? Fax</label>
                            <input type="text" name="fax"  class="form-info-input-cart">
                        </div>
                        <br>
                        <div class="form-row-checkout">
                            <label for="address">?????a ch???</label>
                            <!-- <select name="address" id="address">
                                <option value="An Giang" class="option-address">An Giang</option>
                            </select> -->
                            
                            <textarea name="address" id="address" cols="30" rows="5" class="form-info-input-cart w-input-9" required></textarea>
                        </div>
                        <?php }
                        else{ ?>
                            <div class="form-row-checkout">
                                <label for="namecustomer">H??? v?? t??n</label>
                                <input type="text" name="namecustomer" class="form-info-input-cart" value="<?php echo $user['HoTenKH'] ?>" required>
                            </div>
                            <br>
                            <div class="form-row-checkout">
                                <label for="phonenumber">S??? ??i???n tho???i</label required>
                                <input type="text" name="phonenumber"  class="form-info-input-cart" value="<?php echo $user['SoDienThoai'] ?>">
                            </div>
                            <br>
                            <div class="form-row-checkout">
                                <label for="company">T??n c??ng ty</label>
                                <input type="text" name="company"  class="form-info-input-cart" value="<?php echo $user['TenCongTy'] ?>">
                            </div>
                            <br>
                            <div class="form-row-checkout">
                                <label for="fax">S??? Fax</label>
                                <input type="text" name="fax"  class="form-info-input-cart" value="<?php echo $user['SoFax'] ?>">
                            </div>
                            <br>
                            <div class="form-row-checkout">
                                <label for="address">?????a ch???</label>
                                <select name="address" id="address" class="select-address">
                                    <option value="" class="option-address">Ch???n ?????a ch???</option>
                                    <?php if(!empty($addressfetch)){
                                        foreach($addressfetch as $item){
                                        ?>
                                        <option value="<?php echo $item['MaDC'] ?>" class="option-address"><?php echo $item['DiaChi'] ?></option>
                                    <?php }} ?>
                                </select>
                               
                            </div>
                        <?php } ?>
                        <br>
                        
                        <h3 id="order-info">Th??ng tin ????n h??ng</h3>
                        <div class="row row-justify-between list-checkout">
                            <p>T???m t??nh:</p>
                            <p>0</p>
                        </div>
                        
                       
                        
                        <div class="total-sum row row-justify-between">
                            <p>T???ng c???ng:</p>
                            <div class="price-total-checkout">
                                <p>0</p>
                                <p>???? bao g???m VAT(n???u c??)</p>
                            </div>
                        </div>
                        
                        <input type="submit" id="checkout-btn" name="checkout-btn" class="checkout-btn" value="X??c nh???n thanh to??n">
                    </form>
                    


                    
                    
                </div>
            </div>
            
        <?php }?>
            
            <?php if(!empty($_POST['CheckoutTrigger'])) {?>
                <div id="checkout">


                <div class="title-checkout">Thanh to??n</div>
                    <h3>Th??ng tin kh??ch h??ng</h3>
                    <form action="shoppingCart.php" method="POST">
                        <?php if(empty($user))  {?>
                        <div class="form-row-checkout">
                            <label for="namecustomer">H??? t??n</label>
                            <input type="text" name="namecustomer" class="form-info-input-cart" required>
                        </div>
                        <br>
                        <div class="form-row-checkout">
                            <label for="phonenumber">S??? ??i???n tho???i</label required>
                            <input type="text" name="phonenumber"  class="form-info-input-cart">
                        </div>
                        <br>
                        <div class="form-row-checkout">
                            <label for="company">C??ng ty</label>
                            <input type="text" name="company"  class="form-info-input-cart">
                        </div>
                        <br>
                        <div class="form-row-checkout">
                            <label for="fax">s??? Fax</label>
                            <input type="text" name="fax"  class="form-info-input-cart">
                        </div>
                        <br>
                        <div class="form-row-checkout">
                            <label for="address">?????a ch???</label>
                            <!-- <select name="address" id="address">
                                <option value="An Giang" class="option-address">An Giang</option>
                            </select> -->
                            <textarea name="address" id="address" cols="30" rows="5" class="form-info-input-cart w-input-9"></textarea>                     </div>
                        <?php }
                        else{ ?>
                            <div class="form-row-checkout">
                                <label for="namecustomer">H??? v?? t??n</label>
                                <input type="text" name="namecustomer" class="form-info-input-cart" value="<?php echo $user['HoTenKH'] ?>" required>
                            </div>
                            <br>
                            <div class="form-row-checkout">
                                <label for="phonenumber">S??? ??i???n tho???i</label required>
                                <input type="text" name="phonenumber"  class="form-info-input-cart" value="<?php echo $user['SoDienThoai'] ?>">
                            </div>
                            <br>
                            <div class="form-row-checkout">
                                <label for="company">T??n c??ng ty</label>
                                <input type="text" name="company"  class="form-info-input-cart" value="<?php echo $user['TenCongTy'] ?>">
                            </div>
                            <br>
                            <div class="form-row-checkout">
                                <label for="fax">S??? Fax</label>
                                <input type="text" name="fax"  class="form-info-input-cart" value="<?php echo $user['SoFax'] ?>">
                            </div>
                            <br>
                            <div class="form-row-checkout">
                                <label for="address">?????a ch???</label>
                                <select name="address" id="address" class="select-address">
                                    <option value="" class="option-address">Ch???n ?????a ch???</option>
                                    <?php if(!empty($addressfetch)){
                                        foreach($addressfetch as $item){
                                        ?>
                                        <option value="<?php echo $item['MaDC'] ?>" class="option-address"><?php echo $item['DiaChi'] ?></option>
                                    <?php }} ?>
                                </select>
                               
                            </div>


                        <?php  } ?>
                        <br>
                        
                        <h3 id="order-info">Th??ng tin ????n h??ng</h3>
                        <div class="row row-justify-between list-checkout">
                            <p>T???m t??nh:</p>
                            <p><?php echo $_POST['sumSubtotal']  ?></p>
                        </div>
                        <div class="row row-justify-between list-checkout">
                            <p>Gi???m gi??:</p>
                            <?php if(!empty($_SESSION['user'])){ ?>
                                <p>voucher gi???m gi?? 10%</p>
                            <?php }else {?>
                                <p><a href="login.php">????ng nh???p</a>/<a href="register.php">????ng k??</a> ngay ????? ???????c nh???n voucher</p>
                            <?php } ?>
                        </div>
                       
                        
                        <div class="total-sum row row-justify-between">
                            <p>T???ng c???ng:</p>
                            <div class="price-total-checkout">
                                <?php if(!empty($_SESSION['user'])){ ?>
                                    <p>
                                        <?php 
                                            $tmpsum = $_POST['sumSubtotal'];
                                            $sumsubtotal = $tmpsum - ceil($tmpsum*0.1);
                                            echo $sumsubtotal; 
                                        
                                        ?>
                                    </p>
                                <?php }else{ ?>
                                    <p><?php echo $_POST['sumSubtotal'] ?></p>
                                <?php } ?>
                                <p>???? bao g???m VAT(n???u c??)</p>
                            </div>
                        </div>
                        
                        <input type="hidden" name="tongia" value="<?php echo $_POST['sumSubtotal']?>">
                        <?php 
                        
                            $_SESSION['list_cart_checkout'] = $_POST['list_product']
                        
                        ?>
                        <input type="submit" id="checkout-btn" name="checkout-btn" class="checkout-btn" value="X??c nh???n thanh to??n">
                    </form>

                   
                </div>
            
            <?php } ?>