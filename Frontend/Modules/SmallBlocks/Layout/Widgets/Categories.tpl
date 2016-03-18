{*
    variables that are available:
    - {$widgetSmallBlocksCategories}:
*}

{option:widgetSmallBlocksCategories}
    <section id="SmallBlocksCategoriesWidget" class="mod">
        <div class="inner">
            <header class="hd">
                <h3>{$lblCategories|ucfirst}</h3>
            </header>
            <div class="bd content">
                <ul>
                    {iteration:widgetSmallBlocksCategories}
                        <li>
                            <a href="{$widgetSmallBlocksCategories.url}">
                                {$widgetSmallBlocksCategories.label}&nbsp;({$widgetSmallBlocksCategories.total})
                            </a>
                        </li>
                    {/iteration:widgetSmallBlocksCategories}
                </ul>
            </div>
        </div>
    </section>
{/option:widgetSmallBlocksCategories}
