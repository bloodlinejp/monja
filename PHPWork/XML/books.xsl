<?xml version="1.0" encoding="UTF-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
	<html>
		<head>
			<title>本一覧</title>
		</head>
		<body>
			<table border="1">
				<tr>
					<th>タイトル</th>
					<th>著者</th>
					<th>ISBN</th>
					<th>コメント</th>
				</tr>
				<xsl:for-each select="library/book">
					<tr>
						<td><xsl:value-of select="title" /></td>
						<td>
							<xsl:for-each select="authors">
								<xsl:value-of select="author" />
							</xsl:for-each>
						</td>
						<td><xsl:value-of select="isbn" /></td>
						<td><xsl:value-of select="comment" /></td>
					</tr>
				<xsl:for-each>
			</table>
		</body>
	</html>
</xsl:template>

</xsl:stylesheet>

