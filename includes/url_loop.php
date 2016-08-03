<?php defined("APP") or die() // This file is looped in each instances to show the URL. Please don't edit this fiel if you don't know what you are doing! ?>
<div class="url-list" id="url-container-<?php echo $url->id ?>" data-id="<?php echo $url->id ?>">
	<div class="row">
		<div class="col-md-10 url-info">
			<h3 class="title">
				<img src="<?php echo $this->http ?>://www.google.com/s2/favicons?domain=<?php echo $url->url ?>" alt="Favicon">
				<a href="<?php echo $url->url ?>" target="_blank"><?php echo Main::truncate(empty($url->meta_title)?$url->url:$url->meta_title,50) ?></a>
			</h3>
			<div class="short-url">
				<a href="<?php echo $this->user->domain ?>/<?php echo $url->alias.$url->custom ?>" target="_blank"><?php echo $this->user->domain ?>/<?php echo $url->alias.$url->custom ?></a>
				<a href="#copy" class="copy inline-copy" data-value="<?php echo $this->user->domain ?>/<?php echo $url->alias.$url->custom ?>"><?php echo e("Copy")?></a>				
				<?php if (!empty($url->location)): ?>
					&nbsp;&nbsp;&bullet;&nbsp;&nbsp;
					<span><i class='glyphicon glyphicon-globe'></i> <?php echo e('Geotargeted')?></span>
				<?php endif ?>
				<?php if (!empty($url->pass)): ?>
					&nbsp;&nbsp;&bullet;&nbsp;&nbsp;
					<span><i class='glyphicon glyphicon-lock'></i> <?php echo e('Protected')?></span>
				<?php endif ?>				
				<?php if (!empty($url->description)): ?>
					&nbsp;&nbsp;&bullet;&nbsp;&nbsp;					
					<a href="#" class="tooltip" data-content="<?php echo $url->description ?>"><strong><?php echo e("View Note") ?></strong></a>
				<?php endif ?>								
			</div>
			<p>
				<ul class="toggle">
					<li><input type="checkbox" name="delete-id[]" value="<?php echo $url->alias.$url->custom ?>"></li>
					<li class="lock-url-<?php echo $url->id ?>">
						<?php if ($url->public): ?>
							<a href="#private" class="ajax_call" data-id="<?php echo $url->id ?>" data-action="lock" data-class="lock-url-<?php echo $url->id ?>"><i class='glyphicon glyphicon-eye-open'></i> <?php echo e('Public')?></a>
						<?php else: ?>
							<a href="#public" class="ajax_call" data-id="<?php echo $url->id ?>" data-action="unlock" data-class="lock-url-<?php echo $url->id ?>"><i class='glyphicon glyphicon-eye-close'></i> <?php echo e('Private')?></a>
						<?php endif ?>
					</li>
					<li><a href='<?php echo Main::href("user/edit/{$url->id}")?>'><?php echo e("Edit")?></a></li>
					<li><a href="<?php echo Main::href("user/delete/{$url->id}").Main::nonce("delete_url-{$url->id}") ?>" class="delete"><?php echo e("Delete")?></a></li>
					<li><a href="#url-container-<?php echo $url->id ?>" class="drop scroll"><?php echo e("Options") ?></a>
						<div class="dropdown">			
							<?php if (!empty($url->bundle)): ?>
								<?php $bundle=$this->db->get("bundle",array("id"=>$url->bundle),array("limit"=>1)) ?>
								<a href="#" class="ajax_call small" data-content="<?php echo e("Click to change bundle")?>" data-action="url_bundle_add" data-id="<?php echo $url->id ?>" data-title="<?php echo e("Change Bundle")?>"><?php echo e("Bundle")?>: <?php echo $bundle->name ?></a>					
							<?php else:?>
								<a href="#" class="ajax_call small" data-content="<?php echo e("Click to add to a bundle")?>" data-action="url_bundle_add" data-id="<?php echo $url->id ?>" data-title="<?php echo e("Add to bundle")?>"><?php echo e("Add to bundle") ?></a>					
							<?php endif ?>			
							<?php if ($url->archived): ?>
								<a href='#unarchive' class='ajax_call' data-action='unarchive' data-id='<?php echo $url->id?>' data-class='return-ajax'><?php echo e("Unarchive")?></a>
							<?php else:?>
								<a href='#archive' class='ajax_call' data-action='archive' data-id='<?php echo $url->id?>' data-class='return-ajax'><?php echo e("Archive")?></a>
							<?php endif ?>																																
							<?php if($this->config["sharing"]): ?>
								<a href="https://www.facebook.com/sharer.php?u=<?php echo $this->user->domain ?>/<?php echo $url->alias.$url->custom ?>" class="u_share"><?php echo e("Share on") ?> Facebook</a>
								<a href="https://twitter.com/share?url=<?php echo $this->user->domain ?>/<?php echo $url->alias.$url->custom ?>&amp;text=Check+out+this+url" class="u_share"><?php echo e("Share on") ?> Twitter</a>							
							<?php endif ?>
						</div>	
						<li><span><i class='glyphicon glyphicon-time'></i> <?php echo Main::timeago($url->date) ?></span></li>						
					</li>
				</ul>				
			</p>
		</div>
		<div class="col-md-2 url-stats">
			<strong><?php echo $url->click ?></strong>
			<a href="<?php echo $this->user->domain ?>/<?php echo $url->alias.$url->custom ?>+" target="_blank" class="btn btn-primary btn-xs"><?php echo e("Clicks") ?></a>
		</div>
	</div>

</div><!-- /.url-list -->		