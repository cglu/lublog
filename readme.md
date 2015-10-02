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


服务器代码更新:cmd下执行./sync.sh


.env文件保存帐号信息、放在服务器上。不在代码库中。
