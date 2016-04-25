{*
	variables that are available:
	- {$searchResults}: contains an array with all items, each element contains data about the item
	- {$searchTerm}: the term that has been searched for
*}

{option:searchTerm}
	<section id="searchResults" class="mod">
		<div class="inner">


			{option:!searchResults}
				<div class="bd content no-results">
					<p class="blue-link">{$msgSearchNoItems} Ga naar onze pagina Kopen / Huren om panden te zoeken<br />
					<a href="/nl/kopen-huren">Panden zoeken</a></p>
					<div class="clear"></div>
				</div>
			{/option:!searchResults}


			{option:searchResults}
				{iteration:searchResults}
					<div class="grid block">
	    				<div class="grid-item grid-xs-1-1 grid-s-1-1 grid-m-1-1 grid-l-1-1">
							<h4>
								
										{$searchResults.title}
								
							</h4>
						
							<div class="bd content">
								{option:!searchResults.introduction}{$searchResults.text|truncate:200}{/option:!searchResults.introduction}
								{option:searchResults.introduction}{$searchResults.introduction}{/option:searchResults.introduction}
								<p class="blue-link">
									<a href="{$searchResults.full_url}" title="{$searchResults.title}">{$lblMore|ucfirst}</a>
								</p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				{/iteration:searchResults}
			{/option:searchResults}


		</div>
	</section>
	{include:Core/Layout/Templates/Pagination.tpl}
{/option:searchTerm}