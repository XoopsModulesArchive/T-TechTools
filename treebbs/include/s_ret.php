<?php

if (!isset($_POST['keyword'])) {
    $stop[] = 'キーワードは必須です。';
} else {
    $keyword = str_replace('　', ' ', $_POST['keyword']);
}

if (!isset($_POST['subnote'])) {
    $stop[] = '検索場所を選択して下さい。';
} else {
    $subnote = $_POST['subnote'];
}

if (isset($_POST['ANDOR']) && 'AND' == $_POST['ANDOR']) {
    $andor = 'AND';
} else {
    $andor = 'OR';
}

if (isset($_POST['sortj']) && 'DESC' == $_POST['sortj']) {
    $sortj = 'DESC';
} else {
    $sortj = 'ASC';
}

if (isset($stop) && is_array($stop)) {
    $contnts .= '<div class="errorMsg">';

    foreach ($stop as $msg) {
        $contnts .= $msg . '<br>';
    }

    $contnts .= '</div>';
} else {
    if (isset($_POST['page'])) {
        $page = (int)$_POST['page'];
    } else {
        $page = 0;
    }

    $keyw = explode(' ', $keyword);

    $sql = 'SELECT * FROM ' . $xoopsDB->prefix('treebbs_main');

    $sql .= ' WHERE tid > 0';

    if (1 == count($subnote)) {
        if (in_array('subj', $subnote, true)) {
            foreach ($keyw as $w) {
                $subjw[] = " t_subject LIKE '%" . $w . "%'";
            }

            $sql .= ' AND (' . implode($andor, $subjw) . ')';
        } elseif (in_array('note', $subnote, true)) {
            foreach ($keyw as $w) {
                $notew[] = " t_post LIKE '%" . $w . "%'";
            }

            $sql .= ' AND (' . implode($andor, $notew) . ')';
        }
    } else {
        $sql .= ' AND ( (';

        foreach ($keyw as $w) {
            $subjw[] = " t_subject LIKE '%" . $w . "%'";
        }

        $sql .= implode($andor, $subjw);

        $sql .= ' ) OR ( ';

        foreach ($keyw as $w) {
            $notew[] = " t_post LIKE '%" . $w . "%'";
        }

        $sql .= implode($andor, $notew);

        $sql .= ' ) ) ';
    }

    $sql .= ' ORDER BY t_posttime ' . $sortj;

    $sql .= ' LIMIT ' . $page . ',' . ($page + 11);

    $result = $xoopsDB->query($sql);

    $root = 0;

    while ($val = $xoopsDB->fetchArray($result)) {
        if ($root > 10) {
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

        $contnts .= $tpl->fetch('db:tree_dump.html');

        //ページナビ
    /*
    $xoopsTpl->assign('page_count', get_page());
    $xoopsTpl->assign('this_page', $page+1);
    if ( $next === true ) {
      $xoopsTpl->assign('next_page', $page+1);
    } else {
      $xoopsTpl->assign('next_page', 0);
    }
    $xoopsTpl->assign('page_mode', $mode);
    $xoopsTpl->assign('page_max', $pageexpn);
    $xoopsTpl->assign('pre_page', $page-1);
    */
    }
}
require __DIR__ . '/include/search_form.php';
