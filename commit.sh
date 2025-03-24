#!/bin/bash
cat ../csatolasok
git add *
git commit -m $1
git push origin main
cp -r /home/zoli/prog3/webIbeadando/webp1local/webp1/* ~/prog3/webIbeadando/webp1ftp/

