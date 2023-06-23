<?php
declare(strict_types=1);

namespace Hexagonal\UI\Http\Controller\Health;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class HealthController extends AbstractController
{
    private const LAST_COMMIT = "git log -1 --pretty=format:'%h - %s (%ci)' --abbrev-commit";

    public function __invoke(): JsonResponse
    {
        return new JsonResponse(
            [
                'status' => 'ready',
                'service_name' => $this->getParameter('service_name'),
                'version' => shell_exec(self::LAST_COMMIT) ?? $this->getParameter('service_version'),
                'docker_node' => gethostname()
            ],
            Response::HTTP_OK
        );
    }
}