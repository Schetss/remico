/*
 * This file is part of Fork CMS.
 *
 * For the full copyright and license information, please view the license
 * file that was distributed with this source code.
 */

/**
 * Interaction for the Makelaars module
 *
 * @author Stijn Schets <s>
 */
jsBackend.makelaars =
{
    // constructor
    init: function()
    {
        // do meta
        if ($('#naam').length > 0) $('#naam').doMeta();

    }
}

$(jsBackend.makelaars.init);
