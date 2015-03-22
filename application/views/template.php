<?php

    // send raw HTTP headers to set the content type for MS IE
    $this->output->set_header("Content-Type: text/html; charset=UTF-8");
$this->load->helper('form');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
  

    <title>校评网</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>resource/css/bootstrap.css" type="text/css" rel="stylesheet" />
	<script src="<?php echo base_url();?>resource/js/jquery-1.11.1.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>resource/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>resource/js/scroll.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>resource/js/validate.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>resource/css/schooldetail.css" type="text/css" rel="stylesheet">

	<style type="text/css">
	.userdrop{
		width: 100px;
	}
	.dropdown-menu{
		 min-width: 100px;
	}
#footer .copyright {
	text-align: center;
	font-size: 13px;
}
#footer .inner{
	text-align: center;
}
	</style>
<script type="text/javascript">
	$(document).ready(function(){
		$("#to_the_top").scroll2Top();
	});
</script>


	
  </head>

 <body>
 	<div id="to_the_top"></div>
 <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url();?>">校评网</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
                 <li class="active"><a href="<?php echo base_url();?>">学校</a></li>
		     
		         <li><a href="#">用户</a></li>
          </ul>
			<form class="navbar-form navbar-left hidden-xs js-search-form" action="javascript:void(0);" role="search">
				<div class="input-group">
				<input class="form-control" type="text" tabindex="3" placeholder="搜索学校，专业，职业，用户" name="search">
				<span class="input-group-btn">
					<button class="btn btn-default btn-icon" type="submit">
						<i class="fa fa-search"></i>
					</button>
				</span>
				</div>
			</form>
          <ul class="nav navbar-nav navbar-right">
         
          	<?php if($this->session->userdata('id')):?>
          		<input name="user" id="scuser" type="hidden" nlink="<?php echo base_url();?>people/<?php echo $this->session->userdata('id')?>"
          		 nvalue="<?php echo $this->session->userdata('username')?>" nimg="<?php echo $this->session->userdata('username')?>"
          		 value="fafsafuser-<?php echo $this->session->userdata('id');?>"/>
          			<li class="dropdown userdrop">
                    <a href="#" data-toggle="dropdown"> <i class="glyphicon "></i>
                    	<?php echo $this->session->userdata('username')?> </a>
                    <ul class="dropdown-menu usermenu" role="menu">
                        <li><a href="#">我的主页</a></li>
                        <li class="divider"></li>
                        <li><a href="#">设置</a></li>
                       <li class="divider"></li>
                        <li><a href="<?php echo base_url();?>user/logout">退出</a></li>
                       
                    </ul>
          	<?php else: ?>
          	<input name="user" nvalue="" id="scuser" nlink="" type="hidden" value="fafsafuser-0"/>
           	<li><a href="<?php echo base_url();?>user/gologin">登录</a></li>
		  	<li><a href="<?php echo base_url();?>user/goregisiter">注册</a></li>
         <?php endif;?>
          </ul>
       	 </div><!--/.nav-collapse -->
      	</div>
 </div>

<div class="wraper">

  <?php echo $content?>

</div>
<footer id="footer">
	<div class="container">
		<div class="row inner">
			<a rel="nofollow" href="#" target="_blank">关于我们</a>
			| <a rel="nofollow" href="#" target="_blank">推广服务</a>
			| <a rel="nofollow" href="#" target="_blank">站务论坛</a>
			| <a rel="nofollow" href="#" target="_blank">联系我们</a>
		
		</div>
		<div class="copyright">
			
          <div></div> 
          <p>©2011-2014 xxx<a href="#">粤 ICP 备 xxx 号</a>, 公网安备 1xxxxx2 号</p> 
			
		</div>
	</div>

</footer>
  <div class="modal fade" id="loginwin" tabindex="-1"  data-width="760" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3>用户登录</h3>
</div>
 <div id="login_form">    
    <?php echo form_open(base_url().'user/login'); ?> 	
<div class="modal-body">
<div class="row-fluid">
<div class="span6">

<p> <input type="text" name="email" tabindex="1" placeholder="请输入常用邮箱地址"></p>
<p><input type="password" name="password" tabindex="2" placeholder="请输入密码"></p>

<p><input type="checkbox" id="checkbox" name="checkbox" checked="" class="checkbox">记住我
                  <a href="#" target="_blanl">忘记密码？</a></p>

</div>

</div>
</div>
<div class="modal-footer">
<button type="button" data-dismiss="modal" class="btn">取消</button>
<button type="submit" class="btn btn-primary sub">登录</button>
</div>
<?=form_close()?>
</div><!-- /.modal -->            
</div>

<div class="modal fade" id="reportwin" tabindex="-1"  data-width="860" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3>用户举报</h3>
</div>
 <div id="report_form">    
    <?php echo form_open(base_url().'user/report'); ?> 	
<div class="modal-body">


<div class="radio">
   <label>
      <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked> 广告等垃圾信息
   </label>
</div>
<div class="radio">
   <label>
      <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
      不友善内容
   </label>
</div>
  <div class="radio">
   <label>
      <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
      违法法律法规内容
   </label>
</div>
   <div class="radio">
   <label>
      <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
     其他
   </label>
     <textarea class="form-control" rows="3"></textarea>
</div>
 <input type="hidden" name="cid" value="option3">
  

</div>
<div class="modal-footer">
<button type="button" data-dismiss="modal" class="btn">取消</button>
<button type="submit" class="btn btn-primary sub">确定</button>
</div>
<?=form_close()?>
</div><!-- /.modal -->    
</div>
<script type="text/javascript">

   $(function() { 
   	$('#loginwin').on('click','sub',function(){
   		
   	});
  
   	$('#collapseOne').collapse('hide');
   	$('#collapseTwo').collapse('hide');
   	});
</script>  
 </body>
 
</html>