/*
 * This file is part of Fork CMS.
 *
 * For the full copyright and license information, please view the license
 * file that was distributed with this source code.
 */

/**
 * Interaction for the Geschiedenis module
 *
 * @author Stijn Schets <stijn@schetss.be>
 */
jsBackend.geschiedenis =
{
    // constructor
    init: function()
    {
        // do meta
        if ($('#titel').length > 0) $('#titel').doMeta();

    }
}

$(jsBackend.geschiedenis.init);
