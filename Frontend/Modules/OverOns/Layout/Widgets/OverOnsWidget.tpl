{*
    variables that are available:
    - {$widgetOverOns}:
*}


{option:widgetOverOns}
<div class="overons-widget">
	<div class="wrapper-inner">
		<div class="grid block">
			{iteration:widgetOverOns}
				<div class="grid-item grid-xs-1-1 grid-s-1-2 grid-m-1-2 grid-l-1-2">

					{option:!widgetOverOns.image}
						<img onload="imgLoaded(this)" src="{$SITE_URL}/src/Frontend/Files/OverOns/image/800x600/{$widgetOverOns.image}" alt="{$widgetOverOns.title}" />	
					{/option:!widgetOverOns.image}
			
			
					<h5>{$widgetOverOns.title}</h5>	
					<p class="subtitle">
						{$widgetOverOns.subtitle}
					</p>	

					{option:widgetOverOns.content}
						{$widgetOverOns.content}
					{/option:widgetOverOns.content}
					
					{option:widgetOverOns.url}	
						<p class="blue-link">
							<a class="blue-link" href="{$widgetOverOns.url}">{$widgetOverOns.urltext}</a>
						</p>
					{/option:widgetOverOns.url}
					
					<div class="clear"></div>
		    	</div>		
			{/iteration:widgetOverOns}
			<div class="clear"></div>
		</div>
	</div>
</div>
{/option:widgetOverOns} 

