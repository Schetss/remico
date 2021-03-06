{include:{$BACKEND_CORE_PATH}/Layout/Templates/Head.tpl}
{include:{$BACKEND_CORE_PATH}/Layout/Templates/StructureStartModule.tpl}

<div class="pageTitle">
    <h2>{$lblGeschiedenis|ucfirst}: {$lblAdd}</h2>
</div>

{form:add}
    <label for="titel">{$lblTitel|ucfirst}</label>
    {$txtTitel} {$txtTitelError}

    <div id="pageUrl">
        <div class="oneLiner">
            {option:detailURL}<p><span><a href="{$detailURL}{option:item}/{$item.url}{/option:item}">{$detailURL}/<span id="generatedUrl"></span></a></span></p>{/option:detailURL}
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
                                    <label for="content">{$lblContent|ucfirst}</label>
                                </h3>
                            </div>
                            <div class="optionsRTE">
                                {$txtContent} {$txtContentError}
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

                        <div class="box">
                            <div class="heading">
                                <h3>
                                    <label for="gototext">{$lblGototext|ucfirst}</label>
                                </h3>
                            </div>
                            <div class="options">
                                {$txtGototext} {$txtGototextError}
                            </div>
                        </div>


                    </td>

                    <td id="sidebar">

                            <div class="box">
                                <div class="heading">
                                    <h3>
                                        <label for="datumDate">{$lblDatum|ucfirst}</label>
                                    </h3>
                                </div>
                                <div class="options">
                                    <div class="oneLiner">
                                        <p>{$txtDatumDate} {$txtDatumDateError}</p>
                                        <p><label for="datumTime">{$lblAt|ucfirst}</label></p>
                                        <p>{$txtDatumTime} {$txtDatumTimeError}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="box">
                                <div class="heading">
                                    <h3>
                                        <label for="image">{$lblImage|ucfirst}</label>
                                    </h3>
                                </div>
                                <div class="options">
                                    {$fileImage} {$fileImageError}
                                </div>
                            </div>


                    </td>
                </tr>
            </table>
        </div>

        <div id="tabSEO">
            {include:{$BACKEND_CORE_PATH}/Layout/Templates/Seo.tpl}
        </div>

    </div>

    <div class="fullwidthOptions">
        <div class="buttonHolderRight">
            <input id="addButton" class="inputButton button mainButton" type="submit" name="add" value="{$lblPublish|ucfirst}" />
        </div>
    </div>
{/form:add}

{include:{$BACKEND_CORE_PATH}/Layout/Templates/StructureEndModule.tpl}
{include:{$BACKEND_CORE_PATH}/Layout/Templates/Footer.tpl}
