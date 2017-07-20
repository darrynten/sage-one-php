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
        'type' => Attachment::class,
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
}
