<?php
/**
 * SageOne Library
 *
 * @category Library
 * @package  SageOne
 * @author   Vitaliy Likhachev <make.it.git@gmail.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne\Models;

use DarrynTen\SageOne\BaseModel;

/**
 * Company Model
 *
 * Details on writable properties for Company:
 * https://accounting.sageone.co.za/api/1.1.2/Help/ResourceModel?modelName=Company
 */
class Company extends BaseModel
{
    /**
     * @var string $endpoint
     */
    protected $endpoint = 'Company';

    /**
     * @var array $fields
     */
    protected $fields = [
        'id' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'name' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'required' => true,
            'min' => 0,
            'max' => 100,
        ],
        'currencySymbol' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 3,
        ],
        'currencyDecimalDigits' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 4,
        ],
        'numberDecimalDigits' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 4,
        ],
        'decimalSeparator' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 3,
        ],
        'hoursDecimalDigits' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 4,
        ],
        'itemCostPriceDecimalDigits' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 4,
        ],
        'itemSellingPriceDecimalDigits' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 4,
        ],
        'postalAddress1' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'postalAddress2' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'postalAddress3' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'postalAddress4' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'postalAddress5' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'groupSeparator' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 3,
        ],
        'roundingValue' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'taxSystem' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 2,
        ],
        'roundingType' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 3,
        ],
        'ageMonthly' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'displayInactiveItems' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'warnWhenItemCostIsZero' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'doNotAllowProcessingIntoNegativeQuantities' => [
            'type' => 'boolean',
            'nullable' => true,
            'readonly' => false,
        ],
        'warnWhenItemQuantityIsZero' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'warnWhenItemSellingBelowCost' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'countryId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'companyEntityTypeId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'takeOnBalanceDate' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => false,
        ],
        'enableCustomerZone' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'enableAutomaticBankFeedRefresh' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'contactName' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 50,
        ],
        'telephone' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 30,
        ],
        'fax' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 30,
        ],
        'mobile' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 30,
        ],
        'email' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
            'validate' => FILTER_VALIDATE_EMAIL,
        ],
        'isPrimarySendingEmail' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'postalAddress01' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'postalAddress02' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'postalAddress03' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'postalAddress04' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'postalAddress05' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'companyInfo01' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'companyInfo02' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'companyInfo03' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'companyInfo04' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'companyInfo05' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'isOwner' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'useCCEmail' => [
            'type' => 'boolean',
            'nullable' => true,
            'readonly' => false,
        ],
        'cCEmail' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'validate' => FILTER_VALIDATE_EMAIL,
        ],
        'dateFormatId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => true,
        ],
        'checkForDuplicateCustomerReferences' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'checkForDuplicateSupplierReferences' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'displayName' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'displayInactiveCustomers' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'displayInactiveSuppliers' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'displayInactiveTimeProjects' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'useInclusiveProcessingByDefault' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'lockProcessing' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'lockProcessingDate' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => false,
        ],
        'lockTimesheetProcessing' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'lockTimesheetProcessingDate' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => false,
        ],
        'taxPeriodFrequency' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'previousTaxPeriodEndDate' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => false,
        ],
        'previousTaxReturnDate' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => false,
        ],
        'useNoreplyEmail' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'ageingBasedOnDueDate' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'useLogoOnEmails' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'useLogoOnCustomerZone' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'city' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'state' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'country' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
        ],
        'homeCurrencyId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'currencyId' => [
            'type' => 'integer',
            'nullable' => true,
            'readonly' => false,
        ],
        'created' => [
            'type' => 'DateTime',
            'nullable' => false,
            'readonly' => true,
        ],
        'modified' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => true,
        ],
        'active' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'taxNumber' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 30,
        ],
        'registeredName' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 100,
        ],
        'registrationNumber' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 50,
        ],
        'isPracticeAccount' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => false,
        ],
        'logoPositionID' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
        ],
        'attachment' => [
            'type' => 'CompanyLogo',
            'nullable' => false,
            'readonly' => false,
        ],
        'companyTaxNumber' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 30,
        ],
        'taxOffice' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 50,
        ],
        'customerZoneGuid' => [
            'type' => 'string',
            'nullable' => false,
            'readonly' => true,
        ],
        'clientTypeId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => true,
        ],
        'displayTotalTypeId' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => true,
        ],
        'displayInCompanyConsole' => [
            'type' => 'boolean',
            'nullable' => false,
            'readonly' => true,
        ],
        'lastLoginDate' => [
            'type' => 'DateTime',
            'nullable' => true,
            'readonly' => true,
        ],
        'status' => [
            'type' => 'integer',
            'nullable' => false,
            'readonly' => false,
            'min' => 0,
            'max' => 2,
        ],
    ];

    /**
     * @var array $features
     */
    protected $features = [
        'all' => true,
        'get' => true,
        'save' => false,
        'delete' => false,
    ];

    /**
     * Retrieves the current Company.
     *
     * @return Company
     */
    public function current()
    {
        $result = $this->request->request('GET', $this->endpoint, 'Current');
        $model = new Company($this->config);
        $model->loadResult($result);
        return $model;
    }
}
