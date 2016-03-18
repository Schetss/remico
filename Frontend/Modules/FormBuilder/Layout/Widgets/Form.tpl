{* Note: we can use general variables names here since this template is parsed within its own scope *}


<section class="contact-us">
	

	<div class="wrapper-inner">
		<div class="grid block-title block">
				{option:successMessage}
					<div id="{$formName}" class="message success contact-success">
						<header>
							<img src="{$SITE_URL}/src/Frontend/Themes/Remico/Core/Layout/img/check.svg" alt="success" />
						</header>
						<div class="contact-success-content">
							{$successMessage}
						</div>
						<div class="clear"></div>
					</div>
				{/option:successMessage}
				{option:formBuilderError}<div class="message error"><p>{$formBuilderError}</p></div>{/option:formBuilderError}

				{option:fields}
				<form {option:hidUtf8}accept-charset="UTF-8" {/option:hidUtf8}id="{$formName}" method="post" action="{$formAction}" class="contact-form">
					{option:formToken}
						<input type="hidden" name="form_token" id="formToken{$formName|ucfirst}" value="{$formToken}" />
					{/option:formToken}

					<input type="hidden" name="form" value="{$formName}" />

					{iteration:fields}
						{* Headings and paragraphs *}
						{option:fields.plaintext}
							<div class="content">
								{$fields.html}
							</div>
						{/option:fields.plaintext}

						{* Input fields, textareas and drop downs *}
						{option:fields.simple}
							<div class="grid-item">
								<p{option:fields.error} class="errorArea"{/option:fields.error}>

									{$fields.html}
									{option:fields.error}<span class="formError inlineError">{$fields.error}</span>{/option:fields.error}
								</p>
							</div>
						{/option:fields.simple}

						{* Radio buttons and checkboxes *}
						{option:fields.multiple}
							<div class="inputList{option:fields.error} errorArea{/option:fields.error}">
								<ul>
									{iteration:fields.html}
										<li><label for="{$fields.html.id}">{$fields.html.field} {$fields.html.label}</label></li>
									{/iteration:fields.html}
								</ul>
								{option:fields.error}<span class="formError inlineError">{$fields.error}</span>{/option:fields.error}
							</div>
						{/option:fields.multiple}
					{/iteration:fields}
					<div class="grid-item grid-xs-1-1 grid-s-1-1 grid-m-1-1 grid-l-1-1">
						<input type="submit" value="{$submitValue}" name="submit" class="inputSubmit cta-button" />
					</div>
				</form>
			{/option:fields}


			
			<div class="clear"></div>
		</div>
	</div>

</section>

			
