# thinkphp5.1-crontab
##项目目标：
>项目中往往因为有非常多的计划任务而变的难以维护。且每次都需要麻烦运维，也不是一件很好的事情。看了很多大神写的计划任务工具，但是都是在php层级循环调用子任务。这样难免会产生同步阻塞的问题。因此萌发了“使用shell单一入口管理项目中的计划任务”的想法；
##安装
>composer require leistar/thinkphp5.1-crontab
##开始使用
1. 将cron.sh和task(注意没有后缀名)文件复制到你服务器中任意目录；(例如复制到项目根目录，和think文件平级)
2. 修改cron.sh文件，将其中的php路径和文件路径修改正确
3. 创建自定义命令，参考：[创建自定义指令](https://www.kancloud.cn/manual/thinkphp5_1/354146){:target="_blank"}
4. 需要加入计划任务的命令，要求继承thinkphp5.1-crontab项目的Task基类；并实现schedule(),configure(),execute()三个方法。
5. 将命令名写在第一步的task文件中。
6. 可参考项目中的demo. 特别注意：demo中的类可能会有命名空间的问题，并不一定能实现功能。只是参考使用
7. 将sh加入到计划任务中
```
*/1 * * * * /mnt/d/wwwroot/tp5/cron.sh >> /mnt/d/wwwroot/cron.log
```
##写在最后
- 代码中有很多不成熟的地方，期待您的issue。最好能fork，将您的想法贡献出来。让这个项目更适应更多的场景。
- 邮箱：chenleib5@126.com