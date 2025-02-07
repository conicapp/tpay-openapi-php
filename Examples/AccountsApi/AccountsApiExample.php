<?php
namespace tpaySDK\Examples\AccountsApi;

use tpaySDK\Api\TpayApi;
use tpaySDK\Examples\ExamplesConfig;

require_once '../ExamplesConfig.php';
require_once '../../Loader.php';

class AccountsApiExample extends ExamplesConfig
{
    private $TpayApi;

    public function __construct()
    {
        parent::__construct();
        $this->TpayApi = new TpayApi(static::PARTNER_CLIENT_ID, static::PARTNER_CLIENT_SECRET, true, 'read');
    }

    public function runAllExamples()
    {
        $this
            ->createAccount()
            ->getAccounts()
            ->getCategories()
            ->getCategoryById(60)
            ->getDocuments()
            ->getDocumentById(1)
            ->getLegalForms()
            ->getLegalFormById(16);
    }

    public function getAccounts()
    {
        $accounts = $this->TpayApi->Accounts->getAccounts();
        var_dump($accounts);

        return $this;
    }

    public function getAccountById($accountId)
    {
        $account = $this->TpayApi->Accounts->getAccountById($accountId);
        var_dump($account);

        return $this;
    }

    public function getCategories()
    {
        $categories = $this->TpayApi->Accounts->getCategories();
        var_dump($categories);

        return $this;
    }

    public function getCategoryById($categoryId)
    {
        $category = $this->TpayApi->Accounts->getCategoryById($categoryId);
        var_dump($category);

        return $this;
    }

    public function getDocuments()
    {
        $documents = $this->TpayApi->Accounts->getDocuments();
        var_dump($documents);

        return $this;
    }

    public function getDocumentById($documentId)
    {
        $document = $this->TpayApi->Accounts->getDocumentById($documentId);
        var_dump($document);

        return $this;
    }

    public function getLegalForms()
    {
        $legalForms = $this->TpayApi->Accounts->getLegalForms();
        var_dump($legalForms);

        return $this;
    }

    public function getLegalFormById($legalFormId)
    {
        $legalForm = $this->TpayApi->Accounts->getLegalFormById($legalFormId);
        var_dump($legalForm);

        return $this;
    }

    public function createAccount()
    {
        $accountConfig = $this->getNewAccountConfig();
        $newAccount = $this->TpayApi->Accounts->createAccount($accountConfig);
        var_dump($newAccount);

        return $this;
    }

    private function getNewAccountConfig()
    {
        $offerCode = 'PTON8';
        $personContact = [
            'type' => 2,
            'contact' => '(0)111222333',
        ];
        $pos = [
            'name' => 'Przykladowe Zakupy Online',
            'description' => 'Zakupy online - rtv i agd',
            'url' => 'https://przykladowezakupy.pl',
        ];
        $address1 = [
            'friendlyName' => 'Adres Korespondencyjny',
            'name' => 'Example Sp. z o.o.',
            'street' => 'Ul. Jelenia',
            'houseNumber' => '123',
            'postalCode' => '54-134',
            'city' => 'Warszawa',
            'country' => 'PL',
        ];
        $person = [
            'name' => 'Jan',
            'surname' => 'Kowalski',
            'isRepresentative' => true,
            'isContactPerson' => true,
            'contact' => [
                $personContact,
            ],
        ];

        return [
            'offerCode' => $offerCode,
            'email' => 'merchant@example.com',
            'taxId' => '7773061579',
            'legalForm' => 3,
            'categoryId' => 62,
            'website' => [$pos],
            'address' => [$address1],
            'person' => [$person],
            'notifyByEmail' => true,
            'merchantApiConsent' => true,
        ];
    }

}

(new AccountsApiExample)->runAllExamples();
