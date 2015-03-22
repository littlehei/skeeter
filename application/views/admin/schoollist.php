
            <!-- content starts -->
   <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">后台管理</a>
            </li>
            <li>
                <a href="#">学校管理</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> 学校信息</h2>
         <div class="pull-right"> 
         	   <a class="add btn btn-success" href="<?php echo base_url();?>admin/school/addschool">
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
        <th>名称</th>
        <th>类型</th>
        <th>标签</th>
        <th>所在城市</th>
        <th>评价分数</th>
        <th>评价人数</th>
        <th>网址</th>
        <th>地址</th>
        <th>状态</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
   
    	<?php if($sch_detail->num_rows()>0):?>
		<?php foreach($sch_detail->result() as $row): ?>
			 <tr>
		   <td><?php echo $row->sch_id?></td>
        <td class="center"><?php echo $row->sch_name?></td>
        <td class="center"><?php echo $row->type?></td>
        <td class="center"><?php echo $row->band?></td>
        <td class="center"><?php echo $row->city?></td>
        <td class="center"><?php echo $row->com_score?></td>
        <td class="center"><?php echo $row->com_num?></td>
        <td class="center"><?php echo $row->site?></td>
        <td class="center"><?php echo $row->address?></td>
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
            <a class="btn btn-info" href="<?php echo base_url();?>admin/school/updateschool/<?php echo $row->sch_id?>">
            <i class="glyphicon glyphicon-edit icon-white"></i>
                                              修改
            </a>
            <a class="btn btn-danger" href="<?php echo base_url();?>admin/school/del/<?php echo $row->sch_id?>">
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
