正在开发中....

基于Laravel的个人博客

运行在阿里云esc上，在线网址:http://luhu.in

安装

1.git clone https://github.com/cglu/lublog.git

2.chown .www /alidata/www/lublog -R

3.cd lublog
 
  composer install
  
  chmod g=rwx storage -R
  
  chmod g=rwx vendor -R

4.在mysql中建库、见用户

5.php artion migrate:refresh

5.php artion db:seed

6.使用了redis作为缓存系统。#session也使用redis驱动

服务器代码更新:采用git pull的方式。项目内有./sync.sh脚本、执行后会自动从github.com上更新代码


.env文件保存帐号信息、放在服务器上。不在代码库中。
