<?php $__env->startSection('admin_content'); ?>
<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading">
     Thông tin đăng nhập
    </div>
    
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
           
            <th>Tên khách hàng</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        
          <tr>
            <td><?php echo e($customer->customer_name); ?></td>
            <td><?php echo e($customer->customer_phone); ?></td>
            <td><?php echo e($customer->customer_email); ?></td>
          </tr>
     
        </tbody>
      </table>

    </div>
   
  </div>
</div>
<br>
<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading">
     Thông tin vận chuyển hàng
    </div>
    
    
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
           
            <th>Tên người vận chuyển</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Ghi chú</th>
            <th>Hình thức thanh toán</th>
          
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        
          <tr>
           
            <td><?php echo e($shipping->shipping_name); ?></td>
            <td><?php echo e($shipping->shipping_address); ?></td>
             <td><?php echo e($shipping->shipping_phone); ?></td>
             <td><?php echo e($shipping->shipping_email); ?></td>
             <td><?php echo e($shipping->shipping_notes); ?></td>
             <td><?php if($shipping->shipping_method==0): ?> Chuyển khoản <?php else: ?> Tiền mặt <?php endif; ?></td>
            
          
          </tr>
     
        </tbody>
      </table>

    </div>
   
  </div>
</div>
<br><br>

<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê chi tiết đơn hàng
    </div>
   
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
    
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên sản phẩm</th>
            <th>Số lượng kho còn</th>
            <th>Mã giảm giá</th>
            <th>Phí ship hàng</th>
            <th>Số lượng</th>
            <th>Giá sản phẩm</th>
            <th>Tổng tiền</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $i = 0;
          $total = 0;
          ?>
        <?php $__currentLoopData = $order_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <?php 
          $i++;
          $subtotal = $details->product_price*$details->product_sales_quantity;
          $total+=$subtotal;
          ?>
          <tr class="color_qty_<?php echo e($details->product_id); ?>">
           
            <td><i><?php echo e($i); ?></i></td>
            <td><?php echo e($details->product_name); ?></td>
            <td><?php echo e($details->product->product_quantity); ?></td>
            <td><?php if($details->product_coupon!='no'): ?>
                  <?php echo e($details->product_coupon); ?>

                <?php else: ?> 
                  Không mã
                <?php endif; ?>
            </td>
            <td><?php echo e(number_format($details->product_feeship ,0,',','.')); ?>đ</td>
            <td>

              <input type="number" min="1" <?php echo e($order_status==2 ? 'disabled' : ''); ?> class="order_qty_<?php echo e($details->product_id); ?>" value="<?php echo e($details->product_sales_quantity); ?>" name="product_sales_quantity">

              <input type="hidden" name="order_qty_storage" class="order_qty_storage_<?php echo e($details->product_id); ?>" value="<?php echo e($details->product->product_quantity); ?>">

              <input type="hidden" name="order_code" class="order_code" value="<?php echo e($details->order_code); ?>">

              <input type="hidden" name="order_product_id" class="order_product_id" value="<?php echo e($details->product_id); ?>">

             <?php if($order_status!=2): ?> 

              <button class="btn btn-default update_quantity_order" data-product_id="<?php echo e($details->product_id); ?>" name="update_quantity_order">Cập nhật</button>

            <?php endif; ?>

            </td>
            <td><?php echo e(number_format($details->product_price ,0,',','.')); ?>đ</td>
            <td><?php echo e(number_format($subtotal ,0,',','.')); ?>đ</td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td colspan="2">  
            <?php 
                $total_coupon = 0;
              ?>
              <?php if($coupon_condition==1): ?>
                  <?php
                  $total_after_coupon = ($total*$coupon_number)/100;
                  echo 'Tổng giảm :'.number_format($total_after_coupon,0,',','.').'</br>';
                  $total_coupon = $total + $details->product_feeship - $total_after_coupon ;
                  ?>
              <?php else: ?> 
                  <?php
                  echo 'Tổng giảm :'.number_format($coupon_number,0,',','.').'k'.'</br>';
                  $total_coupon = $total + $details->product_feeship - $coupon_number ;

                  ?>
              <?php endif; ?>

              Phí ship : <?php echo e(number_format($details->product_feeship,0,',','.')); ?>đ</br> 
             Thanh toán: <?php echo e(number_format($total_coupon,0,',','.')); ?>đ 
            </td>
          </tr>
          <tr>
            <td colspan="6">
              <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $or): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($or->order_status==1): ?>
                <form>
                   <?php echo csrf_field(); ?>
                  <select class="form-control order_details">
                    <option value="">----Chọn hình thức đơn hàng-----</option>
                    <option id="<?php echo e($or->order_id); ?>" selected value="1">Chưa xử lý</option>
                    <option id="<?php echo e($or->order_id); ?>" value="2">Đã xử lý-Đã giao hàng</option>
                    <option id="<?php echo e($or->order_id); ?>" value="3">Hủy đơn hàng-tạm giữ</option>
                  </select>
                </form>
                <?php elseif($or->order_status==2): ?>
                <form>
                  <?php echo csrf_field(); ?>
                  <select class="form-control order_details">
                    <option value="">----Chọn hình thức đơn hàng-----</option>
                    <option id="<?php echo e($or->order_id); ?>" value="1">Chưa xử lý</option>
                    <option id="<?php echo e($or->order_id); ?>" selected value="2">Đã xử lý-Đã giao hàng</option>
                    <option id="<?php echo e($or->order_id); ?>" value="3">Hủy đơn hàng-tạm giữ</option>
                  </select>
                </form>

                <?php else: ?>
                <form>
                   <?php echo csrf_field(); ?>
                  <select class="form-control order_details">
                    <option value="">----Chọn hình thức đơn hàng-----</option>
                    <option id="<?php echo e($or->order_id); ?>" value="1">Chưa xử lý</option>
                    <option id="<?php echo e($or->order_id); ?>"  value="2">Đã xử lý-Đã giao hàng</option>
                    <option id="<?php echo e($or->order_id); ?>" selected value="3">Hủy đơn hàng-tạm giữ</option>
                  </select>
                </form>

                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </td>
          </tr>
        </tbody>
      </table>
      <a target="_blank" href="<?php echo e(url('/print-order/'.$details->order_code)); ?>">In đơn hàng</a>
    </div>
   
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\tutorial_youtube\shopbanhanglaravel\resources\views/admin/view_order.blade.php ENDPATH**/ ?>