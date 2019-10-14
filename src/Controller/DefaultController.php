<?php
declare( strict_types=1 );

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 * @package App\Controller
 */
class DefaultController extends AbstractController {
	/**
	 * @return Response
	 */
	public function index(): Response {
		$response = $this->responseFrame(
			'OK',
			Response::HTTP_OK,
			[ 'message' => 'Hello World' ]
		);

		return new JsonResponse( $response, Response::HTTP_OK );
	}

}