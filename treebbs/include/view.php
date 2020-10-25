<?php

if (!isset($_GET['vid'])) {
    redirect_header('index.php', 2, 'パラメータが不正です。');
}

  $sql = 'SELECT * FROM ' . $xoopsDB->prefix('treebbs_main') . ' WHERE tid = ' . (int)$_GET['vid'];
  $result = $xoopsDB->query($sql);
  $val = $xoopsDB->fetchArray($result);

  if ('0' === $val['rid']) {
      $mid = $val['tid'];
  } else {
      $mid = $val['rid'];
  }

  if (is_object($xoopsUser) && $val['t_uid'] == $xoopsUser->uid()) {
      $fedit = true;
  } elseif (!is_object($xoopsUser) && 0 == $val['t_uid']) {
      $fedit = true;
  } else {
      $fedit = false;
  }

  $tpl = new XoopsTpl();
  $tpl->clear_all_assign();
  $tpl->assign('tid', $val['tid']);
  $tpl->assign('subject', $myts->previewTarea($val['t_subject'], 0, 0, 0));
  $tpl->assign('name', $myts->previewTarea($val['t_name'], 0, 0, 0));
  $tpl->assign('time', formatTimestamp($val['t_posttime']));
  $tpl->assign('post', $myts->previewTarea($val['t_post']));
  $tpl->assign('fedit', $fedit);
  $contnts = $tpl->fetch('db:tree_view.html');

  require __DIR__ . '/include/class_tree.php';

  $tbbs = new treebbs($pagetree, $page, $mid);
  $tree = $tbbs->get_tree();
  if (isset($tree) && is_array($tree)) {
      $tpl = new XoopsTpl();

      $tpl->clear_all_assign();

      $tpl->assign('tree', $tree);

      $contnts .= $tpl->fetch('db:tree_tree.html');
  }
