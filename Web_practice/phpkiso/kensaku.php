<!DOCTYPE HTML PUBLIC "-//W3//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>PHP練習</title>
	</head>
	<body>
		<?php
		$code=$_POST['code'];
		$dsn = 'mysql:dbname=phpkiso;host=localhost';
		$user ='root';
		$password ='';
		$dbh = new PDO($dsn,$user,$password);
		$dbh->query('SET NAMES UTF-8');
		
		$sql ='SELECT * FROM anketo WHERE code=?';
		$stmt = $dbh->prepare($sql);
		$data[]=$code;
		$stmt->execute($data);
		
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
		?>
		<br/>
		<a href="kensaku.html">検索画面に戻る</a><br/>
	</body>
</html>