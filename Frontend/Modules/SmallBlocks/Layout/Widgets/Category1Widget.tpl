{*
    variables that are available:
    - {$widgetCategory1}:
*}

{option:widgetCategory1}
    <div class="wrapper-inner">
        <div class="grid smallBlocks block">
            {iteration:widgetCategory1}
            
                <div class="grid-item grid-xs-1-1 grid-s-1-3 grid-m-1-3 grid-l-1-3">
                    <img src="{$SITE_URL}/src/Frontend/Files/SmallBlocks/image/400x400/{$widgetCategory1.image}" alt="{$widgetCategory1.title}" />  
            
                    <h6>{$widgetCategory1.title}</h6>
                   
                    {$widgetCategory1.content}
                    <p class="blue-link"> 
                        <a href="{$widgetCategory1.url}">{$widgetCategory1.urltext}</a>
                    </p>
                </div>
           
            {/iteration:widgetCategory1}
        </div>
    </div>
{/option:widgetCategory1}
