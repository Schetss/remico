{*
	variables that are available:
	- {$items}: contains an array with all posts, each element contains data about the post
*}

{option:items}
	
	<div class="blog-index">
		<div class="wrapper-inner">
			{iteration:items}
				<div class="grid block">
	    			<div class="grid-item grid-xs-1-1 grid-s-1-3 grid-m-1-3 grid-l-1-3 blog-image-block">
						{option:items.image}
							<a href="{$items.full_url}" title="{$items.title}"><img src="{$FRONTEND_FILES_URL}/blog/images/400x300/{$items.image}" alt="{$items.title}" /></a>

						{/option:items.image}
					</div>

					<div class="grid-item grid-xs-1-1 grid-s-1-1 grid-m-2-3 grid-l-2-3 grid-content">
							<h5>{$items.title}</h5>
							
							<p class="blog-date">
								{$items.publish_on|date:{$dateFormatLong}:{$LANGUAGE}}
							</p>

							
								{option:items.introduction}{$items.introduction}{/option:items.introduction}
							
							<p class="blue-link">
								<a href="{$items.full_url}">Lees meer</a>
							</p>
					</div>
					<div class="clear"></div>
		    	</div>
			{/iteration:items}
		</div>
	</div>
	{include:Core/Layout/Templates/Pagination.tpl}


{/option:items}




  