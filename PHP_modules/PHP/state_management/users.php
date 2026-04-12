<?php

define('USERS_FILE', __DIR__ . '/users.json');
 
function getUsers(): array {
    if (!file_exists(USERS_FILE)) return [];
    $data = file_get_contents(USERS_FILE);
    return json_decode($data, true) ?? [];
}


function saveUsers(array $users): void {
    file_put_contents(USERS_FILE, json_encode($users, JSON_PRETTY_PRINT));
}


function findUser(string $username): ?array {
    foreach (getUsers() as $user) {
        if (strtolower($user['username']) === strtolower($username)) return $user;
    }
    return null;
}


function registerUser(string $username, string $email, string $password): bool {
    if (findUser($username)) return false; 

    $users = getUsers();
    $users[] = [
        'username' => $username,
        'email'    => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT), 
    ];
    saveUsers($users);
    return true;
}


function validateCredentials(string $username, string $password): ?array {
    $user = findUser($username);
    if (!$user) return null;
    if (!password_verify($password, $user['password'])) return null;
    return $user; 
}
