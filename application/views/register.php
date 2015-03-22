<?php

    // send raw HTTP headers to set the content type for MS IE
    $this->output->set_header("Content-Type: text/html; charset=UTF-8");

    echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n";

?>
<!DOCTYPE html>
<html lang="zh-CN">
   <head>
      <title>用户注册 </title>
      <meta charset="UTF-8 ">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link href="<?php echo base_url();?>resource/css/bootstrap.css" type="text/css" rel="stylesheet" />
	<script src="<?php echo base_url();?>resource/js/jquery-1.11.1.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>resource/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>resource/js/jquery.validate.js" type="text/javascript"></script>
	<link href="<?php echo base_url();?>resource/css/login.css" type="text/css" rel="stylesheet">
  <script type="text/javascript">
 
$(document).ready(function(){
	// validate the form when it is submitted
	var validator = $("#login_form").find('form').validate({
		errorElement: "span",
		messages: {
			email: {
				required: "请输入常用邮箱地址",
				email: "请输入正确的邮箱地址"
			},
			password: {
				required: "请输入密码",
				minlength: "密码长度至少6位"
			}
		}

	});

});

 </script>
   </head>
   <body id="login_bg">


      <div class="login_wrapper">
         <div class="login_header">
            <a href="#"><img src="" width="285" height="62" alt=""></a>
         </div>
        
         <input type="hidden" id="resubmitToken" value="f508a547681546b4b6d5a56931c14f8f"> 

         <div class="login_box">
         	<div class="form_error">
	<?php echo validation_errors(); ?>
	</div>
<div id="login_form">
	<?php echo form_open(base_url().'user/register'); ?>
	
	
		<input type="hidden" name="token" value="<?=$token?>" id="token" />
               <input type="email" id="email" name="email" tabindex="1" placeholder="请输入常用邮箱地址" required>
               <input type="password" id="password" name="password" tabindex="2"  minlength="6" placeholder="请输入密码" required>
              
               <label id="checkbox-register" for="checkbox">
                  <input type="checkbox" id="checkbox" name="checkbox" checked="" >我已阅读并同意<a href="privacy.html" target="_blank">《用户协议》</a>
               </label>
             
                <input type="submit" id="submit-register" value="注     册">
                <br />
                
                <input type="hidden" id="callback" name="callback" value="">
                <input type="hidden" id="authType" name="authType" value="">
                <input type="hidden" id="signature" name="signature" value="">
                <input type="hidden" id="timestamp" name="timestamp" value="">
       <?php echo form_close();?>
        </div>
        
  			<div class="login_right">
               <div>已有帐号</div>
               <a href="<?php echo base_url();?>user/gologin" class="registor_now">直接登录</a>
               <div class="login_others">使用以下帐号直接登录:</div>
               <a href="ologin/auth/sina.html" class="icon_wb" target="_blank" title="使用新浪微博帐号登录"></a>
               <a href="ologin/auth/qq.html" class="icon_qq" target="_blank" title="使用腾讯QQ帐号登录"></a>
            </div>
        <div class="login_box_btm"></div>
      </div>
</div>



      <!-- jQuery (Bootstrap 的 JavaScript 插件需要引入 jQuery) -->


   </body>
</html>