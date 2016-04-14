{*
    variables that are available:
    - {$widgetKopenVerkopen}:
*}

{option:widgetKopenVerkopen}

	
	<div class="cta block">
		{iteration:widgetKopenVerkopen}
		<a href="{$widgetKopenVerkopen.url}">
			<div class="cta-block">
				<img src="{$SITE_URL}/src/Frontend/Files/Kopenverkopen/image/800x600/{$widgetKopenVerkopen.image}" alt="{$widgetKopenVerkopen.title}" />
				<div class="cta-content">
					<h3>{$widgetKopenVerkopen.title}</h3>
					<p>{$widgetKopenVerkopen.subtitle}</p>
					<div class="cta-more">Meer informatie</div>
				</div>
			</div>
		</a>
		{/iteration:widgetKopenVerkopen}
		<div class="clear"></div>
	</div>
{/option:widgetKopenVerkopen} 

