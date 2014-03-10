
<?php
include("config.inc.php");
include("./class/tb_files.class.php");
include("./class/tb_folder.class.php");


$rss = $tb_files->select_nofolder($CID);
$rss2 = $tb_folder->select($CID);


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
        <tr>
            <td colspan = "4">
                <a href = "index.php">返回</a>
            </td>
        </tr>
        <?php
        }else{
        ?>
        <form action = "multi_operators_act.php" method = "post">
            <thead>
                <th width="30%">建立文件夹:<br/><input type = "text" name = "cname" /><br/><input type = "submit" name="b1" value = "确定"/></th>
                <th width="30%">
                    添加文件:<br/>
                    <select name = "folder_id">
                       <option value = "-1">待选</option>
                       <?php 
                       foreach($rss2 as $rs){ ?>
                             <option value = "<?=$rs["cid"]?>"><?=$rs["cname"]?></option>
                       <? } ?>
                    </select>
                    <br/>
                    <input type = "submit" name="b2" value = "确定"/>
                </th>
                <th width="20%"></th>
                <th width="20%"></th>
            </thead>
            <thead>
                <th width="40%">文件名</th>
                <th width="20%">文件类型</th>
                <th width="20%">上传日期</th>
                <th width="20%">操作</th>
            </thead>
            <tr>
                <td colspan = "4">
                    <a href = "index.php">返回</a>
                </td>
            </tr>
            <?php 
            #echo issert($_GET["folder_id"]) . "asdsd";
                
                foreach ($rss2 as $rs) { ?>
                
                    <tr>
                        <td>
                            <a href = "./folder_file_list.php?folder_id=<?=$rs[cid]?>">
                                <img class = "IMG" src = "./imgs/Folder.JPG"/><br/>
                                <?=$rs["cname"]?>
                            </a>
                        </td>
                        <td>folder</td>
                        <td><?=$rs["cdate"]?></td>
                        <td><a href = "delete_folder_act.php?cid=<?=$rs[cid]?>">删除</a></td>
                    </tr>

                <?php
                }
                

                $i = 0;
                foreach ($rss as $rs) { 
                    ++$i;
                    $type_name = find_type($rs["ctype"]);
                    ?>
                    <tr>
                        <td>
                            <input type = "checkbox" name = "cb_<?=$i?>" value = "<?=$rs[cid]?>"/>
                            <a href = "./files/<?=$rs[cdir]."/".$rs[cguid_file_name]?>">
                                <img class = "IMG" src = "./imgs/<?=$type_name?>.png"/><br/>
                                <?=$rs["corg_file_name"]?>
                            </a>
                        </td>
                        <td><?=$type_name?></td>
                        <td><?=$rs["cdate"]?></td>
                        <td><a href = "delete_file_act.php?cid=<?=$rs[cid]?>">删除</a>
                        </td>
                    </tr>
                <?php }
            ?>

        <?php }?>
        </form>
    </table>
</body>
</html>