##What is this project?
  This is my own file upload tool written by php.
  
  You can git clone from 
  "https://github.com/LitterMonster/File-Upload-PHP.git".
  
  
##Functions
*View files and directories in an another link.

*Upload your files to your own server.

*Create new directory but not support to create hierarchical directories, 
It means that you can only create new directory in the root directory.

*Remove files from a directory

*Remove directory and remove all files inside.

*You can adjust the max uploaded file size in php.ini and Apache(or nginx)
configure files.

##Before use
    Configure
        1.Create two virtual host in Apache(Nginx) configutation directory.
        such as (up.conf, file.conf).
        2.The file.conf does nothing and just add three words in "location /" block, 
        autoindex on;# display directory
        autoindex_exact_size on;# display file size
        autoindex_localtime on;# display file date
        Besides this virtual host should have a virtual directory, it depends on you.
        Following is my file.conf configuration:
   ```javascript
  1     server {
  2         listen       80;
  3         server_name  file.littermonster.net;
  4
  5         location / {
  6             root         /var/www/html/file; #You should grant 777 to this directory so that you can read and write casually.
  7             autoindex on;
  8             autoindex_exact_size off;
  9             autoindex_localtime on;
 10         }
 11
 12         location ~ .php$ {
 13             root         /var/www/html/file;
 14             fastcgi_index         index.php;
 15             fastcgi_pass        127.0.0.1:9000;
 16             fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
 17             include fastcgi_params;
 18         }
 19         error_page 404 /404.html;
 20             location = /40x.html {
 21         }
 22
 23         error_page 500 502 503 504 /50x.html;
 24             location = /50x.html {
 25         }
 26     }
```
    3.up.conf
 ```javascript
  1     server {
  2         listen       80;
  3         server_name  up.littermonster.net;
  4
  5         location / {
  6             index     login.php login.html;
  7             root         /var/www/html/up;
  8         }
  9
 10         location ~ .php$ {
 11             root         /var/www/html/up;
 12             fastcgi_index         index.php;
 13             fastcgi_pass        127.0.0.1:9000;
 14             fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
 15             include fastcgi_params;
 16
 17             #client_max_body_size 1000m;
 18             #client_body_buffer_size 50m;
 19         }
 20         error_page 404 /404.html;
 21             location = /40x.html {
 22         }
 23
 24         error_page 500 502 503 504 /50x.html;
 25             location = /50x.html {
 26         }
 27     }

```
    4.Restart Nginx and PHP server
        #service nginx restart
        #service php-fpm restart
