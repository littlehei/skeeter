$(document).ready(function(){
		$(document).on("input propertychange", "textarea", function (e) {
       var target = e.target;
       // 保存初始高度，之后需要重新设置一下初始高度，避免只能增高不能减低。           
        var dh = $(target).attr('defaultHeight') || 0;
        if (!dh) {
            dh = target.clientHeight;
            $(target).attr('defaultHeight', dh);
        }
 
        target.style.height = dh +'px';
        var clientHeight = target.clientHeight;
        var scrollHeight = target.scrollHeight;
        if (clientHeight !== scrollHeight) { target.style.height = scrollHeight + 10 + "px";
        }
    });
    //编辑框
	var keditor;
			KindEditor.ready(function(K) {
				keditor = K.create('textarea[id="noteAddText"]', {
					//resizeType : 1,
					width:'560',
					 minWidth: '400px',
					allowPreviewEmoticons : false,
					items : [
						'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
						'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
						'insertunorderedlist', '|', 'emoticons', 'image', 'link']
				});
			});
			
	
	  var myname=$('#scuser').attr('nvalue');//yonghuming
    var myuid=$('#scuser').val().split('-')[1];
    var mylink=$('#scuser').attr('nlink');//yonghuming
    var myimg=$('#scuser').attr('nimg');
 	 var sch_id=$('h2').find('a').attr('data');		
	$('#focusschool').find('a').on('click', function(){
		if(!validlogin()){ $('#loginwin').modal('show');
			return;
		}
		if($('#focusschool').attr('data')==1) return;
		  $.ajax({
			   type: "POST",
			   url: "http://localhost/user/focus",
			   data: "uid="+myuid+"&sid="+sch_id+"&type=1"+"&status=1",
			    dataType: "json",
				   success: function(re){
				//	  window.location.reload()
				   }
			   });
	});
	//对学校评分
	$('#rating').on('click','a',function(){
		if(!validlogin()){ $('#loginwin').modal('show');
			return;
		}
		var a=$(this).attr('name');
		var score=a.split('-')[2];
		//var uid=$('#scuser').val().split('-')[1];
		var p=$('#rating a').first().attr('name');
		var sid=p.split('-')[0];  //school id
		
		   $.ajax({
			   type: "POST",
			   url: "http://localhost/user/commentstar",
			   data: "uid="+myuid+"&sid="+sid+"&score="+score,
			    dataType: "json",
				   success: function(re){
					  window.location.reload()
				   }
			   });
		
	});
	//
	var rat=$('#n_rating').val().trim();
	if(rat>0){
		while(rat>0){
		$('#star'+rat).attr('src','http://localhost/resource/image/cstar.gif');
	  	rat--;
		}
	}
	var starsrc1=$('#star1').attr('src');
	var starsrc2=$('#star2').attr('src');
	var starsrc3=$('#star3').attr('src');
	var starsrc4=$('#star4').attr('src');
	var starsrc5=$('#star5').attr('src');
	$('#rating a').hover(
	  function () {
	  	//	alert(a.substring(0,3));
	  	var id=Number($(this).find('img').attr('id').substring(4,5));
	  	if(id==1)  $('#rateword').text('很差');
	  	if(id==2)  $('#rateword').text('较差');
	  	if(id==3)  $('#rateword').text('还行');
	  	if(id==4)  $('#rateword').text('推荐');
	  	if(id==5)  $('#rateword').text('很好');
	  	while(id>0){
	  		 $('#star'+id).attr('src','http://localhost/resource/image/lstar.gif');
	  		 id--;
	  	}
	   
	  },
	  function () {
	   $('#star1').attr('src',starsrc1);
	   $('#star2').attr('src',starsrc2);
	   $('#star3').attr('src',starsrc3);
	   $('#star4').attr('src',starsrc4);
	   $('#star5').attr('src',starsrc5);
	   $('#rateword').text('');
	  }
	);
	
	
	//点赞
	$('.company-list').on('click','.like',function(event){
		if(!validlogin()){ $('#loginwin').modal('show');
			return;
		}
		var prel=$(this).attr('data-pressed');
		var preh=$(this).parent().find('.hate').attr('data-pressed');
		var a=Number($(this).parent().find('.count').text());
		if(prel=="false"){
			   var uid=$('#scuser').val().split('-')[1];
			   var cid=$(this).attr('data-id');
			   $.ajax({
			   type: "POST",
			   url: "http://localhost/user/praise",
			   data: "action=1&uid="+myuid+"&toid="+cid+"&ptype="+1,
			    dataType: "json",
			   success: function(re){
			   	alert("11");
				   	$(this).parent().find('.count').text(a+1);
					$(this).attr('data-pressed','ture');
					if(preh=="ture"){
						$(this).parent().find('.hate').attr('data-pressed','false');
					}
			   }
			   });
		}
		else
		{
			//  var uid=$('#scuser').val().split('-')[1];
			   var cid=$(this).parent().parent().attr('data-id');
			   $.ajax({
			   type: "POST",
			   url: "http://localhost/user/praise",
			   data: "action=0&uid="+myuid+"&toid="+cid+"&ptype="+1,
			    dataType: "json",
			   success: function(re){
				   	$(this).parent().find('.count').text(a-1);
					$(this).attr('data-pressed','false');
			     }
			   });
			
			
		}
			
	});
	//
	
	$('.comment-re').find('input[name="action"]').val(1);
	$('.comment-re').find('input[name="cid"]').val(0);
	//反对
	$('.company-list').on('click','.hate',function(){
		if(!validlogin()){ $('#loginwin').modal('show');
			return;
		}
		var preh=$(this).attr('data-pressed');
		var prel=$(this).parent().find('.like').attr('data-pressed');
		var a=Number($(this).parent().find('.count').text());
		if(preh=="false"){
			
			$(this).attr('data-pressed','ture');
			if(prel=="ture"){
				// var uid=$('#scuser').val().split('-')[1];
			   var cid=$(this).parent().parent().attr('data-id');
			   $.ajax({
			   type: "POST",
			   url: "http://localhost/user/praise",
			   data: "action=0&uid="+myuid+"&toid="+cid+"&ptype="+1,
			    dataType: "json",
			   success: function(re){
					 $(this).parent().find('.count').text(a-1);
					$(this).parent().find('.like').attr('data-pressed','false');
			     }
			   });
			}
		}
		else
		{
			$(this).attr('data-pressed','false');
		}
		});
	//点赞
	$('.company-list').on('click','.praiseacitem',function(event){
		if(!validlogin()){ $('#loginwin').modal('show');
			return;
		}
		//var prel=$(this).attr('data-pressed');
			var rid=$(this).parent().parent().attr('data');
	//	var a=Number($(this).parent().find('.count').text());
	
			  // var uid=$('#scuser').val().split('-')[1];
			 
			   $.ajax({
			   type: "POST",
			   url: "http://localhost/user/praise",
			   data: "action=1&uid="+myuid+"&toid="+rid+"&ptype="+2,
			    dataType: "json",
			   success: function(re){
			   	alert("11");
				 //  	$(this).parent().find('.count').text(a+1);
					//$(this).attr('data-pressed','ture');
				
			   }
			   });
		
			
	});	
	$('.collapseitem').each(function(i){
			//alert($(this).html());
		var col=$(this).attr('href');
		$(col).collapse('hide');
	});
	var col=$('#clickmore').attr('href');
	$(col).collapse('hide');

	$('#clickmore').on('click',function(){
		if($('#collapseschool').is(":visible")==false){
			$(this).text('收起更多');
		}
		else $(this).text('更多信息>>');
		//	var col=$(this).attr('href');
		//$(col).collapse('show');
	});
	$('.collapseitem').on('click',function(){
		var col=$(this).attr('href');
			//$(col).collapse('hide');
		$(col).find('.notesubreplay').val('');
			
	});
	$('.company-list').on('click','.notesubreplay',function(){
		if(!validlogin()){ $('#loginwin').modal('show');
			return;
		}
			if($(this).parent().find('div').is(":visible")==false){
				$(this).parent().find('div').removeClass('hidden');
				$(this).addClass('hidden');
				$(this).parent().find('.notesubreplayedit').removeClass('hidden');
				$(this).parent().find('.notesubreplayedit').focus();
			}
			
		 
	});
	$('.panel-collapse').on('click','.reacitem',function(){
		if(!validlogin()){ $('#loginwin').modal('show');
			return;
		}
			var lo=$(this).parent().parent().attr('data');
		if($('#com'+lo).find('.re-subreplay').is(":visible")==false)
			$('#com'+lo).find('.re-subreplay').removeClass('hidden');
		else
			$('#com'+lo).find('.re-subreplay').addClass('hidden');
		//	$(this).parent().parent().find('re-subreplay').removeClass('hidden');
			//var user=$('#com'+lo).find('.fromuser').text();
			//$('#com'+lo).find('.re-subreplay').removeClass('hidden');
	});
	
	$('.replybc').on('click',function(){
		$(this).parent().parent().addClass('hidden');
		
	});
	$('.creplybc').on('click',function(){
		if(!validlogin()){ $('#loginwin').modal('show');
			return;
		}
			$(this).parent().addClass('hidden');
			$(this).parent().parent().find('.notesubreplay').removeClass('hidden');
			$(this).parent().parent().find('.notesubreplayedit').addClass('hidden');
		
	});
//删除回复
	$('.panel-collapse').on('click','.delacitem',function(){
		if(!validlogin()){ $('#loginwin').modal('show');
			return;
		}
		var rid=$(this).parent().parent().attr('data');
		//var uid=$('#scuser').val().split('-')[1];
		
		$.ajax({
			   type: "POST",
			   url: "http://localhost/user/reply",
			   data: "action=2&uid="+myuid+"&rid="+rid,
			    dataType: "json",
			   success: function(re){
			   		$('#com'+rid).remove();
			   }
			});
	});
	//发表回复
	
	$('.company-list').find('.re-comment').on('click','.creplybs',function(){
		if(!validlogin()){ $('#loginwin').modal('show');
			return;
		}
		//var uid=$('#scuser').val().split('-')[1];
		var a=$('#rating a').first().attr('name');
		var sid=a.split('-')[0];  //school id
		var touid=0;
	
		var cid=$(this).parent().parent().find('input').val();
		$('.comment-item[data_id='+cid+']').find('.userdetail').find('a').attr('href');
		replyobject=$(this).parent().parent().find('.notesubreplayedit');
		var reply=replyobject.val();
		$.ajax({
			   type: "POST",
			   url: "http://localhost/user/reply",
			   data: "action=1&uid="+myuid+"&touid="+touid+"&sid="+sid+"&cid="+cid+"&content="+reply,
			    dataType: "json",
			   success: function(re){
			   	var rid=re.rid;
			   	var uptime=re.t;
			   	var replyhtml='<div id="com'+rid+'" class="replay-item clearbox">'+
						'<div class="row-coment">'+
							'<a class="fromuser" href="'+mylink+'">'+myname+'</a>'+
						'</div>'+
						'<div class="relay-content">'+
						reply+
						'</div>'+
						
							'<div class="re-actions">'+
								'<em>'+uptime+'</em>'+
								'<div class="re-operator pull-right" data="'+rid+'">'+
									'<div class="pull-left"><a class="acitem praiseacitem" href="javascript:void(0)">赞(0)</a></div>'+
									'<div class="pull-left"><a class="acitem reacitem" href="javascript:void(0)">回复</a></div>'+
									'<div class="pull-left"><a class="acitem juacitem" title="" href="javascript:void(0)">举报</a></div>'+
									'<div class="pull-left"><a class="acitem delacitem" title="" href="javascript:void(0)">删除</a></div>'+
								'</div>'+
							'</div>'+
							'<div class="re-subreplay hidden">'+
								'<textarea class="form-control clearbox notesubreplay" placeholder="发表评论"></textarea>'+
								'<div class="pull-right">'+
								'<button class="pull-left replybc btn btn-default" type="button">取消</button>'+
								'<button class="pull-left replybs btn btn-primary" type="button">发表</button>'+
								'</div>'+
								'<input type="hidden" value="'+myuid+'" name="fuid">'+
								'<input type="hidden" value="'+cid+'" name="cid">'+
							'</div>'+
					'</div>';
					$('#collapse'+cid).find('.re-comment').before(replyhtml);
					replyobject.val('');
					
			   }
			});
			
			
	});
	$('.re-subreplay').on('click','.replybs',function(){
		if(!validlogin()){ $('#loginwin').modal('show');
			return;
		}
		var a=$('#rating a').first().attr('name');
		var sid=a.split('-')[0];  //school id
		var touid=$(this).parent().parent().find('input[name="fuid"]').val();
		var cid=$(this).parent().parent().find('input[name="cid"]').val();
		var ud=$(this).parent().parent().parent().find('.fromuser');
		var username=ud.text();;
		var userlink=ud.attr('href');;
		var replyobject=$(this).parent().parent().find('.notesubreplay');
		var reply=replyobject.val();
		$.ajax({
			   type: "POST",
			   url: "http://localhost/user/reply",
			   data: "action=1&uid="+myuid+"&touid="+touid+"&sid="+sid+"&cid="+cid+"&content="+reply,
			    dataType: "json",
			   success: function(re){
			   	  	var rid=re.rid;
			   	  	var uptime=re.t;
			   	var replyhtml='<div id="com'+rid+'" class="replay-item clearbox">'+
						'<div class="row-coment">'+
							'<a class="fromuser href='+mylink+'">'+myname+'</a>'+
							'回复<a class="touser href='+userlink+'">'+username+'</a>'+
						'</div>'+
						'<div class="relay-content">'+
						reply+
						'</div>'+
						
							'<div class="re-actions">'+
								'<em>'+uptime+'</em>'+
								'<div class="re-operator pull-right" data="'+rid+'">'+
									'<div class="pull-left"><a class="acitem praiseacitem" href="javascript:void(0)">赞(0)</a></div>'+
									'<div class="pull-left"><a class="acitem reacitem" href="javascript:void(0)">回复</a></div>'+
									'<div class="pull-left"><a class="acitem juacitem" title="" href="javascript:void(0)">举报</a></div>'+
									'<div class="pull-left"><a class="acitem delacitem" title="" href="javascript:void(0)">删除</a></div>'+
								'</div>'+
							'</div>'+
							'<div class="re-subreplay hidden">'+
								'<textarea class="form-control clearbox notesubreplay" placeholder="发表评论"></textarea>'+
								'<div class="pull-right">'+
								'<button class="pull-left replybc btn btn-default" type="button">取消</button>'+
								'<button class="pull-left replybs btn btn-primary" type="button">发表</button>'+
								'</div>'+
								'<input type="hidden" value="'+myuid+'" name="fuid">'+
								'<input type="hidden" value="'+cid+'" name="cid">'+
							'</div>'+
					'</div>';
					$('#collapse'+cid).find('.re-comment').before(replyhtml);
					replyobject.val('')
			   }
			});
	});
	
	//发表评论	
		$('.comment-re').find('button').on('click',function(){
			if(!validlogin()){ $('#loginwin').modal('show');
				return;
			}
			var a=$('#rating a').first().attr('name');
			var sid=a.split('-')[0];  //school id
			var html = keditor.html();
			 var myscore=($('#n_rating').val().trim());
			if(checkspace(trim(html))) {
		    	alert("发表内容不能为空！");
				return false;
  			}
  			if($(this).parent().find('input').val()==1){
  			$.ajax({
			   type: "POST",
			   url: "http://localhost/user/comment",
			   data: "action=1&uid="+myuid+"&sid="+sid+"&content="+html,
			    dataType: "json",
			   success: function(re){
			  //   alert( "Data Saved: " + re.cid );
			     var cid=re.cid;
			     var uptime=re.t;
			    
			     var comment= ' <div class="comment-item clearbox"  data-id="'+cid+'"> '+
				'<div class="pull-left post-col">'+
							'<div class="widget-vote">'+
							'<button class="like" data-pressed="false" title="" data-placement="top" data-toggle="tooltip" data-do="like" data-type="answer" data-id="1020000002423831" type="button" data-original-title="答案对人有帮助，有参考价值"></button>'+
							'<span class="count">0</span>'+
							'<button class="hate" data-pressed="false" title="" data-placement="bottom" data-toggle="tooltip" data-do="hate" data-type="answer" data-id="1020000002423831" type="button" data-original-title="答案没帮助，是错误的答案，答非所问"></button>'+
							'</div>'+
							'</div>'+
				'<div class="content">'+
					'<a href="'+mylink+'">'+
								'<img class="avatar-24 pull-right" alt="" src="'+myimg+'">'+
							'</a>'+
					'<div class="row-coment">'+
						'<div class="pull-left"><span class="bigstar'+myscore+'0 rating" title="力荐"></span></div>'+
								'<div class="pull-left"><a href="'+mylink+'">'+myname+'</a></div>评论于<em>'+uptime+'</em>'+
								'</div>'+
								'<div class="comment-body"> '+
									html+
 								'</div>'+
 								'<div class="actions pull-right" data-id="'+cid+'">'+
									
									'<div class="pull-left collapseitem"><a class="acitem collapseitem" title="" href="#collapse'+cid+'"  data-toggle="collapse" target="_blank">'+
										'回复(0)</a></div>'+
									'<div class="pull-left"><a class="acitem"  href="javascript:void(0)" rel="nofollow" >举报</a></div>'+
								'<div class="pull-left"><a class="acitem commodify"  href="javascript:void(0)" rel="nofollow" >修改</a></div>'+
								'<div class="pull-right"><a class="acitem comdel"  href="javascript:void(0)" rel="nofollow" >删除</a></div>'+
								'</div>'+
								'<div class="misc-info clearbox">'+
									'<div id="collapse'+cid+'" class="clearbox panel-collapse collapse in">'+
									
									  ' <div class="re-subreplay">'+
										'<textarea class="form-control clearbox notesubreplay"  value="" placeholder="发表评论"></textarea>'+
										'<textarea class="form-control clearbox notesubreplayedit hidden" value="" placeholder=""></textarea>'+
										'<div class="pull-right hidden">'+
									'	<button class="pull-left creplybc btn btn-default" type="button">取消</button>'+
										'<button class="pull-left creplybs btn btn-primary" type="button">发表</button>'+
										'</div>'+
									'	</div>'+
								      	
									'</div>'+
								'</div>'+
							'</div>'+
						'</div>';
				
			$('.comment-list').append(comment);
			$("#collapse"+cid+"").collapse('hide');
			$('.comment-re').find('input[name="action"]').val(1);
			$('.comment-re').find('input[name="cid"]').val(0);
			keditor.html("");
			   }
			});
  			}
			else{
			   var cid=$('.comment-re').find('input[name="cid"]').val();
				$.ajax({
			   type: "POST",
			   url: "http://localhost/user/comment",
			   data: "action=2&uid="+myuid+"&cid="+cid+"&content="+html,
			   dataType: "json",
			   success: function(re){
				   var it=$('.comment-list').find('.comment-item[data-id="'+cid+'"]');
				   it.find('.comment-body').html(html);
				   
				   	$('.comment-re').find('input[name="action"]').val(1);
					$('.comment-re').find('input[name="cid"]').val(0);
			   		keditor.html("");
			   }
			   });
				
			
			}
			
		});
		$('.company-list').on('click','.commodify',function(){
				var cid=$(this).parent().parent().attr('data-id');
				$('.comment-re').find('input[name="cid"]').val(cid);
				$('.comment-re').find('input[name="action"]').val(2);
				var cen=$('.comment-item[data-id='+cid+']').find('.comment-body').html();
				keditor.html(cen);
				keditor.focus();
				
		});
		
		
		$('.company-list').on('click','.comdel',function(){
				var cid=$(this).parent().parent().attr('data-id');
					$.ajax({
					   type: "POST",
					   url: "http://localhost/user/comment",
					   data: "action=3&uid="+myuid+"&cid="+cid,
					    dataType: "json",
					   success: function(re){
					//   	alert(re.res);
					   	if(re.res==1)
					   		var cen=$('.comment-item[data-id='+cid+']').remove();
					   }
					});
		});
		
			$('.company-list').on('click','.juacitem',function(){
				$('#reportwin').modal('show');
			});
			
		
		
		var validlogin=function(){
			var i=$('#scuser').val().split('-')[1];
			if(Number(i)>0) {
				return true;
			}
			else return false;
		}
		
function requared()
{
  if(checkspace(document.admininfo.admin.value)) {
	document.admininfo.admin.focus();
    alert("管理员不能为空！");
	return false;
  }
 
 }
 function checkspace(checkstr) {
  var str = '';
  if(typeof(checkstr) == "undefined")
  	return true;
  for(i = 0; i < checkstr.length; i++) {
    str = str + ' ';
  }
  return (str == checkstr);
}

});
	
//去掉字符串头尾空格   
function trim(str){
    return str.replace(/(^\s*)|(\s*$)/g, "");
}

/**
 * 检查输入的邮箱格式是否正确
 * 输入:str  字符串
 * 返回:true 或 flase; true表示格式正确
 */
function checkEmail(str){
    if (str.match(/[A-Za-z0-9_-]+[@](\S*)(net|com|cn|org|cc|tv|[0-9]{1,3})(\S*)/g) == null) {
        return false;
    }
    else {
        return true;
    }
}


/**
 * 检查输入的手机号码格式是否正确
 * 输入:str  字符串
 * 返回:true 或 flase; true表示格式正确
 */
function checkMobilePhone(str){
    if (str.match(/^(?:13\d|15[89])-?\d{5}(\d{3}|\*{3})$/) == null) {
        return false;
    }
    else {
        return true;
    }
}
