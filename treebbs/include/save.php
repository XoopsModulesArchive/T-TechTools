<?php

$pass = $_POST['pass'] ?? '';

if (!isset($_POST['sub'])) {
    $stop[] = '題名は必須です。';
}

if (!isset($_POST['com'])) {
    $stop[] = '投稿内容は必須です。';
}
if (!is_object($xoopsUser) && '' == $pass) {
    $stop[] = 'パスワードは必須です。';
}
if (isset($stop) && is_array($stop)) {
    $contnts .= '<div class="errorMsg">';

    foreach ($stop as $msg) {
        $contnts .= $msg . '<br>';
    }

    $contnts .= '</div>';
} else {
    require XOOPS_ROOT_PATH . '/class/oreteki_db.php';

    $oredb = new oretekiDB('treebbs_main');

    $w[0] = ['fileds' => 'tid', 'value' => $_POST['tid'], 'andor' => 'WHERE'];

    $post = &$oredb->get_fields($w);

    $up = false;

    if (!is_object($xoopsUser) && $post['t_pass'] == md5($_POST['pass'])) {
        $up = true;
    } elseif (is_object($xoopsUser) && $post['t_uid'] == $xoopsUser->uid()) {
        $up = true;
    }

    $post['t_subject'] = $_POST['sub'];

    $post['t_edittime'] = time();

    $post['t_post'] = $_POST['com'];

    $post['t_ip'] = $_SERVER['REMOTE_ADDR'];

    if (true === $up) {
        if (!$oredb->update()) {
            redirect_header('index.php', 2, '投稿に失敗しました。');
        } else {
            redirect_header('index.php', 2, '投稿に成功しました。');
        }
    } else {
        redirect_header('index.php', 2, '投稿者では、ありません。');
    }
}
