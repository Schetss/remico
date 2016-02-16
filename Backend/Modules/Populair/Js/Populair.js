/*
 * This file is part of Fork CMS.
 *
 * For the full copyright and license information, please view the license
 * file that was distributed with this source code.
 */

/**
 * Interaction for the Populair module
 *
 * @author Stijn Schets <stijn@schetss.be>
 */
jsBackend.populair =
{
    // constructor
    init: function()
    {
        // do meta
        if ($('#title').length > 0) $('#title').doMeta();

    }
}

$(jsBackend.populair.init);
