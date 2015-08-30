<?php

return [
    'login/regsave' => [
        'rule' => [
            'username' => ['required|reg:/^[0-9a-zA-Z]{6,16}$/', '用户名不正确'],
            'password' => ['required|size:32', '密码不正确']
        ]
    ],
    'login/in' => [
        'rule' => [
            'username' => ['required|reg:/^[0-9a-zA-Z]{5,16}$/', '用户名不正确'],
            'password' => ['required|min:6|max:32', '密码不正确']
        ]
    ],
];

