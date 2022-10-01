# [中国文字](https://chinese-characters.ourorangenet.com/pages/fangyan/index.php)

一个中国文字网站。

[“中国文字”网站](https://chinese-characters.ourorangenet.com/pages/fangyan/index.php)

# 安装

## 下载

从Gitee下载：
```bash
git clone https://gitee.com/orange23333/chinese-characters
mv chinese-characters/* /var/www/chinese-characters
```

从GitHub下载：
```bash
git clone https://github.com/Orange23333/ChineseCharacters
mv ChineseCharacters/* /var/www/chinese-characters
```

## 修改文件权限

```bash
cd /var/www/chinese-characters
chown -vhR www-data:www-data .
find . -name "*.php" -exec chmod -v +x {} \;
```

# 网站收录

## 方言（輶轩使者绝代语释别国方言）

内容存放在`page/fangyan`下。

*即将高考，更新较慢*

---

[使用许可证（简体中文）](https://gitee.com/orange23333/chinese-characters/blob/main/LICENSE.txt) | [License (English)](https://github.com/Orange23333/ChineseCharacters/blob/main/LICENSE.en-US.txt)

[码云 Gitee](https://gitee.com/orange23333/chinese-characters) | [GitHub](https://github.com/Orange23333/ChineseCharacters)
