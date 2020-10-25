<?php

require __DIR__ . '/include/class_tree.php';

  $tbbs = new treebbs($pageexpn, $page);
  $tree = $tbbs->get_tree();
  $headh = $tbbs->get_thread();

  if (isset($tree) && is_array($tree)) {
      if (is_object($xoopsUser)) {
          $uid = $xoopsUser->uid();
      } else {
          $uid = 0;
      }

      $tpl = new XoopsTpl();

      $tpl->clear_all_assign();

      $tpl->assign('headh', $headh);

      $tpl->assign('tree', $tree);

      $tpl->assign('uid', $uid);

      $contnts = $tpl->fetch('db:tree_expn.html');

      //ページナビ

      $xoopsTpl->assign('page_count', $tbbs->get_page());

      $xoopsTpl->assign('this_page', $page + 1);

      $xoopsTpl->assign('next_page', $tbbs->get_next($page));

      $xoopsTpl->assign('page_mode', $mode);

      $xoopsTpl->assign('page_max', $pageexpn);

      $xoopsTpl->assign('pre_page', $page - 1);
  }
