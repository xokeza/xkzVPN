<?php

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/cors.php';
require_once __DIR__ . '/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_response([
        'success' => false,
        'message' => 'Метод не поддерживается'
    ], 405);
}

$payload = json_decode(
    file_get_contents('php://input'),
    true
);

if (!is_array($payload)) {
    json_response([
        'success' => false,
        'message' => 'Некорректный JSON'
    ], 400);
}

$userId = filter_var(
    $payload['user_id'] ?? null,
    FILTER_VALIDATE_INT
);

$platform = strtolower(
    trim((string)($payload['platform'] ?? ''))
);

$client = strtolower(
    trim((string)($payload['client'] ?? ''))
);

if (!$userId || $userId < 1) {
    json_response([
        'success' => false,
        'message' => 'Некорректный Telegram ID'
    ], 422);
}

$allowedPlatforms = [
    'ios',
    'windows',
    'android'
];

$allowedClients = [
    'happ',
    'v2ray',
    'incy'
];

if (!in_array($platform, $allowedPlatforms, true)) {
    json_response([
        'success' => false,
        'message' => 'Выберите устройство'
    ], 422);
}

if (!in_array($client, $allowedClients, true)) {
    json_response([
        'success' => false,
        'message' => 'Выберите приложение'
    ], 422);
}

$pdo = database();

$stmt = $pdo->prepare(
    '
    SELECT
        user_id,
        is_banned,
        subscription_expires_at,
        subscription_is_lifetime,
        free_subscription,
        subscription_token
    FROM invoke_vps_users
    WHERE user_id = :user_id
    LIMIT 1
    '
);

$stmt->execute([
    'user_id' => $userId
]);

$user = $stmt->fetch();

if (!$user) {
    json_response([
        'success' => false,
        'message' => 'Пользователь не найден. Сначала откройте бота.'
    ], 404);
}

if ((int)$user['is_banned'] === 1) {
    json_response([
        'success' => false,
        'message' => 'Доступ к сервису ограничен'
    ], 403);
}

$isLifetime = (int)$user['subscription_is_lifetime'] === 1;
$hasPaidSubscription = $isLifetime;

if (
    !$hasPaidSubscription &&
    $user['subscription_expires_at'] !== null
) {
    $hasPaidSubscription =
        strtotime($user['subscription_expires_at']) > time();
}

$hasFreeSubscription = (int)$user['free_subscription'] === 1;

if (!$hasPaidSubscription && !$hasFreeSubscription) {
    json_response([
        'success' => false,
        'message' => 'У вас нет активной подписки'
    ], 403);
}

$token = $user['subscription_token'];

if (
    !is_string($token) ||
    !preg_match('/^[a-f0-9]{64}$/', $token)
) {
    $token = bin2hex(random_bytes(32));

    $updateToken = $pdo->prepare(
        '
        UPDATE invoke_vps_users
        SET
            subscription_token = :token,
            selected_platform = :platform,
            selected_client = :client,
            updated_at = UTC_TIMESTAMP()
        WHERE user_id = :user_id
        '
    );

    $updateToken->execute([
        'token' => $token,
        'platform' => $platform,
        'client' => $client,
        'user_id' => $userId
    ]);
} else {
    $updateClient = $pdo->prepare(
        '
        UPDATE invoke_vps_users
        SET
            selected_platform = :platform,
            selected_client = :client,
            updated_at = UTC_TIMESTAMP()
        WHERE user_id = :user_id
        '
    );

    $updateClient->execute([
        'platform' => $platform,
        'client' => $client,
        'user_id' => $userId
    ]);
}

$baseUrl = 'https://xokeza.github.io/xkzVPN/api/subscription_content.php';
$subscriptionUrl = $baseUrl . '?token=' . rawurlencode($token);

$encodedSubscriptionUrl = rawurlencode($subscriptionUrl);

$links = [
    'happ' => 'happ://add/' . $subscriptionUrl,
    'v2ray' => 'v2rayng://install-sub/?url=' .
        $encodedSubscriptionUrl .
        '%23InvokeVPN',
    'incy' => $subscriptionUrl
];

json_response([
    'success' => true,
    'subscription_url' => $subscriptionUrl,
    'import_url' => $links[$client],
    'platform' => $platform,
    'client' => $client
]);