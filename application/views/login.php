<?php

    // send raw HTTP headers to set the content type for MS IE
    $this->output->set_header("Content-Type: text/html; charset=UTF-8");

    echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n";

?>
<!DOCTYPE html>
<html lang="zh-CN">
   <head>
      <title>用户登录 </title>
      <meta charset="UTF-8 ">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link href="<?php echo base_url();?>resource/css/bootstrap.css" type="text/css" rel="stylesheet" />
	<script src="<?php echo base_url();?>resource/js/jquery-1.11.1.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>resource/js/jquery.validate.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>resource/js/bootstrap.min.js" type="text/javascript"></script>
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
				required: "请输入密码"
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
        
      

         <div class="login_box">
            <div id="login_form">    
            		<?php echo form_open(base_url().'user/login'); ?>        
               <input type="email" id="email" name="email" tabindex="1" placeholder="请输入常用邮箱地址" required>
               
               <input type="password" id="password" name="password" tabindex="2" placeholder="请输入密码" required>
              <div class="clearbox">
               <label id="login-register" class="pull-left" for="checkbox">
                  <input type="checkbox" id="checkbox" name="checkbox" checked="">记住我
               </label>
              <a href="#" class="pull-right" target="_blanl">忘记密码？</a>
              </div>
                 <input type="hidden" id="refer" name="refer" value="<?php echo $refer;?>">
                  <input type="hidden" id="token" name="token" value="">
                  <input type="hidden" name="type" value="1">
                <input type="submit" id="submit-register" value="登     录">
                
	<?php echo form_close();?>
            </div>
            <div class="login_right">
               <div>没有帐号</div>
               <a href="<?php echo base_url();?>user/goregisiter" class="registor_now">立即注册</a>
               <div class="login_others">使用以下帐号直接登录:</div>
               <a href="ologin/auth/sina.html" class="icon_wb" target="_blank" title="使用新浪微博帐号登录"></a>
               <a href="ologin/auth/qq.html" class="icon_qq" target="_blank" title="使用腾讯QQ帐号登录"></a>
            </div>
        </div>

        <div class="login_box_btm"></div>
      </div>

   </body>
</html>