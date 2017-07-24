<?php

namespace DarrynTen\SageOne\Tests\SageOne\Models;

use DarrynTen\SageOne\Models\Company;
use DarrynTen\SageOne\Models\CompanyLogo;
use DarrynTen\SageOne\Models\ModelCollection;

class CompanyModelTest extends BaseModelTest
{
    public function testCanNotNullify()
    {
        $this->verifyCanNotNullify(Company::class, 'name');
    }

    public function testSetReadOnly()
    {
        $this->verifySetReadOnly(Company::class, 'dateFormatId');
    }

    public function testNameLength()
    {
        $this->verifyBadStringLengthException(
            Company::class,
            'name',
            0,
            100,
            str_repeat('x', 101)
        );
    }

    public function testAttributes()
    {
        $this->verifyAttributes(Company::class, [
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
        ]);
    }

    public function testFeatures()
    {
        $this->verifyFeatures(Company::class, [
            'all' => true, 'get' => true, 'delete' => false, 'save' => false
        ]);
    }

    public function testGetAll()
    {
        $model = $this->setUpRequestMock(
            'GET',
            Company::class,
            'Company/Get',
            'Company/GET_Company_Get_includeStatus_xx.json'
        );

        $response = $model->all();

        $model1 = $response->results[0];
        $model2 = $response->results[1];

        $this->assertEquals($model1->id, 1);
        $this->assertEquals($model1->name, 'sample string 2');
        $this->assertEquals($model1->currencySymbol, 'abc');
        $this->assertEquals($model1->currencyDecimalDigits, 4);
        $this->assertEquals($model1->numberDecimalDigits, 4);
        $this->assertEquals($model1->decimalSeparator, ',');
        $this->assertEquals($model1->hoursDecimalDigits, 4);
        $this->assertEquals($model1->itemCostPriceDecimalDigits, 4);
        $this->assertEquals($model1->itemSellingPriceDecimalDigits, 4);
        $this->assertEquals($model1->postalAddress1, 'sample string 10');
        $this->assertEquals($model1->postalAddress2, 'sample string 11');
        $this->assertEquals($model1->postalAddress3, 'sample string 12');
        $this->assertEquals($model1->postalAddress4, 'sample string 13');
        $this->assertEquals($model1->postalAddress5, 'sample string 14');
        $this->assertEquals($model1->groupSeparator, '.');
        $this->assertEquals($model1->roundingValue, 16);
        $this->assertEquals($model1->taxSystem, 0);
        $this->assertEquals($model1->roundingType, 0);
        $this->assertEquals($model1->ageMonthly, true);
        $this->assertEquals($model1->displayInactiveItems, true);
        $this->assertEquals($model1->warnWhenItemCostIsZero, true);
        $this->assertEquals($model1->doNotAllowProcessingIntoNegativeQuantities, true);
        $this->assertEquals($model1->warnWhenItemQuantityIsZero, true);
        $this->assertEquals($model1->warnWhenItemSellingBelowCost, true);
        $this->assertEquals($model1->countryId, 22);
        $this->assertEquals($model1->companyEntityTypeId, 1);
        $this->assertEquals($model1->takeOnBalanceDate->format('Y-m-d'), '2017-07-03');
        $this->assertEquals($model1->enableCustomerZone, true);
        $this->assertEquals($model1->enableAutomaticBankFeedRefresh, true);
        $this->assertEquals($model1->contactName, 'sample string 25');
        $this->assertEquals($model1->telephone, 'sample string 26');
        $this->assertEquals($model1->fax, 'sample string 27');
        $this->assertEquals($model1->mobile, 'sample string 28');
        $this->assertEquals($model1->email, 'user@example.com');
        $this->assertEquals($model1->isPrimarySendingEmail, true);
        $this->assertEquals($model1->postalAddress01, 'sample string 31');
        $this->assertEquals($model1->postalAddress02, 'sample string 32');
        $this->assertEquals($model1->postalAddress03, 'sample string 33');
        $this->assertEquals($model1->postalAddress04, 'sample string 34');
        $this->assertEquals($model1->postalAddress05, 'sample string 35');
        $this->assertEquals($model1->companyInfo01, 'sample string 36');
        $this->assertEquals($model1->companyInfo02, 'sample string 37');
        $this->assertEquals($model1->companyInfo03, 'sample string 38');
        $this->assertEquals($model1->companyInfo04, 'sample string 39');
        $this->assertEquals($model1->companyInfo05, 'sample string 40');
        $this->assertEquals($model1->isOwner, true);
        $this->assertEquals($model1->useCCEmail, true);
        $this->assertEquals($model1->cCEmail, 'another@example.com');
        $this->assertEquals($model1->dateFormatId, 44);
        $this->assertEquals($model1->checkForDuplicateCustomerReferences, true);
        $this->assertEquals($model1->checkForDuplicateSupplierReferences, true);
        $this->assertEquals($model1->displayName, 'sample string 47');
        $this->assertEquals($model1->displayInactiveCustomers, true);
        $this->assertEquals($model1->displayInactiveSuppliers, true);
        $this->assertEquals($model1->displayInactiveTimeProjects, true);
        $this->assertEquals($model1->useInclusiveProcessingByDefault, true);
        $this->assertEquals($model1->lockProcessing, true);
        $this->assertEquals($model1->lockProcessingDate->format('Y-m-d'), '2017-07-03');
        $this->assertEquals($model1->lockTimesheetProcessing, true);
        $this->assertEquals($model1->lockTimesheetProcessingDate->format('Y-m-d'), '2017-07-03');
        $this->assertEquals($model1->taxPeriodFrequency, 1);
        $this->assertEquals($model1->previousTaxPeriodEndDate->format('Y-m-d'), '2017-07-03');
        $this->assertEquals($model1->previousTaxReturnDate->format('Y-m-d'), '2017-07-03');
        $this->assertEquals($model1->useNoreplyEmail, true);
        $this->assertEquals($model1->ageingBasedOnDueDate, true);
        $this->assertEquals($model1->useLogoOnEmails, true);
        $this->assertEquals($model1->useLogoOnCustomerZone, true);
        $this->assertEquals($model1->city, 'sample string 58');
        $this->assertEquals($model1->state, 'sample string 59');
        $this->assertEquals($model1->country, 'sample string 60');
        $this->assertEquals($model1->homeCurrencyId, 1);
        $this->assertEquals($model1->currencyId, 1);
        $this->assertEquals($model1->created->format('Y-m-d'), '2017-07-03');
        $this->assertEquals($model1->modified->format('Y-m-d'), '2017-07-03');
        $this->assertEquals($model1->active, true);
        $this->assertEquals($model1->taxNumber, 'sample string 63');
        $this->assertEquals($model1->registeredName, 'sample string 64');
        $this->assertEquals($model1->registrationNumber, 'sample string 65');
        $this->assertEquals($model1->isPracticeAccount, true);
        $this->assertEquals($model1->logoPositionID, 67);
        $this->assertInstanceOf(CompanyLogo::class, $model1->attachment);
        $this->assertEquals($model1->attachment->id, 1);
        $this->assertEquals($model1->attachment->image, 'QEA=');
        $this->assertEquals($model1->attachment->timestamp, 'QEA=');
        $this->assertEquals($model1->companyTaxNumber, 'sample string 68');
        $this->assertEquals($model1->taxOffice, 'sample string 69');
        $this->assertEquals($model1->customerZoneGuid, 'b2d02685-1e94-4b8e-bb7e-359c3bf1d643');
        $this->assertEquals($model1->clientTypeId, 71);
        $this->assertEquals($model1->displayTotalTypeId, 72);
        $this->assertEquals($model1->displayInCompanyConsole, true);
        $this->assertEquals($model1->lastLoginDate->format('Y-m-d'), '2017-07-03');
        $this->assertEquals($model1->status, 0);

        $this->assertEquals($model2->id, 1);
        $this->assertEquals($model2->name, 'sample string 2');
        $this->assertEquals($model2->currencySymbol, 'abc');
        $this->assertEquals($model2->currencyDecimalDigits, 4);
        $this->assertEquals($model2->numberDecimalDigits, 4);
        $this->assertEquals($model2->decimalSeparator, ',');
        $this->assertEquals($model2->hoursDecimalDigits, 3);
        $this->assertEquals($model2->itemCostPriceDecimalDigits, 3);
        $this->assertEquals($model2->itemSellingPriceDecimalDigits, 3);
        $this->assertEquals($model2->postalAddress1, 'sample string 10');
        $this->assertEquals($model2->postalAddress2, 'sample string 11');
        $this->assertEquals($model2->postalAddress3, 'sample string 12');
        $this->assertEquals($model2->postalAddress4, 'sample string 13');
        $this->assertEquals($model2->postalAddress5, 'sample string 14');
        $this->assertEquals($model2->groupSeparator, '.');
        $this->assertEquals($model2->roundingValue, 16);
        $this->assertEquals($model2->taxSystem, 0);
        $this->assertEquals($model2->roundingType, 0);
        $this->assertEquals($model2->ageMonthly, true);
        $this->assertEquals($model2->displayInactiveItems, true);
        $this->assertEquals($model2->warnWhenItemCostIsZero, true);
        $this->assertEquals($model2->doNotAllowProcessingIntoNegativeQuantities, true);
        $this->assertEquals($model2->warnWhenItemQuantityIsZero, true);
        $this->assertEquals($model2->warnWhenItemSellingBelowCost, true);
        $this->assertEquals($model2->countryId, 22);
        $this->assertEquals($model2->companyEntityTypeId, 1);
        $this->assertEquals($model2->takeOnBalanceDate->format('Y-m-d'), '2017-07-03');
        $this->assertEquals($model2->enableCustomerZone, true);
        $this->assertEquals($model2->enableAutomaticBankFeedRefresh, true);
        $this->assertEquals($model2->contactName, 'sample string 25');
        $this->assertEquals($model2->telephone, 'sample string 26');
        $this->assertEquals($model2->fax, 'sample string 27');
        $this->assertEquals($model2->mobile, 'sample string 28');
        $this->assertEquals($model2->email, 'user@example.com');
        $this->assertEquals($model2->isPrimarySendingEmail, true);
        $this->assertEquals($model2->postalAddress01, 'sample string 31');
        $this->assertEquals($model2->postalAddress02, 'sample string 32');
        $this->assertEquals($model2->postalAddress03, 'sample string 33');
        $this->assertEquals($model2->postalAddress04, 'sample string 34');
        $this->assertEquals($model2->postalAddress05, 'sample string 35');
        $this->assertEquals($model2->companyInfo01, 'sample string 36');
        $this->assertEquals($model2->companyInfo02, 'sample string 37');
        $this->assertEquals($model2->companyInfo03, 'sample string 38');
        $this->assertEquals($model2->companyInfo04, 'sample string 39');
        $this->assertEquals($model2->companyInfo05, 'sample string 40');
        $this->assertEquals($model2->isOwner, true);
        $this->assertEquals($model2->useCCEmail, true);
        $this->assertEquals($model2->cCEmail, 'another@example.com');
        $this->assertEquals($model2->dateFormatId, 44);
        $this->assertEquals($model2->checkForDuplicateCustomerReferences, true);
        $this->assertEquals($model2->checkForDuplicateSupplierReferences, true);
        $this->assertEquals($model2->displayName, 'sample string 47');
        $this->assertEquals($model2->displayInactiveCustomers, true);
        $this->assertEquals($model2->displayInactiveSuppliers, true);
        $this->assertEquals($model2->displayInactiveTimeProjects, true);
        $this->assertEquals($model2->useInclusiveProcessingByDefault, true);
        $this->assertEquals($model2->lockProcessing, true);
        $this->assertEquals($model2->lockProcessingDate->format('Y-m-d'), '2017-07-03');
        $this->assertEquals($model2->lockTimesheetProcessing, true);
        $this->assertEquals($model2->lockTimesheetProcessingDate->format('Y-m-d'), '2017-07-03');
        $this->assertEquals($model2->taxPeriodFrequency, 1);
        $this->assertEquals($model2->previousTaxPeriodEndDate->format('Y-m-d'), '2017-07-03');
        $this->assertEquals($model2->previousTaxReturnDate->format('Y-m-d'), '2017-07-03');
        $this->assertEquals($model2->useNoreplyEmail, true);
        $this->assertEquals($model2->ageingBasedOnDueDate, true);
        $this->assertEquals($model2->useLogoOnEmails, true);
        $this->assertEquals($model2->useLogoOnCustomerZone, true);
        $this->assertEquals($model2->city, 'sample string 58');
        $this->assertEquals($model2->state, 'sample string 59');
        $this->assertEquals($model2->country, 'sample string 60');
        $this->assertEquals($model2->homeCurrencyId, 1);
        $this->assertEquals($model2->currencyId, 1);
        $this->assertEquals($model2->created->format('Y-m-d'), '2017-07-03');
        $this->assertEquals($model2->modified->format('Y-m-d'), '2017-07-03');
        $this->assertEquals($model2->active, true);
        $this->assertEquals($model2->taxNumber, 'sample string 63');
        $this->assertEquals($model2->registeredName, 'sample string 64');
        $this->assertEquals($model2->registrationNumber, 'sample string 65');
        $this->assertEquals($model2->isPracticeAccount, true);
        $this->assertEquals($model2->logoPositionID, 67);
        $this->assertInstanceOf(CompanyLogo::class, $model2->attachment);
        $this->assertEquals($model2->attachment->id, 1);
        $this->assertEquals($model2->attachment->image, 'QEA=');
        $this->assertEquals($model2->attachment->timestamp, 'QEA=');
        $this->assertEquals($model2->companyTaxNumber, 'sample string 68');
        $this->assertEquals($model2->taxOffice, 'sample string 69');
        $this->assertEquals($model2->customerZoneGuid, 'b2d02685-1e94-4b8e-bb7e-359c3bf1d643');
        $this->assertEquals($model2->clientTypeId, 71);
        $this->assertEquals($model2->displayTotalTypeId, 72);
        $this->assertEquals($model2->displayInCompanyConsole, true);
        $this->assertEquals($model2->lastLoginDate->format('Y-m-d'), '2017-07-03');
        $this->assertEquals($model2->status, 0);
    }
    
    public function testGetId()
    {
        $this->verifyGetId(Company::class, 1, function ($model) {
            $this->assertEquals($model->id, 1);
            $this->assertEquals($model->name, 'sample string 2');
            $this->assertEquals($model->currencySymbol, 'abc');
            $this->assertEquals($model->currencyDecimalDigits, 4);
            $this->assertEquals($model->numberDecimalDigits, 4);
            $this->assertEquals($model->decimalSeparator, '.');
            $this->assertEquals($model->hoursDecimalDigits, 3);
            $this->assertEquals($model->itemCostPriceDecimalDigits, 3);
            $this->assertEquals($model->itemSellingPriceDecimalDigits, 3);
            $this->assertEquals($model->postalAddress1, 'sample string 10');
            $this->assertEquals($model->postalAddress2, 'sample string 11');
            $this->assertEquals($model->postalAddress3, 'sample string 12');
            $this->assertEquals($model->postalAddress4, 'sample string 13');
            $this->assertEquals($model->postalAddress5, 'sample string 14');
            $this->assertEquals($model->groupSeparator, ',');
            $this->assertEquals($model->roundingValue, 16);
            $this->assertEquals($model->taxSystem, 0);
            $this->assertEquals($model->roundingType, 0);
            $this->assertEquals($model->ageMonthly, true);
            $this->assertEquals($model->displayInactiveItems, true);
            $this->assertEquals($model->warnWhenItemCostIsZero, true);
            $this->assertEquals($model->doNotAllowProcessingIntoNegativeQuantities, true);
            $this->assertEquals($model->warnWhenItemQuantityIsZero, true);
            $this->assertEquals($model->warnWhenItemSellingBelowCost, true);
            $this->assertEquals($model->countryId, 22);
            $this->assertEquals($model->companyEntityTypeId, 1);
            $this->assertEquals($model->takeOnBalanceDate->format('Y-m-d'), '2017-07-03');
            $this->assertEquals($model->enableCustomerZone, true);
            $this->assertEquals($model->enableAutomaticBankFeedRefresh, true);
            $this->assertEquals($model->contactName, 'sample string 25');
            $this->assertEquals($model->telephone, 'sample string 26');
            $this->assertEquals($model->fax, 'sample string 27');
            $this->assertEquals($model->mobile, 'sample string 28');
            $this->assertEquals($model->email, 'user@example.com');
            $this->assertEquals($model->isPrimarySendingEmail, true);
            $this->assertEquals($model->postalAddress01, 'sample string 31');
            $this->assertEquals($model->postalAddress02, 'sample string 32');
            $this->assertEquals($model->postalAddress03, 'sample string 33');
            $this->assertEquals($model->postalAddress04, 'sample string 34');
            $this->assertEquals($model->postalAddress05, 'sample string 35');
            $this->assertEquals($model->companyInfo01, 'sample string 36');
            $this->assertEquals($model->companyInfo02, 'sample string 37');
            $this->assertEquals($model->companyInfo03, 'sample string 38');
            $this->assertEquals($model->companyInfo04, 'sample string 39');
            $this->assertEquals($model->companyInfo05, 'sample string 40');
            $this->assertEquals($model->isOwner, true);
            $this->assertEquals($model->useCCEmail, true);
            $this->assertEquals($model->cCEmail, 'another@example.com');
            $this->assertEquals($model->dateFormatId, 44);
            $this->assertEquals($model->checkForDuplicateCustomerReferences, true);
            $this->assertEquals($model->checkForDuplicateSupplierReferences, true);
            $this->assertEquals($model->displayName, 'sample string 47');
            $this->assertEquals($model->displayInactiveCustomers, true);
            $this->assertEquals($model->displayInactiveSuppliers, true);
            $this->assertEquals($model->displayInactiveTimeProjects, true);
            $this->assertEquals($model->useInclusiveProcessingByDefault, true);
            $this->assertEquals($model->lockProcessing, true);
            $this->assertEquals($model->lockProcessingDate->format('Y-m-d'), '2017-07-03');
            $this->assertEquals($model->lockTimesheetProcessing, true);
            $this->assertEquals($model->lockTimesheetProcessingDate->format('Y-m-d'), '2017-07-03');
            $this->assertEquals($model->taxPeriodFrequency, 1);
            $this->assertEquals($model->previousTaxPeriodEndDate->format('Y-m-d'), '2017-07-03');
            $this->assertEquals($model->previousTaxReturnDate->format('Y-m-d'), '2017-07-03');
            $this->assertEquals($model->useNoreplyEmail, true);
            $this->assertEquals($model->ageingBasedOnDueDate, true);
            $this->assertEquals($model->useLogoOnEmails, true);
            $this->assertEquals($model->useLogoOnCustomerZone, true);
            $this->assertEquals($model->city, 'sample string 58');
            $this->assertEquals($model->state, 'sample string 59');
            $this->assertEquals($model->country, 'sample string 60');
            $this->assertEquals($model->homeCurrencyId, 1);
            $this->assertEquals($model->currencyId, 1);
            $this->assertEquals($model->created->format('Y-m-d'), '2017-07-03');
            $this->assertEquals($model->modified->format('Y-m-d'), '2017-07-03');
            $this->assertEquals($model->active, true);
            $this->assertEquals($model->taxNumber, 'sample string 63');
            $this->assertEquals($model->registeredName, 'sample string 64');
            $this->assertEquals($model->registrationNumber, 'sample string 65');
            $this->assertEquals($model->isPracticeAccount, true);
            $this->assertEquals($model->logoPositionID, 67);
            $this->assertInstanceOf(CompanyLogo::class, $model->attachment);
            $this->assertEquals($model->attachment->id, 1);
            $this->assertEquals($model->attachment->image, 'QEA=');
            $this->assertEquals($model->attachment->timestamp, 'QEA=');
            $this->assertEquals($model->companyTaxNumber, 'sample string 68');
            $this->assertEquals($model->taxOffice, 'sample string 69');
            $this->assertEquals($model->customerZoneGuid, 'e2605371-fa91-4269-9ecb-b0b57bdef52e');
            $this->assertEquals($model->clientTypeId, 71);
            $this->assertEquals($model->displayTotalTypeId, 72);
            $this->assertEquals($model->displayInCompanyConsole, true);
            $this->assertEquals($model->lastLoginDate->format('Y-m-d'), '2017-07-03');
            $this->assertEquals($model->status, 0);
        });
    }

    public function testCurrent()
    {
        $model = $this->setUpRequestMock(
            'GET',
            Company::class,
            'Company/Current',
            'Company/GET_Company_Current.json'
        );

        $response = $model->current();
        $this->assertInstanceOf(Company::class, $response);
        $this->assertEquals($response->id, 1);
        $this->assertEquals($response->name, 'sample string 2');
        $this->assertEquals($response->currencySymbol, 'abc');
        $this->assertEquals($response->currencyDecimalDigits, 4);
        $this->assertEquals($response->numberDecimalDigits, 4);
        $this->assertEquals($response->decimalSeparator, '.');
        $this->assertEquals($response->hoursDecimalDigits, 3);
        $this->assertEquals($response->itemCostPriceDecimalDigits, 3);
        $this->assertEquals($response->itemSellingPriceDecimalDigits, 3);
        $this->assertEquals($response->postalAddress1, 'sample string 10');
        $this->assertEquals($response->postalAddress2, 'sample string 11');
        $this->assertEquals($response->postalAddress3, 'sample string 12');
        $this->assertEquals($response->postalAddress4, 'sample string 13');
        $this->assertEquals($response->postalAddress5, 'sample string 14');
        $this->assertEquals($response->groupSeparator, '.');
        $this->assertEquals($response->roundingValue, 16);
        $this->assertEquals($response->taxSystem, 0);
        $this->assertEquals($response->roundingType, 0);
        $this->assertEquals($response->ageMonthly, true);
        $this->assertEquals($response->displayInactiveItems, true);
        $this->assertEquals($response->warnWhenItemCostIsZero, true);
        $this->assertEquals($response->doNotAllowProcessingIntoNegativeQuantities, true);
        $this->assertEquals($response->warnWhenItemQuantityIsZero, true);
        $this->assertEquals($response->warnWhenItemSellingBelowCost, true);
        $this->assertEquals($response->countryId, 22);
        $this->assertEquals($response->companyEntityTypeId, 1);
        $this->assertEquals($response->takeOnBalanceDate->format('Y-m-d'), '2017-07-03');
        $this->assertEquals($response->enableCustomerZone, true);
        $this->assertEquals($response->enableAutomaticBankFeedRefresh, true);
        $this->assertEquals($response->contactName, 'sample string 25');
        $this->assertEquals($response->telephone, 'sample string 26');
        $this->assertEquals($response->fax, 'sample string 27');
        $this->assertEquals($response->mobile, 'sample string 28');
        $this->assertEquals($response->email, 'user@example.com');
        $this->assertEquals($response->isPrimarySendingEmail, true);
        $this->assertEquals($response->postalAddress01, 'sample string 31');
        $this->assertEquals($response->postalAddress02, 'sample string 32');
        $this->assertEquals($response->postalAddress03, 'sample string 33');
        $this->assertEquals($response->postalAddress04, 'sample string 34');
        $this->assertEquals($response->postalAddress05, 'sample string 35');
        $this->assertEquals($response->companyInfo01, 'sample string 36');
        $this->assertEquals($response->companyInfo02, 'sample string 37');
        $this->assertEquals($response->companyInfo03, 'sample string 38');
        $this->assertEquals($response->companyInfo04, 'sample string 39');
        $this->assertEquals($response->companyInfo05, 'sample string 40');
        $this->assertEquals($response->isOwner, true);
        $this->assertEquals($response->useCCEmail, true);
        $this->assertEquals($response->cCEmail, 'another@example.com');
        $this->assertEquals($response->dateFormatId, 44);
        $this->assertEquals($response->checkForDuplicateCustomerReferences, true);
        $this->assertEquals($response->checkForDuplicateSupplierReferences, true);
        $this->assertEquals($response->displayName, 'sample string 47');
        $this->assertEquals($response->displayInactiveCustomers, true);
        $this->assertEquals($response->displayInactiveSuppliers, true);
        $this->assertEquals($response->displayInactiveTimeProjects, true);
        $this->assertEquals($response->useInclusiveProcessingByDefault, true);
        $this->assertEquals($response->lockProcessing, true);
        $this->assertEquals($response->lockProcessingDate->format('Y-m-d'), '2017-07-03');
        $this->assertEquals($response->lockTimesheetProcessing, true);
        $this->assertEquals($response->lockTimesheetProcessingDate->format('Y-m-d'), '2017-07-03');
        $this->assertEquals($response->taxPeriodFrequency, 1);
        $this->assertEquals($response->previousTaxPeriodEndDate->format('Y-m-d'), '2017-07-03');
        $this->assertEquals($response->previousTaxReturnDate->format('Y-m-d'), '2017-07-03');
        $this->assertEquals($response->useNoreplyEmail, true);
        $this->assertEquals($response->ageingBasedOnDueDate, true);
        $this->assertEquals($response->useLogoOnEmails, true);
        $this->assertEquals($response->useLogoOnCustomerZone, true);
        $this->assertEquals($response->city, 'sample string 58');
        $this->assertEquals($response->state, 'sample string 59');
        $this->assertEquals($response->country, 'sample string 60');
        $this->assertEquals($response->homeCurrencyId, 1);
        $this->assertEquals($response->currencyId, 1);
        $this->assertEquals($response->created->format('Y-m-d'), '2017-07-03');
        $this->assertEquals($response->modified->format('Y-m-d'), '2017-07-03');
        $this->assertEquals($response->active, true);
        $this->assertEquals($response->taxNumber, 'sample string 63');
        $this->assertEquals($response->registeredName, 'sample string 64');
        $this->assertEquals($response->registrationNumber, 'sample string 65');
        $this->assertEquals($response->isPracticeAccount, true);
        $this->assertEquals($response->logoPositionID, 67);
        $this->assertInstanceOf(CompanyLogo::class, $response->attachment);
        $this->assertEquals($response->attachment->id, 1);
        $this->assertEquals($response->attachment->image, 'QEA=');
        $this->assertEquals($response->attachment->timestamp, 'QEA=');
        $this->assertEquals($response->companyTaxNumber, 'sample string 68');
        $this->assertEquals($response->taxOffice, 'sample string 69');
        $this->assertEquals($response->customerZoneGuid, '481bf6e2-e6a6-4719-b3e7-89d7f8ae8d37');
        $this->assertEquals($response->clientTypeId, 71);
        $this->assertEquals($response->displayTotalTypeId, 72);
        $this->assertEquals($response->displayInCompanyConsole, true);
        $this->assertEquals($response->lastLoginDate->format('Y-m-d'), '2017-07-03');
        $this->assertEquals($response->status, 0);
    }
}
