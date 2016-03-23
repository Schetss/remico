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
				<div class="grid-item grid-xs-1-1 grid-s-1-3 grid-m-2-3 grid-l-1-3">		
					<a href="#">
						<div class="spotlight-block">
							<img class="spotlight-blog-img" src="/src/Frontend/Files/Populair/image/800x600/bornem.png" alt="test" />
							<div class="spotlight-content">
								<h6>{$widgetCategory1a.id|truncate:24}</h6>
								<p>2880 Bornem</p>
							</div>
							<div class="spotlight-more"><img src="/src/Frontend/Themes/Remico/Core/Layout/img/plus.svg" alt="more" /></div>
						</div>
						<div class="clear"></div>
					</a>
				</div>	
			{/iteration:widgetCategory1a}	
			<div class="clear"></div>
		</div>
	{/option:widgetCategory1a}

	{option:widgetCategory1b}
		<div class="grid spotlight spotlightb block spotlight-hide">
			{iteration:widgetCategory1b}
				<div class="grid-item grid-xs-1-1 grid-s-1-3 grid-m-2-3 grid-l-1-3">		
					<a href="#">
						<div class="spotlight-block">
							<img class="spotlight-blog-img" src="/src/Frontend/Files/Populair/image/800x600/bornem.png" alt="test" />
							<div class="spotlight-content">
								<h6>{$widgetCategory1b.id|truncate:24}</h6>
								<p>2880 Bornem</p>
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
				<div class="grid-item grid-xs-1-1 grid-s-1-3 grid-m-2-3 grid-l-1-3">		
					<a href="#">
						<div class="spotlight-block">
							<img class="spotlight-blog-img" src="/src/Frontend/Files/Populair/image/800x600/bornem.png" alt="test" />
							<div class="spotlight-content">
								<h6>{$widgetCategory1c.id|truncate:24}</h6>
								<p>2880 Bornem</p>
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

