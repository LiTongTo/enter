<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>头部-有点</title>
<link rel="stylesheet" type="text/css" href="/admin/css/css.css" />
<script type="text/javascript" src="/admin/js/jquery.min.js"></script>
</head>
<body>

	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">导航管理</a>&nbsp;-</span>&nbsp;导航添加
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTop">
					<span>导航栏</span>
				</div>
				<div class="baBody">
					<div class="bbD">
						导航名称：<input type="text" class="input1" name="name" />
					</div>
					<div class="bbD">
						链接地址：<input type="text" class="input1" name="url" />
					</div>

					<div class="bbD">
						是否显示：
                        <label> <input type="radio" checked="checked"value="1" name="hidden" />是</label>
                        <label> <input type="radio"value="2" name="hidden" />否</label>
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;排序：<input class="input2"
							type="text" name="sorts" />
					</div>
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes" href="#" name="btn">提交</button>
							<a class="btn_ok btn_no" href="#">取消</a>
						</p>
					</div>
				</div>
			</div>

			<!-- 上传广告页面样式end -->
		</div>
	</div>
</body>
</html>

<script>
     $(document).ready(function(){
          $("button[name='btn']").click(function(){
               var data={};
               data.name=$("input[name='name']").val();
               data.url=$("input[name='url']").val();
               data.sorts=$("input[name='sorts']").val();
               data.hidden=$("input[name='hidden']").val();

               var url="addDo"
               $.ajax({
                    type:'post',
                    url:url,
                    data:data,
                    dataType:'json',
                    success:function(reg){
                        if(reg.code==00000){
                             alert(reg.message);
                             // location.href="/addShow";
                        }
                        if(reg.code==00001){
                             alert(reg.message);
                             return false;
                        }
                    }
               });
          })
     })
</script>
