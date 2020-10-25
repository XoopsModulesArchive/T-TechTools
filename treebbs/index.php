<?php

require dirname(__DIR__, 2) . '/mainfile.php';

$now = formatTimestamp(time(), 'Ymd');
if (isset($_COOKIE['date'])) {
    $mdate = $_COOKIE['date'];

    if ($mdate == $now) {
        $cntup = false;
    } else {
        $cntup = true;

        setcookie('date', $now, time() + 24 * 3600);
    }
} else {
    $mdate = formatTimestamp(time(), 'Ymd');

    $cntup = true;

    setcookie('date', $mdate, time() + 24 * 3600);
}

$xoopsOption['template_main'] = 'tree_index.html';
require XOOPS_ROOT_PATH . '/header.php';
$myts = MyTextSanitizer::getInstance();
/* カウンター取得 */
$sql = 'SELECT IFNULL(SUM(t_count),0) FROM ' . $xoopsDB->prefix('treebbs_count') . ' WHERE t_date = ' . formatTimestamp(time(), 'Ymd');
$result = $xoopsDB->query($sql);
[$c_today] = $xoopsDB->fetchRow($result);
if (true === $cntup && 0 == $c_today) {
    $sql = 'INSERT INTO ' . $xoopsDB->prefix('treebbs_count') . ' VALUES (' . $now . ',1)';

    $result = $xoopsDB->queryF($sql);
} elseif (true === $cntup) {
    $sql = 'UPDATE ' . $xoopsDB->prefix('treebbs_count') . ' SET t_count = t_count + 1 WHERE t_date = ' . $now;

    $result = $xoopsDB->queryF($sql);
}

$sql = 'SELECT IFNULL(SUM(t_count),0) FROM ' . $xoopsDB->prefix('treebbs_count') . ' WHERE t_date = ' . formatTimestamp(time() - 86400, 'Ymd');
$result = $xoopsDB->query($sql);
[$c_yest] = $xoopsDB->fetchRow($result);

$sql = 'SELECT IFNULL(SUM(t_count),0) FROM ' . $xoopsDB->prefix('treebbs_count');
$result = $xoopsDB->query($sql);
[$c_total] = $xoopsDB->fetchRow($result);

/* テンプレートへアサイン */
$xoopsTpl->assign('bbs_title', $xoopsModuleConfig['tree_title']);
$xoopsTpl->assign('bbs_desc', $xoopsModuleConfig['tree_desc']);

$xoopsTpl->assign('count_today', $c_today);
$xoopsTpl->assign('count_yest', $c_yest);
$xoopsTpl->assign('count_total', $c_total);
$xoopsTpl->assign('my_self', $_SERVER['PHP_SELF']);

$contnts = '';

$view = $_COOKIE['view'] ?? 'tree';
$pagetree = $_COOKIE['pagetree'] ?? 10;
$pageexpn = $_COOKIE['pageexpn'] ?? 5;
$pageroot = $_COOKIE['pageroot'] ?? 15;
$pagedump = $_COOKIE['pagedump'] ?? 20;

$mode = $_GET['mode'] ?? $view;
if (isset($_GET['page'])) {
    $page = (int)$_GET['page'];
} else {
    $page = 0;
}

switch ($mode) {
  case 'form':
    $oya = $root = 0;
    require __DIR__ . '/include/post_form.php';
    break;
  case 'post':
    require __DIR__ . '/include/post_post.php';
    break;
  case 'tree':
    require __DIR__ . '/include/tree.php';
    break;
  case 'expn':
    require __DIR__ . '/include/expn.php';
    break;
  case 'root':
    require __DIR__ . '/include/root.php';
    break;
  case 'dump':
    require __DIR__ . '/include/dump.php';
    break;
  case 'search':
    require __DIR__ . '/include/search_form.php';
    break;
  case 's_ret':
    require __DIR__ . '/include/s_ret.php';
    break;
  case 'setup':
    require __DIR__ . '/include/setup_form.php';
    break;
  case 'setcookei':
    $view = $_POST['view'] ?? 'tree';
      $pagetree = $_POST['pagetree'] ?? 10;
      $pageexpn = $_POST['pageexpn'] ?? 5;
      $pageroot = $_POST['pageroot'] ?? 15;
      $pagedump = $_POST['pagedump'] ?? 20;

      setcookie('view', $view, time() + 365 * 24 * 3600);
    setcookie('pagetree', $pagetree, time() + 365 * 86400);
    setcookie('pageexpn', $pageexpn, time() + 365 * 86400);
    setcookie('pageroot', $pageroot, time() + 365 * 86400);
    setcookie('pagedump', $pagedump, time() + 365 * 86400);

    redirect_header('index.php', 2, '設定をクッキーに保存しました。');
    break;
  case 'view':
    require __DIR__ . '/include/view.php';
    break;
  case 'res':
    require __DIR__ . '/include/res.php';
    break;
  case 'edit':
    require __DIR__ . '/include/edit.php';
    break;
  case 'save':
    require __DIR__ . '/include/save.php';
    break;
}
if ('' == $contnts) {
    $contnts = 'データなし';
}
$xoopsTpl->assign('contents', $contnts);

require_once XOOPS_ROOT_PATH . '/footer.php';
