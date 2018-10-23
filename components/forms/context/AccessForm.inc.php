<?php
/**
 * @file controllers/form/context/AccessForm.inc.php
 *
 * Copyright (c) 2014-2018 Simon Fraser University
 * Copyright (c) 2000-2018 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class AccessForm
 * @ingroup classes_controllers_form
 *
 * @brief A preset form for configuring the terms under which a journal will
 *  allow access to its published content.
 */
import('lib.pkp.components.forms.FormComponent');

define('FORM_ACCESS', 'access');

class AccessForm extends FormComponent {
	/** @copydoc FormComponent::$id */
	public $id = FORM_ACCESS;

	/** @copydoc FormComponent::$method */
	public $method = 'PUT';

	/**
	 * Constructor
	 *
	 * @param $action string URL to submit the form to
	 * @param $locales array Supported locales
	 * @param $context Context Journal or Press to change settings for
	 */
	public function __construct($action, $locales, $context) {
		$this->action = $action;
		$this->successMessage = __('manager.distribution.publishingMode.success');
		$this->locales = $locales;

		$this->addField(new FieldOptions('publishingMode', [
				'label' => __('manager.distribution.publishingMode'),
				'type' => 'radio',
				'options' => [
					['value' => PUBLISHING_MODE_OPEN, 'label' => __('manager.distribution.publishingMode.openAccess')],
					['value' => PUBLISHING_MODE_SUBSCRIPTION, 'label' => __('manager.distribution.publishingMode.subscription')],
					['value' => PUBLISHING_MODE_NONE, 'label' => __('manager.distribution.publishingMode.none')],
				],
				'value' => (bool) $context->getData('publishingMode'),
			]));
	}
}
