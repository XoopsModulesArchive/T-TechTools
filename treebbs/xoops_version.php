<?php

//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <https://www.xoops.org>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
$modversion['name'] = 'ツリーBBS';
$modversion['version'] = '0.02';
$modversion['description'] = 'ツリー型掲示板';
$modversion['credits'] = 'Marijuana';
$modversion['author'] = 'オリジナル　<a href="http://php.s3.to" target="_blank">レッツPHP</a>';
$modversion['help'] = '';
$modversion['license'] = '';
$modversion['official'] = 0;
$modversion['image'] = 'images/logo.gif';
$modversion['dirname'] = 'treebbs';

// Database Tables
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
$modversion['tables'][0] = 'treebbs_main';
$modversion['tables'][1] = 'treebbs_count';

// Admin Menus
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin/index.php';

// Main Menus
$modversion['hasMain'] = 1;

//Config
$modversion['config'][1]['name'] = 'tree_title';
$modversion['config'][1]['title'] = '_TREE_TITLE';
$modversion['config'][1]['description'] = '';
$modversion['config'][1]['formtype'] = 'textbox';
$modversion['config'][1]['valuetype'] = 'text';
$modversion['config'][1]['default'] = 'ツリー掲示板';

$modversion['config'][2]['name'] = 'tree_desc';
$modversion['config'][2]['title'] = '_TREE_DESC';
$modversion['config'][2]['description'] = '';
$modversion['config'][2]['formtype'] = 'textarea';
$modversion['config'][2]['valuetype'] = 'text';
$modversion['config'][2]['default'] = 'レッツPHPさんのTree BBSをパクリました';

$modversion['config'][3]['name'] = 'tree_template';
$modversion['config'][3]['title'] = '_TREE_TMP';
$modversion['config'][3]['description'] = '';
$modversion['config'][3]['formtype'] = 'textarea';
$modversion['config'][3]['valuetype'] = 'text';
$modversion['config'][3]['default'] = 'テンプレが必要ならここに記入。不要なら削除。';
