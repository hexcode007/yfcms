<?php
class Page{
    /**
     * 分页
     * @param int   $pageCount  数据总量
     * @param int   $Page       当前页码
     * @param int   $pageSize   页面最大显示长度，默认为20
     * @param bool  $lastPage   是否开启显示最后一页 默认不显示
     * @return string
     */
    public static function creat($pageCount, $pageSize = 20,$type=1){
        $oURL = "";
        $pageCount = intval($pageCount);
        $pageSize = intval($pageSize);
        //当前页码
        $page = (isset($_REQUEST['page']) && $_REQUEST['page'] > 0) ? intval($_REQUEST['page']) : 1;
        //每页显示分页数字个数
        $pageCut = 9;
        //总页数
        $pages = $pageCount % $pageSize == 0 ? intval($pageCount/$pageSize) : intval($pageCount/$pageSize) + 1;
        $page = $page > $pages ? $pages : $page;
        //特殊情况 分页代码
        if ($pageCount == 0) {
            return '';
        }
        if($pages<2){
            return '<div class="numsrow clearfix mt30">  <p class=" my_left "> 共有 <strong class=" font_orange "> '.$pageCount.'  </strong>条记录  </p></div>';
        }
        if($pages <= $pageCut){
            $pageFrom =1;
            $pageTo = $pages;
        }else{
            $pageFrom = $page <= intval($pageCut/2)  ?  1 : ($page - intval($pageCut/2));
            $pageTo = $pageCut+$pageFrom-1;
            if($pageTo > $pages){
                $pageTo = $pages;
                $pageFrom = $pageTo - $pageCut + 1;
            }
        }
        

       //print_r($_REQUEST);
        foreach ($_REQUEST as $key=>$value){
            if ($key == "page") {
                continue;
            }
            if ($key=="_url" || empty($value) ) {
                unset($_REQUEST[$key]);
                continue;
            }
           $oURL .= "&amp;".$key."=".$value;
           // $oURL .= "&amp;".$key."=".Util::utf8Togbk($value);
        }
 
        //输出上翻页
        $sHTML = "";
        //$sHTML  ='<div class="numsrow clearfix mt30">  <p class=" my_left "> 共有 <strong class=" font_orange "> '.$pageCount.'  </strong>条记录  </p>';
        $sHTML  ='<div class="numsrow clearfix mt30">';
        $sHTML .= '<div class="pages_nav my_right">';
        $sHTML .= $page<2 ? '<a class="pre disable" href="#"><em></em>上一页</a>' : '<a href="'.self::getPageUrl($page-1,$type).'"><span class="pre"><em></em>上一页</span></a>';
        if($pageFrom>1){
            $sHTML .=  '<a href="'.self::getPageUrl(1,$type).'" class="num" >1</a>...';
            $pageFrom++;
        }
        if($pageTo<$pages){
            $pageTo--;
        }
        
        for ($i = $pageFrom; $i <= $pageTo; $i++){
            $sHTML .= $page == $i ? '<a class="num now">'.$i.'</a>' : '<a href="'.self::getPageUrl($i,$type).'" class="num" >'.$i.'</a>';
        }
        
        if($pageTo<$pages){
            $sHTML .=  '...<a href="?page='.$pages.$oURL.'" class="num" >'.$pages.'</a>';
        }
        //输出后翻页
        $sHTML .= $page==$pages ? '<a class="next disable" href="#"><em></em>下一页</a>' : '<a class="next" href="'.self::getPageUrl($page+1,$type).'"><em></em>下一页</a>';
        $sHTML .= "</div></div>";
        return $sHTML;
    }

    private static function getPageUrl($page,$type){
        if($type == 1){
            $uri = Router::getDefaultUri();
            if(preg_match('/\/p([0-9]+)/', $uri)){
                $uri = preg_replace('/\/p([0-9]+)/', "/p{$page}", $uri);
            }else{
                $uri = rtrim($uri,'/')."/p{$page}";
            }
            return '/'.$uri;
        }
        
    }
}
