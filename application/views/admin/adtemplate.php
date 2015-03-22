<?php

    // send raw HTTP headers to set the content type for MS IE
    $this->output->set_header("Content-Type: text/html; charset=UTF-8");

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
    <link href="<?php echo base_url();?>resource/css/bootstrap-cerulean.min.css" type="text/css" rel="stylesheet" />
	<script src="<?php echo base_url();?>resource/js/jquery-1.11.1.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>resource/js/bootstrap.min.js" type="text/javascript"></script>
	<style type="text/css">
.sidebar-nav {
    border-radius: 5px;
    box-shadow: 0 0 10px #bdbdbd;
    margin-bottom: 0;
    max-height: none;
    min-height: 0;
    padding-bottom: 0;
}
.ch-container {
    padding: 0 20px;
}
.box-header {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%, rgba(0, 0, 0, 0.1) 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
    border-color: -moz-use-text-color -moz-use-text-color #dedede;
    border-image: none;
    border-radius: 3px 3px 0 0;
    border-style: none none solid;
    border-width: medium medium 1px;
    font-size: 16px;
    font-weight: bold;
    height: 56px;
    margin-bottom: 0;
    min-height: 35px !important;
    padding-top: 5px;
}
.well {
    background-color: #f5f5f5;
    border: 1px solid #e3e3e3;
    border-radius: 4px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05) inset;
    margin-bottom: 20px;
    min-height: 20px;
    padding:15px;
 
}
.box-header h2 {
    clear: none;
    float: left;
    font-size: 15px;
    font-weight: bold;
    line-height: 25px;
    margin-bottom: 0;
    margin-top: 0;
    white-space: nowrap;
    width: auto;
}
.add{
	 padding-bottom: 3px;
}
</style>
	
  </head>

 <body>
 	    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">
                <span>校评网</span></a>

          
             <ul class="nav navbar-nav navbar-right">
             <li><a href="login.html">退出</a></li>
		  
          </ul>
          
        

            <ul class="collapse navbar-collapse nav navbar-nav top-menu">
                <li><a href="<?php echo base_url();?>school/"><i class="glyphicon glyphicon-globe"></i> 查看网站</a></li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i> Dropdown <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
 <div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">功能列表</li>
                        <li class="active"><a class="ajax-link" href="<?php echo base_url();?>admin/school">学校管理</span></a>
                        </li>
                        <li><a class="ajax-link" href="<?php echo base_url();?>admin/member">用户管理</span></a>
                        </li>
                        <li><a class="ajax-link" href="<?php echo base_url();?>admin/comment">评论管理</span></a>
                        </li>
                        <li><a class="ajax-link" href="<?php echo base_url();?>admin/database">数据库管理</span></a>
                        </li>
                    </ul>
                    
                </div>
            </div>
        </div>
        <div id="content" class="col-lg-10 col-sm-10">
     <?php echo $content;?>
     </div>
 
 </body>