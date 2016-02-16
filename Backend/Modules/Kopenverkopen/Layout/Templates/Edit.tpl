{include:{$BACKEND_CORE_PATH}/Layout/Templates/Head.tpl}
{include:{$BACKEND_CORE_PATH}/Layout/Templates/StructureStartModule.tpl}

<div class="pageTitle">
    <h2>{$lblKopenverkopen|ucfirst}: {$lblEdit}</h2>
</div>

{form:edit}
    <label for="title">{$lblTitle|ucfirst}</label>
    {$txtTitle} {$txtTitleError}

    <div id="pageUrl">
        <div class="oneLiner">
            {option:detailURL}<p><span><a href="{$detailURL}/{$item.url}">{$detailURL}/<span id="generatedUrl">{$item.url}</span></a></span></p>{/option:detailURL}
            {option:!detailURL}<p class="infoMessage">{$errNoModuleLinked}</p>{/option:!detailURL}
        </div>
    </div>


    <div class="tabs">
        <ul>
            <li><a href="#tabContent">{$lblContent|ucfirst}</a></li>
            <li><a href="#tabSEO">{$lblSEO|ucfirst}</a></li>
        </ul>

        <div id="tabContent">
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td id="leftColumn">

                        <div class="box">
                            <div class="heading">
                                <h3>
                                    <label for="subtitle">{$lblSubtitle|ucfirst}</label>
                                </h3>
                            </div>
                            <div class="options">
                                {$txtSubtitle} {$txtSubtitleError}
                            </div>
                        </div>

                            <div class="box">
                                <div class="heading">
                                    <h3>
                                        <label for="image">{$lblImage|ucfirst}</label>
                                    </h3>
                                </div>
                                <div class="options">
                                    {option:item.image}
                                        <p><img src="{$FRONTEND_FILES_URL}/kopenverkopen/image/128x128/{$item.image}"/></p>
                                    {/option:item.image}
                                    <p>
                                        {$fileImage} {$fileImageError}
                                    </p>
                                </div>
                            </div>

                        <div class="box">
                            <div class="heading">
                                <h3>
                                    <label for="goto">{$lblGoto|ucfirst}</label>
                                </h3>
                            </div>
                            <div class="options">
                                {$txtGoto} {$txtGotoError}
                            </div>
                        </div>


                    </td>

                    <td id="sidebar">


                    </td>
                </tr>
            </table>
        </div>

        <div id="tabSEO">
            {include:{$BACKEND_CORE_PATH}/Layout/Templates/Seo.tpl}
        </div>

    </div>

    <div class="fullwidthOptions">
        <a href="{$var|geturl:'delete'}&amp;id={$item.id}" data-message-id="confirmDelete" class="askConfirmation button linkButton icon iconDelete">
            <span>{$lblDelete|ucfirst}</span>
        </a>
        <div class="buttonHolderRight">
            <input id="addButton" class="inputButton button mainButton" type="submit" name="add" value="{$lblSave|ucfirst}" />
        </div>
    </div>

    <div id="confirmDelete" title="{$lblDelete|ucfirst}?" style="display: none;">
        <p>
            {$msgConfirmDelete|sprintf:{$item.title}}
        </p>
    </div>
{/form:edit}

{include:{$BACKEND_CORE_PATH}/Layout/Templates/StructureEndModule.tpl}
{include:{$BACKEND_CORE_PATH}/Layout/Templates/Footer.tpl}
