<?php
namespace PluginCompany\ContactFormsIntegration\Observer;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class FormSubmissionHandler implements ObserverInterface
{

    public function execute(Observer $observer)
    {
        $entry = $observer->getEvent()->getEntry();
        $fields = $entry->getFields();

        $entry->unsetData('fields');
        $entry->unsetData('_parent_form');

        $submissionData = array_merge($entry->getData(), json_decode($fields, true));

        //now use $submissionData (save to CSV, call external API etc)

    }
}
