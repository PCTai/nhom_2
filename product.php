<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from sanpham where maSanPham='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select sanpham.*,danhmuc.tenDanhMuc as tenDanhMuc from sanpham,danhmuc where sanpham.maDanhMuc=danhmuc.maDanhMuc order by sanpham.maSanPham desc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Sản phẩm </h4>
				   <h4 class="box-link"><a href="manage_product.php">thêm</a> </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>Mã sản phẩm</th>
							   <th>Danh Mục</th>
							   <th>Tên sản phẩm</th>
							   <th>Ảnh</th>
							   <th>Giá</th>
							   <th>số lượng</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $i?></td>
							   <td><?php echo $row['maSanPham']?></td>
							   <td><?php echo $row['tenDanhMuc']?></td>
							   <td><?php echo $row['tenSanPham']?></td>
							   <td><img src="<?php echo $row['anh']?>" alt=""></td>
							   <td><?php echo $row['gia']?></td>
							   <td><?php echo $row['soLuong']?></td>
							   <td>
								<?php
								
								echo "<span class='badge badge-edit'><a href='manage_product.php?id=".$row['maSanPham']."'>Chỉnh sửa</a></span>&nbsp;";
								
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['maSanPham']."'>Xóa</a></span>";
								
								?>
							   </td>
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.inc.php');
?>