<?php	
if(function_exists('current_user_can'))
//if(!current_user_can('manage_options')) {
    
if(!current_user_can('delete_pages')) {
    die('Access Denied');
}	
if(!function_exists('current_user_can')){
	die('Access Denied');
}

function html_showgallerys( $rows,  $pageNav,$sort,$cat_row){
	global $wpdb;
	?>
    <script language="javascript">
		function ordering(name,as_or_desc)
		{
			document.getElementById('asc_or_desc').value=as_or_desc;		
			document.getElementById('order_by').value=name;
			document.getElementById('admin_form').submit();
		}
		function saveorder()
		{
			document.getElementById('saveorder').value="save";
			document.getElementById('admin_form').submit();
			
		}
		function listItemTask(this_id,replace_id)
		{
			document.getElementById('oreder_move').value=this_id+","+replace_id;
			document.getElementById('admin_form').submit();
		}
		function doNothing() {  
			var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
			if( keyCode == 13 ) {

				if(!e) var e = window.event;

				e.cancelBubble = true;
				e.returnValue = false;

				if (e.stopPropagation) {
						e.stopPropagation();
						e.preventDefault();
				}
			}
		}
	</script>

<div class="wrap">
            <?php $path_site2 = plugins_url("../images", __FILE__); ?>
		<style>
		.free_version_banner {
			position:relative;
			display:block;
			background-image:url(<?php echo $path_site2; ?>/wp_banner_bg.jpg);
			background-position:top left;
			backround-repeat:repeat;
			overflow:hidden;
		}
		
		.free_version_banner .manual_icon {
			position:absolute;
			display:block;
			top:15px;
			left:15px;
		}
		
		.free_version_banner .usermanual_text {
                        font-weight: bold !important;
			display:block;
			float:left;
			width:270px;
			margin-left:75px;
			font-family:'Open Sans',sans-serif;
			font-size:12px;
			font-weight:300;
			font-style:italic;
			color:#ffffff;
			line-height:10px;
                        margin-top: 0;
                        padding-top: 15px;
		}
		
		.free_version_banner .usermanual_text a,
		.free_version_banner .usermanual_text a:link,
		.free_version_banner .usermanual_text a:visited {
			display:inline-block;
			font-family:'Open Sans',sans-serif;
			font-size:17px;
			font-weight:600;
			font-style:italic;
			color:#ffffff;
			line-height:30.5px;
			text-decoration:underline;
		}
		
		.free_version_banner .usermanual_text a:hover,
		.free_version_banner .usermanual_text a:focus,
		.free_version_banner .usermanual_text a:active {
			text-decoration:underline;
		}
		
		.free_version_banner .get_full_version,
		.free_version_banner .get_full_version:link,
		.free_version_banner .get_full_version:visited {
                        padding-left: 60px;
                        padding-right: 4px;
			display: inline-block;
                        position: absolute;
                        top: 15px;
                        right: calc(50% - 167px);
                        height: 38px;
                        width: 268px;
                        border: 1px solid rgba(255,255,255,.6);
                        font-family: 'Open Sans',sans-serif;
                        font-size: 23px;
                        color: #ffffff;
                        line-height: 43px;
                        text-decoration: none;
                        border-radius: 2px;
		}
		
		.free_version_banner .get_full_version:hover {
			background:#ffffff;
			color:#bf1e2e;
			text-decoration:none;
			outline:none;
		}
		
		.free_version_banner .get_full_version:focus,
		.free_version_banner .get_full_version:active {
			
		}
		
		.free_version_banner .get_full_version:before {
			content:'';
			display:block;
			position:absolute;
			width:33px;
			height:23px;
			left:25px;
			top:9px;
			background-image:url(<?php echo $path_site2; ?>/wp_shop.png);
			background-position:0px 0px;
			background-repeat;
		}
		
		.free_version_banner .get_full_version:hover:before {
			background-position:0px -27px;
		}
		
		.free_version_banner .huge_it_logo {
			float:right;
			margin:15px 15px;
		}
		
		.free_version_banner .description_text {
                        padding:0 0 13px 0;
			position:relative;
			display:block;
			width:100%;
			text-align:center;
			float:left;
			font-family:'Open Sans',sans-serif;
			color:#fffefe;
			line-height:inherit;
		}
                .free_version_banner .description_text p{
                        margin:0;
                        padding:0;
                        font-size: 14px;
                }
		</style>
	<div class="free_version_banner">
		<img class="manual_icon" src="<?php echo $path_site2; ?>/icon-user-manual.png" alt="user manual" />
		<p class="usermanual_text"><?php echo __('If you have any difficulties in using the options, Follow the link to', 'gallery-images'); ?> <a href="http://huge-it.com/wordpress-gallery-user-manual/" target="_blank"><?php echo __('User Manual', 'gallery-images'); ?></a></p>
		<a class="get_full_version" href="http://huge-it.com/wordpress-gallery/" target="_blank"><?php echo __('GET THE FULL VERSION', 'gallery-images'); ?></a>
                <a href="http://huge-it.com" target="_blank"><img class="huge_it_logo" src="<?php echo $path_site2; ?>/Huge-It-logo.png"/></a>
                <div style="clear: both;"></div>
		<div  class="description_text"><p><?php echo __('This is the free version of the plugin. Click "GET THE FULL VERSION" for more advanced options.   We appreciate every customer.', 'gallery-images'); ?></p></div>
	</div>
	</div>
	<div style="clear: both;"></div>
	<div id="poststuff">
		<div id="gallerys-list-page">
			<form method="post"  onkeypress="doNothing()" action="admin.php?page=gallerys_huge_it_gallery" id="admin_form" name="admin_form">
			<h2><?php echo __('Huge-IT Galleries', 'gallery-images'); ?>
				<a onclick="window.location.href='admin.php?page=gallerys_huge_it_gallery&task=add_cat'" class="add-new-h2" ><?php echo __('Add New Gallery', 'gallery-images'); ?></a>
			</h2>
			<?php
			$serch_value='';
			
			if(isset($_POST['serch_or_not'])) {
				$_POST['serch_or_not'] = esc_html($_POST['serch_or_not']);
				$_POST['serch_or_not'] = esc_html($_POST['serch_or_not']);
				if($_POST['serch_or_not']=="search"){ $serch_value=esc_html(stripslashes($_POST['search_events_by_title'])); }else{$serch_value="";}
				} 
			$serch_fields='<div class="alignleft actions"">
				<label for="search_events_by_title" style="font-size:14px">Filter: </label>
					<input type="text" name="search_events_by_title" value="'.$serch_value.'" id="search_events_by_title" onchange="clear_serch_texts()">
			</div>
			<div class="alignleft actions">
				<input type="button" value="Search" onclick="document.getElementById(\'page_number\').value=\'1\'; document.getElementById(\'serch_or_not\').value=\'search\';
				 document.getElementById(\'admin_form\').submit();" class="button-secondary action">
				 <input type="button" value="Reset" onclick="window.location.href=\'admin.php?page=gallerys_huge_it_gallery\'" class="button-secondary action">
			</div>';

			?>
			<table class="wp-list-table widefat fixed pages" style="width:95%">
				<thead>
				 <tr>
					<th scope="col" id="id" style="width:30px" ><span>ID</span><span class="sorting-indicator"></span></th>
					<th scope="col" id="name" style="width:85px" ><span><?php echo __('Name', 'gallery-images'); ?></span><span class="sorting-indicator"></span></th>
					<th scope="col" id="prod_count"  style="width:75px;" ><span><?php echo __('Images', 'gallery-images'); ?></span><span class="sorting-indicator"></span></th>
					<th style="width:40px"><?php echo __('Delete', 'gallery-images'); ?></th>
				 </tr>
				</thead>
				<tbody>
				 <?php 
				 $trcount=1;
				  for($i=0; $i<count($rows);$i++){
					$trcount++;
					$ka0=0;
					$ka1=0;
					if(isset($rows[$i-1]->id)){
						  if($rows[$i]->sl_width==$rows[$i-1]->sl_width){
						  $x1=$rows[$i]->id;
						  $x2=$rows[$i-1]->id;
						  $ka0=1;
						  }
						  else
						  {
							  $jj=2;
							  while(isset($rows[$i-$jj]))
							  {
								  if($rows[$i]->sl_width==$rows[$i-$jj]->sl_width)
								  {
									  $ka0=1;
									  $x1=$rows[$i]->id;
									  $x2=$rows[$i-$jj]->id;
									   break;
								  }
								$jj++;
							  }
						  }
						  if($ka0){
							$move_up='<span><a href="#reorder" onclick="return listItemTask(\''.$x1.'\',\''.$x2.'\')" title="Move Up">   <img src="'.plugins_url('images/uparrow.png',__FILE__).'" width="16" height="16" border="0" alt="Move Up"></a></span>';
						  }
						  else{
							$move_up="";
						  }
					}else{$move_up="";}

					if(isset($rows[$i+1]->id)){
						
						if($rows[$i]->sl_width==$rows[$i+1]->sl_width){
						  $x1=$rows[$i]->id;
						  $x2=$rows[$i+1]->id;
						  $ka1=1;
						}
						else
						{
							  $jj=2;
							  while(isset($rows[$i+$jj]))
							  {
								  if($rows[$i]->sl_width==$rows[$i+$jj]->sl_width)
								  {
									  $ka1=1;
									  $x1=$rows[$i]->id;
									  $x2=$rows[$i+$jj]->id;
									  break;
								  }
								$jj++;
							  }
						}
						
						if($ka1){
							$move_down='<span><a href="#reorder" onclick="return listItemTask(\''.$x1.'\',\''. $x2.'\')" title="Move Down">  <img src="'.plugins_url('images/downarrow.png',__FILE__).'" width="16" height="16" border="0" alt="Move Down"></a></span>';
						}else{
							$move_down="";	
						}
					}

					$uncat=$rows[$i]->par_name;
					if(isset($rows[$i]->prod_count))
						$pr_count=$rows[$i]->prod_count;
					else
						$pr_count=0;


					?>
					<tr <?php if($trcount%2==0){ echo 'class="has-background"';}?>>
						<td><?php echo $rows[$i]->id; ?></td>
						<td><a  href="admin.php?page=gallerys_huge_it_gallery&task=edit_cat&id=<?php echo $rows[$i]->id?>"><?php echo esc_html(stripslashes($rows[$i]->name)); ?></a></td>
						<td>(<?php if(!($pr_count)){echo '0';} else{ echo $rows[$i]->prod_count;} ?>)</td>
						<td><a  href="admin.php?page=gallerys_huge_it_gallery&task=remove_cat&id=<?php echo $rows[$i]->id?>"><?php echo __('Delete', 'gallery-images'); ?></a></td>
					</tr> 
				 <?php } ?>
				</tbody>
			</table>
			 <input type="hidden" name="oreder_move" id="oreder_move" value="" />
			 <input type="hidden" name="asc_or_desc" id="asc_or_desc" value="<?php if(isset($_POST['asc_or_desc'])){
				 $_POST['asc_or_desc'] = esc_html($_POST['asc_or_desc']);
				 echo $_POST['asc_or_desc']; }?>"  />
			 <input type="hidden" name="order_by" id="order_by" value="<?php if(isset($_POST['order_by'])) echo $_POST['order_by'];?>"  />
			 <input type="hidden" name="saveorder" id="saveorder" value="" />

			<?php @session_start();
		  $hugeItCSRFToken = $_SESSION["csrf_token_hugeit_gallery"] = md5(time());
	?>
	<input type="hidden" name="csrf_token_hugeit_gallery" value="<?php echo $hugeItCSRFToken; ?>" />
			
		   
			</form>
		</div>
	</div>
</div>
    <?php

}
function Html_editgallery($ord_elem, $count_ord,$images,$row,$cat_row, $rowim, $rowsld, $rowsposts, $rowsposts8, $postsbycat)

{
 global $wpdb;
	
	if(isset($_GET["addslide"])){
	if($_GET["addslide"] == 1){
	header('Location: admin.php?page=gallerys_huge_it_gallery&id='.$row->id.'&task=apply');
	}
	}
		
	
?>
<script type="text/javascript">
function submitbutton(pressbutton) 
{
	if(!document.getElementById('name').value){
	alert("Name is required.");
	return;
	
	}
	filterInputs();		
	document.getElementById("adminForm").action=document.getElementById("adminForm").action+"&task="+pressbutton;
	document.getElementById("adminForm").submit();
	
}
var  name_changeRight = function(e) {
	document.getElementById("name").value = e.value;
}
var  name_changeTop = function(e) {
		document.getElementById("huge_it_gallery_name").value = e.value;
		//alert(e);
	};
function change_select()
{
		submitbutton('apply'); 
	
}

	/*** creating array of changed projects***/

function filterInputs() {
	
		var mainInputs = "";
		jQuery("#images-list > li.highlights").each(function(){
			jQuery(this).next().addClass('submit-post');
			jQuery(this).prev().addClass('submit-post');
			jQuery(this).addClass('submit-post');
			jQuery(this).removeClass('highlights');
		})
		if(jQuery("#images-list > li.submit-post").length) {
			
			jQuery("#images-list > li.submit-post").each(function(){
				
				var inputs = jQuery(this).find('.order_by').attr("name");
				var n = inputs.lastIndexOf('_');
				var res = inputs.substring(n+1, inputs.length);
				res +=',';
				mainInputs += res;

			});

			mainInputs = mainInputs.substring(0,mainInputs.length-1);

				
			jQuery(".changedvalues").val(mainInputs);
			
			jQuery("#images-list > li").not('.submit-post').each(function(){
					jQuery(this).find('input').removeAttr('name');
					jQuery(this).find('textarea').removeAttr('name');
			});
			console.log(mainInputs);
			return mainInputs;
		
		}
		jQuery("#images-list > li").each(function(){
				jQuery(this).find('input').removeAttr('name');
				jQuery(this).find('textarea').removeAttr('name');
				jQuery(this).find('select').removeAttr('name');
		});

}	
		/***</add>***/
		
jQuery(function() {
	/*** <posted only submit classes> ***/ 

	jQuery( "#images-list > li input" ).on('keyup',function(){
		jQuery(this).parents("#images-list > li").addClass('submit-post');
		//filterInputs();
	});
	jQuery( "#images-list > li textarea" ).on('keyup',function(){
		jQuery(this).parents("#images-list > li").addClass('submit-post');
	//	filterInputs();
	});
	jQuery( "#images-list > li input" ).on('change',function(){
		jQuery(this).parents("#images-list > li").addClass('submit-post');
	//	filterInputs();
	});
	jQuery('.editimageicon').click(function(){
		jQuery(this).parents("#images-list > li").addClass('submit-post');		
	})
	/*** </posted only submit classes> ***/ 

	jQuery( "#images-list" ).sortable({
	  stop: function() {
			jQuery("#images-list > li").removeClass('has-background');
			count=jQuery("#images-list > li").length;
			for(var i=0;i<=count;i+=2){
					jQuery("#images-list > li").eq(i).addClass("has-background");
			}
			jQuery("#images-list > li").each(function(){
				jQuery(this).find('.order_by').val(jQuery(this).index());
			//	jQuery(this).find('.order_by').trigger('change');
			});
	  },
     change: function(event, ui) {
            var start_pos = ui.item.data('start_pos');
            var index = ui.placeholder.index();
            if (start_pos < index) {
                jQuery('#images-list > li:nth-child(' + index + ')').addClass('highlights');
            } else {
                jQuery('#images-list > li:eq(' + (index + 1) + ')').addClass('highlights');
            }
        },
        update: function(event, ui) {
            jQuery('#sortable li').removeClass('highlights');
        },
	  revert: true
	});
   // jQuery( "ul, li" ).disableSelection();
	});
</script>

<!-- GENERAL PAGE, ADD IMAGES PAGE -->
<?php $path_site2 = plugins_url("../images", __FILE__); ?>
<style>
		.free_version_banner {
			position:relative;
			display:block;
			background-image:url(<?php echo $path_site2; ?>/wp_banner_bg.jpg);
			background-position:top left;
			backround-repeat:repeat;
			overflow:hidden;
		}
		
		.free_version_banner .manual_icon {
			position:absolute;
			display:block;
			top:15px;
			left:15px;
		}
		
		.free_version_banner .usermanual_text {
                        font-weight: bold !important;
			display:block;
			float:left;
			width:270px;
			margin-left:75px;
			font-family:'Open Sans',sans-serif;
			font-size:12px;
			font-weight:300;
			font-style:italic;
			color:#ffffff;
			line-height:10px;
                        margin-top: 0;
                        padding-top: 15px;
		}
		
		.free_version_banner .usermanual_text a,
		.free_version_banner .usermanual_text a:link,
		.free_version_banner .usermanual_text a:visited {
			display:inline-block;
			font-family:'Open Sans',sans-serif;
			font-size:17px;
			font-weight:600;
			font-style:italic;
			color:#ffffff;
			line-height:30.5px;
			text-decoration:underline;
		}
		
		.free_version_banner .usermanual_text a:hover,
		.free_version_banner .usermanual_text a:focus,
		.free_version_banner .usermanual_text a:active {
			text-decoration:underline;
		}
		
		.free_version_banner .get_full_version,
		.free_version_banner .get_full_version:link,
		.free_version_banner .get_full_version:visited {
                        padding-left: 60px;
                        padding-right: 4px;
			display: inline-block;
                        position: absolute;
                        top: 15px;
                        right: calc(50% - 167px);
                        height: 38px;
                        width: 268px;
                        border: 1px solid rgba(255,255,255,.6);
                        font-family: 'Open Sans',sans-serif;
                        font-size: 23px;
                        color: #ffffff;
                        line-height: 43px;
                        text-decoration: none;
                        border-radius: 2px;
		}
		
		.free_version_banner .get_full_version:hover {
			background:#ffffff;
			color:#bf1e2e;
			text-decoration:none;
			outline:none;
		}
		
		.free_version_banner .get_full_version:focus,
		.free_version_banner .get_full_version:active {
			
		}
		
		.free_version_banner .get_full_version:before {
			content:'';
			display:block;
			position:absolute;
			width:33px;
			height:23px;
			left:25px;
			top:9px;
			background-image:url(<?php echo $path_site2; ?>/wp_shop.png);
			background-position:0px 0px;
			background-repeat;
		}
		
		.free_version_banner .get_full_version:hover:before {
			background-position:0px -27px;
		}
		
		.free_version_banner .huge_it_logo {
			float:right;
			margin:15px 15px;
		}
		
		.free_version_banner .description_text {
                        padding:0 0 13px 0;
			position:relative;
			display:block;
			width:100%;
			text-align:center;
			float:left;
			font-family:'Open Sans',sans-serif;
			color:#fffefe;
			line-height:inherit;
		}
                .free_version_banner .description_text p{
                        margin:0;
                        padding:0;
                        font-size: 14px;
                }
		</style>

<div class="wrap">
    <?php $path_site2 = plugins_url("../images", __FILE__); ?>
	<div class="free_version_banner">
		<img class="manual_icon" src="<?php echo $path_site2; ?>/icon-user-manual.png" alt="user manual" />
		<p class="usermanual_text"><?php echo __('If you have any difficulties in using the options, Follow the link to ', 'gallery-images'); ?><a href="http://huge-it.com/wordpress-gallery-user-manual/" target="_blank"><?php echo __('User Manual', 'gallery-images'); ?></a></p>
		<a class="get_full_version" href="http://huge-it.com/wordpress-gallery/" target="_blank"><?php echo __('GET THE FULL VERSION', 'gallery-images'); ?></a>
                <a href="http://huge-it.com" target="_blank"><img class="huge_it_logo" src="<?php echo $path_site2; ?>/Huge-It-logo.png"/></a>
                <div style="clear: both;"></div>
		<div  class="description_text"><p><?php echo __('This is the free version of the plugin. Click "GET THE FULL VERSION" for more advanced options.   We appreciate every customer.', 'gallery-images'); ?></p></div>
	</div>
	<div style="clear: both;"></div>
<form action="admin.php?page=gallerys_huge_it_gallery&id=<?php echo $row->id; ?>" method="post" name="adminForm" id="adminForm">
	<input type="hidden" class="changedvalues" value="" name="changedvalues" size="80">	

	<div id="poststuff" >
	<div id="gallery-header">
		<ul id="gallerys-list">
			
			<?php
			foreach($rowsld as $rowsldires){
				if($rowsldires->id != $row->id){
				?>
					<li>
						<a href="#" onclick="window.location.href='admin.php?page=gallerys_huge_it_gallery&task=edit_cat&id=<?php echo $rowsldires->id; ?>'" ><?php echo $rowsldires->name; ?></a>
					</li>
				<?php
				}
				else{ ?>
					<li class="active" onclick="this.firstElementChild.style.width = ((this.firstElementChild.value.length + 1) * 8) + 'px';" style="background-image:url(<?php echo plugins_url('../images/edit.png', __FILE__) ;?>);cursor: pointer;">
						<input class="text_area" onkeyup = "name_changeTop(this)" onfocus="this.style.width = ((this.value.length + 1) * 8) + 'px'" type="text" name="name" id="name" maxlength="250" value="<?php echo esc_html(stripslashes($row->name));?>" />
					</li>
				<?php	
				}
			}
		?>
			<li class="add-new">
				<a onclick="window.location.href='admin.php?page=gallerys_huge_it_gallery&amp;task=add_cat'">+</a>
			</li>
		</ul>
		</div>
		<div id="post-body" class="metabox-holder columns-2">
			<!-- Content -->
			<div id="post-body-content">


			<?php add_thickbox(); ?>

				<div id="post-body">
					<div id="post-body-heading">
						<h3><?php echo __('Projects/Images', 'gallery-images'); ?></h3>
						


						<script>
jQuery(document).ready(function($){
	jQuery(".wp-media-buttons-icon").click(function() {
		jQuery(".attachment-filters").css("display","none");
	});
  var _custom_media = true,
      _orig_send_attachment = wp.media.editor.send.attachment;
	 

  jQuery('.huge-it-newuploader .button').click(function(e) {
    var send_attachment_bkp = wp.media.editor.send.attachment;
	
    var button = jQuery(this);
    var id = button.attr('id').replace('_button', '');
    _custom_media = true;

	jQuery("#"+id).val('');
	wp.media.editor.send.attachment = function(props, attachment){
      if ( _custom_media ) {
	     jQuery("#"+id).val(attachment.url+';;;'+jQuery("#"+id).val());
		 jQuery("#save-buttom").click();
      } else {
        return _orig_send_attachment.apply( this, [props, attachment] );
      };
    }
  
    wp.media.editor.open(button);
	 
    return false;
  });

  jQuery('.add_media').on('click', function(){
    _custom_media = false;
	
  });
/*	jQuery(".wp-media-buttons-icon").click(function() {
		jQuery(".media-menu .media-menu-item").css("display","none");
		jQuery(".media-menu-item:first").css("display","block");
		jQuery(".separator").next().css("display","none");
		jQuery('.attachment-filters').val('image').trigger('change');
		jQuery(".attachment-filters").css("display","none");
	});*/
});
</script>
						<input type="hidden" name="imagess" id="_unique_name" />
						<span class="wp-media-buttons-icon"></span>
						<div class="huge-it-newuploader uploader button button-primary add-new-image">
						<input type="button" class="button wp-media-buttons-icon" name="_unique_name_button" id="_unique_name_button" value="Add Image" />
						</div>
						<?php $_GET['id'] = esc_html($_GET['id']); ?>					
						<a href="admin.php?page=gallerys_huge_it_gallery&task=gallery_video&id=<?php echo $_GET['id']; ?>&TB_iframe=1" class="button button-primary add-video-slide thickbox"  id="slideup3s" value="iframepop">
							<span class="wp-media-buttons-icon"></span><?php echo __('Add Video', 'gallery-images'); ?>
						</a>


					
				
					</div>
					<ul id="images-list">
					<?php
					
					function get_youtube_id_from_url($url){						
						if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
							return $match[1];
						}
					}
					
					$i=2;
					foreach ($rowim as $key=>$rowimages){ ?>
					<?php if($rowimages->sl_type == ''){$rowimages->sl_type = 'image';}
					switch($rowimages->sl_type){
					case 'image':	?>
						<li <?php if($i%2==0){echo "class='has-background'";}$i++; ?>>
						<input class="order_by" type="hidden" name="order_by_<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>" />
							<div class="image-container">
								<img src="<?php echo $rowimages->image_url; ?>" />
								<div>
										<script>
jQuery(document).ready(function($){
  var _custom_media = true,
      _orig_send_attachment = wp.media.editor.send.attachment;

  jQuery('.huge-it-editnewuploader .button<?php echo $rowimages->id; ?>').click(function(e) {
    var send_attachment_bkp = wp.media.editor.send.attachment;
    var button = jQuery(this);
    var id = button.attr('id').replace('_button', '');
    _custom_media = true;
    wp.media.editor.send.attachment = function(props, attachment){
      if ( _custom_media ) {
        jQuery("#"+id).val(attachment.url);
		jQuery("#save-buttom").click();
      } else {
        return _orig_send_attachment.apply( this, [props, attachment] );
      };
    }

    wp.media.editor.open(button);
    return false;
  });

  jQuery('.add_media').on('click', function(){
    _custom_media = false;
  });
	jQuery(".huge-it-editnewuploader").click(function() {
	});
		jQuery(".wp-media-buttons-icon").click(function() {
	/*	jQuery(".wp-media-buttons-icon").click(function() {
		jQuery(".media-menu .media-menu-item").css("display","none");
		jQuery(".media-menu-item:first").css("display","block");
		jQuery(".separator").next().css("display","none");
		jQuery('.attachment-filters').val('image').trigger('change');
		jQuery(".attachment-filters").css("display","none");

	});*/
});
	if(jQuery('#rating').val()=='off'){
			jQuery('.like_dislike_wrapper').css('display','none');
			jQuery('.heart_wrapper').css('display','none');
		}else if (jQuery('#rating').val()=='dislike'){
			jQuery('.like_dislike_wrapper').css('display','block');
			jQuery('.heart_wrapper').css('display','none');
			jQuery('.heart_wrapper').find('input').removeAttr('name');
		}else if (jQuery('#rating').val()=='heart'){
			jQuery('.heart_wrapper').css('display','block');
			
			
		}


		jQuery('#rating').on('change',function(){
			if(jQuery(this).val()=='off'){
				jQuery('.like_dislike_wrapper').css('display','none');
				jQuery('.heart_wrapper').css('display','none');
			}else if (jQuery(this).val()=='dislike'){
				jQuery('.like_dislike_wrapper').css('display','block');
				jQuery('.heart_wrapper').css('display','none');
				jQuery('.heart_wrapper').find('input').removeAttr('name');
			}else if (jQuery(this).val()=='heart'){
				jQuery('.heart_wrapper').css('display','block');
				jQuery('.like_dislike_wrapper').css('display','none');
				jQuery('.heart_wrapper').each(function(){
					var num=jQuery(this).find('input').attr('num');
					jQuery(this).find('input').attr('name','like_'+num);
				})
					
			}

		});

});
	function deleteproject<?php echo $rowimages->id; ?>() {
	   jQuery('#adminForm').attr('action', 'admin.php?page=gallerys_huge_it_gallery&task=edit_cat&id=<?php echo $row->id; ?>&removeslide=<?php echo $rowimages->id; ?>');
	}
</script>
								<input type="hidden" name="imagess<?php echo $rowimages->id; ?>" id="_unique_name<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->image_url; ?>" />
								<span class="wp-media-buttons-icon"></span>
								<div class="huge-it-editnewuploader uploader button<?php echo $rowimages->id; ?> add-new-image">
								<input type="button" class="button<?php echo $rowimages->id; ?> wp-media-buttons-icon editimageicon" name="_unique_name_button<?php echo $rowimages->id; ?>" id="_unique_name_button<?php echo $rowimages->id; ?>" value="Edit image" />
							</div>
									</div>
							</div>
							<div class="image-options">
								<div>
									<label for="titleimage<?php echo $rowimages->id; ?>"><?php echo __('Title:', 'gallery-images'); ?></label>
									<input  class="text_area" type="text" id="titleimage<?php echo $rowimages->id; ?>" name="titleimage<?php echo $rowimages->id; ?>" id="titleimage<?php echo $rowimages->id; ?>"  value="<?php echo str_replace('__5_5_5__','%',$rowimages->name); ?>">
								</div>
								<div class="description-block">
									<label for="im_description<?php echo $rowimages->id; ?>"><?php echo __('Description:', 'gallery-images'); ?></label>
									<textarea id="im_description<?php echo $rowimages->id; ?>" name="im_description<?php echo $rowimages->id; ?>" ><?php echo str_replace('__5_5_5__','%',$rowimages->description); ?></textarea>
								</div>
								<div class="link-block">
									<label for="sl_url<?php echo $rowimages->id; ?>">URL:</label>
									<input class="text_area url-input" type="text" id="sl_url<?php echo $rowimages->id; ?>" name="sl_url<?php echo $rowimages->id; ?>"  value="<?php echo str_replace('__5_5_5__','%',$rowimages->sl_url); ?>" >
									<label class="long" for="sl_link_target<?php echo $rowimages->id; ?>">
										<span><?php echo __('Open in new tab', 'gallery-images'); ?></span>
										<input type="hidden" name="sl_link_target<?php echo $rowimages->id; ?>" value="" />
										<input  <?php if($rowimages->link_target == 'on'){ echo 'checked="checked"'; } ?>  class="link_target" type="checkbox" id="sl_link_target<?php echo $rowimages->id; ?>" name="sl_link_target<?php echo $rowimages->id; ?>" />
									</label>
									
									
							
								</div>
								<div class="remove-image-container">
									<a onclick="deleteproject<?php echo $rowimages->id; ?>(); submitbutton('apply');" id="remove_image<?php echo $rowimages->id; ?>" class="button remove-image"><?php echo __('Remove Image', 'gallery-images'); ?></a>
								</div>
								<div class="like_dislike_wrapper">
									<label for="like_<?php echo $rowimages->id; ?>"><?php echo __('Ratings:', 'gallery-images'); ?></label>
									<label for="like_<?php echo $rowimages->id; ?>" class="like"><?php echo __('Like', 'gallery-images'); ?></label>
									<input  class="" type="number" id="like_<?php echo $rowimages->id; ?>" name="like_<?php echo $rowimages->id; ?>" value="<?php echo str_replace('__5_5_5__','%',$rowimages->like); ?>">
									<label for="dislike_<?php echo $rowimages->id; ?>" class="dislike"><?php echo __('Dislike', 'gallery-images'); ?></label>
									<input  class="" num="<?php echo $rowimages->id; ?>" type="number" id="dislike_<?php echo $rowimages->id; ?>" name="dislike_<?php echo $rowimages->id; ?>" value="<?php echo str_replace('__5_5_5__','%',$rowimages->dislike); ?>">
								</div>
								<div class="heart_wrapper">
									<label for="like_<?php echo $rowimages->id; ?>"><?php echo __('Ratings:', 'gallery-images'); ?></label>
									<label for="like_<?php echo $rowimages->id; ?>" class="like"><?php echo __('Hearts', 'gallery-images'); ?></label>
									<input  class="" num="<?php echo $rowimages->id; ?>" type="number" id="like_<?php echo $rowimages->id; ?>" name="like_<?php echo $rowimages->id; ?>" value="<?php echo str_replace('__5_5_5__','%',$rowimages->like); ?>">								
								</div>
							</div>
							
						<div class="clear"></div>
						</li>
						<?php
						break;
						case 'last_posts':	?>
						<li <?php if($i%2==0){echo "class='has-background'";}$i++; ?>  >
						<input class="order_by" type="hidden" name="order_by_<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>" />
							<div class="image-container">
								<img width='100' height='100' src="<?php echo plugins_url( 'images/pin.png' , __FILE__ ); ?>" />
							</div>
							<div class="recent-post-options image-options">
								<div>
									<div class="left">
										<?php $categories = get_categories(); ?>
										<label for="titleimage<?php echo $rowimages->id; ?>"><?php echo __('Show Posts From:', 'gallery-images'); ?></label>
										<select name="titleimage<?php echo $rowimages->id; ?>" class="categories-list">
											<option <?php if(str_replace('__5_5_5__','%',$rowimages->name) == 0){echo 'selected="selected"';} ?> value="0"><?php echo __('All Categories', 'gallery-images'); ?></option>
										<?php foreach ($categories as $strcategories){ ?>
											<option <?php if(str_replace('__5_5_5__','%',$rowimages->name) == $strcategories->cat_name){echo 'selected="selected"';} ?> value="<?php echo $strcategories->cat_name; ?>"><?php echo $strcategories->cat_name; ?></option>
										<?php	}	?> 
										</select>
									</div>
									<div  class="left">
										<label for="sl_url<?php echo $rowimages->id; ?>"><?php echo __('Showing Posts Count:', 'gallery-images'); ?></label>
										<input class="text_area url-input number" type="number" id="sl_url<?php echo $rowimages->id; ?>" name="sl_url<?php echo $rowimages->id; ?>"  value="<?php echo str_replace('__5_5_5__','%',$rowimages->sl_url); ?>" >
									</div>
								</div>
	
								<div>
									<label class="long" for="sl_stitle<?php echo $rowimages->id; ?>"><?php echo __('Show Title:', 'gallery-images'); ?></label>
									<input type="hidden" name="sl_stitle<?php echo $rowimages->id; ?>" value="" />
									<input  <?php if($rowimages->sl_stitle == '1'){ echo 'checked="checked"'; } ?>  class="link_target" type="checkbox" name="sl_stitle<?php echo $rowimages->id; ?>" value="1" />
								</div>
								<div>
									<div class="left margin">
										<label class="long" for="sl_sdesc<?php echo $rowimages->id; ?>"><?php echo __('Show Description:', 'gallery-images'); ?></label>
										<input type="hidden" name="sl_sdesc<?php echo $rowimages->id; ?>" value="" />
										<input  <?php if($rowimages->sl_sdesc == '1'){ echo 'checked="checked"'; } ?>  class="link_target" type="checkbox" name="sl_sdesc<?php echo $rowimages->id; ?>" value="1" />
									</div>
									<div class="left">
										<label for="im_description<?php echo $rowimages->id; ?>"><?php echo __('Description Symbols Number:', 'gallery-images'); ?></label>
										<input value="<?php echo str_replace('__5_5_5__','%',$rowimages->description); ?>" class="text_area url-input number" id="im_description<?php echo $rowimages->id; ?>" type="number" name="im_description<?php echo $rowimages->id; ?>" />
									</div>
								</div>
								<div>
									<div class="left margin">
										<label class="long" for="sl_postlink<?php echo $rowimages->id; ?>"><?php echo __('Use Post Link:', 'gallery-images'); ?></label>
										<input type="hidden" name="sl_postlink<?php echo $rowimages->id; ?>" value="" />
										<input  <?php if($rowimages->sl_postlink == '1'){ echo 'checked="checked"'; } ?>  class="link_target" type="checkbox" name="sl_postlink<?php echo $rowimages->id; ?>" value="1" />
									</div>
									<div  class="left">	
										<label class="long" for="sl_link_target<?php echo $rowimages->id; ?>"><?php echo __('Open Link In New Tab:', 'gallery-images'); ?></label>
										<input type="hidden" name="sl_link_target<?php echo $rowimages->id; ?>" value="" />
										<input  <?php if($rowimages->link_target == 'on'){ echo 'checked="checked"'; } ?>  class="link_target" type="checkbox" id="sl_link_target<?php echo $rowimages->id; ?>" name="sl_link_target<?php echo $rowimages->id; ?>" />

									</div>
								</div>
								<div class="remove-image-container">
									<a class="button remove-image" href="admin.php?page=sliders_huge_it_slider&id=<?php echo $row->id; ?>&task=apply&removeslide=<?php echo $rowimages->id; ?>"><?php echo __('Remove Last posts', 'gallery-images'); ?></a>
								</div>
							</div>
							
						<div class="clear"></div>
						</li>
						<?php
						break;
						
						case 'video':
						?>
							
							<li <?php if($i%2==0){echo "class='has-background'";}$i++; ?>  >
							<input class="order_by" type="hidden" name="order_by_<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>" />
								<?php 	if(strpos($rowimages->image_url,'youtube') !== false || strpos($rowimages->image_url,'youtu') !== false) {
											$liclass="youtube";
											$video_thumb_url=get_youtube_id_from_url($rowimages->image_url);
											$thumburl='<img src="http://img.youtube.com/vi/'.$video_thumb_url.'/mqdefault.jpg" alt="" />';
										}else if (strpos($rowimages->image_url,'vimeo') !== false) {	
											$liclass="vimeo";
											$vimeo = $rowimages->image_url;
											$vimeo_explode = explode( "/", $vimeo );
											$imgid =  end($vimeo_explode);
											$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/".$imgid.".php"));
											$imgsrc=$hash[0]['thumbnail_large'];
											$imgsrc = esc_html($imgsrc);
											$thumburl ='<img src="'.$imgsrc.'" alt="" />';
										}
										?> 
									<div class="image-container">	
										<?php echo $thumburl; ?>
										<div class="play-icon <?php echo $liclass; ?>"></div>
										
										<div>
											<script>
													jQuery(document).ready(function ($) {
															
															jQuery("#slideup<?php echo $key; ?>").click(function () {
																window.parent.uploadID = jQuery(this).prev('input');
																formfield = jQuery('.upload').attr('name');
																tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
																
																return false;
															});
															window.send_to_editor = function (html) {
																imgurl = jQuery('img', html).attr('src');
																window.parent.uploadID.val(imgurl);
																
																tb_remove();
																jQuery("#save-buttom").click();
															};
														});
			function deleteproject<?php echo $rowimages->id; ?>() {
			   jQuery('#adminForm').attr('action', 'admin.php?page=gallerys_huge_it_gallery&task=edit_cat&id=<?php echo $row->id; ?>&removeslide=<?php echo $rowimages->id; ?>');
			}
											</script>
											<input type="hidden" name="imagess<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->image_url; ?>" />
										</div>
									</div>
									<div class="image-options">
								<div>
									<label for="titleimage<?php echo $rowimages->id; ?>"><?php echo __('Title:', 'gallery-images'); ?></label>
									<input  class="text_area" type="text" id="titleimage<?php echo $rowimages->id; ?>" name="titleimage<?php echo $rowimages->id; ?>" id="titleimage<?php echo $rowimages->id; ?>"  value="<?php echo str_replace('__5_5_5__','%',$rowimages->name); ?>">
								</div>
								<div class="description-block">
									<label for="im_description<?php echo $rowimages->id; ?>"><?php echo __('Description:', 'gallery-images'); ?></label>
									<textarea id="im_description<?php echo $rowimages->id; ?>" name="im_description<?php echo $rowimages->id; ?>" ><?php echo str_replace('__5_5_5__','%',$rowimages->description); ?></textarea>
								</div>
								<div class="link-block">
									<label for="sl_url<?php echo $rowimages->id; ?>">URL:</label>
									<input class="text_area url-input" type="text" id="sl_url<?php echo $rowimages->id; ?>" name="sl_url<?php echo $rowimages->id; ?>"  value="<?php echo str_replace('__5_5_5__','%',$rowimages->sl_url); ?>" >
									<label class="long" for="sl_link_target<?php echo $rowimages->id; ?>">
										<span><?php echo __('Open in new tab', 'gallery-images'); ?></span>
										<input type="hidden" name="sl_link_target<?php echo $rowimages->id; ?>" value="" />
										<input  <?php if($rowimages->link_target == 'on'){ echo 'checked="checked"'; } ?>  class="link_target" type="checkbox" id="sl_link_target<?php echo $rowimages->id; ?>" name="sl_link_target<?php echo $rowimages->id; ?>" />
									</label>
									
									
							
								</div>
								<div class="remove-image-container">
									<a onclick="deleteproject<?php echo $rowimages->id; ?>(); submitbutton('apply');" id="remove_image<?php echo $rowimages->id; ?>" class="button remove-image"><?php echo __('Remove Image', 'gallery-images'); ?></a>
								</div>
								<div class="like_dislike_wrapper">
									<label for="like_<?php echo $rowimages->id; ?>"><?php echo __('Ratings:', 'gallery-images'); ?></label>
									<label for="like_<?php echo $rowimages->id; ?>" class="like"><?php echo __('Like', 'gallery-images'); ?></label>
									<input  class="" type="number" id="like_<?php echo $rowimages->id; ?>" name="like_<?php echo $rowimages->id; ?>" value="<?php echo str_replace('__5_5_5__','%',$rowimages->like); ?>">
									<label for="dislike_<?php echo $rowimages->id; ?>" class="dislike"><?php echo __('Dislike', 'gallery-images'); ?></label>
									<input  class="" num="<?php echo $rowimages->id; ?>" type="number" id="dislike_<?php echo $rowimages->id; ?>" name="dislike_<?php echo $rowimages->id; ?>" value="<?php echo str_replace('__5_5_5__','%',$rowimages->dislike); ?>">
								</div>
								<div class="heart_wrapper">
									<label for="like_<?php echo $rowimages->id; ?>"><?php echo __('Ratings:', 'gallery-images'); ?></label>
									<label for="like_<?php echo $rowimages->id; ?>" class="like"><?php echo __('Hearts', 'gallery-images'); ?></label>
									<input  class="" num="<?php echo $rowimages->id; ?>" type="number" id="like_<?php echo $rowimages->id; ?>" name="like_<?php echo $rowimages->id; ?>" value="<?php echo str_replace('__5_5_5__','%',$rowimages->like); ?>">								
								</div>
							</div>
							<div class="clear"></div>
							</li>
					<?php 
						break;
						} ?>
					<?php } ?>
					</ul>
				</div>

			</div>
				
			<!-- SIDEBAR -->
			<div id="postbox-container-1" class="postbox-container">
				<div id="side-sortables" class="meta-box-sortables ui-sortable">
					<div id="gallery-unique-options" class="postbox">
					<h3 class="hndle"><span><?php echo __('Image Gallery Custom Options', 'gallery-images'); ?></span></h3>
					<ul id="gallery-unique-options-list">
						<li>
							<label for="huge_it_gallery_name"><?php echo __('Gallery name', 'gallery-images'); ?></label>
							<input type = "text" name="name" id="huge_it_gallery_name" value="<?php echo esc_html(stripslashes($row->name));?>" onkeyup = "name_changeRight(this)">
						</li>
						<li>
							<label for="huge_it_sl_effects"><?php echo __('Select View', 'gallery-images'); ?></label>
							<select name="huge_it_sl_effects" id="huge_it_sl_effects">
									<option <?php if($row->huge_it_sl_effects == '0'){ echo 'selected'; } ?>  value="0"><?php echo __('Gallery/Content-Popup', 'gallery-images'); ?></option>
									<option <?php if($row->huge_it_sl_effects == '1'){ echo 'selected'; } ?>  value="1"><?php echo __('Content Slider', 'gallery-images'); ?></option>
									<option <?php if($row->huge_it_sl_effects == '5'){ echo 'selected'; } ?>  value="5"><?php echo __('Lightbox-Gallery', 'gallery-images'); ?></option>
									<option <?php if($row->huge_it_sl_effects == '3'){ echo 'selected'; } ?>  value="3"><?php echo __('Slider', 'gallery-images'); ?></option>
									<option <?php if($row->huge_it_sl_effects == '4'){ echo 'selected'; } ?>  value="4"><?php echo __('Thumbnails View', 'gallery-images'); ?></option>
                                    <option <?php if($row->huge_it_sl_effects == '6'){ echo 'selected'; } ?>  value="6"><?php echo __('Justified', 'gallery-images'); ?></option>
                                    <option <?php if($row->huge_it_sl_effects == '7'){ echo 'selected'; } ?>  value="7"><?php echo __('Blog Style Gallery', 'gallery-images'); ?></option>
							</select>
						</li>
						<script>
						jQuery(document).ready(function ($){
							//alert('hi');
							//$('div[id^="list_"]')
								if($('select[name="display_type"]').val()== 2){
								$('li[id="content_per_page"]').hide();
							}else{
								$('li[id="content_per_page"]').show();
							}
							$('select[name="display_type"]').on('change' ,function(){
								if($(this).val()== 2){
								$('li[id="content_per_page"]').hide();
							}else{
								$('li[id="content_per_page"]').show();
							}
							})
							

							$('#gallery-unique-options').on('change',function(){
								$( 'div[id^="gallery-current-options"]').each(function(){
								if(!$(this).hasClass( "active" )){
									$(this).find('ul li input[name="content_per_page"]').attr('name', '');
									$(this).find('ul li select[name="display_type"]').attr('name', '');
									//$(this).find('ul li select').attr('name', '');
								}else{
									//alert('no');
								}
							})
							})
							
						})
					</script>	
					<div id="gallery-current-options-3" class="gallery-current-options <?php if($row->huge_it_sl_effects == 3){ echo ' active'; }  ?>">
					<ul id="slider-unique-options-list">
						<li>
							<label for="sl_width"><?php echo __('Width', 'gallery-images'); ?></label>
							<input type="text" name="sl_width" id="sl_width" value="<?php echo $row->sl_width; ?>" class="text_area" />
						</li>
						<li>
							<label for="sl_height"><?php echo __('Height', 'gallery-images'); ?></label>
							<input type="text" name="sl_height" id="sl_height" value="<?php echo $row->sl_height; ?>" class="text_area" />
						</li>
						<li>
							<label for="pause_on_hover"><?php echo __('Pause on hover', 'gallery-images'); ?></label>
							<input type="hidden" value="off" name="pause_on_hover" />					
							<input type="checkbox" name="pause_on_hover"  value="on" id="pause_on_hover"  <?php if($row->pause_on_hover  == 'on'){ echo 'checked="checked"'; } ?> />
						</li>
						<li>
							<label for="gallery_list_effects_s"><?php echo __('Effects', 'gallery-images'); ?></label>
							<select name="gallery_list_effects_s" id="gallery_list_effects_s">
									<option <?php if($row->gallery_list_effects_s == 'none'){ echo 'selected'; } ?>  value="none"><?php echo __('None', 'gallery-images'); ?></option>
									<option <?php if($row->gallery_list_effects_s == 'cubeH'){ echo 'selected'; } ?>   value="cubeH"><?php echo __('Cube Horizontal', 'gallery-images'); ?></option>
									<option <?php if($row->gallery_list_effects_s == 'cubeV'){ echo 'selected'; } ?>  value="cubeV"><?php echo __('Cube Vertical', 'gallery-images'); ?></option>
									<option <?php if($row->gallery_list_effects_s == 'fade'){ echo 'selected'; } ?>  value="fade"><?php echo __('Fade', 'gallery-images'); ?></option>
									<option <?php if($row->gallery_list_effects_s == 'sliceH'){ echo 'selected'; } ?>  value="sliceH"><?php echo __('Slice Horizontal', 'gallery-images'); ?></option>
									<option <?php if($row->gallery_list_effects_s == 'sliceV'){ echo 'selected'; } ?>  value="sliceV"><?php echo __('Slice Vertical', 'gallery-images'); ?></option>
									<option <?php if($row->gallery_list_effects_s == 'slideH'){ echo 'selected'; } ?>  value="slideH"><?php echo __('Slide Horizontal', 'gallery-images'); ?></option>
									<option <?php if($row->gallery_list_effects_s == 'slideV'){ echo 'selected'; } ?>  value="slideV"><?php echo __('Slide Vertical', 'gallery-images'); ?></option>
									<option <?php if($row->gallery_list_effects_s == 'scaleOut'){ echo 'selected'; } ?>  value="scaleOut"><?php echo __('Scale Out', 'gallery-images'); ?></option>
									<option <?php if($row->gallery_list_effects_s == 'scaleIn'){ echo 'selected'; } ?>  value="scaleIn"><?php echo __('Scale In', 'gallery-images'); ?></option>
									<option <?php if($row->gallery_list_effects_s == 'blockScale'){ echo 'selected'; } ?>  value="blockScale"><?php echo __('Block Scale', 'gallery-images'); ?></option>
									<option <?php if($row->gallery_list_effects_s == 'kaleidoscope'){ echo 'selected'; } ?>  value="kaleidoscope"><?php echo __('Kaleidoscope', 'gallery-images'); ?></option>
									<option <?php if($row->gallery_list_effects_s == 'fan'){ echo 'selected'; } ?>  value="fan"><?php echo __('Fan', 'gallery-images'); ?></option>
									<option <?php if($row->gallery_list_effects_s == 'blindH'){ echo 'selected'; } ?>  value="blindH"><?php echo __('Blind Horizontal', 'gallery-images'); ?></option>
									<option <?php if($row->gallery_list_effects_s == 'blindV'){ echo 'selected'; } ?>  value="blindV"><?php echo __('Blind Vertical', 'gallery-images'); ?></option>
									<option <?php if($row->gallery_list_effects_s == 'random'){ echo 'selected'; } ?>  value="random"><?php echo __('Random', 'gallery-images'); ?></option>
							</select>
						</li>

						<li>
							<label for="sl_pausetime"><?php echo __('Pause time', 'gallery-images'); ?></label>
							<input type="text" name="sl_pausetime" id="sl_pausetime" value="<?php echo $row->description; ?>" class="text_area" />
						</li>
						<li>
							<label for="sl_changespeed"><?php echo __('Change speed', 'gallery-images'); ?></label>
							<input type="text" name="sl_changespeed" id="sl_changespeed" value="<?php echo $row->param; ?>" class="text_area" />
						</li>
						<li>
							<label for="slider_position"><?php echo __('Slider Position', 'gallery-images'); ?></label>
							<select name="sl_position" id="slider_position">
									<option <?php if($row->sl_position == 'left'){ echo 'selected'; } ?>  value="left"><?php echo __('Left', 'gallery-images'); ?></option>
									<option <?php if($row->sl_position == 'right'){ echo 'selected'; } ?>   value="right"><?php echo __('Right', 'gallery-images'); ?></option>
									<option <?php if($row->sl_position == 'center'){ echo 'selected'; } ?>  value="center"><?php echo __('Center', 'gallery-images'); ?></option>
							</select>
						</li>
					</ul>
					</div>
						<div id="gallery-current-options-0" class="gallery-current-options <?php if($row->huge_it_sl_effects == 0){ echo ' active'; }  ?>">
					<ul id="view0">
						
						  <li>
							<label for="display_type"><?php echo __('Displaying Content', 'gallery-images'); ?></label>
							<select id="display_type" name="display_type">

								  <option <?php if($row->display_type == 0){ echo 'selected'; } ?>  value="0"><?php echo __('Pagination', 'gallery-images'); ?></option>
									<option <?php if($row->display_type == 1){ echo 'selected'; } ?>   value="1"><?php echo __('Load More', 'gallery-images'); ?></option>
									<option <?php if($row->display_type == 2){ echo 'selected'; } ?>   value="2"><?php echo __('Show All', 'gallery-images'); ?></option>
						
							</select>
							</li>
						<li id="content_per_page">
							<label for="content_per_page"><?php echo __('Images Per Page', 'gallery-images'); ?></label>
							<input type="text" name="content_per_page" id="content_per_page" value="<?php echo $row->content_per_page; ?>" class="text_area" />
						</li>
						

					
					</ul>
					</div>
						<div id="gallery-current-options-5" class="gallery-current-options <?php if($row->huge_it_sl_effects == 5){ echo ' active'; }  ?>">
					<ul id="view5">
						
						  <li>
							<label for="display_type"><?php echo __('Displaying Content', 'gallery-images'); ?></label>
							<select id="display_type" name="display_type">

								  <option <?php if($row->display_type == 0){ echo 'selected'; } ?>  value="0"><?php echo __('Pagination', 'gallery-images'); ?></option>
									<option <?php if($row->display_type == 1){ echo 'selected'; } ?>   value="1"><?php echo __('Load More', 'gallery-images'); ?></option>
									<option <?php if($row->display_type == 2){ echo 'selected'; } ?>   value="2"><?php echo __('Show All', 'gallery-images'); ?></option>
						
							</select>
							</li>
						<li id="content_per_page">
							<label for="content_per_page"><?php echo __('Images Per Page', 'gallery-images'); ?></label>
							<input type="text" name="content_per_page" id="content_per_page" value="<?php echo $row->content_per_page; ?>" class="text_area" />
						</li>
						

					
					</ul>
					</div>
					<div id="gallery-current-options-4" class="gallery-current-options <?php if($row->huge_it_sl_effects == 4){ echo ' active'; }  ?>">
					<ul id="view4">
						
						  <li>
							<label for="display_type"><?php echo __('Displaying Content', 'gallery-images'); ?></label>
							<select id="display_type" name="display_type">

								  <option <?php if($row->display_type == 0){ echo 'selected'; } ?>  value="0"><?php echo __('Pagination', 'gallery-images'); ?></option>
									<option <?php if($row->display_type == 1){ echo 'selected'; } ?>   value="1"><?php echo __('Load More', 'gallery-images'); ?></option>
									<option <?php if($row->display_type == 2){ echo 'selected'; } ?>   value="2"><?php echo __('Show All', 'gallery-images'); ?></option>
						
							</select>
							</li>
						<li id="content_per_page">
							<label for="content_per_page"><?php echo __('Images Per Page', 'gallery-images'); ?></label>
							<input type="text" name="content_per_page" id="content_per_page" value="<?php echo $row->content_per_page; ?>" class="text_area" />
						</li>
						

					
					</ul>
					</div>
					<div id="gallery-current-options-6" class="gallery-current-options <?php if($row->huge_it_sl_effects == 6){ echo ' active'; }  ?>">
					<ul id="view6">
						
						  <li>
							<label for="display_type"><?php echo __('Displaying Content', 'gallery-images'); ?></label>
							<select id="display_type" name="display_type">

								  <option <?php if($row->display_type == 0){ echo 'selected'; } ?>  value="0"><?php echo __('Pagination', 'gallery-images'); ?></option>
									<option <?php if($row->display_type == 1){ echo 'selected'; } ?>   value="1"><?php echo __('Load More', 'gallery-images'); ?></option>
									<option <?php if($row->display_type == 2){ echo 'selected'; } ?>   value="2"><?php echo __('Show All', 'gallery-images'); ?></option>
						
							</select>
							</li>
						<li id="content_per_page">
							<label for="content_per_page"><?php echo __('Images Per Page', 'gallery-images'); ?></label>
							<input type="text" name="content_per_page" id="content_per_page" value="<?php echo $row->content_per_page; ?>" class="text_area" />
						</li>
						

					
					</ul>
					</div>
						<div id="gallery-current-options-7" class="gallery-current-options <?php if($row->huge_it_sl_effects == 7){ echo ' active'; }  ?>">
					<ul id="view7">
						
						  <li>
							<label for="display_type"><?php echo __('Displaying Content', 'gallery-images'); ?></label>
							<select id="display_type" name="display_type">

								  <option <?php if($row->display_type == 0){ echo 'selected'; } ?>  value="0"><?php echo __('Pagination', 'gallery-images'); ?></option>
									<option <?php if($row->display_type == 1){ echo 'selected'; } ?>   value="1"><?php echo __('Load More', 'gallery-images'); ?></option>
									<option <?php if($row->display_type == 2){ echo 'selected'; } ?>   value="2"><?php echo __('Show All', 'gallery-images'); ?></option>
						
							</select>
							</li>
						<li id="content_per_page">
							<label for="content_per_page"><?php echo __('Images Per Page', 'gallery-images'); ?></label>
							<input type="text" name="content_per_page" id="content_per_page" value="<?php echo $row->content_per_page; ?>" class="text_area" />
						</li>
						

					
					</ul>
					</div>
					
					<li>
						<label for="rating"><?php echo __('Ratings', 'gallery-images'); ?></label>
						<select id="rating" name="rating">

							  <option <?php if($row->rating == 'off'){ echo 'selected'; } ?>  value="off"><?php echo __('Off', 'gallery-images'); ?></option>
								<option <?php if($row->rating == 'dislike'){ echo 'selected'; } ?>   value="dislike"><?php echo __('Like/Dislike', 'gallery-images'); ?></option>
								<option <?php if($row->rating == 'heart'){ echo 'selected'; } ?>   value="heart"><?php echo __('Heart', 'gallery-images'); ?></option>
					
						</select>
					</li>
					</ul>
						<div id="major-publishing-actions">
							<div id="publishing-action">
								<input type="button" onclick="submitbutton('apply')" value="Save gallery" id="save-buttom" class="button button-primary button-large">
							</div>
							<div class="clear"></div>
							<!--<input type="button" onclick="window.location.href='admin.php?page=gallerys_huge_it_gallery'" value="Cancel" class="button-secondary action">-->
						</div>
					</div>
					<div id="gallery-shortcode-box" class="postbox shortcode ms-toggle">
					<h3 class="hndle"><span><?php echo __('Usage', 'gallery-images'); ?></span></h3>
					<div class="inside">
						<ul>
							<li rel="tab-1" class="selected">
								<h4><?php echo __('Shortcode', 'gallery-images'); ?></h4>
								<p><?php echo __('Copy &amp; paste the shortcode directly into any WordPress post or page.', 'gallery-images'); ?></p>
								<textarea class="full" readonly="readonly">[huge_it_gallery id="<?php echo $row->id; ?>"]</textarea>
							</li>
							<li rel="tab-2">
								<h4><?php echo __('Template Include', 'gallery-images'); ?></h4>
								<p><?php echo __('Copy &amp; paste this code into a template file to include the slideshow within your theme.', 'gallery-images'); ?></p>
								<textarea class="full" readonly="readonly">&lt;?php echo do_shortcode("[huge_it_gallery id='<?php echo $row->id; ?>']"); ?&gt;</textarea>
							</li>
						</ul>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
		<?php @session_start();
		  $hugeItCSRFToken = $_SESSION["csrf_token_hugeit_gallery"] = md5(time());
	?>
	<input type="hidden" name="csrf_token_hugeit_gallery" value="<?php echo $hugeItCSRFToken; ?>" />
	<input type="hidden" name="task" value="" />
</form>
</div>

<?php

}


function html_popup_posts($ord_elem, $count_ord,$images,$row,$cat_row, $rowim, $rowsld, $paramssld, $rowsposts, $rowsposts8, $postsbycat){
	global $wpdb;

?>
			<style>
				html.wp-toolbar {
					padding:0px !important;
				}
				#wpadminbar,#adminmenuback,#screen-meta, .update-nag,#dolly {
					display:none;
				}
				#wpbody-content {
					padding-bottom:30px;
				}
				#adminmenuwrap {display:none !important;}
				.auto-fold #wpcontent, .auto-fold #wpfooter {
					margin-left: 0px;
				}
				#wpfooter {display:none;}
			</style>
			<script type="text/javascript">
				jQuery(document).ready(function() {

					jQuery('.huge-it-insert-post-button').on('click', function() {
						var ID1 = jQuery('#huge-it-add-posts-params').val();
						if(ID1==""){alert("Please select images to insert into gallery.");return false;}
						
						window.parent.uploadID.val(ID1);
						
						tb_remove();
						jQuery("#save-buttom").click();
						
					});
						
					jQuery('.huge-it-post-checked').change(function(){
						if(jQuery(this).is(':checked')){
							jQuery(this).addClass('active');
							jQuery(this).parent().addClass('active');
						}else {
							jQuery(this).removeClass('active');
							jQuery(this).parent().removeClass('active');
						}
						
						var inputval="";
						jQuery('#huge-it-add-posts-params').val("");
						jQuery('.huge-it-post-checked').each(function(){
							if(jQuery(this).is(':checked')){
								inputval+=jQuery(this).val()+";";
							}
						});
						jQuery('#huge-it-add-posts-params').val(inputval);
					});
	
					
					jQuery("#huge-it-categories-list").change(function(){
						var currentCategoryID=jQuery(this).val();
					
						jQuery('#huge-it-posts-list li').not("#huge-it-posts-list-heading").css({"display":"none"});
						jQuery('li[data-id*="'+currentCategoryID+'"]').css({"display":"block"});
						
					});
					//jQuery("#huge-it-categories-list").change();
										
					jQuery('#huge_it_gallery_add_posts_wrap .view-type-block a').click(function(){
						jQuery('#huge_it_gallery_add_posts_wrap .view-type-block a').removeClass('active');
						jQuery(this).addClass('active');
						var strtype=jQuery(this).attr('href').replace('#','');
						jQuery('#huge-it-posts-list').removeClass('list').removeClass('thumbs');
						jQuery('#huge-it-posts-list').addClass(strtype);
						return false;
					});
					
					
					jQuery('.updated').css({"display":"none"});
				<?php	if($_GET["closepop"] == 1){ ?>
					jQuery("#closepopup").click();
					self.parent.location.reload();
				<?php	} ?>
				});
				
			</script>
			<a id="closepopup"  onclick=" parent.eval('tb_remove()')" style="display:none;" > [X] </a>
	
	
	<div id="huge_it_gallery_add_posts">
					<div id="huge_it_gallery_add_posts_wrap">
						<h2><?php echo __('Add post', 'gallery-images'); ?></h2>
						<div class="control-panel">
						<form method="post"  onkeypress="doNothing()" action="admin.php?page=gallerys_huge_it_gallery&task=popup_posts&id=<?php echo esc_html($_GET['id']); ?>" id="huge-it-category-form" name="admin_form">
							<label for="huge-it-categories-list"><?php echo __('Select Category', 'gallery-images'); ?> <select id="huge-it-categories-list" name="iframecatid" onchange="this.form.submit()">

							 <?php $categories = get_categories(  ); ?>

							<?php	 foreach ($categories as $strcategories){
							if(isset($_POST["iframecatid"])){
?>
								 <option value="<?php echo $strcategories->cat_ID; ?>" <?php if($strcategories->cat_ID == $_POST["iframecatid"]){echo 'selected="selected"';} ?>><?php echo $strcategories->cat_name; ?></option>';
								
							<?php	}
else
{
?>
								<option value="<?php echo $strcategories->cat_ID; ?>"><?php echo $strcategories->cat_name; ?></option>';
<?php
}							}
							?> 
							</select></label>
							</form>
							<form method="post"  onkeypress="doNothing()" action="admin.php?page=gallerys_huge_it_gallery&task=popup_posts&id=<?php echo esc_html($_GET['id']); ?>&closepop=1" id="admin_form" name="admin_form">
							<button class='save-gallery-options button-primary huge-it-insert-post-button' id='huge-it-insert-post-button-top'><?php echo __('Insert Posts', 'gallery-images'); ?></button>
							<label for="huge-it-description-length"><?php echo __('Description Length', 'gallery-images'); ?> <input id="huge-it-description-length" type="text" name="posthuge-it-description-length" value="<?php echo $row->published; ?>" placeholder="Description length" /></label>
							<div class="view-type-block">
								<a class="view-type list active" href="#list"><?php echo __('View List', 'gallery-images'); ?></a>
								<a class="view-type thumbs" href="#thumbs"><?php echo __('View List', 'gallery-images'); ?></a>
							</div>
						</div>
						<div style="clear:both;"></div>
						<ul id="huge-it-posts-list" class="list">
							<li id="huge-it-posts-list-heading" class="hascolor">
								<div class="huge-it-posts-list-image"><?php echo __('Image', 'gallery-images'); ?></div>
								<div class="huge-it-posts-list-title"><?php echo __('Title', 'gallery-images'); ?></div>
								<div class="huge-it-posts-list-description">
									<?php echo __('Description', 'gallery-images'); ?>
									
								</div>
								<div class="huge-it-posts-list-link"><?php echo __('Link', 'gallery-images'); ?></div>
								<div class="huge-it-posts-list-category"><?php echo __('Category', 'gallery-images'); ?></div>
							</li>
							<?php 



							$strx=1;
							foreach($rowsposts8 as $rowspostspop1){
								 $query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."posts where post_type = 'post' and post_status = 'publish' and ID = %d  order by ID ASC", $rowspostspop1->object_id);
							$rowspostspop=$wpdb->get_results($query);
							//print_r($rowspostspop);
							
							
								$post_categories =  wp_get_post_categories( $rowspostspop[0]->ID, $rowspostspop[0]->ID ); 
								$cats = array();
								
								
								foreach($post_categories as $c){
									$cat = get_category( $c );
									$cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug, 'id' => $cat->term_id );
									//echo	$cat->slug;
								}
								if(get_the_post_thumbnail($rowspostspop[0]->ID, 'thumbnail') != ''){
									$strx++;
									$hascolor="";
									if($strx%2==0){$hascolor='class="hascolor"';}
							?>
								
								<li <?php echo $hascolor; ?>>
									<input type="checkbox" class="huge-it-post-checked"  value="<?php echo $rowspostspop[0]->ID; ?>">
									<div class="huge-it-posts-list-image"><?php echo get_the_post_thumbnail($rowspostspop[0]->ID, 'thumbnail'); ?></div>
									<div class="huge-it-posts-list-title"><?php echo $rowspostspop[0]->post_title;	?></div>
									<div class="huge-it-posts-list-description"><?php echo	$rowspostspop[0]->post_content;	?></div>
									<div class="huge-it-posts-list-link"><?php echo	$rowspostspop[0]->guid; ?></div>
									<div class="huge-it-posts-list-category"><?php echo	$cat->slug;	?></div>
								</li>
							<?php }
								}	?>
						</ul>
						<input id="huge-it-add-posts-params" type="hidden" name="popupposts" value="" />
						<div class="clear"></div>
						<button class='save-gallery-options button-primary huge-it-insert-post-button' id='huge-it-insert-post-button-bottom'><?php echo __('Insert Posts', 'gallery-images'); ?></button>
						</form>
						
					</div>
				</div>		
	<?php
}
?>
<?php
function html_gallery_video(){
	global $wpdb;

?>
	<style>
		html.wp-toolbar {
			padding:0px !important;
		}
		#wpadminbar,#adminmenuback,#screen-meta, .update-nag,#dolly {
			display:none;
		}
		#wpbody-content {
			padding-bottom:30px;
		}
		#adminmenuwrap {display:none !important;}
		.auto-fold #wpcontent, .auto-fold #wpfooter {
			margin-left: 0px;
		}
		#wpfooter {display:none;}
		iframe {height:250px !important;}
		#TB_window {height:250px !important;}
	</style>
	<script type="text/javascript">
		jQuery(document).ready(function() {			
		jQuery('.huge-it-insert-video-button').click(function(){
					alert("Image Gallery Settings are disabled in free version. If you need those functionalityes, you need to buy the commercial version.");
					return false;
				});
		jQuery('.huge-it-insert-video-button').click(function(){				
				jQuery('.huge-it-insert-post-button').on('click', function() {
				var ID1 = jQuery('#huge_it_add_video_input').val();
				if(ID1==""){alert("Please copy and past url form Youtobe or Vimeo to insert into slider.");return false;}
				
				window.parent.uploadID.val(ID1);
				
				tb_remove();
				jQuery("#save-buttom").click();
			});

			jQuery('#huge_it_add_video_input').change(function(){
				
				if (jQuery(this).val().indexOf("youtube") >= 0){
					jQuery('#add-video-popup-options > div').removeClass('active');
					jQuery('#add-video-popup-options  .youtube').addClass('active');
				}else if (jQuery(this).val().indexOf("vimeo") >= 0){
					jQuery('#add-video-popup-options > div').removeClass('active');
					jQuery('#add-video-popup-options  .vimeo').addClass('active');
				}else {
					jQuery('#add-video-popup-options > div').removeClass('active');
					jQuery('#add-video-popup-options  .error-message').addClass('active');
				}
			})	
				});
					<?php	
			if(isset($_GET["closepop"])){
			if($_GET["closepop"] == 1){ ?>
					jQuery("#closepopup").click();
					self.parent.location.reload();
			<?php	}	} ?>
			jQuery('.updated').css({"display":"none"});
		});
	</script>
	<a id="closepopup"  onclick=" parent.eval('tb_remove()')" style="display: none;"> [X] </a>

	<div id="huge_it_slider_add_videos">
		<div id="huge_it_slider_add_videos_wrap">
		<span class="buy-pro"><?php echo __('This feature is disabled in free version.', 'gallery-images'); ?> <br><?php echo __('If you need this functionality, you need to', 'gallery-images'); ?> <a href="http://huge-it.com/wordpress-gallery/" target="_blank"><?php echo __('buy the commercial version', 'gallery-images'); ?></a>.</span>
			<h2><?php echo __('Add Video URL From Youtube or Vimeo', 'gallery-images'); ?></h2>
			<div class="control-panel">
					<input type="text" id="huge_it_add_video_input" name="huge_it_add_video_input" />
					<button class='save-slider-options button-primary huge-it-insert-video-button' id='huge-it-insert-video-button'><?php echo __('Insert Video', 'gallery-images'); ?></button>
					<div id="add-video-popup-options">
						<div>
							<div>
								<label for="show_title"><?php echo __('Title:', 'gallery-images'); ?></label>	
								<div>
									<input name="show_title" value="" type="text" />
								</div>
							</div>
							<div>
								<label for="show_description"><?php echo __('Description:', 'gallery-images'); ?></label>
								<textarea id="show_description" name="show_description"></textarea>
							</div>
							<div>
								<label for="show_url">Url:</label>
								<input type="text" name="show_url" value="" />	
							</div>
						</div>
					</div>
			</div>
		</div>	
	</div>
<?php
}
?>