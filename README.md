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
- クリックジャッキング

## 📦 ディレクトリ構造

```
.
├── docker （各種Daemon）
│   ├── web （Webサーバー）
│   │   ├── config (設定ファイル)
│   │   └── logs （ログ）
│   └── mysql （DBサーバー）
│       ├── conf.d (mysqlの設定ファイル)
│       ├── initdb.d （mysqlの初期DDL）
│       └── logs （mysqlのログ）
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
  web login                Webサーバーにログインします。
  web restart              Webサーバーを再起動します。
  mysql login              MySQLデータベースにログインします。
  mysql export <PAHT>      MySQLデータベースのdumpファイルをエクスポートします。
  mysql import <PAHT>      MySQLデータベースにdumpファイルをインポートします。
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
| [安全なウェブサイトの作り方](https://www.ipa.go.jp/security/vuln/websecurity/about.html)                               | 安全なウェブサイトの作り方         |
| [体系的に学ぶ 安全なWebアプリケーションの作り方 脆弱性が生まれる原理と対策の実践](https://www.amazon.co.jp/gp/product/4797361190/ref=ox_sc_act_title_1?smid=AF3AGBLY4CLDQ&psc=1)                               | 体系的に学ぶ 安全なWebアプリケーションの作り方 脆弱性が生まれる原理と対策の実践         |
| [「安全なWebアプリケーションの作り方」を読んだ所感など](https://qiita.com/Yajima_t/items/08beb4cb8c12bcc92693)                               | 「安全なWebアプリケーションの作り方」を読んだ所感など         |


## 🎫 Licence

[MIT](https://github.com/isystk/web-security-study/blob/master/LICENSE)

## 👀 Author

[isystk](https://github.com/isystk)
