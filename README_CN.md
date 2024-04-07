<div align="center">

# WordPress custom media path

## 介绍：

这是一个WordPress内容管理系统插件, 

通过此插件可以自定义图片上传的目录和名称，

WordPress默认的存储路径是 wp-content/uploads/year/month,

这样的结构，会导致一个月份内上传的文件都存储在一个目录下面，

当每张图片又裁切为几张不同宽高的副本时，

会导致文件检索和列表等操作变慢，

管理和备份以起来也不太方便，

这个插件安装后会，文件会按 年/月/日 的结构存储，

即在月份目录下面多添加了一层日期目录。

另外，文件名称被设置为固定长度，

并由字符集[a-z][0-9]中的字符随机组合而成，

是为了规避因文件名包含特殊字符导致的潜在问题。

</div>

## 开源协议

[MIT](https://opensource.org/license/mit/)
