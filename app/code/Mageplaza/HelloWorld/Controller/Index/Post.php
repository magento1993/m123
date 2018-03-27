<?php
namespace Mageplaza\HelloWorld\Controller\Index;

/**
 * Blog Controller Router
 */
use Magento\Store\Model\ScopeInterface;

class Post extends \Magento\Framework\App\Action\Action
{
    
   /**
   * @var \Magento\Framework\App\Config\ScopeConfigInterface
   */
   protected $scopeConfig;
    /**
     * @var \Magento\Framework\Mail\Template\TransportBuilder
     */
    protected $_transportBuilder;
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder, 
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
        )
    {
        $this->_transportBuilder = $transportBuilder;
        $this->_storeManager = $storeManager;
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context);
    }

    public function execute()
    {
        $post = $this->getRequest()->getPostValue();
        $resultRedirect = $this->resultRedirectFactory->create();
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $model = $objectManager->create('Mageplaza\HelloWorld\Model\Post');
        $model->setData('name', $post['custname']);
        $model->setData('email', $post['custemail']);
        $model->setData('comments', $post['custcomment']);
        $model->setData('gender', $post['gender']);
        $model->setData('country', $post['country']);
        $model->save();

        /****
        ** For mail Functionality
        **/
        /*$store = $this->_storeManager->getStore()->getId();

        $email_n = $this->scopeConfig->getValue(
            'trans_email/ident_general/email', ScopeInterface::SCOPE_STORE
        );

        $test=array(
                    'bigin' => 'You Have new comments',
                    'name' => $post['custname'],
                    'comments'   => $post['custcomment']
                );
        
        $transport = $this->_transportBuilder->setTemplateIdentifier('newfromset_general_template')
            ->setTemplateOptions(['area' => 'frontend', 'store' => $store])
            ->setTemplateVars($test)
            ->setFrom('general')
            // you can config general email address in Store -> Configuration -> General -> Store Email Addresses
            ->addTo($post['custemail'], $post['custname'])
            ->addCc($email_n)
            ->getTransport();
        $transport->sendMessage();*/




        
        $this->messageManager->addSuccess(__('Your Comments Has Been Submitted Successfully.'));
        // $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        // return $resultRedirect;
    }
}
