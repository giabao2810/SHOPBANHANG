<?php $__env->startSection('admin_content'); ?>
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê đơn hàng
    </div>
    <div class="row w3-res-tb">
     
     
    
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
           
            <th>Thứ tự</th>
            <th>Mã đơn hàng</th>
            <th>Ngày tháng đặt hàng</th>
            <th>Tình trạng đơn hàng</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $i = 0;
          ?>
          <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php 
            $i++;
            ?>
          <tr>
            <td><i><?php echo e($i); ?></i></label></td>
            <td><?php echo e($ord->order_code); ?></td>
            <td><?php echo e($ord->created_at); ?></td>
            <td><?php if($ord->order_status==1): ?>
                    Đơn hàng mới
                <?php else: ?> 
                    Đã xử lý
                <?php endif; ?>
            </td>
           
           
            <td>
              <a href="<?php echo e(URL::to('/view-order/'.$ord->order_code)); ?>" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-eye text-success text-active"></i></a>

              <a onclick="return confirm('Bạn có chắc là muốn xóa đơn hàng này ko?')" href="<?php echo e(URL::to('/delete-order/'.$ord->order_code)); ?>" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>

            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <?php echo $order->links(); ?>

          </ul>
        </div>
      </div>
    </footer>
   
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\tutorial_youtube\shopbanhanglaravel\resources\views/admin/manage_order.blade.php ENDPATH**/ ?>