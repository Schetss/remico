{*
	variables that are available:
	- {$widgetLocationItem}: contains data about this location
	- {$widgetLocationSettings}: contains this module's settings
*}
{* @remark: do not remove the parseMap-class, it is used by JS *}

{option:widgetLocationItem}
	
	
	<div class="wrapper-inner">
		<div class="grid block-title block">
			<div class="grid-item grid-xs-1-1 grid-s-1-1 grid-m-1-1 grid-l-1-1">
				<div class="overlay2" onClick="style.pointerEvents='none'"></div>
				<div id="map{$widgetLocationItem.id}" class="parseMap"></div>
				{option:widgetLocationSettings.directions}
					<aside id="locationSearch{$widgetLocationItem.id}" class="locationSearch">
						<form method="get" action="#">
							<p>
								<label for="locationSearchAddress{$widgetLocationItem.id}">{$lblStart|ucfirst}<abbr title="{$lblRequiredField}">*</abbr></label>
								<input type="text" id="locationSearchAddress{$widgetLocationItem.id}" name="locationSearchAddress" class="inputText" />
								<span id="locationSearchError{$widgetLocationItem.id}" class="formError inlineError" style="display: none;">{$errFieldIsRequired|ucfirst}</span>
							</p>
							<p>
								<input type="submit" id="locationSearchRequest{$widgetLocationItem.id}" name="locationSearchRequest" class="inputSubmit" value="{$lblShowDirections|ucfirst}" />
							</p>
						</form>
					</aside>
				{/option:widgetLocationSettings.directions}

				{option:widgetLocationSettings.full_url}
					<p><a id="map-full-url-{$widgetLocationItem.id}" href="{$widgetLocationSettings.maps_url}" title="{$lblViewLargeMap}">{$lblViewLargeMap|ucfirst}</a></p>
				{/option:widgetLocationSettings.full_url}

				<div id="markerText{$widgetLocationItem.id}" style="display: none;">
					<address>
						{$widgetLocationItem.street} {$widgetLocationItem.number}<br />
						{$widgetLocationItem.zip} {$widgetLocationItem.city}
					</address>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>

	<div class="wrapper-inner">
		<div class="grid block-title block">
			<div class="grid-item grid-xs-1-1 grid-s-1-3 grid-m-1-3 grid-l-1-3">
				<div class="contact-click">
					<img src="{$SITE_URL}/src/Frontend/Themes/Remico/Core/Layout/img/telephone.svg" alt="bel ons"/>
					<p>+32 3 771 44 41</p>
				</div>
			</div>
			<div class="grid-item grid-xs-1-1 grid-s-1-3 grid-m-1-3 grid-l-1-3">
				<div class="contact-click">
					<img src="{$SITE_URL}/src/Frontend/Themes/Remico/Core/Layout/img/mail.svg" alt="mail ons"/>
					<p>info@remico.be</p>
				</div>
			</div>
			<div class="grid-item grid-xs-1-1 grid-s-1-3 grid-m-1-3 grid-l-1-3">
				<div class="contact-click">
					<img src="{$SITE_URL}/src/Frontend/Themes/Remico/Core/Layout/img/maps.svg" alt="Vind uw route"/>
					<p>Bereken uw route</p>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	
{/option:widgetLocationItem}