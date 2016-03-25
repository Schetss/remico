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

	{option:estatecount}
	 {iteration:estatecount}
		<h5>{$estatecount.Number}</h5>
		 {/iteration:estatecount}
	{/option:estatecount}

</div>

{$estatelist|dump}