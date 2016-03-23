{*
    variables that are available:
    - {$widgetTestimonials}:
*}


{option:widgetTestimonials}
	<div class="testimonials">
		<div class="wrapper-inner">
			<div class="block">
				<div class="grid">
					{iteration:widgetTestimonials}
						<div class="grid-item grid-item-testi grid-xs-1-1 grid-s-1-1 grid-m-1-1grid-l-1-1 testimonials-hide ">
							{$widgetTestimonials.content}
							<p class="testimonials-client">- {$widgetTestimonials.client}</p>
						</div>					
					{/iteration:widgetTestimonials}
				</div>
				<div class="grid-item grid-xs-1-1 grid-s-1-1 grid-m-1-1 grid-l-1-1">
					<ul class="bullots">
							
					</ul>	
				</div>
				<div class="clear"></div>	
			</div>
			<div class="clear"></div>	
		</div>
	</div>			
{/option:widgetTestimonials} 
