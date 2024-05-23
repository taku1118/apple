# Bootstrapとは  
### Twitter（現在はX）社が作成したCSSのフレームワーク  
### PCだけでなくスマホ用のレイアウトにも対応しているため一つのHTMLページ上でスマホ、PC対応の画面が作れる  
### 読み込むCDNは2つ  
### headタグの中にlinkタグで読み込み 
* `<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">`  
### bodyタグの下の方にscriptタグで読み込み  
* `<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>`  
## ユーティリティクラスについて  
### CSSではmargin、paddingなどで余白設定を行っていた  
### BootstrapではCSSを使わずにdivタグやpタグなどのclassに直接書き込み余白設定ができる  
### これをユーティリティクラスという
![ユーティリティクラス](./img/スクリーンショット%202024-05-22%20092629.png)  

![ブレイクポイント](./img/スクリーンショット%202024-05-22%20091214.png)  
### 「余白の種類・方向・ブレークポイント・サイズ」の順で指定(不要な部分は省略可)  
### これがあるとCSSにいちいちmargin、paddingなどの余白の設定を書く必要がなくなる、よって制作時間の短縮！
