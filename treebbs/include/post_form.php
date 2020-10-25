<?php

require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

$setup_form = new XoopsThemeForm('新規投稿フォーム', 'postform', 'index.php?mode=post');

if (!isset($subj)) {
    $subj = '';
}

if (is_object($xoopsUser)) {
    $setup_form->addElement(new XoopsFormLabel('名前', $xoopsUser->uname()));
} else {
    $name = $_COOKIE['name'] ?? '';

    $setup_form->addElement(new XoopsFormText('名前', 'name', 30, 100, $name), true);
}

$setup_form->addElement(new XoopsFormText('題名', 'sub', 50, 100, $subj), true);
$setup_form->addElement(new XoopsFormDhtmlTextArea('投稿内容', 'com', '', 10, 50), true);

if (!is_object($xoopsUser)) {
    $setup_form->addElement(new XoopsFormPassword('パスワード', 'pass', 20, 32));

    $setup_form->addElement(new XoopsFormHidden('uid', 0));
} else {
    $setup_form->addElement(new XoopsFormHidden('uid', $xoopsUser->uid()));

    $setup_form->addElement(new XoopsFormHidden('name', $xoopsUser->uname()));
}

$setup_form->addElement(new XoopsFormHidden('oya', $oya));
$setup_form->addElement(new XoopsFormHidden('root', $root));

$setup_form->addElement(new XoopsFormButton('', '_submit', '投稿する', 'submit'));

if (0 == $oya && '' != $xoopsModuleConfig['tree_template']) {
    $xoopsTpl->assign('post_desc', $xoopsModuleConfig['tree_template']);
}
$contnts .= $setup_form->render();
