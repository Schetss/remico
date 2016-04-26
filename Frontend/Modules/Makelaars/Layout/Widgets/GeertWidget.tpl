{*
    variables that are available:
    - {$widgetGeert}:
*}

{option:widgetGeert}
	{iteration:widgetGeert}
		<div class="makelaar">
			<header>
				{$widgetGeert.description}
			</header>
			<div class="makelaar-conent">
				<div class="grid-item grid-xs-1-1 grid-s-1-1 grid-m-1-1 grid-l-1-1">
					<p class="name">{$widgetGeert.name}</p>
				</div>
				<div class="grid-item grid-xs-1-3 grid-s-1-3 grid-m-1-3 grid-l-1-3 agent-img">
					<div class="makelaar-img">
						<img alt="{$widgetGeert.name}" src="/src/Frontend/Files/Makelaars/image/400x400/{$widgetGeert.image}" />
					</div>
				</div>
				<div class="grid-item grid-xs-2-3 grid-s-2-3 grid-m-1-1 grid-l-2-3 makelaar-desc">
					<p class="blue-link"><a href="tel:{$widgetGeert.phone}">{$widgetGeert.phone}</a></p>
					<p class="blue-link"><a href="mailto:{$widgetGeert.email}">{$widgetGeert.email}</a></p>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	{/iteration:widgetGeert}
{/option:widgetGeert} 

