<?php

/**
 * ReportingCloud PHP Wrapper
 *
 * Official wrapper (authored by Text Control GmbH, publisher of ReportingCloud) to access ReportingCloud in PHP.
 *
 * @link      http://www.reporting.cloud to learn more about ReportingCloud
 * @link      https://github.com/TextControl/txtextcontrol-reportingcloud-php for the canonical source repository
 * @license   https://raw.githubusercontent.com/TextControl/txtextcontrol-reportingcloud-php/master/LICENSE.md
 * @copyright © 2016 Text Control GmbH
 */
namespace TxTextControl\ReportingCloud\Validator;

use Zend\Validator\InArray as InArrayValidator;

/**
 * DocumentExtension validator
 *
 * @package TxTextControl\ReportingCloud
 * @author  Jonathan Maron (@JonathanMaron)
 */
class DocumentExtension extends AbstractValidator
{
    /**
     * Unsupported file extension
     *
     * @const INVALID_EXTENSION
     */
    const INVALID_EXTENSION = 'documentExtensionInvalidExtension';

    /**
     * Message templates
     *
     * @var array
     */
    protected $messageTemplates = [
        self::INVALID_EXTENSION  => "'%value%' contains an unsupported file extension for a document file",
    ];

    /**
     * Returns true, if value is valid. False otherwise.
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function isValid($value)
    {
        $extension = pathinfo($value, PATHINFO_EXTENSION);
        $extension = strtoupper($extension);

        $inArrayValidator = new InArrayValidator();

        $inArrayValidator->setHaystack([
            'DOC' ,
            'DOCX',
            'HTML',
            'PDF' ,
            'RTF' ,
            'TX'
        ]);

        if (!$inArrayValidator->isValid($extension)) {
            $this->error(self::INVALID_EXTENSION);
            return false;
        }

        return true;
    }

}