# プロジェクト作成
oil create

## マイグレーションツールインストール

```
composer require davedevelopment/phpmig
```

### 要らないのが入ったので削除

```
composer remove fuel/docs
```

## phpmig.php 書き換え
adapterを差し替えて管理テーブルをDBの中へ
index.phpの上部分を真似して `pdo` のクラスを渡す

## 試験的にマイグレーションを作る

```
$ phpmig generate add_item
+f ./fuel/app/migrations/20180730031518_add_item.php
```
`up` と `down` のメッソっどだけのファイルが作られる

## 実行する

### バージョンアップ

```
phpmig migrate
 == 20180730025841 AddPlayer migrating
 == 20180730025841 AddPlayer migrated 0.0116s
 == 20180730031518 AddItem migrating
 == 20180730031518 AddItem migrated 0.0005s
```

### バージョンダウン

```
phpmig rollback -t 0
 == 20180730031518 AddItem reverting
 == 20180730031518 AddItem reverted 0.0005s
 == 20180730025841 AddPlayer reverting
 == 20180730025841 AddPlayer reverted 0.0082s
```

