{*
    variables that are available:
    - {$widgetImageCarousel}:
*}
	
{option:widgetImageCarousel}
	<div class="ImageCarousel">
		<div>
		    {iteration:widgetImageCarousel}
		    <img onload="imgLoaded(this)" class="slideShowImg" alt="{$widgetImageCarousel.title}" src="{$SITE_URL}/src/Frontend/Files/ImageCarousel/afbeelding/1440x900/{$widgetImageCarousel.image}" />
	    	{/iteration:widgetImageCarousel}
		</div>
	</div>
{/option:widgetImageCarousel} 