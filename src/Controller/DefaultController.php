<?php
declare( strict_types=1 );

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 * @package App\Controller
 */
class DefaultController {
	/**
	 * @return Response
	 */
	public function index(): Response {
		$responseData = [
			'message' => 'OK',
			'code'    => 200,
			'data'    => [
				'text' => 'Hello World',
			],
		];

		return new JsonResponse( $responseData, Response::HTTP_OK );
	}

}