{*
    variables that are available:
    - {$widgetGeschiedenis}:
*}


{option:widgetGeschiedenis}

	<div class="history-widget">
		<div class="wrapper-inner history block">
			<div class="block history-wrapper">
				{iteration:widgetGeschiedenis}
					<div class="grid history-hide">
						<div class="grid-item grid-xs-1-1 grid-s-1-3 grid-m-1-3 grid-l-1-3 history-image">
							<img onload="imgLoaded(this)" src="{$SITE_URL}/src/Frontend/Files/Geschiedenis/image/800x600/{$widgetGeschiedenis.image}" alt="{$widgetGeschiedenis.title}" />	
						</div>
						<div class="grid-item grid-xs-1-1 grid-s-1-1 grid-m-2-3 grid-l-2-3 grid-content">
							<h5>{$widgetGeschiedenis.title}</h5>
							{$widgetGeschiedenis.content}
							
							{option:widgetGeschiedenis.url}
								<p class="blue-link">
									<a href="{$widgetGeschiedenis.url}">{$widgetGeschiedenis.urltext}</a>
								</p>
							{/option:widgetGeschiedenis.url}
						</div>
						<div class="clear"></div>
					</div>
				{/iteration:widgetGeschiedenis}
				<div class="grid-item grid-xs-1-1 grid-s-1-1 grid-m-1-3 grid-l-1-3">
					<ul class="bullits">
								
					</ul>
				</div>
			</div>
		<div class="clear"></div>
		</div>
	</div>	

{/option:widgetGeschiedenis} 