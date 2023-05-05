<!DOCTYPE HTML PUBLIC "-//W3//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>PHP練習</title>
	</head>
	<body>
		<?php
		$dsn = 'mysql:dbname=phpkiso;host=localhost';
		$user ='root';
		$password ='';
		$dbh = new PDO($dsn,$user,$password);
		$dbh->query('SET NAMES UTF-8');
		
		$sql ='SELECT * FROM anketo WHERE 1';
		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		
		while(1) {
			$rec = $stmt->fetch(PDO::FETCH_ASSOC);
			if($rec==false){
				break;
			}
			print 'コード番号：';
			print $rec['code'];
			print '　ニックネーム：';
			print $rec['nickname'];
			print '　メールアドレス：';
			print $rec['email'];
			print '　ご意見：『';
			print $rec['goiken'];
			print '』<br/>';
		}
		
		$dbh = null;
		print '<br/>';
		print '<a href="menu.html">メニューに戻る</a><br/>';
		
		?>
	</body>
		
</html>