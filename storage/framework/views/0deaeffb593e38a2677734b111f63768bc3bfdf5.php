<?php $__env->startSection('content'); ?>
<div class="features_items"><!--features_items-->
                       <div class="fb-share-button" data-href="http://localhost/tutorial_youtube/shopbanhanglaravel" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e($url_canonical); ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                       <div class="fb-like" data-href="<?php echo e($url_canonical); ?>" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="false"></div>
                        <?php $__currentLoopData = $category_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       
                        <h2 class="title text-center"><?php echo e($name->category_name); ?></h2>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $category_by_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(URL::to('/chi-tiet/'.$product->product_slug)); ?>">
                        <div class="col-sm-4">
                             <div class="product-image-wrapper">
                           
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <form>
                                                <?php echo csrf_field(); ?>
                                            <input type="hidden" value="<?php echo e($product->product_id); ?>" class="cart_product_id_<?php echo e($product->product_id); ?>">
                                            <input type="hidden" value="<?php echo e($product->product_name); ?>" class="cart_product_name_<?php echo e($product->product_id); ?>">
                                            <input type="hidden" value="<?php echo e($product->product_image); ?>" class="cart_product_image_<?php echo e($product->product_id); ?>">
                                            <input type="hidden" value="<?php echo e($product->product_quantity); ?>" class="cart_product_quantity_<?php echo e($product->product_id); ?>">
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
                        </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div><!--features_items-->
                   <ul class="pagination pagination-sm m-t-none m-b-none">
                       <?php echo $category_by_id->links(); ?>

                    </ul>

        <!--/recommended_items-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\tutorial_youtube\shopbanhanglaravel\resources\views/pages/category/show_category.blade.php ENDPATH**/ ?>