<?php

require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

$setup_form = new XoopsThemeForm('編集フォーム', 'postform', 'index.php?mode=save');
//$myts->displayTarea(
$setup_form->addElement(new XoopsFormLabel('名前', htmlspecialchars($val['t_name'], ENT_QUOTES | ENT_HTML5)));
$setup_form->addElement(new XoopsFormText('題名', 'sub', 50, 100, htmlspecialchars($subj, ENT_QUOTES | ENT_HTML5)), true);
$setup_form->addElement(new XoopsFormDhtmlTextArea('投稿内容', 'com', htmlspecialchars($val['t_post'], ENT_QUOTES | ENT_HTML5), 10, 50), true);

if (!is_object($xoopsUser)) {
    $setup_form->addElement(new XoopsFormPassword('パスワード', 'pass', 20, 32));

    $setup_form->addElement(new XoopsFormHidden('uid', 0));
} else {
    $setup_form->addElement(new XoopsFormHidden('uid', $xoopsUser->uid()));
}
$setup_form->addElement(new XoopsFormHidden('tid', $oya));
$setup_form->addElement(new XoopsFormButton('', '_submit', '投稿する', 'submit'));

$contnts = $setup_form->render();
