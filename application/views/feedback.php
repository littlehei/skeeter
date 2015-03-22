<?php

    // send raw HTTP headers to set the content type for MS IE
    $this->output->set_header("Content-Type: text/html; charset=UTF-8");

    echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n";

?>

<!DOCTYPE html>
<html lang="zh-CN">
    <head>
      <title>关于我们-校评网 </title>
      <meta charset="UTF-8 ">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- 引入 Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">

      <!-- HTML5 Shim 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
      <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
      <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->

      <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
      <header class="about-intro">
        <h1>校评网</h1>
        <p>校评网 是中国首个校园点评社区，覆盖全国大中小学的校园信息。<br>我们的目标是提供最全面客观的校园信息交流平台，为学生和家长提供更专业的服务！</p>
      </header>

      <div class="container">
        <div class="row">
          <div class="col-md12">
            <article class="post page">
            <section class="post-content">
                <span id="toc0"></span>
                <h3 id="">建议反馈</h3>
                
                <p>如果你在使用校评网的过程中有任何建议和疑问，欢迎随时通过下面的方式联系我们:</p>
                <blockquote id="contactus">
                  <p> Email： littlehei@foxmail.com</p>
                  <p> QQ:  415841903</p>
                </blockquote>

            </section>
            </article>
          </div>
        </div>
      </div>
      <!-- end of container -->

      <hr>
      <footer id="footer">
        <div class="container">
          <div class="row hidden-xs">
            <dl class="col-sm-3 site-link">
              <dt><a href="aboutus.html">关于我们</a></dt>             
            </dl>
            <dl class="col-sm-3 site-link">
              <dt><a href="feedback.html">建议反馈</a></dt>              
            </dl>
            <dl class="col-sm-6 site-link" id="license">
              <!-- dt>内容许可</dt -->
              <dt>除特别说明外，用户内容均采用 <a rel="license" target="_blank" href="http://creativecommons.org/licenses/by-sa/3.0/cn/">知识共享署名-相同方式共享 3.0 中国大陆许可协议</a> 进行许可</dt>
            </dl>
          </div>
          <div class="copyright">
            Copyright © 2011-2014 xxx <br><a href="http://www.miibeian.gov.cn/" rel="nofollow">粤 ICP 备 xxx 号</a>, 公网安备 1xxxxx2 号
          </div>
        </div>
      </footer>



      <!-- jQuery (Bootstrap 的 JavaScript 插件需要引入 jQuery) -->

      <script src="https://code.jquery.com/jquery.js"></script>
      <!-- 包括所有已编译的插件 -->
      <script src="js/bootstrap.min.js"></script>
   </body>
</html>