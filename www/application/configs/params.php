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
            'username' => ['required|reg:/^[0-9a-zA-Z]{6,16}$/', '用户名不正确'],
            'password' => ['required|size:32', '密码不正确']
        ]
    ],
    'home/infoSave' =>[
        'rule' => [
            'truename' => ['required', '用户名不正确'],
            'qq' => ['required|min:5|max:12', 'QQ不正确'],
            'weixin' => ['required|username', '微信不正确'],
            'mobile' => ['required|mobile', '密码不正确'],
            'email' => ['required|email', '密码不正确'],
            'companyName' => [''],
            'productCat' => ['required|integer|min:1', '请选择产品大类'],
            'productCat2' => ['required|integer|min:1', '请选择产品小类'],
        ]
    ],
    'home/tgSave' =>[
        'rule' => [
            'title' => ['required|min:6', '文章标题不正确'],
            'author' => ['required','请填写作者'],
            'catId' => ['required|integer|min:1','请选择所属栏目'],
            'content' => ['required|min:50', '文章内容不正确'],
            'yzm' => ['required|size:4','验证码不正确']
        ]
    ],
    'home/reportSave' =>[
        'rule' => [
            'siteUrl' => ['required|url', '举报网址不正确'],
            'productCat' => ['required|integer|min:0','请选择产品大类'],
            'productCat2' => ['required|integer|min:1','请选择产品小类'],
            'photo' => ['file', '有图有真想,请上传图片亲!!'],
            'reason' => ['required|min:20', '亲,原因多少点呗!!'],
            'yzm' => ['required|size:4','验证码不正确']
        ]
    ],
];
