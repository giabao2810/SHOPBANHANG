<?php $__env->startSection('content'); ?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo e(URL::to('/')); ?>">Trang chủ</a></li>
				  <li class="active">Giỏ hàng của bạn</li>
				</ol>
			</div>
			  <?php if(session()->has('message')): ?>
                    <div class="alert alert-success">
                        <?php echo session()->get('message'); ?>

                    </div>
                <?php elseif(session()->has('error')): ?>
                     <div class="alert alert-danger">
                        <?php echo session()->get('error'); ?>

                    </div>
                <?php endif; ?>
			<div class="table-responsive cart_info">

				<form action="<?php echo e(url('/update-cart')); ?>" method="POST">
					<?php echo csrf_field(); ?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Tên sản phẩm</td>
							<td class="description">Số lượng tồn</td>
							<td class="price">Giá sản phẩm</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Thành tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php if(Session::get('cart')==true): ?>
						<?php
								$total = 0;
						?>
						<?php $__currentLoopData = Session::get('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php
								$subtotal = $cart['product_price']*$cart['product_qty'];
								$total+=$subtotal;
							?>

						<tr>
							<td class="cart_product">
								<img src="<?php echo e(asset('public/uploads/product/'.$cart['product_image'])); ?>" width="90" alt="<?php echo e($cart['product_name']); ?>" />
							</td>
							<td class="cart_description">
								<h4><a href=""></a></h4>
								<p><?php echo e($cart['product_name']); ?></p>
							</td>
							<td class="cart_description">
								<h4><a href=""></a></h4>
								<p><?php echo e($cart['product_quantity']); ?></p>
							</td>
							<td class="cart_price">
								<p><?php echo e(number_format($cart['product_price'],0,',','.')); ?>đ</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
								
									<input class="cart_quantity" type="number" min="1" name="cart_qty[<?php echo e($cart['session_id']); ?>]" value="<?php echo e($cart['product_qty']); ?>"  >
								
									
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
									<?php echo e(number_format($subtotal,0,',','.')); ?>đ
									
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="<?php echo e(url('/del-product/'.$cart['session_id'])); ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><input type="submit" value="Cập nhật giỏ hàng" name="update_qty" class="check_out btn btn-default btn-sm"></td>
							<td><a class="btn btn-default check_out" href="<?php echo e(url('/del-all-product')); ?>">Xóa tất cả</a></td>
							<td>
								<?php if(Session::get('coupon')): ?>
	                          	<a class="btn btn-default check_out" href="<?php echo e(url('/unset-coupon')); ?>">Xóa mã khuyến mãi</a>
								<?php endif; ?>
							</td>

							<td>
								<?php if(Session::get('customer_id')): ?>
	                          	<a class="btn btn-default check_out" href="<?php echo e(url('/checkout')); ?>">Đặt hàng</a>
	                          	<?php else: ?> 
	                          	<a class="btn btn-default check_out" href="<?php echo e(url('/dang-nhap')); ?>">Đặt hàng</a>
								<?php endif; ?>
							</td>

							
							<td colspan="2">
							<li>Tổng tiền :<span><?php echo e(number_format($total,0,',','.')); ?>đ</span></li>
							<?php if(Session::get('coupon')): ?>
							<li>
								
									<?php $__currentLoopData = Session::get('coupon'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($cou['coupon_condition']==1): ?>
											Mã giảm : <?php echo e($cou['coupon_number']); ?> %
											<p>
												<?php 
												$total_coupon = ($total*$cou['coupon_number'])/100;
												echo '<p><li>Tổng giảm:'.number_format($total_coupon,0,',','.').'đ</li></p>';
												?>
											</p>
											<p><li>Tổng đã giảm :<?php echo e(number_format($total-$total_coupon,0,',','.')); ?>đ</li></p>
										<?php elseif($cou['coupon_condition']==2): ?>
											Mã giảm : <?php echo e(number_format($cou['coupon_number'],0,',','.')); ?> k
											<p>
												<?php 
												$total_coupon = $total - $cou['coupon_number'];
								
												?>
											</p>
											<p><li>Tổng đã giảm :<?php echo e(number_format($total_coupon,0,',','.')); ?>đ</li></p>
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								


							</li>
							<?php endif; ?> 
						
							
							
						</td>
						</tr>
						<?php else: ?> 
						<tr>
							<td colspan="5"><center>
							<?php 
							echo 'Làm ơn thêm sản phẩm vào giỏ hàng';
							?>
							</center></td>
						</tr>
						<?php endif; ?>
					</tbody>

					

				</form>
					<?php if(Session::get('cart')): ?>
					<tr><td>

							<form method="POST" action="<?php echo e(url('/check-coupon')); ?>">
								<?php echo csrf_field(); ?>
									<input type="text" class="form-control" name="coupon" placeholder="Nhập mã giảm giá"><br>
	                          		<input type="submit" class="btn btn-default check_coupon" name="check_coupon" value="Tính mã giảm giá">
	                          	
                          		</form>
                          	</td>
					</tr>
					<?php endif; ?>

				</table>

			</div>
		</div>
	</section> <!--/#cart_items-->



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\tutorial_youtube\shopbanhanglaravel\resources\views/pages/cart/cart_ajax.blade.php ENDPATH**/ ?>