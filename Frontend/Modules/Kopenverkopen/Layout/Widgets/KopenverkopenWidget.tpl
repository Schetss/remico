{*
    variables that are available:
    - {$widgetKopenVerkopen}:
*}

{option:widgetKopenVerkopen}

	<div class="wrapper-inner">
		<div class="grid block-title block">
			<div class="grid-item grid-xs-1-1 grid-s-1-1 grid-m-1-1 grid-l-1-1">
				<h1>Op zoek of heeft u iets in de aanbieding?</h1>
				<p>Wij organiseren verkopen en verhuren voor alle partijen.</p>
			</div>
			<div class="clear"></div>
		</div>
	</div>

	<div class="cta block">
		{iteration:widgetKopenVerkopen}
		<a href="{$widgetKopenVerkopen.url}">
			<div class="cta-block">
				<img src="{$SITE_URL}/src/Frontend/Files/Kopenverkopen/image/800x600/{$widgetKopenVerkopen.image}" alt="{$widgetKopenVerkopen.title}" />
				<div class="cta-content">
					<h3>{$widgetKopenVerkopen.title}</h3>
					<p>{$widgetKopenVerkopen.subtitle}</p>
					<div class="cta-more">Ontdek meer</div>
				</div>
			</div>
		</a>
		{/iteration:widgetKopenVerkopen}
		<div class="clear"></div>
	</div>
{/option:widgetKopenVerkopen} 

