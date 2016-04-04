
	{option:estatelist}
	 	{iteration:estatelist}
	 	<a href="{$SITE_URL}/nl/kopen-huren/detail?ref={$estatelist.EstateID}">
		 	<div class="search-estate">
			 	<div class="wrapper-inner">
					<div class="grid estate">
						<div class="grid-item grid-xs-1-1 grid-s-1-3 grid-m-1-3 grid-l-1-3">
							<div class="img-holder showimg">
								{option:estatelist.Pictures}
									<div class="img-holder showimg">
								  		{iteration:estatelist.Pictures}
						                	<img class="yesimg" alt="{$estatelist.Pictures.Description}" src="{$estatelist.Pictures.UrlLarge}" />
					            		{/iteration:estatelist.Pictures}
					            	</div>
						 		{/option:estatelist.Pictures} 
						 		{option:!estatelist.Pictures}
							 		<div class="img-holder hideimg">
							 			<img class="noimg" alt="no image" src="/src/Frontend/Themes/Remico/Core/Layout/img/image.svg" />
							 		</div>
						 		{/option:!estatelist.Pictures} 
							</div>
						</div>

						<div class="grid-item grid-xs-1-1 grid-s-2-3 grid-m-2-3 grid-l-2-3 grid-content">
								<h4>{$estatelist.Name}</h4>
								
								<div class="subtitle">
									<p>
										<!-- {$estatelist.Address1} {$estatelist.Number} {$estatelist.Box}- -->{$estatelist.Zip} {$estatelist.City}
									</p>
									<p>
										<span>REF</span> {$estatelist.EstateID} 
									
									</p>
								</div>
								<p class="opp">
									{option:estatelist.MinArea}
										{$estatelist.MinArea}m<sup>2</sup> - {$estatelist.MaxArea}m<sup>2</sup>
									{/option:estatelist.MinArea}
									{option:!estatelist.MinArea}
										Oppervlakte op aanvraag
									{/option:!estatelist.MinArea}
								</p>
								<p class="avail">
									{$estatelist.Comments}
								</p>
								<ul>
									<li>{iteration:estatelist.Purposes}{$estatelist.Purposes.Name}{/iteration:estatelist.Purposes}</li>
									<li>{$estatelist.SubCategory}</li>
								</ul>

								<div class="more-search"> meer info </div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</a>
	    {/iteration:estatelist}

	{/option:estatelist}


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

{$estatelist|dump}

			