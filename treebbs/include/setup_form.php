<?php

require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

$setup_form = new XoopsThemeForm('環境設定', 'setupform', 'index.php?mode=setcookei');

$sel_form = new XoopsFormSelect('デフォルトの表示モード', 'view', $view);
$sel_form->addOption('tree', 'ツリー表示');
$sel_form->addOption('expn', '展開表示');
$sel_form->addOption('root', 'タイトル表示');
$sel_form->addOption('dump', '一覧表示');
$setup_form->addElement($sel_form);

$setup_form->addElement(new XoopsFormText('ツリー表示時の１ページの表示数', 'pagetree', 5, 5, $pagetree), true);
$setup_form->addElement(new XoopsFormText('展開表示時の１ページの表示数', 'pageexpn', 5, 5, $pageexpn), true);
$setup_form->addElement(new XoopsFormText('タイトル表示時の１ページの表示数', 'pageroot', 5, 5, $pageroot), true);
$setup_form->addElement(new XoopsFormText('一覧表示時の１ページの表示数', 'pagedump', 5, 5, $pagedump), true);

$setup_form->addElement(new XoopsFormButton('', '_submit', '設定', 'submit'));

$contnts = $setup_form->render();
