<!DOCTYPE html>
<html lang="zh-cn">
  
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>寒曦朦图床</title>
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta itemprop="name" content="寒曦朦图床" />
    <meta itemprop="image" content="https://q1.qlogo.cn/g?b=qq&nk=1017959770&s=640" />
    <meta name="description" itemprop="description" content="一个十分简洁的图床！" />
    <meta name="keywords" content="API,API调用,一言,Hitokoto,图床,免费图床,新浪图床,寒曦朦,寒曦朦API,寒曦朦图床" />
    <link rel="shortcut icon" href="https://q1.qlogo.cn/g?b=qq&nk=1017959770&s=640" type="image/x-icon" />
    <!-- zui -->
    <link href="https://lib.baomitu.com/zui/1.9.1/css/zui.min.css" rel="stylesheet"></head>
  
  <body>
    <br>
    <br>
    <div class="container">
      <div class="panel load-indicator" data-loading="正在加载..." id="loading">
        <div class="panel-body">
          <form id="uploadForm" enctype='multipart/form-data'>
            <input type="file" id="files" name="file" /></form>
          <br>
          <button class="btn btn-primary" id="submit" onclick="loading()">提交</button>
          <div id="preview"></div>
        </div>
      </div>
    </div>
    <!-- jQuery (ZUI中的Javascript组件依赖于jQuery) -->
    <script src="https://lib.baomitu.com/jquery/3.4.0/jquery.min.js" type="text/javascript"></script>
    <!-- ZUI Javascript组件 -->
    <script src="https://lib.baomitu.com/zui/1.9.1/js/zui.min.js"></script>
    <script>
      function loading() {
        $('#loading').toggleClass('loading');
      };
      $("#submit").click(function() {
        $.ajax({
          url: "https://api.hanximeng.com/tu/",
          method: "post",
          cache: false,
          data: new FormData($('#uploadForm')[0]),
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(result) {
            if (result.code == 0) {
              $('#preview').append('<br><br><img class="img-thumbnail" src="' + result.imgurl + '" width="100%"><br><br><pre>' + result.imgurl + '</pre>');
              loading();
            } else {
              new $.zui.Messager(result.msg + '，请更换图片或重试！', {
                icon: 'exclamation-sign',
                placement: 'center',
                type: 'danger'
              }).show();
              loading();
            }
          },
        });
      })
  	</script>
  </body>

</html>