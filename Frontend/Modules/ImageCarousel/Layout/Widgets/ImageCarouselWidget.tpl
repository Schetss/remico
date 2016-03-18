{*
    variables that are available:
    - {$widgetImageCarousel}:
*}
	
{option:widgetImageCarousel}
	<div class="ImageCarousel">
	    {iteration:widgetImageCarousel}
	    <img class="slideShowImg" alt="{$widgetImageCarousel.title}" src="{$SITE_URL}/src/Frontend/Files/ImageCarousel/afbeelding/1440x900/{$widgetImageCarousel.image}" />
	    {/iteration:widgetImageCarousel}
	</div>
{/option:widgetImageCarousel} 