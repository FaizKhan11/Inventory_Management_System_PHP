<?php
  $page_title = 'All Group';
  require_once('includes/load.php');
   page_require_level(1);
  $all_groups = find_all('user_groups');
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <strong>
        <span class="glyphicon glyphicon-th"></span>
        <span>Groups</span>
     </strong>
      <button class=" pull-right"><a href="add_group.php" > Add New Group</a>
      </button>
    </div>
     <div class="panel-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th  style="width: 50px;">#</th>
            <th>Group Name</th>
            <th  style="width: 20%;">Group Level</th>
            <th  style="width: 15%;">Status</th>
            <th  style="width: 100px;">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_groups as $a_group): ?>
          <tr>
           <td ><?php echo count_id();?></td>
           <td><?php echo remove_junk(ucwords($a_group['group_name']))?></td>
           <td >
             <?php echo remove_junk(ucwords($a_group['group_level']))?>
           </td>
           <td >
           <?php if($a_group['group_status'] === '1'): ?>
            <span ><?php echo "Active"; ?></span>
          <?php else: ?>
            <span ><?php echo "Deactive"; ?></span>
          <?php endif;?>
           </td>
           <td >
             <div class="btn">
                <button ><a href="edit_group.php?id=<?php echo (int)$a_group['id'];?>" >
               Edit</button></a>
                <button><a href="delete_group.php?id=<?php echo (int)$a_group['id'];?>"  >
                Remove</button></a>
                </div>
           </td>
          </tr>
        <?php endforeach;?>
       </tbody>
     </table>
     </div>
    </div>
  </div>
</div>
  <?php include_once('layouts/footer.php'); ?>
