<?php $__env->startSection('admin_content'); ?>
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê users
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
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
          
            <th>Tên user</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Password</th>
            <th>Author</th>
            <th>Admin</th>
            <th>User</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $admin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <form action="<?php echo e(url('/assign-roles')); ?>" method="POST">
              <?php echo csrf_field(); ?>
              <tr>
               
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                <td><?php echo e($user->admin_name); ?></td>
                <td><?php echo e($user->admin_email); ?> <input type="hidden" name="admin_email" value="<?php echo e($user->admin_email); ?>"></td>
                <td><?php echo e($user->admin_phone); ?></td>
                <td><?php echo e($user->admin_password); ?></td>
                <td><input type="checkbox" name="author_role" <?php echo e($user->hasRole('author') ? 'checked' : ''); ?>></td>
                <td><input type="checkbox" name="admin_role"  <?php echo e($user->hasRole('admin') ? 'checked' : ''); ?>></td>
                <td><input type="checkbox" name="user_role"  <?php echo e($user->hasRole('user') ? 'checked' : ''); ?>></td>

              <td>
                  
                    
                 <input type="submit" value="Assign roles" class="btn btn-sm btn-default">
                
              </td> 

              </tr>
            </form>
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
            <?php echo $admin->links(); ?>

          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\tutorial_youtube\shopbanhanglaravel\resources\views/admin/users/all_users.blade.php ENDPATH**/ ?>