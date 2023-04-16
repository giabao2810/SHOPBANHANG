<?php $__env->startSection('content'); ?>
<div class="features_items"><!--features_items-->
       
                        <h2 class="title text-center">Sản phẩm mới nhất</h2>
                        
                        <?php $__currentLoopData = $all_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                           
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <form>
                                                <?php echo csrf_field(); ?>
                                            <input type="hidden" value="<?php echo e($product->product_id); ?>" class="cart_product_id_<?php echo e($product->product_id); ?>">
                                            <input type="hidden" value="<?php echo e($product->product_name); ?>" class="cart_product_name_<?php echo e($product->product_id); ?>">
                                          
                                            <input type="hidden" value="<?php echo e($product->product_quantity); ?>" class="cart_product_quantity_<?php echo e($product->product_id); ?>">
                                            
                                            <input type="hidden" value="<?php echo e($product->product_image); ?>" class="cart_product_image_<?php echo e($product->product_id); ?>">
                                            <input type="hidden" value="<?php echo e($product->product_price); ?>" class="cart_product_price_<?php echo e($product->product_id); ?>">
                                            <input type="hidden" value="1" class="cart_product_qty_<?php echo e($product->product_id); ?>">

                                            <a href="<?php echo e(URL::to('/chi-tiet/'.$product->product_slug)); ?>">
                                                <img src="<?php echo e(URL::to('public/uploads/product/'.$product->product_image)); ?>" alt="" />
                                                <h2><?php echo e(number_format($product->product_price,0,',','.').' '.'VNĐ'); ?></h2>
                                                <p><?php echo e($product->product_name); ?></p>

                                             
                                             </a>
                                            <input type="button" value="Thêm giỏ hàng" class="btn btn-default add-to-cart" data-id_product="<?php echo e($product->product_id); ?>" name="add-to-cart">
                                            </form>

                                        </div>
                                      
                                </div>
                           
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div><!--features_items-->
                      <ul class="pagination pagination-sm m-t-none m-b-none">
                       <?php echo $all_product->links(); ?>

                      </ul>
        <!--/recommended_items-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\tutorial_youtube\shopbanhanglaravel\resources\views/pages/home.blade.php ENDPATH**/ ?>