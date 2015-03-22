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
                <a href="#">学校管理</a>
            </li>
        </ul>
</div>
<div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-8 col-lg-8">
        	
<form id="user-form" action="<?php echo base_url();?>admin/school/submit" class="form-horizontal label-left"
novalidate="novalidate"
method="post"
data-validate="parsley">
<?php if($sch_info=="none"):?>
<fieldset>
	    
		<legend class="section">
			学校基本信息添加
		</legend>
	
		<div class="control-group">
			<label class="control-label" for="id">ID</label>
			<div class="controls form-group">
				<input type="text" id="prefix" name="id" class="col-sm-6 col-xs-12">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="sch_name">名称<span class="required">*</span></label>
			<div class="controls form-group">
				<input type="text" id="prefix" name="sch_name" class="col-sm-6 col-xs-12">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="type">类型</label>
			<div class="controls form-group">
				<input type="text" id="prefix" name="type" class="col-sm-6 col-xs-12">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="band">标签</label>
			<div class="controls form-group">
				<input type="text" id="prefix" name="band" class="col-sm-6 col-xs-12">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="city">城市</label>
			<div class="controls form-group">
				<input type="text" id="prefix" name="city" class="col-sm-6 col-xs-12">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="site">网址 <span class="required">*</span></label>
			<div class="controls form-group">
				<input type="text" id="first-name" name="site" required="required" class="col-xs-12" >
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="address">地址 </label>
			<div class="controls form-group">
				<input type="text" id="last-name" name="address" required="required" class="col-xs-12" >
			</div>
		</div>
		
	</fieldset>
	<?php else:?>
	<fieldset>
	    
		<legend class="section">
			学校基本信息修改
		</legend>
	
		<div class="control-group">
			<label class="control-label" for="id">ID</label>
			<div class="controls form-group">
				<input type="text" id="prefix" value="<?php echo $sch_info->sch_id; ?>" name="id" class="col-sm-6 col-xs-12">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="sch_name">名称<span class="required">*</span></label>
			<div class="controls form-group">
				<input type="text" id="prefix" value="<?php echo $sch_info->sch_name; ?>" name="sch_name" class="col-sm-6 col-xs-12">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="type">类型</label>
			<div class="controls form-group">
				<input type="text" id="prefix" value="<?php echo $sch_info->type; ?>" name="type" class="col-sm-6 col-xs-12">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="band">标签</label>
			<div class="controls form-group">
				<input type="text" id="prefix" value="<?php echo $sch_info->band; ?>" name="band" class="col-sm-6 col-xs-12">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="city">城市</label>
			<div class="controls form-group">
				<input type="text" id="prefix" value="<?php echo $sch_info->city; ?>" name="city" class="col-sm-6 col-xs-12">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="site">网址 <span class="required">*</span></label>
			<div class="controls form-group">
				<input type="text" id="first-name" value="<?php echo $sch_info->site; ?>" name="site" required="required" class="col-xs-12" >
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="address">地址 </label>
			<div class="controls form-group">
				<input type="text" id="last-name" value="<?php echo $sch_info->address; ?>" name="address" required="required" class="col-xs-12" >
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