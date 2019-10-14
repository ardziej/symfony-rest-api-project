<?php
declare( strict_types=1 );

namespace App\Controller;

/**
 * Class AbstractController
 * @package App\Controller
 */
abstract class AbstractController {
	/**
	 * @param  string  $message
	 * @param  int  $code
	 * @param  array  $data
	 *
	 * @return array
	 */
	protected function responseFrame( string $message, int $code, array $data ): array {
		return [
			'message' => $message,
			'code'    => $code,
			'data'    => $data,
		];
	}

}