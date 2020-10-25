<?php

function get_page()
{
    global $xoopsDB, $pagedump;

    $pcnt = 1;

    $sql = 'SELECT COUNT(*) FROM ' . $xoopsDB->prefix('treebbs_main');

    $result = $xoopsDB->query($sql);

    [$pcnt] = $xoopsDB->fetchRow($result);

    $c = ceil($pcnt / $pagedump);

    return $c;
}

  $cnt = 1;
  $root = 0;
  $next = false;
  $treesql = 'SELECT * FROM ' . $xoopsDB->prefix('treebbs_main') . ' ORDER BY tid DESC LIMIT ' . ($page * $pagedump) . ',' . ($pagedump + 1);
  $result = $xoopsDB->query($treesql);
  while ($val = $xoopsDB->fetchArray($result)) {
      if ($root > $pagedump - 1) {
          $next = true;

          break;
      }

      $tree[$root][0]['tid'] = $val['tid'];

      $tree[$root][0]['subject'] = $myts->previewTarea($val['t_subject'], 0, 0, 0);

      $tree[$root][0]['name'] = $myts->previewTarea($val['t_name'], 0, 0, 0);

      $tree[$root][0]['time'] = formatTimestamp($val['t_posttime']);

      $tree[$root][0]['post'] = $myts->previewTarea($val['t_post']);

      $tree[$root][0]['nest'] = 0;

      $tree[$root][0]['uid'] = $val['t_uid'];

      $root++;
  }
  if (isset($tree) && is_array($tree)) {
      if (is_object($xoopsUser)) {
          $uid = $xoopsUser->uid();
      } else {
          $uid = 0;
      }

      $tpl = new XoopsTpl();

      $tpl->clear_all_assign();

      $tpl->assign('tree', $tree);

      $tpl->assign('uid', $uid);

      $contnts = $tpl->fetch('db:tree_dump.html');

      //ページナビ

      $xoopsTpl->assign('page_count', get_page());

      $xoopsTpl->assign('this_page', $page + 1);

      if (true === $next) {
          $xoopsTpl->assign('next_page', $page + 1);
      } else {
          $xoopsTpl->assign('next_page', 0);
      }

      $xoopsTpl->assign('page_mode', $mode);

      $xoopsTpl->assign('page_max', $pageexpn);

      $xoopsTpl->assign('pre_page', $page - 1);
  }
