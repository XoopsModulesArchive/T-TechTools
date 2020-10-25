<?php

if (!isset($_POST['name'])) {
    $stop[] = '名前は必須です。';
}

if (!isset($_POST['sub'])) {
    $stop[] = '題名は必須です。';
}

if (!isset($_POST['com'])) {
    $stop[] = '投稿内容は必須です。';
}

if (isset($stop) && is_array($stop)) {
    xoops_error($stop, 'エラー発生');

    require __DIR__ . '/include/post_form.php';
} else {
    require XOOPS_ROOT_PATH . '/class/oreteki_db.php';

    $oredb = new oretekiDB('treebbs_main');

    $post = &$oredb->get_fields('');

    $post['oid'] = $_POST['oya'];

    $post['rid'] = $_POST['root'];

    $post['t_subject'] = $_POST['sub'];

    $post['t_name'] = $_POST['name'];

    $post['t_posttime'] = time();

    $post['t_post'] = $_POST['com'];

    if (isset($_POST['pass'])) {
        $post['t_pass'] = md5($_POST['pass']);
    }

    $post['t_ip'] = $_SERVER['REMOTE_ADDR'];

    $post['t_uid'] = $_POST['uid'];

    if (!$oredb->insert()) {
        redirect_header('index.php', 2, '投稿に失敗しました。');
    } else {
        redirect_header('index.php', 2, '投稿に成功しました。');
    }
}
