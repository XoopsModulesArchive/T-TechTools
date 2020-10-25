<?php

if (!isset($_GET['vid'])) {
    redirect_header('index.php', 2, 'パラメータが不正です。');
}

  $sql = 'SELECT * FROM ' . $xoopsDB->prefix('treebbs_main') . ' WHERE tid = ' . (int)$_GET['vid'];
  $result = $xoopsDB->query($sql);
  $val = $xoopsDB->fetchArray($result);

  if (is_object($xoopsUser) && $val['t_uid'] == $xoopsUser->uid()) {
  } elseif (!is_object($xoopsUser) && 0 == $val['t_uid']) {
  } else {
      redirect_header('index.php', 2, '投稿者が違います。');
  }

  if ('0' === $val['rid']) {
      $root = $val['tid'];
  } else {
      $root = $val['rid'];
  }
  $mid = $root;
  $oya = (int)$_GET['vid'];
  $subj = $val['t_subject'];
  require __DIR__ . '/include/edit_form.php';

  require __DIR__ . '/include/class_tree.php';

  $tbbs = new treebbs($pagetree, $page, $mid);
  $tree = $tbbs->get_tree();
  if (isset($tree) && is_array($tree)) {
      $tpl = new XoopsTpl();

      $tpl->clear_all_assign();

      $tpl->assign('tree', $tree);

      $contnts .= $tpl->fetch('db:tree_tree.html');
  }
