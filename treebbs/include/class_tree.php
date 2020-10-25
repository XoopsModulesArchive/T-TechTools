<?php

class treebbs
{
    public $tree;

    public $db;

    public $rcon = 0;

    public $tcnt = 1;

    public $mytable;

    public $ts;

    public $next = false;

    public $mcnt_;

    public function __construct($maxview, $pcnt, $tid = '')
    {
        global $xoopsDB;

        $this->mcnt_ = $maxview;

        $this->db = &$xoopsDB;

        $this->mytable = $this->db->prefix('treebbs_main');

        $this->ts = MyTextSanitizer::getInstance();

        $sql = 'SELECT * FROM ' . $this->mytable . ' WHERE rid = 0';

        if ('' != $tid) {
            $sql .= ' AND tid = ' . $tid;
        }

        $sql .= ' ORDER BY t_posttime DESC LIMIT ' . ($pcnt * $maxview) . ',' . ($maxview + 1);

        $result = $this->db->query($sql);

        while ($val = $this->db->fetchArray($result)) {
            if ($this->rcon > $maxview - 1) {
                $this->next = true;

                break;
            }

            $this->tcnt = 1;

            $this->tree[$this->rcon][0]['tid'] = $val['tid'];

            $this->tree[$this->rcon][0]['subject'] = $this->ts->previewTarea($val['t_subject'], 0, 0, 0);

            if ('0' == $val['t_uid']) {
                $hosi = '&nbsp;™';
            } else {
                $hosi = '&nbsp;š';
            }

            $this->tree[$this->rcon][0]['name'] = $this->ts->previewTarea($val['t_name'], 0, 0, 0) . $hosi;

            $this->tree[$this->rcon][0]['time'] = formatTimestamp($val['t_posttime']);

            $this->tree[$this->rcon][0]['nest'] = 0;

            $this->tree[$this->rcon][0]['post'] = $this->ts->previewTarea($val['t_post']);

            $this->tree[$this->rcon][0]['uid'] = $val['t_uid'];

            $this->child_tree($val['tid']);

            $this->rcon++;
        }
    }

    public function child_tree($id, $n = 1)
    {
        $sql = 'SELECT * FROM ' . $this->mytable . ' WHERE oid = ' . $id . ' ORDER BY tid';

        $result = $this->db->query($sql);

        while ($val = $this->db->fetchArray($result)) {
            $this->tree[$this->rcon][$this->tcnt]['tid'] = $val['tid'];

            $this->tree[$this->rcon][$this->tcnt]['subject'] = $this->ts->previewTarea($val['t_subject'], 0, 0, 0);

            if ('0' == $val['t_uid']) {
                $hosi = '&nbsp;™';
            } else {
                $hosi = '&nbsp;š';
            }

            $this->tree[$this->rcon][$this->tcnt]['name'] = $this->ts->previewTarea($val['t_name'], 0, 0, 0) . $hosi;

            $this->tree[$this->rcon][$this->tcnt]['time'] = formatTimestamp($val['t_posttime']);

            $this->tree[$this->rcon][$this->tcnt]['nest'] = $n;

            $this->tree[$this->rcon][$this->tcnt]['post'] = $this->ts->previewTarea($val['t_post']);

            $this->tree[$this->rcon][$this->tcnt]['uid'] = $val['t_uid'];

            $this->tcnt++;

            $e = $n + 1;

            $this->child_tree($val['tid'], $e);
        }
    }

    public function get_page($where = true)
    {
        $pcnt = 1;

        $sql = 'SELECT COUNT(*) FROM ' . $this->mytable;

        if (true === $where) {
            $sql .= ' WHERE rid = 0';
        }

        $result = $this->db->query($sql);

        [$pcnt] = $this->db->fetchRow($result);

        $c = ceil($pcnt / $this->mcnt_);

        return $c;
    }

    public function get_next($page)
    {
        if (true === $this->next) {
            return $page + 1;
        }

        return 0;
    }

    public function get_tree()
    {
        return $this->tree;
    }

    public function get_thread()
    {
        $t_head = [];

        if (isset($this->tree) && is_array($this->tree)) {
            $i = 0;

            foreach ($this->tree as $val) {
                foreach ($val as $tval) {
                    if (0 === $tval['nest']) {
                        $t_head[$i]['sub'] = $tval['subject'];

                        $t_head[$i]['tid'] = $tval['tid'];

                        $i++;
                    }
                }
            }
        }

        return $t_head;
    }
}
