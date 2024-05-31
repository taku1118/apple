# Bootstrapでclassに書いた要素が反映されない件   
### HTMLタグのblock要素、inline要素の特性が関係しているかも  
# block要素、inline要素とは
![Display](./img/スクリーンショット%202024-05-22%20185458.png)  
* ### block要素：要素が横全体に広がり、縦に積み上げるように表示される(pタグ、divタグ、h1～h6タグなど)  
* ### inline要素：要素が横に一列に並んで表示される(aタグ、spanタグ、imgタグなど)    
![注意点](./img/スクリーンショット%202024-05-22%20191146.png)  
# block要素、inline要素の特性について  
## block要素の特性  
### 1. 幅や高さ（width、height）を指定できる
### 2. 余白（marginやpadding）を上下左右指定できる  
### 3. text-alignで文章や画像の位置を指定できない  
## inline要素の特性  
### 1. 幅や高さ（width、height）を指定できない  
### 2. 上下のmarginが指定できず、paddingは上下指定できるがデザインが崩れる  
### 3. 左右の余白だけは指定できる    
## そのためBootstrapでもinline要素のclassにwidthなどを指定したところで反映がされないことがある  
## inline要素は制約が多く正直使いづらいためinline-blockという要素に変換して使う方がいい  
### 指定のやり方：`<span class="fs-1 d-inline-block w-50">inline-block要素</span>`  
### `d-inline-block`で要素をinline-blockに変換できる