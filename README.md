## 极验geetest
thinkphp5.x可用的极验扩展

## 安装
> composer require yfcmf/geetest

##使用
###参数配置
在配置文件config里配置geetest配置，需要到官网申请

~~~
//举例
'geetest'=> [
       'captcha_id' =>'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
       'private_key'=>'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
    ],
~~~

###模板里的调用

~~~
<!-- 引入js库 -->
<script src="http://code.jquery.com/jquery-1.12.3.min.js"></script>
<script src="http://static.geetest.com/static/tools/gt.js"></script>

<script>
var handler = function (captchaObj) {
    captchaObj.appendTo("#captcha");
    captchaObj.onSuccess(function () {
        //验证成功执行
     });
    captchaObj.onReady(function () {
        //加载完毕执行
    });
};
$.ajax({
   url: "{:geetest_url()}?t=" + (new Date()).getTime(),
   type: "get",
   dataType: "json",
   success: function (data) {
   initGeetest({
        gt: data.gt,
        challenge: data.challenge,
        product: "float", 
        offline: !data.success 
      }, handler);
   }
});
</script>
~~~
### 控制器里验证
~~~
//需要传入$_POST请求的数据
if(!geetest_check($post)){
 //验证失败
};
~~~