<?php

// Subpackage namespace
namespace LittleBizzy\SpeedDemon\Modules\Delete_Expired_Transients\Transients;

/**
 * Transients class
 *
 * @package Speed Demon / Delete Expired Transients
 * @subpackage Transients
 */
class Transients {



	// Constants
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Max records per query
	 */
	const MAX_BATCH_RECORDS = 50;



	/**
	 * Max time removing elements
	 */
	const MAX_EXECUTION_TIME = 10;



	// Methods
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Remove expired transients using default values
	 * or their equivalent custom constants if defined.
	 *
	 * SQL query inspired by:
	 * https://github.com/dartiss/transient-cleaner
	 */
	public function cleanExpired() {

// Debug
//for ($i = 0; $i < 1000; $i++) { set_transient(microtime(), 'test', 1); } return;

		// Globals
		global $wpdb;

		// Limit results
		$limit = defined('DELETE_EXPIRED_TRANSIENTS_MAX_BATCH_RECORDS')? esc_sql((int) DELETE_EXPIRED_TRANSIENTS_MAX_BATCH_RECORDS) : self::MAX_BATCH_RECORDS;

		// Execution time allowed
		$timeout = time() + (defined('DELETE_EXPIRED_TRANSIENTS_MAX_EXECUTION_TIME')? esc_sql((int) DELETE_EXPIRED_TRANSIENTS_MAX_EXECUTION_TIME) : self::MAX_EXECUTION_TIME);

		// Before the last minute to avoid conflicts
		$beforeTimestamp = time() - MINUTE_IN_SECONDS;

// Debug
//$beforeTimestamp = time() + MINUTE_IN_SECONDS;

		// Batch removing
		while (time() < $timeout) {

			// Compose sentence
			$sql = "
				SELECT
					a.option_id as option_id1, b.option_id as option_id2
				FROM
					{$wpdb->options} a, {$wpdb->options} b
				WHERE
					a.option_name LIKE '%_transient_%' AND
					a.option_name NOT LIKE '%_transient_timeout_%' AND
					b.option_name = CONCAT(
						'_transient_timeout_',
							SUBSTRING(
								a.option_name,
								CHAR_LENGTH('_transient_') + 1
							)
					) AND
					b.option_value < '{$beforeTimestamp}'
				ORDER BY b.option_id ASC
				LIMIT {$limit}
			";

			// Execute and check affected rows
			$rows = $wpdb->get_results($sql);
			if (empty($rows) || !is_array($rows))
				break;

// Debug
//error_log(print_r($rows, true));

			// Populate data
			$Ids = [];
			foreach ($rows as $row) {
				$Ids[] = esc_sql((int) $row->option_id2);
				$Ids[] = esc_sql((int) $row->option_id1);
			}

			// Prepare identifiers
			$Ids = implode(',', $Ids);

// Debug
//error_log($Ids);

			// Remove detected expired options
			$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_id IN ({$Ids})");
		}
	}



}