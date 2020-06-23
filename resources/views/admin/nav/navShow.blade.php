<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>广告-有点</title>
<link rel="stylesheet" type="text/css" href="/admin/css/css.css" />
<script type="text/javascript" src="/admin/js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="/admin/js/page.js" ></script> -->
<style>
     ul li{
         list-style: none;
         float: left;
         margin-left: 20px;
     }
</style>
</head>

<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">导航管理</a>&nbsp;-</span>&nbsp;导航展示
			</div>
		</div>
		<div class="page">
			<!-- banner页面样式 -->
			<!-- <div class="banner">
				<div class="add">
					<a class="addA" href="banneradd.html">上传广告&nbsp;&nbsp;+</a>
				</div> -->
				<!-- banner 表格 显示 -->
				<div class="banShow">
					<table border="1" cellspacing="0" cellpadding="0">

						<tr>
							<td width="66px" class="tdColor tdC">序号</td>
							<td width="308px" class="tdColor">名称</td>
							<td width="450px" class="tdColor">链接</td>
							<td width="215px" class="tdColor">是否显示</td>
							<td width="180px" class="tdColor">排序</td>
							<td width="125px" class="tdColor">操作</td>
						</tr>
                        @foreach($Info as $k=>$v)
						<tr>
							<td>{{$v->id}}</td>

							<td>{{$v->name}}</td>
							<td><a class="bsA" href="{{$v->url}}">{{$v->url}}</a></td>
							<td>
                                @if($v->hidden==1)
                                   是
                                  @else
                                  否
                                  @endif
                            </td>
							<td>{{$v->sorts}}</td>
							<td>
                                <a href="/update/{{$v->id}}" class="upd"  data-id="{{$v->id}}"><img class="operation" src="/admin/img/update.png"></a>
                                    <img class="operation delban" src="/admin/img/delete.png" data-id="{{$v->id}}">
                           </td>
						</tr>
                         @endforeach
					</table>
					<div class="paging">{{$Info->links()}}</div>
				</div>
				<!-- banner 表格 显示 end-->
			</div>
			<!-- banner页面样式end -->
		</div>

	</div>


	<!-- 删除弹出框 -->
	<div class="banDel">
		<div class="delete">
			<div class="close">
				<a><img src="/admin/img/shanchu.png" /></a>
			</div>
			<p class="delP1">你确定要删除此条记录吗？</p>
			<p class="delP2">
				<a href="#" class="ok yes" >确定</a><a class="ok no">取消</a>
			</p>
		</div>
	</div>
	<!-- 删除弹出框  end-->
</body>

 <script type="text/javascript">
// // 广告弹出框
// $(".delban").click(function(){
//   $(".banDel").show();
// });
// $(".close").click(function(){
//   $(".banDel").hide();
// });
// $(".no").click(function(){
//   $(".banDel").hide();
// });
// 广告弹出框 end

function del(){
    var input=document.getElementsByName("check[]");
    for(var i=input.length-1; i>=0;i--){
       if(input[i].checked==true){
           //获取td节点
           var td=input[i].parentNode;
          //获取tr节点
          var tr=td.parentNode;
          //获取table
          var table=tr.parentNode;
          //移除子节点
          table.removeChild(tr);
        }
    }
}
</script>
</html>

<script>
      $(document).ready(function(){
            $(".delban").click(function(){

                    $(".banDel").show();

            })
            $(".yes").click(function(){
                 var id=$(".delban").data("id");
                 var url='/del';
                 var data={};
                 data.id=id;
                 $.ajax({
                     url:url,
                     type:'post',
                     data:data,
                     dataType:'json',
                     success:function(reg){
                         if(reg.code=='00000'){
                              $(".banDel").hide();
                              window.location.reload()
                         }
                         if(reg.code=='00001'){
                             alert(reg.message);
                         }
                     }

                 })
                 //console.log(id);
            })
            $(".no").click(function(){
                $(".banDel").hide();
                window.location.reload()
            })

            // $(".upd").click(function(){
            //         var id=$(this).data("id");
            //         //console.log(id);
            //         var url='/update';
            //         var data={};
            //         data.id=id;
            //         $.ajax({
            //             url:url,
            //             type:'post',
            //             data:data,
            //             dataType:'json',
            //             success:function(reg){
            //                 console.log(reg);
            //             }

            //         })
            // })
      })
</script>
