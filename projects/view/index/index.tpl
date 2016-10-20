<div>
   <form action="">
   搜索：<input type="text" > &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="搜索" />
   </form>
   <hr />
   <p>品牌： <a href="#" style="color:red;">全部</a>&nbsp;<a href="#">诺基亚</a>&nbsp;<a href="#">三星</a>&nbsp;<a href="#">苹果</a>&nbsp;</p>
   <p>分类： <a href="#" style="color:red;">全部</a>&nbsp;<a href="#">智能手机</a>&nbsp;<a href="#">平板手机</a>&nbsp;<a href="#">山寨机</a>&nbsp;</p>
   <hr />
</div>
<div>
{section name=sn loop=$list}
商品名称：{$list[sn].goods_name} <br />
{/section}
</div>
<div>
{$page}
</div>