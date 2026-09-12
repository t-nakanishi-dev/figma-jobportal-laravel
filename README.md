# 💼 Job Portal Laravel – 求人サイト

## 🔗 デプロイURL

現在デプロイしていません。

## 📸 スクリーンショット

### 🏠 求人一覧

![Job Portal Laravel - Jobs](images/jobs.png)

### 📄 求人詳細

![Job Portal Laravel - Job Details](images/job-details.png)

※スクリーンショットのファイル名・保存場所に合わせて変更してください。

## 📝 アプリ概要

Figmaのデザインをもとに制作したJob Portal（求人サイト）のLaravel版です。

静的なHTML / CSS / JavaScriptで制作したサイトをLaravelへ移行し、求人情報をSQLiteデータベースから取得する動的なWebサイトとして実装しました。

求人一覧・求人詳細・検索・絞り込み・ソート・ページネーションなど、求人サイトに必要な基本機能を実装しています。

Figmaのデザインをできるだけ維持しながら、LaravelのRouting、Controller、Model、Migration、Seeder、Eloquent、Bladeなどを使用して、静的サイトを動的なWebサイトへ変換しました。

### 制作の流れ

```text
Figma
  ↓
HTML / CSS / JavaScript
  ↓
Laravel
  ↓
SQLite
  ↓
Eloquent
  ↓
検索・絞り込み・ソート・ページネーション
```

## 🔧 使用技術

* PHP 8.3
* Laravel 13
* SQLite
* Blade
* HTML5
* CSS3
* JavaScript
* Git / GitHub
* GitHub Codespaces

## ✨ 主な機能

### 🔍 求人検索・絞り込み

* 求人タイトル・会社名によるキーワード検索
* 勤務地による絞り込み
* カテゴリーによる絞り込み
* Job Typeによる絞り込み
* 経験レベルによる絞り込み
* タグによる絞り込み
* 最低給与による絞り込み

### ↕️ 給与ソート

* Salary: High to Low
* Salary: Low to High

給与はデータベース上で最低給与と最高給与に分けて管理しています。

```text
salary_min
40000

salary_max
42000
```

最低給与・最高給与を分けて管理することで、給与による絞り込みやソートをデータベース上で行えるようにしています。

### 📋 求人一覧

* 求人情報のデータベースからの取得
* 求人カードの動的表示
* 求人詳細ページ
* 関連求人の表示
* ページネーション
* Nextボタン
* 現在の表示件数 / 全件数の動的表示

### 🏷️ その他

* Browse by Categoryからカテゴリー検索へのリンク
* Job Cardのお気に入りUI
* レスポンシブ対応
* FigmaデザインをもとにしたUI実装

※お気に入り機能は現在フロントエンドのUIとして実装しており、お気に入り情報はデータベースには保存されません。

## 🧩 Laravelで実装した内容

### Routing

URLに応じてControllerを呼び出し、求人一覧・求人詳細などのページを表示しています。

### Controller

検索条件や絞り込み条件を受け取り、データベースから求人情報を取得してBladeへ渡しています。

### Eloquent ORM

Eloquent Modelを使用して求人情報をデータベースから取得しています。

また、求人に紐づくResponsibilities・Skills・Tagsについて、Modelのリレーションを利用して関連データを取得しています。

### 検索・絞り込み

GETパラメータを利用して検索条件を受け取り、以下のようなクエリを組み合わせて求人を絞り込んでいます。

* `where()`
* `whereBetween()`
* `whereHas()`

### ソート

`orderBy()`を使用して給与の昇順・降順などのソートを実装しています。

### ページネーション

LaravelのPaginationを使用し、求人一覧を複数ページに分けて表示しています。

検索・絞り込み・ソートを行った状態でも条件を維持したままページ移動できるようにしています。

## 🗄️ データベース構成

求人情報と、1つの求人に複数存在するデータを分けて管理しています。

```text
jobs
├── id
├── title
├── company
├── category
├── type
├── salary_min
├── salary_max
├── location
├── experience
├── degree
└── description

job_responsibilities
├── id
├── job_id
└── responsibility

job_skills
├── id
├── job_id
└── skill

job_tags
├── id
├── job_id
└── tag
```

### Modelのリレーション

```text
Job
 ├── hasMany → JobResponsibility
 ├── hasMany → JobSkill
 └── hasMany → JobTag
```

`JobResponsibility`、`JobSkill`、`JobTag`は、それぞれ`Job`に所属する1対多のリレーションとして管理しています。

## 💡 工夫した点・学び

### 静的サイトからLaravelへの移行

まずFigmaをもとにHTML / CSS / JavaScriptで静的サイトを制作し、その後Laravelへ移行しました。

既存のデザインやレイアウトをできるだけ維持しながら、静的に記述していた求人情報をデータベースから取得する構成へ変更しています。

### データベース設計

求人本体の情報と、求人に複数存在するResponsibilities・Skills・Tagsを別テーブルで管理しました。

LaravelのModelリレーションを利用することで、求人と関連データを紐づけて取得できるようにしています。

### 検索・絞り込み処理

複数の検索条件をGETパラメータで受け取り、条件に応じてクエリを組み立てることで、求人情報を動的に絞り込めるようにしました。

また、給与については`salary_min`と`salary_max`を分けて管理し、給与条件による検索・ソートに対応しています。

### Bladeによる動的表示

静的HTMLとして記述していた求人カードをBladeへ移行し、データベースから取得した求人情報をループ処理によって動的に表示しています。

これにより、求人情報を追加・変更した際にもHTMLを直接編集する必要がない構成にしています。

### Figmaデザインの再現

Laravelの機能実装だけでなく、元となったFigmaデザインのレイアウトやUIをできるだけ維持することを意識して制作しました。

## 📚 学んだこと

この制作を通して、以下の内容を実践しました。

* Laravelの基本的なディレクトリ構成
* Routing
* Controller
* Blade
* Eloquent ORM
* Modelリレーション
* Migration
* Seeder
* Query Builder
* GETパラメータ
* `where()`
* `whereBetween()`
* `whereHas()`
* `orderBy()`
* Pagination
* SQLiteを使用したデータベース操作
* ControllerからBladeへのデータ受け渡し

## 📌 制作状況

Laravel版のJob Portalとして完成。

Figmaベースの静的サイトをLaravelへ移行し、SQLiteデータベースから求人情報を取得する動的な求人サイトとして実装したポートフォリオ作品です。

## 👤 作者情報

**t-nakanishi-dev**

* Portfolio: https://t-nakanishi-dev.com/
* GitHub: https://github.com/t-nakanishi-dev
