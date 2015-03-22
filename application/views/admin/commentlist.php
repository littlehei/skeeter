
            <!-- content starts -->
   <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">后台管理</a>
            </li>
            <li>
                <a href="#">评论管理</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> 评论信息</h2>
         <div class="pull-right"> 
         	 
            <a class="add btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
            	    查询
            </a>
         </div>
        
    </div>
    <div class="box-content">
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>评论ID</th>
        <th>学校ID</th>
        <th>用户ID</th>
        <th>标题</th>
        <th>内容</th>
        <th>评论时间</th>
        <th>更新时间</th>
        <th>被赞次数</th>
        <th>状态</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
   
    	<?php if($comm_detail->num_rows()>0):?>
		<?php foreach($comm_detail->result() as $row): ?>
			 <tr>
		   <td><?php echo $row->comment_id?></td>
        <td class="center"><?php echo $row->school_id?></td>
        <td class="center"><?php echo $row->uid?></td>
        <td class="center"><?php echo $row->title?></td>
        <td class="center"><?php echo $row->content?></td>
        <td class="center"><?php echo $row->create_time?></td>
        <td class="center"><?php echo $row->update_time?></td>
        <td class="center"><?php echo $row->praise_num?></td>
        <td class="center">
           <?php 
           if($row->status==1)
           {
           	echo ' <span class="label-success label label-default">Active</span>';
		   }
		   else {
		   	echo ' <span class="label-warning label label-default">NoActive</span>';
		   }
           ?>
           
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url();?>admin//<?php echo $row->comment_id?>">
            <i class="glyphicon glyphicon-edit icon-white"></i>
                                             查看回复
            </a>
            <a class="btn btn-danger" href="<?php echo base_url();?>admin/comment/del/<?php echo $row->comment_id?>">
                <i class="glyphicon glyphicon-trash icon-white"></i>
            	    删除
            </a>
        </td>
        </tr>
		<?php endforeach; ?>
	<?php endif;?>
    </tbody>
    </table>
    </div>
   </div>
  </div>
 </div>
