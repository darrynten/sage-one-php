<?php
/**
 * SageOne Library
 *
 * @category Library
 * @package  SageOne
 * @author   Darryn Ten <darrynten@github.com>
 * @license  MIT <https://github.com/darrynten/sage-one-php/blob/master/LICENSE>
 * @link     https://github.com/darrynten/sage-one-php
 */

namespace DarrynTen\SageOne\Models;

use DarrynTen\SageOne\BaseModel;
use DarrynTen\SageOne\Exception\LibraryException;

/**
 * Account Note Attachment Model
 *
 * Details on writable properties for Account Note Attachment:
 * None
 */
class AccountNoteAttachment extends BaseModel
{

    /**
     * @var string $endpoint
     */
    protected $endpoint = 'AccountNoteAttachment';

    /**
     * @var array $fields
     */
    protected $fields = [
    ];

    /**
     * @var array $featureGetReturns
     */
    protected $featureGetReturns = [
        'type' => 'Attachment',
        'collection' => true
    ];

    /**
     * @var array $features
     */
    protected $features = [
        'all' => false,
        'get' => true,
        'save' => true,
        'delete' => true,
    ];

    /**
     * Downloads the specified Attachment based on file identifier (Guid).
     *
     * @param string $guid
     * @return binary string
     */
    public function download($guid)
    {
        $response = $this->request->request(
            'GET',
            $this->endpoint,
            sprintf('Download/%s', $guid),
            [],
            true
        );
        return $response->getBody()->getContents();
    }

    /**
     * Gets the Company Storage Information.
     *
     * @return CompanyStorageInformation
     */
    public function getCompanyStorageInformation()
    {
        $data = $this->request->request(
            'GET',
            $this->endpoint,
            'GetCompanyStorageInformation'
        );
        $model = new CompanyStorageInformation($this->config);
        $model->loadResult($data);
        return $model;
    }

    /**
     * Deletes all Attachments based on the identifier.
     *
     * @return bool
     */
    public function deleteAll($guid)
    {
        $response = $this->request->request(
            'DELETE',
            $this->endpoint,
            sprintf('DeleteAll/%s', $guid)
        );
        if ($response->getStatusCode() === 204) {
            return true;
        }
        return false;
    }

    /**
     * Confirms if we are allowed to delete specified attachment
     *
     * @param string $guid
     * @return bool
     */
    public function allowDelete($guid)
    {
        return $this->request->request(
            'GET',
            $this->endpoint,
            sprintf('AllowDelete/%s', $guid)
        );
    }

    /**
     * Validates the specified Entity.
     */
    public function validate($id)
    {
        throw new LibraryException(
            LibraryException::METHOD_NOT_IMPLEMENTED,
            '\DarrynTen\SageOne\Models\AccountNoteAttachment::validate'
        );
    }
}
