
<?php
include("config.inc.php");
include("./class/tb_files.class.php");
include("./class/tb_folder.class.php");

check_get("folder_id", "没有选中文件夹");
$rss = $tb_files->select_byfolder($_GET["folder_id"]);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" charset="utf-8" content="text/html" />
    <title>文件管理系统</title>
    <link rel="stylesheet" type="text/css" href="table.css" />
    <style>
        .IMG{
            width:  50px;
            height: 50px;
        }
    </style>
</head>

<body>
<div class="title">
    <h1>文件管理系统</h1>
</div>
    <table width="90%" id="mytab"  border="1" class="tab_css_1">
        <?php 
        if (sizeof($rss) + sizeof($rss2) == 0){

        ?>
        <thead>
            <th width="100%">你没有任何文件!</th>
        </thead>
        <?php
        }else{
        ?>
        <form action = "multi_operators_act.php" method = "post">
            <thead>
                <th width="40%">文件名</th>
                <th width="20%">文件类型</th>
                <th width="20%">上传日期</th>
                <th width="20%">操作</th>
            </thead>


                <tr>
                    <td colspan = "4">
                        <a href = "file_list.php">返回</a>
                    </td>
                </tr>

                <?php 
                $i = 0;
                foreach ($rss as $rs) { 
                    $type_name = find_type($rs["ctype"]);
                    ?>
                    <tr>
                        <td>
                            <a href = "./files/<?=$rs[cdir]."/".$rs[cguid_file_name]?>">
                                <img class = "IMG" src = "./imgs/<?=$type_name?>.png"/><br/>
                                <?=$rs["corg_file_name"]?>
                            </a>
                        </td>
                        <td><?=$type_name?></td>
                        <td><?=$rs["cdate"]?></td>
                        <td><a href = "delete_file_act.php?cid=<?=$rs[cid]?>">删除</a>
                            <a href = "remove_from_folder_act.php?cid=<?=$rs[cid]?>">移出文件夹</a>
                        </td>
                    </tr>
                <?php }
            ?>

        <?php }?>
        </form>
    </table>
</body>
</html>