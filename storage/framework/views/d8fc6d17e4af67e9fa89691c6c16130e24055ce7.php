<?php $__env->startSection('content'); ?>
<?php $__currentLoopData = $product_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<?php echo e(URL::to('/public/uploads/product/'.$value->product_image)); ?>" alt="" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">

										<div class="item active">
										  <a href=""><img src="<?php echo e(URL::to('public/frontend/images/similar1.jpg')); ?>" alt=""></a>
										  <a href=""><img src="<?php echo e(URL::to('public/frontend/images/similar2.jpg')); ?>" alt=""></a>
										  <a href=""><img src="<?php echo e(URL::to('public/frontend/images/similar3.jpg')); ?>" alt=""></a>
										</div>
										
										
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php echo e($value->product_name); ?></h2>
								<p>Mã ID: <?php echo e($value->product_id); ?></p>
								<img src="images/product-details/rating.png" alt="" />
								
								<form action="<?php echo e(URL::to('/save-cart')); ?>" method="POST">
									<?php echo csrf_field(); ?>
									<input type="hidden" value="<?php echo e($value->product_id); ?>" class="cart_product_id_<?php echo e($value->product_id); ?>">

                                            <input type="hidden" value="<?php echo e($value->product_name); ?>" class="cart_product_name_<?php echo e($value->product_id); ?>">

                                            <input type="hidden" value="<?php echo e($value->product_image); ?>" class="cart_product_image_<?php echo e($value->product_id); ?>">

                                            <input type="hidden" value="<?php echo e($value->product_quantity); ?>" class="cart_product_quantity_<?php echo e($value->product_id); ?>">

                                            <input type="hidden" value="<?php echo e($value->product_price); ?>" class="cart_product_price_<?php echo e($value->product_id); ?>">
                                          
								<span>
									<span><?php echo e(number_format($value->product_price,0,',','.').'VNĐ'); ?></span>
								
									<label>Số lượng:</label>
									<input name="qty" type="number" min="1" class="cart_product_qty_<?php echo e($value->product_id); ?>"  value="1" />
									<input name="productid_hidden" type="hidden"  value="<?php echo e($value->product_id); ?>" />
								</span>
								<input type="button" value="Thêm giỏ hàng" class="btn btn-primary btn-sm add-to-cart" data-id_product="<?php echo e($value->product_id); ?>" name="add-to-cart">
								</form>

								<p><b>Tình trạng:</b> Còn hàng</p>
								<p><b>Điều kiện:</b> Mơi 100%</p>
								<p><b>Số lượng kho còn:</b> <?php echo e($value->product_quantity); ?></p>
								<p><b>Thương hiệu:</b> <?php echo e($value->brand_name); ?></p>
								<p><b>Danh mục:</b> <?php echo e($value->category_name); ?></p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
</div><!--/product-details-->

					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
							
								<li ><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
								<p><?php echo $value->product_desc; ?></p>
								
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
								<p><?php echo $value->product_content; ?></p>
								
						
							</div>
							
							<div class="tab-pane fade" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản phẩm liên quan</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
							<?php $__currentLoopData = $relate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lienquan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											 <div class="single-products">
		                                        <div class="productinfo text-center product-related">
		                                            <img src="<?php echo e(URL::to('public/uploads/product/'.$lienquan->product_image)); ?>" alt="" />
		                                            <h2><?php echo e(number_format($lienquan->product_price,0,',','.').' '.'VNĐ'); ?></h2>
		                                            <p><?php echo e($lienquan->product_name); ?></p>
		                                         
		                                        </div>
		                                      
                                			</div>
										</div>
									</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		

								
								</div>
									
							</div>
									
						</div>
					</div><!--/recommended_items-->
					

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\tutorial_youtube\shopbanhanglaravel\resources\views/pages/sanpham/show_details.blade.php ENDPATH**/ ?>