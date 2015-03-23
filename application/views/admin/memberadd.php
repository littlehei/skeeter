<style type="text/css">
.form-horizontal.label-left .control-label {
    text-align: left;
}
.form-horizontal .control-label {
    float: left;
    padding-top: 5px;
    text-align: right;
    width: 160px;
}
.form-horizontal .controls {
    margin-left: 180px;
}

</style>
 <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">后台管理</a>
            </li>
            <li>
                <a href="#">用户管理</a>
            </li>
        </ul>
</div>
<div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-8 col-lg-8">
        	
<form id="user-form" action="<?php echo base_url();?>admin/member/submit" class="form-horizontal label-left"
novalidate="novalidate"
method="post"
data-validate="parsley">
<?php if($mem_info=="none"):?>
<fieldset>
	    
		<legend class="section">
			<br/>
			用户基本信息添加
		</legend>
	
		<div class="control-group">
			<label class="control-label" for="id">ID</label>
			<div class="controls form-group">
				<input type="text" id="prefix" name="id" class="col-sm-6 col-xs-12">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="username">用户名<span class="required">*</span></label>
			<div class="controls form-group">
				<input type="text" id="prefix" name="username" class="col-sm-6 col-xs-12">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="email">email</label>
			<div class="controls form-group">
				<input type="text" id="prefix" name="email" class="col-sm-6 col-xs-12">
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="sex">性别</label>
			<div class="controls form-group">
				<input type="text" id="prefix" name="sex" class="col-sm-6 col-xs-12">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="birthday">生日 <span class="required">*</span></label>
			<div class="controls form-group">
				<input type="text" id="first-name" name="birthday" required="required" class="col-xs-12" >
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="qq">qq</label>
			<div class="controls form-group">
				<input type="text" id="last-name" name="qq" required="required" class="col-xs-12" >
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="score">积分</label>
			<div class="controls form-group">
				<input type="text" id="last-name" name="score" required="required" class="col-xs-12" >
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="status">状态</label>
			<div class="controls form-group">
				<input type="text" id="last-name" name="status" required="required" class="col-xs-12" >
			</div>
		</div>
	</fieldset>
	<?php else:?>
	<fieldset>
	    
		<legend class="section">
			用户基本信息修改
		</legend>
	
		<div class="control-group">
			<label class="control-label" for="id">ID</label>
			<div class="controls form-group">
				<input type="text" id="prefix" name="id" value="<?php echo $mem_info->id; ?>" class="col-sm-6 col-xs-12">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="username">用户名<span class="required">*</span></label>
			<div class="controls form-group">
				<input type="text" id="prefix" name="username" value="<?php echo $mem_info->username; ?>" class="col-sm-6 col-xs-12">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="email">email</label>
			<div class="controls form-group">
				<input type="text" id="prefix" name="email" value="<?php echo $mem_info->email; ?>" class="col-sm-6 col-xs-12">
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="sex">性别</label>
			<div class="controls form-group">
				<input type="text" id="prefix" name="sex" value="<?php echo $mem_info->sex; ?>" class="col-sm-6 col-xs-12">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="birthday">生日 <span class="required">*</span></label>
			<div class="controls form-group">
				<input type="text" id="first-name" name="birthday" value="<?php echo $mem_info->birthday; ?>" required="required" class="col-xs-12" >
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="qq">qq</label>
			<div class="controls form-group">
				<input type="text" id="last-name" name="qq" value="<?php echo $mem_info->qq; ?>" required="required" class="col-xs-12" >
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="score">积分</label>
			<div class="controls form-group">
				<input type="text" id="last-name" name="score" value="<?php echo $mem_info->score; ?>" required="required" class="col-xs-12" >
			</div>
		</div>
	
		<div class="control-group">
			<label class="control-label" for="status">状态</label>
			<div class="controls form-group">
				<input type="text" id="last-name" name="status" value="<?php echo $mem_info->status; ?>" required="required" class="col-xs-12" >
			</div>
		</div>
				
	</fieldset>	
		
	<?php endif;?>
	<div class="form-actions">
		<button type="submit" class="btn btn-primary">
			Submit
		</button>
		<button type="button" class="btn btn-default">
			Cancel
		</button>
	</div>
</form>
</div>
</div>