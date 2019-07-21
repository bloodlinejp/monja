<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ taglib prefix="s" uri="/struts-tags"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Hello Struts2 world!</title>
    </head>
    <body>
        <!-- メッセージの間に渡されたデータを表示します。 -->
        Hello Struts2 world, <s:property value="name" />さん
    </body>
</html>