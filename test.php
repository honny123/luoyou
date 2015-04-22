<?php $logged_user = $this->session->userdata('logged_user'); ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $activity->activity_title;?> - 娲诲姩璇︾粏</title>
        <meta name="keywords" content="" >
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
		<base href="<?php echo site_url(); ?>"/>
        <link rel="stylesheet" href="<?php echo site_url('assets/front/css/normalize.css');?>">
        <link rel="stylesheet" href="<?php echo site_url('assets/front/css/style.css');?>">
        	<link rel="stylesheet" href="<?php echo site_url('assets/front/css/more.css');?>" />
		<link rel="stylesheet" href="<?php echo site_url('assets/front/css/activitymore.css');?>" />
        <script src="<?php echo site_url('assets/front/js/vendor/modernizr-2.6.2.min.js');?>"></script>
        
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="<?php echo site_url("assets/js/vendor/html5shiv.js");?>"></script>
		<![endif]-->
		</head>

	<body>
		<div style="width:100%;background:#fff;">
			<?php include APPPATH . 'views/header.php';?>
		</div>
		<div class="wrapper clearfix">
			<input type="hidden" value="<?php if($logged_user){echo $logged_user->user_id;} ?>" id="isLogin" />
			<input type="hidden" value="<?php echo $activity->activity_id; ?>" id="activityId" name="activityId" />	
				<div class="wrapper-left">
					<div class="left">
						<div class="activity-pic clearfix">
							<img src="<?php echo site_url('uploads/activities/'.$activity->activity_thumb); ?>" width="200" height="141" class="thumb"/>
							<div class="caption">
								<h2><a href="#"><?php echo $activity->activity_title;?></a></h2>
								<p>鏃堕棿锛�strong><?php echo $activity->start_date; ?> - <?php echo $activity->end_date; ?></strong></p>
								<p>鎵�渶绉垎锛�strong><?php echo $activity->need_jf;?></strong></p>
								<p>浜烘暟锛�strong><?php echo $activity->define_num;?></strong></p>
								<p>鐘舵�锛�strong>姝ｅ湪鎶ュ悕</strong></p>
							</div>
							<div class="interest clearfix">
								<ul class="t1 clearfix">
									<li>
										<span><b><?php echo count($participates); ?>&nbsp;</b>浜烘姤鍚�/span>
									</li>
									<li><span><b class="interest_num"><i><?php echo $activity->interest_num; ?></i>&nbsp;</b>浜哄枩娆�/span></li>
									<li><span class="btn-interest"><i class='<?php echo $love?'red':'' ?>'></i><b>
										 <?php 
										 	if($love){
										 		echo '鍙栨秷';
										 	}else{
										 		echo '鍠滄';
										 	}
										  ?>
										</b></span></li>
									<li><span class="line"></span></li>
									<li  class="share clearfix" style="margin-right:0;">
										<span>鍒嗕韩鍒�b></b></span>
										<ul class="w-share clearfix">
											<li class="qz"><i class="qzone"></i><a href="javascript:;">QQ绌洪棿</a></li>
											<li class="sina"><i class="xinlang"></i><a href="javascript:;">鏂版氮寰崥</a></li>
											<li class="ren"><i class="renren"></i><a href="javascript:;">浜轰汉缃�/a></li>
											<li class="tecent"><i class="tengxun"></i><a href="javascript:;">鑵捐寰崥</a></li>
										</ul>
										
									</li>
								</ul>					
							</div>
							<form name="comment-form" method="post" id="add-comment">
								<!-- <input type="hidden" name="comm" value="0">
								<input type="hidden" name="show" value="<?php echo $show->show_id;?>"> -->
								<input type="hidden" name="user" value="<?php if($login_user) echo $login_user->user_id;?>">
							</form>
						</div>
						<div class="descript">
							<h3>娲诲姩浠嬬粛</h3>
							<div class="desc_control">
								<?php echo $activity->activity_desc; ?>
							</div>
							<a href="javascript:;" class="btn-hide">灞曞紑鍏ㄩ儴</a>										
						</div>	
						<div class="descript">
							<h3>娲诲姩瑙嗛&nbsp;&middot;&nbsp;&middot;&nbsp;&middot;&nbsp;&middot;&nbsp;&middot;&nbsp;&middot;<span>(&nbsp;<a href="<?php echo site_url('activity/showall/'.$activity->activity_id); ?>" class="count">鍏ㄩ儴<?php echo count($activity_show); ?>涓�/a>&nbsp;)</span></h3>	
							<div class="hot-show">
							<ul class="clearfix">
								<?php foreach ($activity_show as $show) { ?>
									<li><a href="<?php echo site_url('talent/'.$show->show_id);?>"><img src="<?php echo site_url('uploads/shows/'.$show->photo);?>" alt="" width="110" height="165"/><a href="<?php echo site_url('talent/'.$show->show_id);?>" class="title"><?php echo mb_strlen($show->show_title)>15?mb_substr($show->show_title,0,15)."鈥︹�":$show->show_title;?></a></a></li>
								<?php } ?>
							</ul>
							</div>									
						</div>
						<div class="descript">
							<h3>娲诲姩鐩哥墖&nbsp;&middot;&nbsp;&middot;&nbsp;&middot;&nbsp;&middot;&nbsp;&middot;&nbsp;&middot;<span>(&nbsp;<a href="<?php echo site_url('activity/picture_all/'.$activity->activity_id); ?>" class="count">鍏ㄩ儴<?php echo count($activity_pic); ?>涓�/a>&nbsp;)</span></h3>	
							<div class="hot-show-pic">
							<ul class="clearfix">
								<?php foreach ($activity_pic as $pic) { ?>
									<li><a href="<?php 
										if($logged_user){
				    						echo site_url('activity/picture_detail/'.$pic->activity_pic_id.'/'.$login_user->user_id); 
										}else{
											echo site_url('activity/picture_detail/'.$pic->activity_pic_id);  
										}
											
										
										?>"><img src="<?php echo site_url('uploads/activities/'.$pic->pic_thumb_src);?>" alt="#" width="100"/><p class="title"><?php echo $pic->pic_title; ?></p></a></li>									
								<?php } ?>
																	
							</ul>
							</div>									
						</div>
						<div class="descript add clearfix">
							<h3>娲诲姩璁哄潧</h3>	
							<!--<a href="<?php if($logged_user){echo site_url('activity/topic/'.$activity->activity_id);}else{echo site_url('activity/discuss_creat');} ?>" class="btn-add"><div ><b>+</b>娣诲姞鏂拌瘽棰�/div></a>-->
							<a href="<?php echo site_url('activity/topic/'.$activity->activity_id); ?>" class="btn-add"><div ><b>+</b>娣诲姞鏂拌瘽棰�/div></a>
							<ul class="clearfix">
								<?php foreach ($forums as $forum) { ?>
								<li>
									<span class="words" ><a style='float:left; word-break:break-all; width:380px;' href="<?php echo site_url('activity/discussion/'.$activity->activity_id."/".$forum->activity_forum_id); ?>"><?php echo mb_strlen($forum->activity_forum_title)>90?mb_substr($forum->activity_forum_title,0,90).'. . .':$forum->activity_forum_title?></a></span>
									<a href="<?php echo site_url('user/my/'.$forum->user_id);?>" class="name"><span><?php echo $forum->user_name; ?></span></a>
									<span class="time"><?php echo $forum->activity_forum_date; ?></span>
								</li>
								<?php } ?>
								<li></li>
							</ul>
						</div>																					
					</div>										
				</div>
				<div class="wrapper-right">
					<h3><a href="<?php echo site_url('activity'); ?>">> 鍥炲埌鎵�湁绾夸笂娲诲姩</a></h3>
				<div class="side">
					<?php if($ad_info){?>
						<a href="http://<?php echo $ad_info->ad_link; ?>" class="hit_ad" target="_blank" data-id="<?php echo $ad_info->ad_id; ?>">
							<img src="<?php echo site_url('uploads/ad/'.$ad_info->thumb_img);?>" width="290"/>
						</a>
					<?php } ?>
				</div>
				<div class="all">
					<div class="all-g">
						<h2>娲诲姩璧炲姪鏂�/h2>
						<ul class="clearfix">
							<?php foreach ($assists as $assist) { ?>
								<li><a href="javascript:;"><?php echo $assist; ?></a></li>	
							<?php } ?>
						</ul>
					</div>
					<div class="jifen">
						<?php if($activity->school_grade){ ?>
							<h2>娲诲姩鍙備笌鑰呭緱绁ㄦ</h2>
						<?php }else{ ?>
							<h2>娲诲姩鍙備笌鑰呯Н鍒嗘</h2>
						<?php } ?>
						<a href="<?php echo site_url('activity/allparts/'.$activity->activity_id); ?>" class="more">鎵�湁銆�/a>
					</div>
					<ul class="jifen-list clearfix">
						<?php foreach ($participates as $participate) { ?>
						<li><a href="<?php echo site_url('user/my/'.$participate->user_id);?>"><img src="<?php echo site_url('uploads/portraits/'.$participate->user_photo_thumb);?>"width="47" height="47"/></a>
							<p><a href="<?php echo site_url('user/my/'.$participate->user_id);?>"><?php echo $participate->user_name; ?></a></p><p>
								<?php if($activity->school_grade){ ?>
									<?php echo $participate->all_score; ?>绁�/<?php echo $participate->fans_num;?>浜哄叧娉�
								<?php }else{ ?>
									<?php echo $participate->all_score; ?>鍒�/<?php echo $participate->fans_num;?>浜哄叧娉�
								<?php } ?>
							</p></li>
						<?php } ?>
						
					</ul>
				</div>
			</div>
			<?php include APPPATH . 'views/footer.php';?>	
		</div>
		<script src="<?php echo site_url('assets/front/js/vendor/seajs/sea.js'); ?>" data-config="<?php echo site_url('assets/front/js/seajs-config.js'); ?>" data-main="<?php echo site_url('assets/front/js/activitydetail.js'); ?>"></script>
	</body>
			
</html>