
            <!-- content starts -->
   <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">后台管理</a>
            </li>
            <li>
                <a href="#">会员管理</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> 会员信息</h2>
         <div class="pull-right"> 
         	   <a class="add btn btn-success" href="<?php echo base_url();?>admin/member/addmember">
                <i class="glyphicon icon-white"></i>
              	  添加
            </a>
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
        <th>ID</th>
        <th>用户名</th>
        <th>email</th>
        <th>注册时间</th>
        <th>性别</th>
        <th>生日</th>
        <th>qq</th>
        <th>积分</th>
        <th>登录次数</th>
        <th>状态</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
   
    	<?php if($mem_detail->num_rows()>0):?>
		<?php foreach($mem_detail->result() as $row): ?>
			 <tr>
		   <td><?php echo $row->id?></td>
        <td class="center"><?php echo $row->username?></td>
        <td class="center"><?php echo $row->email?></td>
        <td class="center"><?php echo $row->reg_time?></td>
        <td class="center"><?php echo $row->sex?></td>
        <td class="center"><?php echo $row->birthday?></td>
        <td class="center"><?php echo $row->qq?></td>
        <td class="center"><?php echo $row->score?></td>
        <td class="center"><?php echo $row->login?></td>
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
            <a class="btn btn-info" href="<?php echo base_url();?>admin/member/updatemember/<?php echo $row->id?>">
            <i class="glyphicon glyphicon-edit icon-white"></i>
                                              修改
            </a>
            <a class="btn btn-danger" href="<?php echo base_url();?>admin/member/del/<?php echo $row->id?>">
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
