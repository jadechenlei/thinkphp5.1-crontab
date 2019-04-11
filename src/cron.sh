#!/bin/bash
for task in `cat /mnt/d/wwwroot/tp5/task`;do
	#请修改成你自己的PHP路径和项目路径
      	php /mnt/d/wwwroot/tp5/think $task &
done
