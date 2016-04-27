#!/bin/sh
# 生成数据库
set currentDir = `PWD`
rm -rf $currentDir'/generate-sql'
rm -rf $currentDir'/generate-classes'
rm -rf $currentDir'/Model'
rm -rf $currentDir'/generate-conf'

$currentDir'/vendor/bin/propel' sql:build
cd generate-sql
psql 
