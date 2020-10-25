<?php

require __DIR__ . '/include/class_tree.php';
  $tbbs = new treebbs($pageroot, $page);
  $tree = $tbbs->get_tree();

  if (isset($tree) && is_array($tree)) {
      $tpl = new XoopsTpl();

      $tpl->clear_all_assign();

      $tpl->assign('tree', $tree);

      $contnts = $tpl->fetch('db:tree_root.html');

      //ページナビ

      $xoopsTpl->assign('page_count', $tbbs->get_page());

      $xoopsTpl->assign('this_page', $page + 1);

      $xoopsTpl->assign('next_page', $tbbs->get_next($page));

      $xoopsTpl->assign('page_mode', $mode);

      $xoopsTpl->assign('page_max', $pageroot);

      $xoopsTpl->assign('pre_page', $page - 1);
  }
