{*
	variables that are available:
	- {$item}: contains data about the post
	- {$comments}: contains an array with the comments for the post, each element contains data about the comment.
	- {$commentsCount}: contains a variable with the number of comments for this blog post.
	- {$navigation}: contains an array with data for previous and next post
*}
{option:content}
	{iteration:content}
		<div id="fb-root"></div>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=601278376597485";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
 
	<div class="searchSmall-wrapper estate-detail">
		<div class="searchSmall">
					
			<div class="imageCarousel" data-scroll-speed="3">
				{option:content.Pictures}
					{iteration:content.Pictures}
						{option:content.Pictures.first}
							<img onload="imgLoaded(this)" alt="{$content.Pictures.Description}" src="{$content.Pictures.UrlLarge}" />
						{/option:content.Pictures.first}
					{/iteration:content.Pictures}
				{/option:content.Pictures}
				<div class="clear"></div>
				
			</div>
			<div class="img-estate-over"></div>
			<div class="searchSmallForm estate-header">
				

				<div class="wrapper">
					<div class="wrapper-inner">

						<h1 itemprop="name">{$content.Name}</h1>
						
					</div>
				</div>

			</div>
			<hr class="hr-shadow" />
		</div>
	</div>

	<div class="estate-head">
		<div class="wrapper">		
			<div class="wrapper-inner estate-wrapper">

				<div class="grid block3">

					<div class="grid-item grid-xs-1-1 grid-s-2-3 grid-m-2-3 grid-l-2-3">
						<h4>{$content.Address1} {$content.Number}, {$content.Zip} {$content.City}</h4>
						<p>{$content.Comments}</p>
						<ul>
							<li>{iteration:content.Purposes}{$content.Purposes.Name}{/iteration:content.Purposes}</li>
							<li>{$content.SubCategory}</li>
						</ul>
					</div>


					<div class="grid-item grid-xs-1-1 grid-s-1-3 grid-m-1-3 grid-l-1-3">
						<p class="ground">
							{option:content.MinArea}
								<span class="estate-size">{$content.MinArea}</span>m<sup>2</sup> - <span class="estate-size">{$content.MaxArea}</span>m<sup>2</sup>
							{/option:content.MinArea}
							{option:!content.MinArea}
								Oppervlakte op aanvraag
							{/option:!content.MinArea}
						</p>

						<p class="ref"><span>REF</span> {$content.EstateID}</p>

					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>


	<div class="wrapper">		
		<div class="wrapper-inner">
			<div class="grid block">
				<div class="grid-item grid-xs-1-1 grid-s-1-1 grid-m-2-3 grid-l-2-3 content-block-2-3">
					<div class="editor-block estate-editor-block">
						{option:contentdetail2}
							<h4>Eigenschappen</h4>
								<table style="width: 100%;" class="e-table">
									<tbody>
										
									{iteration:contentdetail2}
										<tr>
											<td>
												{$contentdetail2.Name}
											</td>
											<td>
												{$contentdetail2.Subdetails.0.Value}
												{option:contentdetail2.Subdetails.1}
													- {$contentdetail2.Subdetails.1.Value}
												{/option:contentdetail2.Subdetails.1}
											</td>
										</tr>
									{/iteration:contentdetail2}
										
										
										
									</tbody>
								</table>
						{/option:contentdetail2}
						
						{option:contentdetail}
							<h4>Voorzieningen</h4>
								<ul class="list-fasc">
									
									{iteration:contentdetail}
										<li>
											<img src="/src/Frontend/Themes/Remico/Core/Layout/img/{$contentdetail.DetailId}.svg" alt="{$contentdetail.Name}" /> {$contentdetail.Name}
										</li>
									{/iteration:contentdetail}

									
								</ul>
						{/option:contentdetail}

						{option:content.Sms}
						<h4>Omschrijving</h4>
						<p>
							{$content.Sms}
						</p>
						{/option:content.Sms}

						{option:content.Pictures}
						<h4>Foto's</h4>
							
							<div class="img-box">
								<div class="prev-img"></div>
								<div class="next-img"></div>
								<ul class="img-gallery">
									{iteration:content.Pictures}
										<li class="gallery-hide">
											<img alt="{$content.Pictures.Description}" src="{$content.Pictures.UrlLarge}" />
										</li>
									{/iteration:content.Pictures}
								</ul>
							</div>

							<ul class="bullimgs">
										
							</ul>
						{/option:content.Pictures}
						


						<h4>Op de kaart</h4>
												<div class="overlay" onClick="style.pointerEvents='none'"></div>
						<iframe class="maps-estate" src="{$content.LinkVirtualVisit}" frameborder="0" style="border:0" allowfullscreen></iframe>

						{option:contentChild}

							<h4>Units</h4>
								<table style="width: 100%;" class="estate-table">
									<tr>
										<th>Naam</th>
										<th>Min. opp.</th>
										<th>Max. opp.</th>
										<!-- <th>Verdieping</th> -->
									</tr>

									<tbody>
										{iteration:contentChild}
											<tr>
												<td>
													{$contentChild.Name}
												</td>

												<td>
													{option:contentChild.MinArea}
														{$contentChild.MinArea}m<sup>2</sup> 
													{/option:contentChild.MinArea}
													{option:!contentChild.MinArea}
													/
													{/option:!contentChild.MinArea}
												</td>

												<td>
													{option:contentChild.MinArea}
														{$contentChild.MaxArea}m<sup>2</sup>
													{/option:contentChild.MinArea}
													{option:!contentChild.MinArea}
													/
													{/option:!contentChild.MinArea}
												</td>
<!-- 
												<td>
													{$contentChild.Floor}
 												</td> -->

											</tr>
										{/iteration:contentChild}
									</tbody>
								</table>
							
							
						{/option:contentChild}


						<h4 id="estate-form">Contacteer ons voor meer informatie</h4>
							
						{* Contact position *}
						{option:positionContact}
							{iteration:positionContact}
							{option:!positionContact.blockIsHTML}
								{$positionContact.blockContent}
							{/option:!positionContact.blockIsHTML}
							{option:positionContact.blockIsHTML}
								{$positionContact.blockContent}
							{/option:positionContact.blockIsHTML}
							{/iteration:positionContact}
						{/option:positionContact}
	

						<h4>Deel deze pagina</h4>


					</div>

					<div class="sm-share estate-share">
						<ul class="rrssb-buttons clearfix">  
		                    <li class="rrssb-facebook">
						        <!--  Replace with your URL. For best results, make sure you page has the proper FB Open Graph tags in header:
						              https://developers.facebook.com/docs/opengraph/howtos/maximizing-distribution-media-content/ -->
						        <a href="https://www.facebook.com/sharer/sharer.php?u={$SITE_URL}/nl/kopen-huren/detail?ref={$content.EstateID}" class="popup">
						          <span class="rrssb-icon">
						            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29 29"><path d="M26.4 0H2.6C1.714 0 0 1.715 0 2.6v23.8c0 .884 1.715 2.6 2.6 2.6h12.393V17.988h-3.996v-3.98h3.997v-3.062c0-3.746 2.835-5.97 6.177-5.97 1.6 0 2.444.173 2.845.226v3.792H21.18c-1.817 0-2.156.9-2.156 2.168v2.847h5.045l-.66 3.978h-4.386V29H26.4c.884 0 2.6-1.716 2.6-2.6V2.6c0-.885-1.716-2.6-2.6-2.6z"/></svg>
						          </span>
						          <span class="rrssb-text">facebook</span>
						        </a>
					      	</li>
		                   	<li class="rrssb-linkedin">
						        <!-- Replace href with your meta and URL information -->
						        <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={$SITE_URL}/nl/kopen-huren/detail?ref={$content.EstateID}&amp;title={$content.Name}&amp;summary={$content.Name}" class="popup">
						          <span class="rrssb-icon">
						            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28"><path d="M25.424 15.887v8.447h-4.896v-7.882c0-1.98-.71-3.33-2.48-3.33-1.354 0-2.158.91-2.514 1.802-.13.315-.162.753-.162 1.194v8.216h-4.9s.067-13.35 0-14.73h4.9v2.087c-.01.017-.023.033-.033.05h.032v-.05c.65-1.002 1.812-2.435 4.414-2.435 3.222 0 5.638 2.106 5.638 6.632zM5.348 2.5c-1.676 0-2.772 1.093-2.772 2.54 0 1.42 1.066 2.538 2.717 2.546h.032c1.71 0 2.77-1.132 2.77-2.546C8.056 3.593 7.02 2.5 5.344 2.5h.005zm-2.48 21.834h4.896V9.604H2.867v14.73z"/></svg>
						          </span>
						          <span class="rrssb-text">linkedin</span>
						        </a>
						      </li>
	                   		<li class="rrssb-twitter">
						        <!-- Replace href with your Meta and URL information  -->
						        <a href="https://twitter.com/intent/tweet?text=Makelaars%20in%20bedrijfsvastgoed%20%40remico.be%20{$SITE_URL}/nl/kopen-huren/detail?ref={$content.EstateID}"
						        class="popup">
						          <span class="rrssb-icon">
						            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28"><path d="M24.253 8.756C24.69 17.08 18.297 24.182 9.97 24.62a15.093 15.093 0 0 1-8.86-2.32c2.702.18 5.375-.648 7.507-2.32a5.417 5.417 0 0 1-4.49-3.64c.802.13 1.62.077 2.4-.154a5.416 5.416 0 0 1-4.412-5.11 5.43 5.43 0 0 0 2.168.387A5.416 5.416 0 0 1 2.89 4.498a15.09 15.09 0 0 0 10.913 5.573 5.185 5.185 0 0 1 3.434-6.48 5.18 5.18 0 0 1 5.546 1.682 9.076 9.076 0 0 0 3.33-1.317 5.038 5.038 0 0 1-2.4 2.942 9.068 9.068 0 0 0 3.02-.85 5.05 5.05 0 0 1-2.48 2.71z"/></svg>
						          </span>
						          <span class="rrssb-text">twitter</span>
						        </a>
					      	</li>
		                </ul>
					
					</div>

				</div>

				<div class="grid-item grid-xs-1-1 grid-s-1-3 grid-m-1-3 grid-l-1-3 agent-grid">
					<div class="agent-wrap">
						<div class="agent">
							{* MainRight position *}
							{option:positionMainRight}
								{iteration:positionMainRight}
								{option:!positionMainRight.blockIsHTML}
									{$positionMainRight.blockContent}
								{/option:!positionMainRight.blockIsHTML}
								{option:positionMainRight.blockIsHTML}
									{$positionMainRight.blockContent}
								{/option:positionMainRight.blockIsHTML}
								{/iteration:positionMainRight}
							{/option:positionMainRight}
						</div>
						<div class="clear"></div>

						

					<div class="clear"></div>
					</div>

					
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>	
{/iteration:content}
{/option:content}