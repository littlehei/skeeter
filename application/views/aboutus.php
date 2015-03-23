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
                <h3 id="">关于我们</h3>
                
                <p>校评网(www.xiaoping.com)创建于2014年，起因是国内没有较好的关于校园信息交流的渠道。每年小孩长大该进入幼儿园、小学甚至中学的时候，家长都会忙于打听各个学校的信息；每年高考结束后，为了填报更好的志愿，考生和家长都会疲于对比各大高校的优势。遗骸的是，大多数的学生和家长所打听到的有限的校园信息，在面对择校这样一个对个人成长产生重大作用的决定面前显得那么力不从心。</p>
                <p></p>
                <p>为此，我们（一群来自甲骨文、腾讯等公司的工程师们）搭建了校评网这个平台，试图汇集成千上万人的关于不同学校的信息和看法，为那些关心就读哪所学校的用户或多或少的提供些许帮助，让他们能够选择自己更喜欢更适合的学校。</p>
                <hr>

                <span id="toc1"></span>
                <h3 id="bootstrap">关注我们</h3>

                <p>微信公众号</p>
                <p>新浪微博</p>
                <p>人人网</p>

                <hr>
                <span id="toc2"></span>
                <h3 id="">联系我们</h3>
                <p>校评网致力于校园信息推广，坚持分享、开放的互联网精神，旨在为广大学生、家长提供交流的平台。如果你和我们有相同的目标，欢迎和我们联系:</p>
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