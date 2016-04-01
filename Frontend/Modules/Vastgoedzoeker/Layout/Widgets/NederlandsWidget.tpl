<div class="wrapper-inner search-estate">
	{option:estatelist}
	 	{iteration:estatelist}
			<div class="grid block">
				<div class="grid-item grid-xs-1-1 grid-s-1-3 grid-m-1-3 grid-l-1-3">
					<div class="img-holder">
						<img alt="" src="/src/Frontend/Themes/Remico/Core/Layout/img/footerbg.jpg"/>
					</div>
					<!-- {option:estatelist.Pictures}
					  	{iteration:estatelist.Pictures}
			                <img alt="{$estatelist.Pictures.Description}" src="{$estatelist.Pictures.UrlLarge}" />
			            {/iteration:estatelist.Pictures}
				 	{/option:estatelist.Pictures}  --> 
				</div>

				<div class="grid-item grid-xs-1-1 grid-s-2-3 grid-m-2-3 grid-l-2-3 grid-content">
						<h5>{$estatelist.Name}</h5>
						
						<p class="blog-date">
							{$estatelist.Zip} {$estatelist.City}
						</p>
						<p>
							{$estatelist.EstateID}
						</p>

						<p>
							{$estatelist.MinArea} tot {$estatelist.MaxArea}
						</p>
						<p>
							{$estatelist.Category} - {iteration:estatelist.Purposes}{$estatelist.Purposes.Name}{/iteration:estatelist.Purposes}
						
						</p>
						<a href="{$SITE_URL}/nl/kopen-huren/detail?ref={$estatelist.EstateID}">meer info</a>
				</div>
				<div class="clear"></div>
			</div>
	      
	          

	    {/iteration:estatelist}

	{/option:estatelist}


</div>




{option:estatecount}

		<div class="wrapper-inner">
			<div class="grid block">
				<div class="grid-item grid-xs-1-1 grid-s-1-1 grid-m-1-1 grid-l-1-1">
					<nav class="pagination nav-center-hor pagination-search">
						<ul>
							{iteration:estatecount}
								<li id="pageNumber{$estatecount.Number}" {$estatecount.Selected}>
									{option:estatecount.Selected}<span>{/option:estatecount.Selected}{option:!estatecount.Selected}<a href="{option:pagurl}{$pagurl}{/option:pagurl}&amp;Page={$estatecount.Number}">{/option:!estatecount.Selected}{$estatecount.Number}{option:!estatecount.Selected}</a>{/option:!estatecount.Selected}{option:estatecount.Selected}</span>{/option:estatecount.Selected}
								</li>
							{/iteration:estatecount}

						</ul>
					</nav>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
{/option:estatecount}


			