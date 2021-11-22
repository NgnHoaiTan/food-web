<?php
include "../connectDb.php";

    //get admin
    session_start();
    $error='';
    $admin=array();
    if(!empty($_SESSION['admin'])){
        $adminname = $_SESSION['admin'];
        $admin = getFullInfoAdmin($adminname);
    }

    $result_fetch=false;
    $approve=false;

    if(!empty($_POST['btnApprove'])){
        $id_order = isset($_POST['id-order']) ? $_POST['id-order'] :"";
        $state = 1;
        $staff = isset($_POST['staff']) ? $_POST['staff'] :"";
        $ngaygh = date("Y-m-d");
        $approve = ApproveOrder($id_order,$state,$staff,$ngaygh);
        
    }

    $orderlist=array();
    $orderlist = getAllOrder();

    
?>

<?php  if(empty($orderlist)) { ?>
            <tr class="table-row table-top-header">
                        <th>Mã Đơn</th>
                        <th>Mã khách hàng</th>
                        <th>Nhân viên duyệt</th>
                        <th>Ngày đặt</th>
                        <th>Ngày giao</th>
                        <th>Trạng Thái</th>
                        <th>Tùy chọn</th>    
            </tr>
            <tr class="table-row">
                        <td colspan="7" rowspan="10" class="table-data-empty">
                            <div id="img-notfound-data">
                                <h3>Hiện bạn chưa có đơn hàng nào</h3>
                                <img src="../../image/background/findimg.jpg" alt="">
                            </div>
                        </td> 
            </tr>

<?php  }else if(!empty($orderlist) || $approve){ ?>
            <tr class="table-row table-top-header">
            <th>Mã Đơn</th>
                        <th>Mã Khách hàng</th>
                        <th>Nhân viên duyệt</th>
                        <th>Ngày đặt</th>
                        <th>Ngày giao</th>
                        <th>Trạng Thái</th>
                        <th>Tùy chọn</th>    
            </tr>
            <?php foreach($orderlist as $item){ ?>
            <tr class="row-order">
                <td><?php echo $item['SoDonDH'] ?></td>
                <td><?php echo $item['MSKH'] ?></td>
                <td><?php 
                    if(!empty($item['MSNV'])){
                        $staff = GetAdminById($item['MSNV']);
                        echo $staff['HoTenNV'] ;
                    }else{
                        echo "Chưa xác định";
                    }?>
                </td>
                <td><?php echo $item['NgayDH'] ?></td>
                <td>
                    <?php
                        if(!empty($item['NgayGH'])) {
                            echo $item['NgayGH'] ; 
                        }else{
                            echo "Chưa xác định";
                        }
                    
                    
                    ?>
            
                </td>
                <td>    
                    <?php
                        if($item['TrangThaiDH']) {
                            echo "Đã duyệt" ;
                        }else{
                            echo "Chưa duyệt";
                        }
                    ?>
                   
                </td>
                <td>
                    <div class="wrapper-btn-approve">
                        <?php if($item['TrangThaiDH']==0) {?>
                            <button class="approve-order approvebtn" id="<?php echo $item['SoDonDH'] ?>" staff="<?php echo $admin['MSNV'] ?>">Duyệt đơn</button>
                        <?php }else {?>
                            <button class="approved-order approvebtn" id="<?php echo $item['SoDonDH'] ?>" staff="<?php echo $admin['MSNV'] ?>">Đã duyệt</button>
                        <?php } ?>
                    </div>
                    
                    <button class="view-order"><a href="orderDetail.php?orderid=<?php echo $item['SoDonDH'] ?>">Xem</a></button>
                </td>
            </tr>
            <?php  } ?>



<?php } ?>
