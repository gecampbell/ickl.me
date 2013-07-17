#!/bin/bash
rsync -aprv --exclude=.git --exclude=$0 . root@rack5:/var/www/vhosts/test.ickl.me/
