{*
    variables that are available:
    - {$widgetPopulairRegio1}
 	- {$widgetPopulairRegio2}
	- {$widgetPopulairRegio3}
*}

	<div class="wrapper-inner">
		<div class="grid block-title block">
			<div class="grid-item grid-xs-1-1 grid-s-1-1 grid-m-1-1 grid-l-1-1">
				<h1>Populaire regio's</h1>
				<p>De meest geliefde regio's van onze klanten</p>
			</div>
			<div class="clear"></div>
		</div>
	</div>

	<div class="wrapper-inner">
		<div class="grid regio block">
			<div class="grid-item grid-xs-1-1 grid-s-2-3 grid-m-2-3 grid-l-2-3">
				{option:widgetPopulairRegio1}
				{iteration:widgetPopulairRegio1}
					<a href="{$widgetPopulairRegio1.url}">
						<div class="regio-block">
							<img src="{$SITE_URL}/src/Frontend/Files/Populair/image/800x600/{$widgetPopulairRegio1.image}" alt="{$widgetPopulairRegio1.title}" />
							<div class="regio-content">
								<h3>{$widgetPopulairRegio1.title}</h3>
							</div>
						</div>
					</a>
				{/iteration:widgetPopulairRegio1}
				{/option:widgetPopulairRegio1} 

				<div class="grid">
					{option:widgetPopulairRegio2}
					{iteration:widgetPopulairRegio2}
						<div class="grid-item grid-xs-1-1 grid-s-1-2 grid-m-1-2 grid-l-1-2">
							<a href="{$widgetPopulairRegio2.url}">
								<div class="regio-block">
									<img src="{$SITE_URL}/src/Frontend/Files/Populair/image/800x600/{$widgetPopulairRegio2.image}" alt="{$widgetPopulairRegio2.title}" />
									<div class="regio-content">
										<h3>{$widgetPopulairRegio2.title}</h3>
									</div>
								</div>
							</a>
						</div>
					{/iteration:widgetPopulairRegio2}
					{/option:widgetPopulairRegio2}
				</div>
			</div>

			<div class="grid-item grid-xs-1-1 grid-s-1-3 grid-m-1-3 grid-l-1-3">
				{option:widgetPopulairRegio3}
				{iteration:widgetPopulairRegio3}
					<a href="{$widgetPopulairRegio3.url}">
						<div class="regio-block">
							<img src="{$SITE_URL}/src/Frontend/Files/Populair/image/800x600/{$widgetPopulairRegio3.image}" alt="{$widgetPopulairRegio3.title}" />
							<div class="regio-content">
								<h3>{$widgetPopulairRegio3.title}</h3>
							</div>
						</div>
					</a>
				{/iteration:widgetPopulairRegio3}
				{/option:widgetPopulairRegio3} 
			</div>
			<div class="clear"></div>
		</div>
	</div>
		


