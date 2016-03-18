{*
    variables that are available:
    - {$widgetSpotlightCategories}:
*}

{option:widgetSpotlightCategories}
    <section id="SpotlightCategoriesWidget" class="mod">
        <div class="inner">
            <header class="hd">
                <h3>{$lblCategories|ucfirst}</h3>
            </header>
            <div class="bd content">
                <ul>
                    {iteration:widgetSpotlightCategories}
                        <li>
                            <a href="{$widgetSpotlightCategories.url}">
                                {$widgetSpotlightCategories.label}&nbsp;({$widgetSpotlightCategories.total})
                            </a>
                        </li>
                    {/iteration:widgetSpotlightCategories}
                </ul>
            </div>
        </div>
    </section>
{/option:widgetSpotlightCategories}
