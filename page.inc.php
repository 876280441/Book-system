
<?php
/*数据分页函数的编写
	编写思路:
				分页函数帮我们做什么工作
				1.帮助我们完成select语句的limit部分
					select....limit  0,2；
				2.帮助我们设置好页码列表的HTML代码部分
*/
/*
调用   $page=page(100,10,5);//规定总页码数，按钮显示的数量等
echo $page['html'];
*/
function page($count,$page_size,$num_btm=10,$page='page'){
	if ($count==0){//当页面的帖子数小于1的时候，就是没有帖子的时候，就会执行这个语句，让输出的HTML语句为空，就是无输出
		$data=array(//把元素放在数组data中，在后面会返回data的值
		'limit'=>'',//赋值为空
		'html'=>''//赋值为空
		);
		return $data;
	}
	 //count是总页数，page是一页显示 的数量，$num_btm是要展示的页码按钮的数目，page是显示的后缀
	 //页码如果为空或者不为数字或者小于1，就默认给值1
	 if (!isset($_GET[$page])||!is_numeric($_GET[$page])||$_GET[$page]<1){
		 $_GET[$page]=1;
	 }
	 //总页数
	 $page_num_all=ceil($count/$page_size);
	 //由于可能有浮点数，所以，把数据向上取整
	 if ($_GET[$page]>$page_num_all){
		 //如果当前页面的总页码数大于真实的总页码数
		 $_GET[$page]=$page_num_all;
	 }
	 /*
	 limit应该怎么写
	 0  1   2--第一页   3   4   5--第二页   6   7   8--第三页   9   10....
	 比如每页显示3条
	 limit ($_GET[$page]-1)*$page_size,$page_size //第一页，page传入的是1   那么0*3就是0,就是0  2 $page_size 是一页显示的数量
	 limit ($_GET[$page]-1)*$page_size,$page_size   //第二页  page传入的是2   那么1*3就是3,3 5  $page_size 是一页显示的数量
	 */
	 $start=($_GET[$page]-1)*$page_size;
	 $limit="limit {$start},{$page_size}";
	 $current_url=$_SERVER['REQUEST_URI'];//访问当前页面的地址
	 $arr_current=parse_url($current_url);//将当前页面的url地址拆分到数组里面
	 $current_path=$arr_current['path'];//将拆分看的数据的一项保存到这个变量里面
	 $url='';//定义存放地址的变量
	 if (isset($arr_current['query'])){//判断$arr_current数组中索引为query的数据
		 parse_str($arr_current['query'],$arr_query);//把多个变量放到数组里面
		 unset($arr_current[$page]);//删除这个数组里面的$page这个数据
		 if (empty($arr_query)){//判断存到$arr_query中的数据是否为空时
			 $url="{$current_path}?{$page}";
		 }else{
			 $other=http_build_query($arr_query);// 生成 URL-encode 之后的请求字符串
			 $url="{$current_path}?{$other}&{$page}";//因为是多个连接了，所以在最后需要用&连接
		 }
	 }else{
		 $url="{$current_path}?{$page}";
	 }
	 $html=array();
	 if ($num_btm>=$page_num_all){
		 for($i=1;$i<=$page_num_all;$i++){//当要显示的按钮数量大于总页码数量时，就会执行这个条件
		 //$$page_num_all是限制按钮的数目，$i是按钮的页面号
			 if ($_GET[$page]==$i){
				 $html[$i]="<span>{$i}</span>";//在当前页面时，按钮就会显示span标签
			 }
			 else{
				 $html[$i]="<a href='$url={$i}'>{$i}</a>";//其他的就会显示a标签
			 }
		 }
	 }
	 else{
			 $num_left=floor(($num_btm-1)/2);//最左边的按钮编号
			 $start=$_GET[$page]-$num_left;//左边的按钮数量，知道左边的数量，就可以用当前的页码数-去最左边的号就等于基于中间的按钮计算在它左边有多少个按钮了
			 $end=$start+($num_btm-1);//最左边的页码数加上允许显示的按钮数就会得到最右边的按钮数
			 if($start<1){ //左边第一个按钮号已经是小于1的时候，就会强制让它等于1
				 $start=1;
			 }
			 if($end>$page_num_all){//最右边按钮数大于总页码数的时候，强制让它等于最大页码数
			 	$start=$page_num_all-($num_btm-1);
			 }
			 //这段代码是帮助我设置好页码列表的HTML代码部分
			 //根据传入函数的$num_btm参数来显示按钮数目
			 for ($i=0;$i<$num_btm;$i++){
				 if ($_GET[$page]==$start){
					 $html[$start]="<span>{$start}</span>";
				 }else{
					 $html[$start]="<a href='$url={$start}'>{$start}</a>";
				 }
				 $start++;
			 }
			 //如果按钮数目大于3的时候，就会显示出最左边的是1...   最右边的是页码的最大数   ...最大数
 			 if (count($html)>=3){
				 reset($html);//指向数组的第一个单元
				 $key_first=key($html);//返回当前数组的键名
				 end($html);//指向数组的最后一个单元
				 $key_end=key($html);//返回数组当前的键名
				 if ($key_first!=1){//最左边的按钮键名不等于1的时候
					 array_shift($html);
					 array_unshift($html,"<a href='$url=1'>1...</a>");
				 }
				 if ($key_end!=$page_num_all){//最右边的按钮键名不等于最大键名的时候
				 	 array_pop($html);
					 array_push($html,"<a href='$url={$page_num_all}'>...{$page_num_all}</a>");
				 }
			 }
		 }
		 if($_GET[$page]!=1){//当前页面的页码不等于1的时候，机会显示上一页
			 $prev=$_GET[$page]-1;
			 array_unshift($html,"<a href='$url={$prev}'>« 上一页</a>");
		 }
		 if($_GET[$page]!=$page_num_all){//当前页面的页码不等于页码的最大数的话，机会显示下一页
			 $next=$_GET[$page]+1;
			 array_push($html,"<a href='$url={$next}'>下一页 »</a>");
		 }
		 $html=implode(' ',$html);//把数组用字符串连接起来，这里用的是空格连接
	 $data=array(//把元素放在数组data中，在后面会返回data的值
	 'limit'=>$limit,
	 'html'=>$html
	 );
	 return $data;
 }
 ?>