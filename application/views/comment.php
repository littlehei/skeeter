
<script src="<?php echo base_url();?>resource/js/kindeditor-min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>resource/js/zh_CN.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>resource/js/comment.js" type="text/javascript"></script>
<script type="text/javascript">
	
</script>
<div class="scon">
<div class="container">
	<div class="row">
	
		<div class="col-md-9 box">
	<div class="topheader  clearbox">
					<div class="title">
					<div class="pull-left">
			
				<h2><a data="<?php echo $sch_info->sch_id?>" href="<?php echo $sch_info->sch_id?>"><?php echo $sch_info->sch_name?> </a></h2>
			
			</div>
			<ul class="pull-right list-group">
				<?php if($this->session->userdata('id')):?>
					<?php if ($login_info->status==0):?>
					<li id="focusschool" data="0" class="acbtn list-group-item pull-left">
						<a href="#"><b>关注
						</b></a>
					</li>
						<?php else: ?>
					<li id="focusschool" data="1" class="acbtn list-group-item pull-left">
						<a href="#"><b>已关注
						</b></a>
					</li>
					<?php endif;?>
				<?php else: ?>
					<li id="focusschool" data="0" class="acbtn list-group-item pull-left">
						<a href="#"><b>关注
						</b></a>
					</li>
				<?php endif;?>
				<li class="acbtn list-group-item pull-right">
					<a href="#"><b>分享
					</b></a>
				</li>
			</ul>
			</div>
		<div class="media">
			<div class="intro-body">
				<div class="detail">
					<div class="pull-left sitem"><div class="rating_wrap" rel="v:rating">
					<p class="rating_self clearfix" typeof="v:Rating">
					<span class="ll bigstar35"></span>
					<strong class="ll rating_num" property="v:average"> <?php echo $sch_info->com_score?>.0</strong>
					<span content="10.0" property="v:best"></span>(<span style="height:18px;margin:5px 0;font-size:14px;" property="v:votes"> <?php echo $sch_info->com_num?></span>人评价)
					</p>
			   </div></div>
					<div class="sitem"> <span>院校类型： <?php echo $sch_info->band?></span>
					<span>所在地区： <?php echo $sch_info->country?><?php echo $sch_info->province?>	
						<?php echo $sch_info->city?></span>	
					</div>
					<div class="clearbox sitem"><span>学校性质：公立</span><span>学校成立时间： <?php echo $sch_info->build_time?></span>
						<span>排名趋势：上升</span><span>学校层次：省级</span>
						<span>学区： <?php echo $sch_info->district?></span>
					</div>
					<div class="sitem"><a id="clickmore" data-toggle="collapse" href="#collapseschool">更多信息>></a></div>
					<div id="collapseschool" class="panel-collapse collapse in">
						<div class="schmore pull-left">
							<div class="sitem"><span>地址： <?php echo $sch_info->address?></span> </div>
					   <div class="sitem"><span>网址： <a href="http://<?php echo $sch_info->site?>" target="_blank"><?php echo $sch_info->site?></a></span></div>
					   <div class="sitem"><span>学校电话： <?php echo $sch_info->tel?></span>
						</div>
					<div class="sitem">学校简介： <?php echo $sch_info->introduce?></div>
						</div>
						<div class="schmap pull-left">
							<div class="map">地图</div>
						</div>
						
					
					</div>
					<div class="ll j a_stars clearbox">
		<div class="pull-left">评价:</div>
		<div class="pull-left" id="rating">
			<div class="pull-left"><a class="j a_show_login" name="4-c-2" href="javascript:void(0)">
			<img id="star1" src="<?php echo base_url();?>resource/image/star.gif">
			</a></div>
			<div class="pull-left"><a class="j a_show_login" name="4-c-4" href="javascript:void(0)">
			<img id="star2" src="<?php echo base_url();?>resource/image/star.gif">
			</a></div>
			<div class="pull-left"><a class="j a_show_login" name="4-c-6" href="javascript:void(0)">
			<img id="star3" src="<?php echo base_url();?>resource/image/star.gif">
			</a></div>
			<div class="pull-left"><a class="j a_show_login" name="4-c-8" href="javascript:void(0)">
			<img id="star4" src="<?php echo base_url();?>resource/image/star.gif">
			</a></div>
			<div class="pull-left"><a class="j a_show_login" name="4-c-10" href="javascript:void(0)">
			<img id="star5" src="<?php echo base_url();?>resource/image/star.gif">
			</a></div>
		</div>
		<div id="rateword" class="pl"></div>
			<?php if($this->session->userdata('id')):?>
				<input id="n_rating" type="hidden" value="<?php echo $login_info->score/2;?>">
			<?php else: ?>
				<input id="n_rating" type="hidden" value="0">
			<?php endif;?>
				
		
		</div>
				</div>
			</div>
			
		</div>
	
	<div>
		
	</div>
	</div>
<div class="schpic clearbox">
	
	<h3 class="comment-head">学校实景(<?php echo $sch_image->num_rows();?>)</h3>
	
	<div class="clearbox">
		<ul>
	<?php if($sch_image->num_rows()>0):?>
		<?php foreach($sch_image->result() as $row): ?>
		    <li class="item">
				<a href="<?php echo base_url();?>school/image/<?php echo $row->id?>">
				<img alt="图片" src="<?php echo base_url();?>resource/<?php echo $row->path?>.jpg">
				</a>
			</li>
		<?php endforeach; ?>
	<?php endif;?>
		</ul>
	</div>
</div>
<div>
	<h3 class="comment-head"><a class="cu">学校评论</a><span class="sub-title">(<?php echo $sch_comm->num_rows()?>)</span>
	</h3>
	<div class="company-list comment-list clearbox"> 
			<?php if($sch_comm->num_rows()>0):?>
		<?php foreach($sch_comm->result() as $row): ?>
		  <div class="comment-item clearbox" data-id="<?php echo $row->comment_id?>">
				<div class="pull-left post-col">
							<div class="widget-vote">
							<button class="like" data-pressed="false" title="" data-placement="top" data-toggle="tooltip" data-do="like" data-type="answer" data-id="<?php echo $row->comment_id?>" type="button" data-original-title="答案对人有帮助，有参考价值"></button>
							<span class="count"><?php echo $row->praise_num ?></span>
							<button class="hate" data-pressed="false" title="" data-placement="bottom" data-toggle="tooltip" data-do="hate" data-type="answer" data-id="<?php echo $row->comment_id?>" type="button" data-original-title="答案没帮助，是错误的答案，答非所问"></button>
							</div>
							</div>
				<div class="content">
					
					<div class="pull-right"><a href="<?php echo base_url();?>people/<?php echo $row->uid;?>">
								<img class="avatar-24" alt="" src="<?php echo base_url();?>resource/image/<?php echo $row->path?>">
							</a></div>
					<div class="row-coment">
						<div class="pull-left"><span class="bigstar<?php echo $row->score/2;?>0 rating" title="力荐"></span></div>
								<div class="user detail pull-left"><a href="<?php echo base_url();?>people/<?php echo $row->uid;?>"><?php echo $row->username;?></a></div>评论于<em><?php echo $row->create_time ?></em>
								</div>
								<div class="comment-body"> 
									<?php echo $row->content ?>
 								</div>
 									<div class="actions pull-right"  data-id="<?php echo $row->comment_id?>">
									
									<div class="pull-left collapseitem"><a class="acitem collapseitem" title="" href="#collapse<?php echo $row->comment_id?>"  data-toggle="collapse" target="_blank">
										回复(<?php echo ${"comm_$row->comment_id"}->num_rows();?>)</a></div>
									
								
								<?php if($row->uid==$this->session->userdata('id')):?>
									<div class="pull-left"><a class="acitem commodify"  href="javascript:void(0)" rel="nofollow" >修改</a></div>
									<div class="pull-left"><a class="acitem comdel"  href="javascript:void(0)" rel="nofollow" >删除</a></div>
								<?php endif;?>
								<div class="pull-left"><a class="acitem juacitem"  href="javascript:void(0)" rel="nofollow" >举报</a></div>
								</div>
								<div class="misc-info clearbox">
									<div id="collapse<?php echo $row->comment_id?>" class="panel-collapse collapse in">
									<?php if(${"comm_$row->comment_id"}->num_rows()>0):?>
									<?php foreach(${"comm_$row->comment_id"}->result() as $replyrow): ?> 
									   <div class="replay-item clearbox" id="com<?php echo $replyrow->id ?>">
									   	<div class="row-coment">
											<a class="fromuser" href="<?php echo base_url();?>people/<?php echo $replyrow->uid ?>"><?php echo $replyrow->fuser?></a>
											<?php if($replyrow->replayto_uid>0):?>
											回复<a class="touser" href="<?php echo base_url();?>people/<?php echo $replyrow->replayto_uid ?>"><?php echo $replyrow->touser?></a>
											<?php endif;?>
										</div>
										<div class="relay-content">
										
										<?php echo $replyrow->content ?>	
										</div>
										<div class="re-actions">
											<em>2014-09-18 16:36</em>
											<div class="re-operator pull-right" data="<?php echo $replyrow->id ?>">
											<div class="pull-left"><a class="acitem praiseacitem" href="javascript:void(0)">赞(0)</a></div>
											<div class="pull-left"><a class="acitem reacitem"  href="javascript:void(0)">回复</a></div>
											<div class="pull-left"><a class="acitem juacitem" title="" href="javascript:void(0)">举报</a></div>
										<?php if($replyrow->uid==$this->session->userdata('id')):?>
											<div class="pull-left"><a class="acitem delacitem" title="" href="javascript:void(0)">删除</a></div>
										<?php endif;?>
											</div>
											
										</div>
										 <div class="re-subreplay hidden">
									   		 <textarea class="form-control clearbox notesubreplay" placeholder="发表评论"></textarea>
									   		<div class="pull-right">
									   		<button type="button" class="pull-left replybc btn btn-default">取消</button>  
											<button type="button" class="pull-left replybs btn btn-primary">发表</button>  
									   		</div>
									   		
									   		<input type="hidden" name="fuid" value="<?php echo $replyrow->uid ?>"/>
									   		<input type="hidden" name="cid" value="<?php echo $row->comment_id ?>"/>
									   </div>
									 </div>
									<?php endforeach; ?>
									<?php endif;?>
			
									   <div class="re-subreplay re-comment">
									   		 <textarea class="form-control clearbox notesubreplay" placeholder="发表评论" value=""></textarea>
									   	 <textarea class="form-control clearbox notesubreplayedit hidden" placeholder="" value=""></textarea>
									   		<div class="pull-right hidden">
									   		<button type="button" class="pull-left creplybc btn btn-default">取消</button>  
											<button type="button" class="pull-left creplybs btn btn-primary">发表</button>  
									   		</div>
											<input type="hidden" name="cid" value="<?php echo $row->comment_id?>"/>
									   </div>
								      	
									</div>	
								</div>
							</div>
						</div>
		<?php endforeach; ?>
	<?php endif;?>
	
					</div>
					
					<div class="comment-re clearbox">
					<a class="pull-left" href="#">
								<img class="img img-circle" title="小米" alt="小米" src="<?php echo base_url();?>resource/image/2.png">
							</a>
						<div class="comment-right pull-left">
							<div class="re-head clearbox">发表评论</div>
							<textarea id="noteAddText" class="clearbox" style="display: block; line-height: 20px;"></textarea>
							<input type="hidden" name="action" value="1"/>
							<input type="hidden" name="cid" value="0"/>
							<button type="button" class="clearbox btn btn-default">发表</button>
						</div>
					</div>
		</div>
	</div>
		<div class="col-md-3">
			
				<div class="adver">
					广告
				</div>
			
		</div>
	</div>
</div>