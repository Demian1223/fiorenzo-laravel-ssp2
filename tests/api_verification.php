<?php

require __DIR__ . '/../vendor/autoload.php';

$baseUrl = 'http://127.0.0.1:8000/api';
$email = 'admin@fiorenzo.com'; // Assuming this user exists from previous context
$password = 'password';

function makeRequest($method, $url, $token = null, $data = [])
{
    $curl = curl_init();
    $headers = [
        'Accept: application/json',
        'Content-Type: application/json',
    ];
    if ($token) {
        $headers[] = 'Authorization: Bearer ' . $token;
    }

    $options = [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_HEADER => true, // Include headers to check status
    ];

    if ($method === 'POST') {
        $options[CURLOPT_POST] = true;
        $options[CURLOPT_POSTFIELDS] = json_encode($data);
    }

    curl_setopt_array($curl, $options);

    $response = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
    $body = substr($response, $headerSize);

    curl_close($curl);

    return ['code' => $httpCode, 'body' => json_decode($body, true), 'raw_body' => $body];
}

echo "Starting API Verification...\n\n";

// 1. Public Endpoint
echo "1. Testing Public Endpoint (GET /products)...\n";
$res = makeRequest('GET', "$baseUrl/products");
echo "Status: " . $res['code'] . "\n";
if ($res['code'] === 200) {
    echo "SUCCESS: Public endpoint accessible.\n";
} else {
    echo "FAILURE: " . $res['raw_body'] . "\n";
}
echo "\n";

// 2. Login
echo "2. Testing Login (POST /login)...\n";
$res = makeRequest('POST', "$baseUrl/login", null, ['email' => $email, 'password' => $password]);
echo "Status: " . $res['code'] . "\n";
$token = $res['body']['access_token'] ?? null;
if ($res['code'] === 200 && $token) {
    echo "SUCCESS: Login successful. Token received.\n";
    echo "Token: " . substr($token, 0, 10) . "...\n";
} else {
    echo "FAILURE: Login failed.\n";
    print_r($res['body']);
    exit(1);
}
echo "\n";

// 3. Protected Endpoint (Unauthorized)
echo "3. Testing Protected Endpoint WITHOUT Token (GET /me)...\n";
$res = makeRequest('GET', "$baseUrl/me");
echo "Status: " . $res['code'] . "\n";
if ($res['code'] === 401) {
    echo "SUCCESS: Access denied as expected.\n";
} else {
    echo "FAILURE: Unexpected status " . $res['code'] . "\n";
}
echo "\n";

// 4. Protected Endpoint (Authorized)
echo "4. Testing Protected Endpoint WITH Token (GET /me)...\n";
$res = makeRequest('GET', "$baseUrl/me", $token);
echo "Status: " . $res['code'] . "\n";
if ($res['code'] === 200 && isset($res['body']['email'])) {
    echo "SUCCESS: User details retrieved: " . $res['body']['email'] . "\n";
} else {
    echo "FAILURE: Could not get user details.\n";
    print_r($res['body']);
}
echo "\n";

// 5. Protected Orders Endpoint
echo "5. Testing Orders Endpoint (GET /orders)...\n";
$res = makeRequest('GET', "$baseUrl/orders", $token);
echo "Status: " . $res['code'] . "\n";
if ($res['code'] === 200 && is_array($res['body'])) {
    echo "SUCCESS: Orders retrieved. Count: " . count($res['body']) . "\n";
} else {
    echo "FAILURE: Could not get orders.\n";
    print_r($res['body']);
}
echo "\n";

// 6. Logout
echo "6. Testing Logout (POST /logout)...\n";
$res = makeRequest('POST', "$baseUrl/logout", $token);
echo "Status: " . $res['code'] . "\n";
if ($res['code'] === 200) {
    echo "SUCCESS: Logged out.\n";
} else {
    echo "FAILURE: Logout failed.\n";
    print_r($res['body']);
}
echo "\n";

// 7. Token Revocation
echo "7. Testing Token Revocation (GET /me with old token)...\n";
$res = makeRequest('GET', "$baseUrl/me", $token);
echo "Status: " . $res['code'] . "\n";
if ($res['code'] === 401) {
    echo "SUCCESS: Old token rejected.\n";
} else {
    echo "FAILURE: Old token still works! Status: " . $res['code'] . "\n";
}

echo "\nVerification Complete.\n";
