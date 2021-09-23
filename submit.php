<p>下記内容で送信しました。</p>

        <?php 
        $email="example@tekitou.co.jp";
        mb_language("japanese");
        mb_internal_encoding('UTF-8');            
        $subject="「".htmlspecialchars($_POST['name'],ENT_QUOTES)."」さんからのお問い合わせ";
        $body="「Webサイト名」から自動送信\n\n";
        $body.="◆お名前\n".htmlspecialchars($_POST['name'],ENT_QUOTES)."\n\n";
        $body.="◆メールアドレス\n".htmlspecialchars($_POST['mail'],ENT_QUOTES)."\n\n";
        $body.="◆内容\n".htmlspecialchars($_POST['contents'],ENT_QUOTES);
        $header = "MIME-Version: 1.0\n";
        $header .= "Content-Transfer-Encoding: 7bit\n";
        $header .= "Content-Type: text/plain; charset=ISO-2022-JP\n";
        $header .= "From: " .mb_encode_mimeheader("Webサイト名より自動送信") ."<".htmlspecialchars($_POST['mail'],ENT_QUOTES).">\n";
        $header .= "Reply-To:".htmlspecialchars($_POST['name'],ENT_QUOTES) ."<".htmlspecialchars($_POST['mail'],ENT_QUOTES).">";
        $success = mb_send_mail($email,$subject,$body,$header);?>

        <?php 
        $email=htmlspecialchars($_POST['mail'],ENT_QUOTES);
        mb_language("japanese");
        mb_internal_encoding('UTF-8');            
        $subject="お問い合わせを受け付けました";
        $body="「Webサイト名」から自動送信\n\n";
        $body.="※このメールへの返信は不可となっております\n\n";
        $body.="下記内容でお問い合わせを受け付けました\n\n";
        $body.="◆お名前\n".htmlspecialchars($_POST['name'],ENT_QUOTES)."\n\n";
        $body.="◆メールアドレス\n".htmlspecialchars($_POST['mail'],ENT_QUOTES)."\n\n";
        $body.="◆内容\n".htmlspecialchars($_POST['contents'],ENT_QUOTES);
        $header = "MIME-Version: 1.0\n";
        $header .= "Content-Transfer-Encoding: 7bit\n";
        $header .= "Content-Type: text/plain; charset=ISO-2022-JP\n";
        $header .= "From: " .mb_encode_mimeheader("Webサイト名より自動送信") ."<no-reply@tokyorecyclenavi.com>\n";
        $header .= "Reply-To:"."<no-reply@tekitou.com>";
        $success = mb_send_mail($email,$subject,$body,$header);?>

        <dl>
          <dt><label for="name">▼お名前</label></dt>
          <dd><?php print(htmlspecialchars($_POST['name'],ENT_QUOTES));?></dd>
          <dt><label for="mail">▼メールアドレス</label></dt>
          <dd><?php print(htmlspecialchars($_POST['mail'],ENT_QUOTES));?></dd>
          <dt><label for="contents">▼内容</label></dt>
          <dd><?php print(htmlspecialchars($_POST['contents'],ENT_QUOTES));?></dd>
        </dl>

        <a href="index.html"><button type="button">ホームに戻る</button></a>
