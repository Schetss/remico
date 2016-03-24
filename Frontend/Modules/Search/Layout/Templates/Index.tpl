{*
	variables that are available:
	- {$searchResults}: contains an array with all items, each element contains data about the item
	- {$searchTerm}: the term that has been searched for
*}

<section id="searchIndex" class="mod">
	<div class="block search-form-index">
		{form:search}
			<input value="" id="qWidget" name="q_widget" maxlength="255" type="text" class="inputText autoSuggest" placeholder="Geef hier uw zoekterm in" />
			<input id="submit" class="inputSubmit submit-search-form cta-button" type="submit" name="submit" value="{$lblSearch|ucfirst}" />
		{/form:search}	
		<div class="clear"></div>	
	</div>
</section>



{* don't remove this container nor replace the id - it'll be used to populate the search results live as you type *}
<div id="searchContainer">
	{include:Modules/Search/Layout/Templates/Results.tpl}
</div>






