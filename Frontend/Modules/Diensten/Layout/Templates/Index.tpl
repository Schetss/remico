{*
	variables that are available:
	- {$items}: contains an array with all posts, each element contains data about the post
*}

{option:items}
	
	<div class="wrapper-inner">
		<div class="grid block-diensten block">
			{iteration:items}
				<div class="grid-item grid-xs-1-1 grid-s-1-2 grid-m-1-2 grid-l-1-2">
					<header>
						<img onload="imgLoaded(this)" src="{$SITE_URL}/src/Frontend/Files/Diensten/image/800x600/{$items.image}" alt="{$items.title}" />
					</header>
					<div class="content">
						<h5>{$items.title}</h5>
						
							{$items.content}
						
						<p class="blue-link">
							<a href="{$items.goto}">{$items.gototext}</a>
						</p>
					</div>
				</div>
			{/iteration:items}
		</div>
	</div>

	
{/option:items}
