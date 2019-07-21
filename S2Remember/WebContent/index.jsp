<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<!-- Struts2のタグライブラリを使用可能にする -->
<%@ taglib prefix="s" uri="/struts-tags"%>
<!-- タイプ宣言はHTML5のものを使用する -->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Struts2でHelloWorld</title>
    </head>
    <body>
        <!-- 入力フォームはStruts2のタグを使用します -->
        <s:form action="hello">
            <s:textfield name="name" />
            <s:submit value="HelloWorldページへ行く" />
        </s:form>
    </body>
</html>