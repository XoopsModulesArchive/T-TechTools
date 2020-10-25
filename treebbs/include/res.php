<?php

if (!isset($_GET['vid'])) {
    redirect_header('index.php', 2, 'パラメータが不正です。');
}

  $sql = 'SELECT * FROM ' . $xoopsDB->prefix('treebbs_main') . ' WHERE tid = ' . (int)$_GET['vid'];
  $result = $xoopsDB->query($sql);
  $val = $xoopsDB->fetchArray($result);

  if ('0' === $val['rid']) {
      $root = $val['tid'];
  } else {
      $root = $val['rid'];
  }
  $mid = $root;
  $oya = (int)$_GET['vid'];
  $subj = 'Re:' . $val['t_subject'];
  require __DIR__ . '/include/post_form.php';

  $temp = '<div style="width:80%;margin:12px;">';
  function child_tree($id, $n = 1)
  {
      global $xoopsDB,$cnt,$tree,$root;

      $childsql = 'SELECT * FROM ' . $xoopsDB->prefix('treebbs_main') . ' WHERE oid = ' . $id . ' ORDER BY tid';

      $result = $xoopsDB->query($childsql);

      while ($val = $xoopsDB->fetchArray($result)) {
          $tree[$root][$cnt]['tid'] = $val['tid'];

          $tree[$root][$cnt]['subject'] = $val['t_subject'];

          $tree[$root][$cnt]['name'] = $val['t_name'];

          $tree[$root][$cnt]['time'] = $val['t_posttime'];

          $tree[$root][$cnt]['nest'] = $n;

          $cnt++;

          child_tree($val['tid'], ($n + 1));
      }
  }

  $cnt = 1;
  $root = 0;
  $treesql = 'SELECT * FROM ' . $xoopsDB->prefix('treebbs_main') . ' WHERE tid = ' . $mid . ' AND rid = 0';
  $result = $xoopsDB->query($treesql);
  while ($val = $xoopsDB->fetchArray($result)) {
      $tree[$root][0]['tid'] = $val['tid'];

      $tree[$root][0]['subject'] = $val['t_subject'];

      $tree[$root][0]['name'] = $val['t_name'];

      $tree[$root][0]['time'] = $val['t_posttime'];

      $tree[$root][0]['nest'] = 0;

      child_tree($val['tid']);

      $root++;
  }

  foreach ($tree as $dval) {
      foreach ($dval as $tval) {
          if (0 === $tval['nest']) {
              $temp .= '<div>★－<a href="index.php?mode=view&amp;vid=' . $tval['tid'] . '">' . $myts->previewTarea($tval['subject'], 0, 0, 0) . '</a>&nbsp;&nbsp;[' . $myts->previewTarea($tval['name'], 0, 0, 0) . ']&nbsp;&nbsp;' . formatTimestamp($tval['time']) . '</div>';
          } else {
              $temp .= '<div style="margin-left:' . $tval['nest'] . 'em;">＋－<a href="index.php?mode=view&amp;vid=' . $tval['tid'] . '">' . $myts->previewTarea($tval['subject'], 0, 0, 0) . '</a>&nbsp;&nbsp;[' . $myts->previewTarea($tval['name'], 0, 0, 0) . ']&nbsp;&nbsp;' . formatTimestamp($tval['time']) . '</div>';
          }
      }

      $temp .= '<br>';
  }
  $temp .= '</div>';
  $contnts .= $temp;
