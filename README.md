🌙 web-security-study
====

![GitHub issues](https://img.shields.io/github/issues/isystk/web-security-study)
![GitHub forks](https://img.shields.io/github/forks/isystk/web-security-study)
![GitHub stars](https://img.shields.io/github/stars/isystk/web-security-study)
![GitHub license](https://img.shields.io/github/license/isystk/web-security-study)

## 📗 プロジェクトの概要

Webセキュリティを学習する為のサンプルアプリケーションです。

## 🌐 Demo

- XSS(クロスサイトスクリプティング)
- CSRF(クロスサイトリクエストフォージェリ)
- SQLインジェクション
- SSI(サーバーサイドインクルード)
- セッションハイジャック
- オープンリダイレクト

## 📦 ディレクトリ構造

```
.
├── docker （各種Daemon）
│   │
│   ├── apache （Webサーバー）
│   │   ├── conf.d (apacheの設定ファイル)
│   │   └── logs （apacheのログ）
│   ├── mysql （DBサーバー）
│   │   ├── conf.d (mysqlの設定ファイル)
│   │   ├── initdb.d （mysqlの初期DDL）
│   │   └── logs （mysqlのログ）
│   └── php （PHP-FRM）
│       └── logs （phpのログ）
│
├── public
└── dc.sh （Dockerの起動用スクリプト）
```

## 🖊️ Docker 操作用シェルスクリプトの使い方

```
Usage:
  dc.sh [command] [<options>]

Options:
  stats|st                 Dockerコンテナの状態を表示します。
  init                     Dockerコンテナ・イメージ・生成ファイルの状態を初期化します。
  start                    すべてのDaemonを起動します。
  stop                     すべてのDaemonを停止します。
  apache restart           Apacheを再起動します。
  mysql login              MySQLデータベースにログインします。
  mysql export <PAHT>      MySQLデータベースのdumpファイルをエクスポートします。
  mysql import <PAHT>      MySQLデータベースにdumpファイルをインポートします。
  php login                PHP-FPMのサーバーにログインします。
  --version, -v     バージョンを表示します。
  --help, -h        ヘルプを表示します。
```

## 💬 使い方

各種デーモンを起動する
```
# 下準備（初回のみ）
$ ./dc.sh init

# Dockerでローカル環境に各種デーモンを構築・起動する
$ ./dc.sh start

# データベースとPHPが立ち上がるまで少し待ちます。(初回は5分程度)

# MySQLにログインしてみる（ログインが出来れば成功です）
$ ./dc.sh mysql login
```

## 🎨 参考

| プロジェクト                                                                                                  | 概要                               |
|:------------------------------------------------------------------------------------------------------------|:---------------------------------|
| [Laravel11公式ドキュメント](https://readouble.com/laravel/11.x/ja/releases.html)                               | Laravel11公式ドキュメントです。             |


## 🎫 Licence

[MIT](https://github.com/isystk/web-security-study/blob/master/LICENSE)

## 👀 Author

[isystk](https://github.com/isystk)
