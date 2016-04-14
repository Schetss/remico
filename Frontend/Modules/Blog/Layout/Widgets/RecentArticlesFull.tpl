{*
	variables that are available:
	- {$widgetBlogRecentArticlesFull}: contains an array with all posts, each element contains data about the post
*}

{option:widgetBlogRecentArticlesFull}
		
		<div class="blog-widget">
			<div class="wrapper-inner">
	    	{iteration:widgetBlogRecentArticlesFull}
	    		<div class="grid block">
	    			<div class="grid-item grid-xs-1-1 grid-s-1-1 grid-m-1-3 grid-l-1-3  blog-image-block">
						{option:widgetBlogRecentArticlesFull.image}
							<a href="{$widgetBlogRecentArticlesFull.full_url}" title="{$widgetBlogRecentArticlesFull.title}"><img src="{$FRONTEND_FILES_URL}/blog/images/400x300/{$widgetBlogRecentArticlesFull.image}" alt="{$widgetBlogRecentArticlesFull.title}" /></a>

						{/option:widgetBlogRecentArticlesFull.image}
					</div>

					<div class="grid-item grid-xs-1-1 grid-s-1-1 grid-m-2-3 grid-l-2-3 grid-content">
							<h5>{$widgetBlogRecentArticlesFull.title}</h5>
							
							<p class="blog-date">
								{$widgetBlogRecentArticlesFull.publish_on|date:{$dateFormatLong}:{$LANGUAGE}}
							</p>

							
								{option:widgetBlogRecentArticlesFull.introduction}{$widgetBlogRecentArticlesFull.introduction}{/option:widgetBlogRecentArticlesFull.introduction}
							
							<p class="blue-link">
								<a href="{$widgetBlogRecentArticlesFull.full_url}">Lees meer</a>
							</p>
					</div>
					<div class="clear"></div>
		    	</div>
    	    	{/iteration:widgetBlogRecentArticlesFull}		

	   		</div>
	   	</div>		

    	<div class="wrapper-inner">
			<div class="grid block-title block">
				<div class="grid-item grid-xs-1-1 grid-s-1-1 grid-m-1-1 grid-l-1-1">
					<a href="#" class="cta-button">Alle nieuwsberichten</a>
				</div>
				<div class="clear"></div>
			</div>
		</div>
    </div>
{/option:widgetBlogRecentArticlesFull}
