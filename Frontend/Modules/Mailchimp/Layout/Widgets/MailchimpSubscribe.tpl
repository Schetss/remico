{*
    variables that are available:
    - {$widgetMailchimpSubscribe}:
*}
{option:widgetMailchimpSubscribe}
    <div class="mailchimp-subscribe">
        <h5>Op de hoogte blijven? Schrijf u in voor onze nieuwsbrief!</h5>
        <div class="subscribe-form block">    
            <input type="email" value="" name="EMAIL" class="subscribe-email" placeholder="email"  >
            <input type="submit" value="Inschrijven" name="subscribe" class="subscribe-button">
        </div>
        <div class="subscribe-sm">
            <ul class="nav-center-hor">
                <li><a href="#"><img alt="LinkedIn" src="{$SITE_URL}/src/Frontend/Themes/Remico/Core/Layout/img/linkedin.svg" /></a></li>
                <li><a href="#"><img alt="Facebook" src="{$SITE_URL}/src/Frontend/Themes/Remico/Core/Layout/img/facebook.svg" /></a></li>
                <li><a href="#"><img alt="Twitter" src="{$SITE_URL}/src/Frontend/Themes/Remico/Core/Layout/img/twitter.svg" /></a></li>
                <li><a href="#"><img alt="Google" src="{$SITE_URL}/src/Frontend/Themes/Remico/Core/Layout/img/google.svg" /></a></li>
            </ul>
        </div>
    </div>

{/option:widgetMailchimpSubscribe}

