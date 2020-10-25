<?php

require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

if (!isset($keyword)) {
    $keyword = '';
}
if (!isset($andor)) {
    $andor = 'AND';
}
if (!isset($subnote)) {
    $subnote = ['subj', 'note'];
}
if (!isset($sortj)) {
    $sortj = 'DESC';
}

$search_form = new XoopsThemeForm('検索フォーム', 'searchform', 'index.php?mode=s_ret');
$search_form->addElement(new XoopsFormText('キーワード', 'keyword', 50, 100, $keyword), true);

$select_form = new XoopsFormSelect('検索条件', 'ANDOR', $andor);
$select_form->addOption('AND', 'AND');
$select_form->addOption('OR', 'OR');
$search_form->addElement($select_form);

$check_form = new XoopsFormCheckBox('検索場所', 'subnote', $subnote);
$check_form->addOption('subj', '件名');
$check_form->addOption('note', '内容');
$search_form->addElement($check_form);

$sort_form = new XoopsFormSelect('ソート順', 'sortj', $sortj);
$sort_form->addOption('DESC', '新しい方から');
$sort_form->addOption('ASC', '古い方から');
$search_form->addElement($sort_form);

$search_form->addElement(new XoopsFormButton('', '_submit', '検索', 'submit'));
$contnts .= '<div style="width:97%;">';
$contnts .= $search_form->render();
$contnts .= '</div>';
