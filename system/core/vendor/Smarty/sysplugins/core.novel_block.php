<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * 内部函数
 * 获取小说排行信息
 * @param array $params
 * @return array
 */
function _fw_get_book_menu_list($params)
{
    if (!Yii::app()->hasModule("book")) {
        return array();
    }

//    return array();

    Yii::import("book.models.*");

    $sql = "select * from category where status=1 and isnav=1 order by sort desc";

//    if (isset($params['cid']) && is_array($params['cid'])) {
//        $cid = $params['cid'];
//
//        $where .= ' and cid in(' . implode(',' , $cid) . ")";
//
//    }

//    if (isset($params['id']) && is_array($params['id'])) {
//
//        $sql .= ' and id in(' . implode(',' , $params['id']) . ")";
//    }


//    if (isset($params['recommend']) && is_array($params['recommend'])) {
//        $recommendLevel = $params['recommend'];
//
//        $sql .= ' and recommendlevel in(' . implode(',' , $recommendLevel) . ")";
//    }
//
//    if (isset($params['where'])) {
//        $where = $params['where'];
//
//        $where = trim($where, "'");
//        $sql .= " and " . $where;
//    }


//    if (isset($params['order'])) {
//        $order = $params['order'];
//        $order =  trim($order, "'");
//    } else {
//        $order = 'createtime desc';
//    }
//
//    $sql .=  " order by sort desc";

//    if (isset($params['limit'])) {
//        $limit = intval($params['limit']);
//    } else {
//        $limit = 10;
//    }

//    $sql .= " limit " . $limit;
    $db = Yii::app()->db;

    $cmd = $db->createCommand($sql);

    $list = $cmd->queryAll();

    $newList = array();

//    $bookIdList = array();
//    $cidList = array();
    foreach ($list as $v) {
//        $bookIdList[] = $v['id'];
//        $cidList[] = $v['cid'];
        $v = (Object)$v;
        $newList[] = $v;
    }

    unset($list);

//    // 查询封面图
//    $imageMap = array();
//    if (!empty($bookIdList)) {
//        $sql = 'select bookid, imgurl from book_image where iscover=1 and bookid in(' . implode(',' , $bookIdList) . ")";
//        $cmd = $db->createCommand($sql);
//        $imageList = $cmd->queryAll();
//
//        //
//        foreach ($imageList as $v) {
//            $imageMap[$v['bookid']] = $v['imgurl'];
//        }
//    }
//
//    // 查询分类
//    $categoryMap = array();
//    if (!empty($cidList)) {
//        $sql = 'select * from category where id in(' . implode(',' , $cidList) . ")";
//        $cmd = $db->createCommand($sql);
//        $imageList = $cmd->queryAll();
//
//        foreach ($imageList as $v) {
//            $v['url'] = Yii::app()->createUrl('book/list/index', array('title' => $v['shorttitle']));
//            $categoryMap[$v['id']] = (Object)$v;
//        }
//    }

    foreach ($newList as $k => $v) {
//        $v->coverImageUrl = H::getStaticAbsoluteUrl($imageMap[$v->id], false);
//        $v->category = $categoryMap[$v->cid]
        $v->url =  Yii::app()->createUrl('book/list/index', array('title' => $v->shorttitle));
    }

//    var_dump($newList);

    return $newList;
}

/**
 * 内部函数
 * 获取小说信息
 * @param array $params
 * @return array
 */
function _fw_get_book_list($params)
{
    if (!Yii::app()->hasModule("book")) {
        return array();
    }

//    return array();

    Yii::import("book.models.*");

    $sql = "select * from book where status=1 ";

    if (isset($params['cid']) && is_array($params['cid'])) {
        $cid = $params['cid'];

        $sql .= ' and cid in(' . implode(',' , $cid) . ")";

    } elseif (isset($params['cid'])) {
        $cid = explode(",", $params['cid']);
        $sql .= ' and cid in(' . implode(',' , $cid) . ")";
    }

    if (isset($params['id']) && is_array($params['id'])) {

        $sql .= ' and id in(' . implode(',' , $params['id']) . ")";
    } elseif (isset($params['id'])) {
        $id = explode(",", $params['id']);
        $sql .= ' and id in(' . implode(',' , $id) . ")";
    }


    if (isset($params['recommend']) && is_array($params['recommend'])) {
        $recommendLevel = $params['recommend'];

        $sql .= ' and recommendlevel in(' . implode(',' , $recommendLevel) . ")";
    } elseif (isset($params['recommend'])) {
        $recommend = explode(",", $params['recommend']);
        $sql .= ' and recommendlevel in(' . implode(',' , $recommend) . ")";
    }

    if (isset($params['where'])) {
        $where = $params['where'];

        $where = trim($where, "'");
        $sql .= " and " . $where;
    }


    if (isset($params['order'])) {
        $order = $params['order'];
        $order =  trim($order, "'");
    } else {
        $order = 'createtime desc';
    }

    $sql .=  " order by " . $order;

    if (isset($params['limit'])) {
        $limit = intval($params['limit']);
    } else {
        $limit = 10;
    }

    $sql .= " limit " . $limit;
    $db = Yii::app()->db;

    $cmd = $db->createCommand($sql);

    $list = $cmd->queryAll();

    $newList = array();

    $bookIdList = array();
    $cidList = array();
    foreach ($list as $v) {
        $bookIdList[] = $v['id'];
        $cidList[] = $v['cid'];
        $v = (Object)$v;
        $newList[] = $v;
    }

    unset($list);

    // 查询封面图
    $imageMap = array();
    if (!empty($bookIdList)) {
        $sql = 'select bookid, imgurl from book_image where iscover=1 and bookid in(' . implode(',' , $bookIdList) . ")";
        $cmd = $db->createCommand($sql);
        $imageList = $cmd->queryAll();

        //
        foreach ($imageList as $v) {
            $imageMap[$v['bookid']] = $v['imgurl'];
        }
    }

    // 查询分类
    $categoryMap = array();
    if (!empty($cidList)) {
        $sql = 'select * from category where id in(' . implode(',' , $cidList) . ")";
        $cmd = $db->createCommand($sql);
        $catList = $cmd->queryAll();

        foreach ($catList as $v) {
            $v['url'] = Yii::app()->createUrl('book/list/index', array('title' => $v['shorttitle']));
            $categoryMap[$v['id']] = (Object)$v;
        }
    }

    $defaultImageUrl = Yii::app()->theme->baseUrl . "/images/nocover.jpg";

    foreach ($newList as $k => $v) {
        $v->coverImageUrl = isset($imageMap[$v->id]) ? H::getStaticAbsoluteUrl( $imageMap[$v->id] , false) : $defaultImageUrl;
        $v->category = $categoryMap[$v->cid];
        $v->url =  Yii::app()->createUrl('book/detail/index', array('id' => $v->id));
    }

//    var_dump($newList);

    return $newList;
}

/**
 * 内部函数
 * 获取小说信息
 * @param array $params
 * @return array
 */
function _fw_get_book_category_list($params)
{
    if (!Yii::app()->hasModule("book")) {
        return array();
    }

//    return array();

    Yii::import("book.models.*");

    $sql = "select * from category where status=1 ";

//    if (isset($params['cid']) && is_array($params['cid'])) {
//        $cid = $params['cid'];
//
//        $where .= ' and cid in(' . implode(',' , $cid) . ")";
//
//    }

    if (isset($params['id']) && is_array($params['id'])) {

        $sql .= ' and id in(' . implode(',' , $params['id']) . ")";
    }  elseif (isset($params['id'])) {
        $id = explode(",", $params['id']);
        $sql .= ' and id in(' . implode(',' , $id) . ")";
    }


//    if (isset($params['recommend']) && is_array($params['recommend'])) {
//        $recommendLevel = $params['recommend'];
//
//        $sql .= ' and recommendlevel in(' . implode(',' , $recommendLevel) . ")";
//    }
//
//    if (isset($params['where'])) {
//        $where = $params['where'];
//
//        $where = trim($where, "'");
//        $sql .= " and " . $where;
//    }


//    if (isset($params['order'])) {
//        $order = $params['order'];
//        $order =  trim($order, "'");
//    } else {
//        $order = 'createtime desc';
//    }
//
//    $sql .=  " order by sort desc";

    if (isset($params['limit'])) {
        $limit = intval($params['limit']);
    } else {
        $limit = 10;
    }

    $sql .= " limit " . $limit;
    $db = Yii::app()->db;

    $cmd = $db->createCommand($sql);

    $list = $cmd->queryAll();

    $newList = array();

//    $bookIdList = array();
//    $cidList = array();
    foreach ($list as $v) {
//        $bookIdList[] = $v['id'];
//        $cidList[] = $v['cid'];
        $v = (Object)$v;
        $newList[] = $v;
    }

    unset($list);

//    // 查询封面图
//    $imageMap = array();
//    if (!empty($bookIdList)) {
//        $sql = 'select bookid, imgurl from book_image where iscover=1 and bookid in(' . implode(',' , $bookIdList) . ")";
//        $cmd = $db->createCommand($sql);
//        $imageList = $cmd->queryAll();
//
//        //
//        foreach ($imageList as $v) {
//            $imageMap[$v['bookid']] = $v['imgurl'];
//        }
//    }
//
//    // 查询分类
//    $categoryMap = array();
//    if (!empty($cidList)) {
//        $sql = 'select * from category where id in(' . implode(',' , $cidList) . ")";
//        $cmd = $db->createCommand($sql);
//        $imageList = $cmd->queryAll();
//
//        foreach ($imageList as $v) {
//            $v['url'] = Yii::app()->createUrl('book/list/index', array('title' => $v['shorttitle']));
//            $categoryMap[$v['id']] = (Object)$v;
//        }
//    }

    foreach ($newList as $k => $v) {
//        $v->coverImageUrl = H::getStaticAbsoluteUrl($imageMap[$v->id], false);
//        $v->category = $categoryMap[$v->cid]
        $v->url =  Yii::app()->createUrl('book/list/index', array('title' => $v->shorttitle));
    }

//    var_dump($newList);

    return $newList;
}


/**
 * 内部函数
 * 获取小说排行信息
 * @param array $params
 * @return array
 */
function _fw_get_book_rank_list($params)
{
    if (!Yii::app()->hasModule("book")) {
        return array();
    }

//    return array();

    Yii::import("book.models.*");

    $sql = "select * from book where status=1 ";

    if (isset($params['cid']) && is_array($params['cid'])) {
        $cid = $params['cid'];

        $sql .= ' and cid in(' . implode(',' , $cid) . ")";

    } elseif (isset($params['cid'])) {
        $cid = explode(",", $params['cid']);
        $sql .= ' and cid in(' . implode(',' , $cid) . ")";
    }

    if (isset($params['id']) && is_array($params['id'])) {

        $sql .= ' and id in(' . implode(',' , $params['id']) . ")";
    } elseif (isset($params['id'])) {
        $id = explode(",", $params['id']);
        $sql .= ' and id in(' . implode(',' , $id) . ")";
    }


    if (isset($params['recommend']) && is_array($params['recommend'])) {
        $recommendLevel = $params['recommend'];

        $sql .= ' and recommendlevel in(' . implode(',' , $recommendLevel) . ")";
    } elseif (isset($params['recommend'])) {
        $recommend = explode(",", $params['recommend']);
        $sql .= ' and recommendlevel in(' . implode(',' , $recommend) . ")";
    }

    if (isset($params['where'])) {
        $where = $params['where'];

        $where = trim($where, "'");
        $sql .= " and " . $where;
    }


//    if (isset($params['order'])) {
//        $order = $params['order'];
//        $order =  trim($order, "'");
//    } else {
//        $order = 'createtime desc';
//    }
//
//    $sql .=  " order by " . $order;

    $type = "click";
    $sort = "all";

    if (isset($params['type']) && is_string($params['type'])) {
        $type = $params['type'];
        $sort = trim($sort, "'");
    }

    if (isset($params['order']) && is_string($params['order'])) {
        $sort = $params['order'];
        $sort = trim($sort, "'");
    }

    $field = "";

    switch ($type) {
        case 'click':
            $field = $sort . "clicks";
            break;
    }


    $allowFields = array(
        'monthclicks',
        'weekclicks',
        'dayclicks',
        'allclicks',
    );
//var_dump($field);
    if (!in_array($field, $allowFields)) return array();

    $sql .= ' order by ' . $field;

    if (isset($params['limit'])) {
        $limit = intval($params['limit']);
    } else {
        $limit = 10;
    }

    $sql .= " limit " . $limit;
    $db = Yii::app()->db;

    $cmd = $db->createCommand($sql);

    $list = $cmd->queryAll();

    $newList = array();

    $bookIdList = array();
    $cidList = array();
    foreach ($list as $v) {
        $bookIdList[] = $v['id'];
        $cidList[] = $v['cid'];
        $v = (Object)$v;
        $newList[] = $v;
    }

    unset($list);

    // 查询封面图
    $imageMap = array();
    if (!empty($bookIdList)) {
        $sql = 'select bookid, imgurl from book_image where iscover=1 and bookid in(' . implode(',' , $bookIdList) . ")";
        $cmd = $db->createCommand($sql);
        $imageList = $cmd->queryAll();

        //
        foreach ($imageList as $v) {
            $imageMap[$v['bookid']] = $v['imgurl'];
        }
    }

    // 查询分类
    $categoryMap = array();
    if (!empty($cidList)) {
        $sql = 'select * from category where id in(' . implode(',' , $cidList) . ")";
        $cmd = $db->createCommand($sql);
        $imageList = $cmd->queryAll();

        foreach ($imageList as $v) {
            $v['url'] = Yii::app()->createUrl('book/list/index', array('title' => $v['shorttitle']));
            $categoryMap[$v['id']] = (Object)$v;
        }
    }

    $defaultImageUrl = Yii::app()->theme->baseUrl . "/images/nocover.jpg";
    foreach ($newList as $k => $v) {
        $v->coverImageUrl = isset($imageMap[$v->id]) ? H::getStaticAbsoluteUrl( $imageMap[$v->id] , false) : $defaultImageUrl;
        $v->category = $categoryMap[$v->cid];
        $v->url =  Yii::app()->createUrl('book/detail/index', array('id' => $v->id));
    }

//    var_dump($newList);

    return $newList;
}


/**
 * 内部函数
 * 获取公告信息
 * @param array $params
 * @return array
 */
function _fw_get_book_notice_list($params)
{
    if (!Yii::app()->hasModule("notice")) {
        return array();
    }

    Yii::import("notice.models.*");

    if (isset($params['limit'])) {
        $limit = intval($params['limit']);
    } else {
        $limit = 10;
    }

    $sql = "select * from notice where status=1 order by id desc limit " . $limit ;

    $db = Yii::app()->db;

    $cmd = $db->createCommand($sql);

    $list = $cmd->queryAll();

    $newList = array();

    foreach ($list as $v) {
        $v = (Object)$v;
        $newList[] = $v;
    }

    unset($list);

    foreach ($newList as $k => $v) {
        $v->url =  Yii::app()->createUrl('notice/detail/index', array('id' => $v->id));
    }

    return $newList;
}

/**
 * 内部函数
 * 获取友情链接信息
 * @param array $params
 * @return array
 */
function _fw_get_book_friendlink_list($params)
{
    if (!Yii::app()->hasModule("friendlink")) {
        return array();
    }

    Yii::import("friendlink.models.*");

    if (isset($params['limit'])) {
        $limit = intval($params['limit']);
    } else {
        $limit = 100;
    }

    $sql = "select * from friendlink where status=1 order by sequence desc limit " . $limit ;

    $db = Yii::app()->db;

    $cmd = $db->createCommand($sql);

    $list = $cmd->queryAll();

    $newList = array();

    foreach ($list as $v) {
        $v = (Object)$v;
        $newList[] = $v;
    }

    unset($list);

//    foreach ($newList as $k => $v) {
//        $v->url =  Yii::app()->createUrl('notice/detail/index', array('id' => $v->id));
//    }

    return $newList;
}
?>