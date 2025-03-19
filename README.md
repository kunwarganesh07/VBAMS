admin
username-admin
password-Test@123


for mail...
configuration setting:
1. c:/xampp/php
2.open php.ini file
Find mail function
....press ...ctrl+f...type.... mail function ....

[mail function]
; For Win32 only.
;http://php.net/smtp
SMTP=smtp.gmail.com
;http://php.net/smtp-port
smtp_port=25

sendmail_from = example@gmail.com

sendmail_path = C:\xampp\sendmail\sendmail.exe\" -t"

now go to c:/xampp/sendmail and open sendmail.ini file
....press ...ctrl+f...type.... sendmail ....

smtp_server=smtp.gmail.com
smtp_port=587

noe remove semicolom before this 
eror_logfile=error.log
debug_logfile=debug.log


/// Create App passwrd from your gmail account
auth_username = example@gmail.com
auth_password = your email password


force_sender=example@gmail.com
