# 指定されたイメージをベースとして使用
FROM php:8.1-fpm

# システム依存性とPHP拡張をインストール
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# MySQL拡張をインストール
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Redis拡張をインストール
RUN pecl install redis \
    && docker-php-ext-enable redis

# Composerをグローバルにインストール
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 作業ディレクトリを設定
WORKDIR /var/www

# 既存のアプリケーションディレクトリをコピー
COPY . .

# プロジェクト依存性をインストール
RUN composer install
