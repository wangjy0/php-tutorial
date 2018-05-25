<?php
$area = array(
    array('id'=>1,'area'=>'北京','pid'=>0),
    array('id'=>2,'area'=>'广西','pid'=>0),
    array('id'=>3,'area'=>'广东','pid'=>0),
    array('id'=>4,'area'=>'福建','pid'=>0),
    array('id'=>11,'area'=>'朝阳区','pid'=>1),
    array('id'=>12,'area'=>'海淀区','pid'=>1),
    array('id'=>21,'area'=>'南宁市','pid'=>2),
    array('id'=>45,'area'=>'福州市','pid'=>4),
    array('id'=>113,'area'=>'亚运村','pid'=>11),
    array('id'=>115,'area'=>'奥运村','pid'=>11),
    array('id'=>234,'area'=>'武鸣县','pid'=>21)
);

function t($arr,$pid=0,$lev=0){
    foreach($arr as $v){
        if($v['pid']==$pid){
            echo str_repeat(" ",$lev).$v['area'].PHP_EOL;
            t($arr,$v['id'],$lev+1);
        }
    }
}
t($area);

function list_to_tree($list, $pk = 'id', $pid = 'pid', $child = '_child', $root=0) {
    $tree = array();// 创建Tree
    if(is_array($list)) {
        // 创建基于主键的数组引用
        $refer = array();
        foreach ($list as $key => $data) {
            $refer[$data[$pk]] =& $list[$key];
        }

        foreach ($list as $key => $data) {
            // 判断是否存在parent
            $parentId = $data[$pid];
            if ($root == $parentId) {
                $tree[$data[$pk]] =& $list[$key];
            }else{
                if (isset($refer[$parentId])) {
                    $parent =& $refer[$parentId];
                    $parent[$child][] =& $list[$key];
                }
            }
        }
    }
    return $tree;
}

print_r(list_to_tree($area));