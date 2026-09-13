<?php

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/database.php';

header('Content-Type: text/plain; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');

$token = trim(
    (string)($_GET['token'] ?? '')
);

if (!preg_match('/^[a-f0-9]{64}$/', $token)) {
    http_response_code(401);
    exit('Invalid subscription token');
}

$pdo = database();

$stmt = $pdo->prepare(
    '
    SELECT
        user_id,
        is_banned,
        subscription_expires_at,
        subscription_is_lifetime,
        free_subscription
    FROM invoke_vps_users
    WHERE subscription_token = :token
    LIMIT 1
    '
);

$stmt->execute([
    'token' => $token
]);

$user = $stmt->fetch();

if (!$user) {
    http_response_code(404);
    exit('Subscription not found');
}

if ((int)$user['is_banned'] === 1) {
    http_response_code(403);
    exit('Subscription disabled');
}

$isLifetime = (int)$user['subscription_is_lifetime'] === 1;
$hasActivePaidSubscription = $isLifetime;

if (
    !$hasActivePaidSubscription &&
    $user['subscription_expires_at'] !== null
) {
    $hasActivePaidSubscription =
        strtotime($user['subscription_expires_at']) > time();
}

$hasFreeSubscription = (int)$user['free_subscription'] === 1;

if (!$hasActivePaidSubscription && !$hasFreeSubscription) {
    http_response_code(403);
    exit('Subscription expired');
}

$lines = [];

foreach (SERVER_CONFIGS as $config) {
    if (
        isset($config['uri']) &&
        is_string($config['uri']) &&
        $config['uri'] !== ''
    ) {
        $lines[] = $config['uri'];
    }
}

if (!$lines) {
    http_response_code(503);
    exit('No available configurations');
}

echo base64_encode(
    implode("\n", $lines)
);