<?php

namespace Frontend\Modules\Mailchimp\Actions;

use Frontend\Core\Engine\Base\Block;
use Frontend\Core\Engine\Model;
use Frontend\Core\Engine\Navigation;
use Frontend\Modules\Mailchimp\Engine\Model as FrontendMailchimpModel;

/**
 * This is the index-action (default), it will display the overview of Mailchimp posts
 *
 * @author Stijn Schets <stijn@schetss.be>
 */
class Detail extends Block
{
    /**
     * The record
     *
     * @var    array
     */
    private $record;

    /**
     * Execute the action
     */
    public function execute()
    {
        parent::execute();
        $this->loadTemplate();
        $this->getData();
        $this->parse();
    }

    /**
     * Get the data
     */
    private function getData()
    {
        $lastParameter = $this->getLastParameter();
        if (empty($lastParameter)) {
            $this->redirect(Navigation::getURL(404));
        }
        $this->record = FrontendMailchimpModel::get($lastParameter);

        if (empty($this->record)) {
            $this->redirect(Navigation::getURL(404));
        }
    }

    /**
     * Parse the page
     */
    protected function parse()
    {
        /**
         * @TODO add specified image
         * $this->header->addOpenGraphImage(FRONTEND_FILES_URL . '/mailchimp/images/source/' . $this->record['image']);
         */

        // build Facebook  OpenGraph data
        $this->header->addOpenGraphData('title', $this->record['meta_title'], true);
        $this->header->addOpenGraphData('type', 'article', true);
        $this->header->addOpenGraphData(
            'url',
            SITE_URL . Navigation::getURLForBlock('Mailchimp', 'Detail') . '/' . $this->record['url'],
            true
        );
        $this->header->addOpenGraphData(
            'site_name',
            $this->get('fork.settings')->get('Core', 'site_title_' . FRONTEND_LANGUAGE, SITE_DEFAULT_TITLE),
            true
        );
        $this->header->addOpenGraphData('description', $this->record['meta_title'], true);

        // add into breadcrumb
        $this->breadcrumb->addElement($this->record['meta_title']);

        // hide action title
        $this->tpl->assign('hideContentTitle', true);

        // show title linked with the meta title
        $this->tpl->assign('title', $this->record['titel']);

        // set meta
        $this->header->setPageTitle($this->record['meta_title'], ($this->record['meta_description_overwrite'] == 'Y'));
        $this->header->addMetaDescription($this->record['meta_description'], ($this->record['meta_description_overwrite'] == 'Y'));
        $this->header->addMetaKeywords($this->record['meta_keywords'], ($this->record['meta_keywords_overwrite'] == 'Y'));

        // advanced SEO-attributes
        if (isset($this->record['meta_data']['seo_index'])) {
            $this->header->addMetaData(
                array('name' => 'robots', 'content' => $this->record['meta_data']['seo_index'])
            );
        }
        if (isset($this->record['meta_data']['seo_follow'])) {
            $this->header->addMetaData(
                array('name' => 'robots', 'content' => $this->record['meta_data']['seo_follow'])
            );
        }

        // assign item
        $this->tpl->assign('item', $this->record);
    }

    /**
     * @return mixed
     */
    private function getLastParameter()
    {
        $numberOfParameters = count($this->URL->getParameters(false));
        return $this->URL->getParameter($numberOfParameters - 1);
    }

}
