<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>元宝统计</title>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="http://lib.sinaapp.com/js/jquery-ui/1.9.2/themes/smoothness/jquery-ui.css" />
    <script type="text/javascript" src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://lib.sinaapp.com/js/jquery-ui/1.9.2/jquery-ui.js"></script>
    <script type="text/javascript" src="Public/Home/Js/global.js"></script>
</head>
<body>
<div class="panel panel-danger" style="margin:50px auto;min-width:1000px;width:90%;">
    <form method="post" action="<?php echo U('Home/Cost/gift');?>">
    <div class="panel-heading">
        <label>元宝统计:</label>&nbsp;&nbsp;
        <label>区服:</label>
        <?php echo ($server_html); ?>
        <label>角色ID:</label><input class="form-control" type="text" name="characterid" value="<?php echo ($characterid); ?>" style="width:150px;display:inline;"/>
        <label>账户:</label><input class="form-control" type="text" name="account" value="<?php echo ($account); ?>" style="width:150px;display:inline;"/>
        <label>类型:</label><select name="type"><option value="0" <?php if(($type) == "0"): ?>selected<?php endif; ?>>获得</option><option value="1" <?php if(($type) == "1"): ?>selected<?php endif; ?>>消耗</option></select>
        <label for="date">开始日期:</label>
        <input class="datepicker" type="input" id="start_date" name="start_date" value="<?php echo ($start_date); ?>" />&nbsp;
        <label for="date">结束日期:</label>
        <input class="datepicker" type="input" id="end_date" name="end_date" value="<?php echo ($end_date); ?>" />&nbsp;
        <input type="submit" value="查询"/>
    </div>
    </form>
    <div class="panel-body">
        <?php if(($show) == "user"): ?><label>总数:<?php echo ($total); ?></label>
        <table class="table table-bordered" style="text-align:center;vertical-align:middle;">
            <thead>
            <tr align="center">
                <td id="col1">角色id</td>
                <td id="col2">账户</td>
                <td>操作时间</td>
                <td>用户等级</td>
                <td>数值</td>
                <td>获取类型</td>
                <td>操作类型</td>
            </tr>
            </thead>
            <tbody>
                <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($vo["characterid"]); ?></td>
                    <td><?php echo ($vo["account"]); ?></td>
                    <td><?php echo ($vo["time"]); ?></td>
                    <td><?php echo ($vo["userLev"]); ?></td>
                    <td><?php echo ($vo["num"]); ?></td>
                    <td><?php echo ($vo["useORget_label"]); ?></td>
                    <td><?php echo ($vo["actionType_label"]); ?>-<?php echo ($vo["actionType"]); ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table><?php endif; ?>
        <?php if(($show) == "all"): ?><table class="table table-bordered" style="text-align:center;vertical-align:middle;">
            <thead>
            <tr align="center">
                <td id="col1">操作类型</td>
                <td>实际数值</td>
                <td id="col2">百分比</td>
                <td>操作记录次数</td>
                <td>获取类型</td>
            </tr>
            </thead>
            <tbody>
                <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($vo["actionType_label"]); ?>-<?php echo ($vo["actionType"]); ?></td>
                    <td><?php echo ($vo["num"]); ?></td>
                    <td><?php echo ($vo["rate"]); ?></td>
                    <td><?php echo ($vo["action_num"]); ?></td>
                    <td><?php echo ($vo["useORget_label"]); ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table><?php endif; ?>
    </div>
    
</div>
</body>
</html>