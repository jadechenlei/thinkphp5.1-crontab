#!/bin/bash
for task in `cat /mnt/d/wwwroot/tp5/task`;do
      	php /mnt/d/wwwroot/tp5/think $task &
done
