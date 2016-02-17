{*
    variables that are available:
    - {$widgetMailchimpSubscribe}:
*}
{option:widgetMailchimpSubscribe}
    <div class="mailchimp-subscribe">
        <h5>Op de hoogte blijven? Schrijf u in voor onze nieuwsbrief!</h5>
        <div class="subscribe-form block">    
            <input type="email" value="" name="EMAIL" class="subscribe-email" placeholder="email" />
            <button class="subscribe-button" id="mailchimp-sendbutton">
                <p>Schrijf mij in</p>
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                    <path id="paper-plane-icon" d="M462,54.955L355.371,437.187l-135.92-128.842L353.388,167l-179.53,124.074L50,260.973L462,54.955z
M202.992,332.528v124.517l58.738-67.927L202.992,332.528z">
                    </path>
                </svg>
            </button> 
            <div class="clear"></div>
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

