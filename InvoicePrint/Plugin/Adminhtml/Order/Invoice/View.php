<?php

namespace DigitalBoutique\InvoicePrint\Plugin\Adminhtml\Order\Invoice;

use Magento\Backend\Model\UrlInterface;

class View
{
    /**
     * @var UrlInterface
     */
    private UrlInterface $backendUrl;

    /**
     * @param UrlInterface $backendUrl
     */
    public function __construct(
        UrlInterface $backendUrl
    ) {
        $this->backendUrl = $backendUrl;
    }

    /**
     * @param \Magento\Sales\Block\Adminhtml\Order\Invoice\View $view
     * @return void
     */
    public function beforeSetLayout(\Magento\Sales\Block\Adminhtml\Order\Invoice\View $view)
    {
        if ($view->getInvoice()->getId()) {
            $url = $this->backendUrl->getUrl('digitalboutique/invoice/print/invoice_id/' . $view->getInvoice()->getId());

            $view->addButton(
                'invoice_mark_printed',
                [
                    'label' => __('Print'),
                    'class' => 'print-invoice secondary',
                    'onclick' => 'setLocation(\'' . $url . '\')',
                ]
            );
        }
    }
}
