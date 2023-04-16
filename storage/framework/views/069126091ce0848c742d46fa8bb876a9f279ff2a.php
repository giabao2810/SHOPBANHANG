<?php $__env->startSection('content'); ?>

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo e(URL::to('/')); ?>">Trang chủ</a></li>
				  <li class="active">Thanh toán giỏ hàng</li>
				</ol>
			</div>

			<div class="register-req">
				<p>Làm ơn đăng ký hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử mua hàng</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Điền thông tin gửi hàng</p>
							<div class="form-one">
								<form method="POST">
									<?php echo csrf_field(); ?>
									<input type="text" name="shipping_email" class="shipping_email" placeholder="Điền email">
									<input type="text" name="shipping_name" class="shipping_name" placeholder="Họ và tên người gửi">
									<input type="text" name="shipping_address" class="shipping_address" placeholder="Địa chỉ gửi hàng">
									<input type="text" name="shipping_phone" class="shipping_phone" placeholder="Số điện thoại">
									<textarea name="shipping_notes" class="shipping_notes" placeholder="Ghi chú đơn hàng của bạn" rows="5"></textarea>
									
									<?php if(Session::get('fee')): ?>
										<input type="hidden" name="order_fee" class="order_fee" value="<?php echo e(Session::get('fee')); ?>">
									<?php else: ?> 
										<input type="hidden" name="order_fee" class="order_fee" value="10000">
									<?php endif; ?>

									<?php if(Session::get('coupon')): ?>
										<?php $__currentLoopData = Session::get('coupon'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<input type="hidden" name="order_coupon" class="order_coupon" value="<?php echo e($cou['coupon_code']); ?>">
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php else: ?> 
										<input type="hidden" name="order_coupon" class="order_coupon" value="no">
									<?php endif; ?>
									
									
									
									<div class="">
										 <div class="form-group">
		                                    <label for="exampleInputPassword1">Chọn hình thức thanh toán</label>
		                                      <select name="payment_select"  class="form-control input-sm m-bot15 payment_select">
		                                            <option value="0">Qua chuyển khoản</option>
		                                            <option value="1">Tiền mặt</option>   
		                                    </select>
		                                </div>
									</div>
									<input type="button" value="Xác nhận đơn hàng" name="send_order" class="btn btn-primary btn-sm send_order">
								</form>
								<form>
                                    <?php echo csrf_field(); ?> 
                             
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn thành phố</label>
                                      <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                                    
                                            <option value="">--Chọn tỉnh thành phố--</option>
                                        <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ci): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($ci->matp); ?>"><?php echo e($ci->name_city); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn quận huyện</label>
                                      <select name="province" id="province" class="form-control input-sm m-bot15 province choose">
                                            <option value="">--Chọn quận huyện--</option>
                                           
                                    </select>
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn xã phường</label>
                                      <select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
                                            <option value="">--Chọn xã phường--</option>   
                                    </select>
                                </div>
                               
                               
                              	<input type="button" value="Tính phí vận chuyển" name="calculate_order" class="btn btn-primary btn-sm calculate_delivery">


                                </form>

							</div>
							
						</div>
					</div>
					<div class="col-sm-12 clearfix">
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
														
															?>
														</p>
														<p>
														<?php 
															$total_after_coupon = $total-$total_coupon;
														?>
														</p>
													<?php elseif($cou['coupon_condition']==2): ?>
														Mã giảm : <?php echo e(number_format($cou['coupon_number'],0,',','.')); ?> k
														<p>
															<?php 
															$total_coupon = $total - $cou['coupon_number'];
														
															?>
														</p>
														<?php 
															$total_after_coupon = $total_coupon;
														?>
													<?php endif; ?>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											
											

										</li>
										<?php endif; ?>

										<?php if(Session::get('fee')): ?>
										<li>	
											<a class="cart_quantity_delete" href="<?php echo e(url('/del-fee')); ?>"><i class="fa fa-times"></i></a>

											Phí vận chuyển <span><?php echo e(number_format(Session::get('fee'),0,',','.')); ?>đ</span></li> 
											<?php $total_after_fee = $total + Session::get('fee'); ?>
										<?php endif; ?> 
										<li>Tổng còn:
										<?php 
											if(Session::get('fee') && !Session::get('coupon')){
												$total_after = $total_after_fee;
												echo number_format($total_after,0,',','.').'đ';
											}elseif(!Session::get('fee') && Session::get('coupon')){
												$total_after = $total_after_coupon;
												echo number_format($total_after,0,',','.').'đ';
											}elseif(Session::get('fee') && Session::get('coupon')){
												$total_after = $total_after_coupon;
												$total_after = $total_after + Session::get('fee');
												echo number_format($total_after,0,',','.').'đ';
											}elseif(!Session::get('fee') && !Session::get('coupon')){
												$total_after = $total;
												echo number_format($total_after,0,',','.').'đ';
											}

										?>
										</li>
										
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
									
				</div>
			</div>
		

			
			
		</div>
	</section> <!--/#cart_items-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\tutorial_youtube\shopbanhanglaravel\resources\views/pages/checkout/show_checkout.blade.php ENDPATH**/ ?>