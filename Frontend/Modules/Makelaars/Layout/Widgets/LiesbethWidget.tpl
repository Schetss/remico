{*
    variables that are available:
    - {$widgetLiesbeth}:
*}

{option:widgetLiesbeth}
	{iteration:widgetLiesbeth}
		<div class="makelaar">
			<header>
				{$widgetLiesbeth.description}
			</header>
			<div class="makelaar-conent">
				<div class="grid-item grid-xs-1-1 grid-s-1-1 grid-m-1-1 grid-l-1-1">
					<p class="name">{$widgetLiesbeth.name}</p>
				</div>
				<div class="grid-item grid-xs-1-1 grid-s-1-1 grid-m-1-3 grid-l-1-3">
					<div class="makelaar-img">
						<img alt="{$widgetLiesbeth.name}" src="/src/Frontend/Files/Makelaars/image/400x400/{$widgetLiesbeth.image}" />
					</div>
				</div>
				<div class="grid-item grid-xs-1-1 grid-s-1-1 grid-m-2-3 grid-l-2-3 makelaar-desc">
					<p class="blue-link"><a href="tel:{$widgetLiesbeth.phone}">{$widgetLiesbeth.phone}</a></p>
					<p class="blue-link"><a href="mailto:{$widgetLiesbeth.email}">{$widgetLiesbeth.email}</a></p>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	{/iteration:widgetLiesbeth}
{/option:widgetLiesbeth} 

