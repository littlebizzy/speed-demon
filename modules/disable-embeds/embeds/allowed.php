<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Disable_Embeds\Embeds;

/**
 * Allowed services class
 *
 * @package Speed Demon / Disable Embeds
 * @subpackage Core
 */
class Allowed {



	// Properties
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Detected services
	 */
	private $services = [];



	/**
	 * Supported services
	 */
	const SERVICES = '
youtube
twitter
facebook
instagram
scribd
soundcloud
reddit
imgur
flickr
vimeo
';



	// Initialization
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Constructor
	 */
	public function __construct() {

		// Supported services
		$this->supported = array_map('trim', explode("\n", trim(self::SERVICES)));

		// Detect services
		$services = defined('DISABLE_EMBEDS_ALLOWED_SOURCES')? array_map('strtolower', array_map('trim', explode(',', ''.DISABLE_EMBEDS_ALLOWED_SOURCES))) : [];
		foreach ($services as $service) {

			// Check empty
			if ('' === $service)
				continue;

			// Check supported
			if (in_array($service, $this->supported))
				$this->services[] = $service;
		}
	}



	// Methods
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Detected services flag
	 */
	public function detected() {
		return !empty($this->services);
	}



	/**
	 * Allowed services
	 */
	public function services() {
		return $this->services;
	}



	/**
	 * Supported
	 */
	public function supported() {
		return $this->supported;
	}



}