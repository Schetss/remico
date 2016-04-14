{*
    variables that are available:
    - {$widgetCategory1a}:
	- {$widgetCategory1b}:
  	- {$widgetCategory1c}:
*}
 




<div class="wrapper-inner wrapper-spotlight">
	{option:widgetCategory1a}
		<div class="grid spotlight spotlighta block spotlight-show">
			{iteration:widgetCategory1a}
				{option:widgetCategory1a.first}
					<div class="grid-item grid-xs-1-1 grid-s-1-1 grid-m-1-3 grid-l-1-3 spotlight-one">		
						<a href="/nl/kopen-huren/detail?ref={$widgetCategory1a.id}">
							<div class="spotlight-block">
								<img class="spotlight-blog-img" src="/src/Frontend/Files/Spotlight/image/800x600/{$widgetCategory1a.image}" alt="{$widgetCategory1a.name}" />
								<div class="spotlight-content">
									<h6>{$widgetCategory1a.name|truncate:24}</h6>
									<p>{$widgetCategory1a.description|truncate:35}</p>
								</div>
								<div class="spotlight-more"><img src="/src/Frontend/Themes/Remico/Core/Layout/img/plus.svg" alt="more" /></div>
							</div>
							<div class="clear"></div>
						</a>
					</div>	
				{/option:widgetCategory1a.first}
				{option:!widgetCategory1a.first}
				
				<div class="grid-item grid-xs-1-1 grid-s-1-2 grid-m-1-3 grid-l-1-3">		
					<a href="/nl/kopen-huren/detail?ref={$widgetCategory1a.id}">
						<div class="spotlight-block">
							<img class="spotlight-blog-img" src="/src/Frontend/Files/Spotlight/image/800x600/{$widgetCategory1a.image}" alt="{$widgetCategory1a.name}" />
							<div class="spotlight-content">
								<h6>{$widgetCategory1a.name|truncate:24}</h6>
								<p>{$widgetCategory1a.description|truncate:35}</p>
							</div>
							<div class="spotlight-more"><img src="/src/Frontend/Themes/Remico/Core/Layout/img/plus.svg" alt="more" /></div>
						</div>
						<div class="clear"></div>
					</a>
				</div>	
				{/option:!widgetCategory1a.first}
			{/iteration:widgetCategory1a}	
			<div class="clear"></div>
		</div>
	{/option:widgetCategory1a}

	{option:widgetCategory1b}
		<div class="grid spotlight spotlightb block spotlight-hide">
			{iteration:widgetCategory1b}
				<div class="grid-item grid-xs-1-1 grid-s-1-2 grid-m-1-3 grid-l-1-3">		
					<a href="/nl/kopen-huren/detail?ref={$widgetCategory1b.id}">
						<div class="spotlight-block">
							<img class="spotlight-blog-img" src="/src/Frontend/Files/Spotlight/image/800x600/{$widgetCategory1b.image}" alt="{$widgetCategory1b.name}" />
							<div class="spotlight-content">
								<h6>{$widgetCategory1b.name|truncate:24}</h6>
								<p>{$widgetCategory1b.description|truncate:35}</p>
							</div>
							<div class="spotlight-more"><img src="/src/Frontend/Themes/Remico/Core/Layout/img/plus.svg" alt="more" /></div>
						</div>
						<div class="clear"></div>
					</a>
				</div>	
			{/iteration:widgetCategory1b}	
			<div class="clear"></div>
		</div>
	{/option:widgetCategory1b}

	{option:widgetCategory1c}
		<div class="grid spotlight spotlightc block spotlight-hide">
			{iteration:widgetCategory1c}
				<div class="grid-item grid-xs-1-1 grid-s-1-2 grid-m-1-3 grid-l-1-3">		
					<a href="/nl/kopen-huren/detail?ref={$widgetCategory1c.id}">
						<div class="spotlight-block">
							<img class="spotlight-blog-img" src="/src/Frontend/Files/Spotlight/image/800x600/{$widgetCategory1c.image}" alt="{$widgetCategory1c.name}" />
							<div class="spotlight-content">
								<h6>{$widgetCategory1c.name|truncate:24}</h6>
								<p>{$widgetCategory1c.description|truncate:35}</p>
							</div>
							<div class="spotlight-more"><img src="/src/Frontend/Themes/Remico/Core/Layout/img/plus.svg" alt="more" /></div>
						</div>
						<div class="clear"></div>
					</a>
				</div>	
			{/iteration:widgetCategory1c}	
			<div class="clear"></div>
		</div>
	{/option:widgetCategory1c}

	<ul class="bullets">
						
	</ul>
</div>		

